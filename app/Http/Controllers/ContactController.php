<?php

namespace App\Http\Controllers;

use App\Enums\EnquiryType;
use App\Http\Requests\StoreEnquiryRequest;
use App\Mail\EnquiryReceived;
use App\Mail\NewEnquiry;
use App\Models\Enquiry;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Throwable;

class ContactController extends Controller
{
    public function show(Request $request): View
    {
        return view('contact', [
            'types' => EnquiryType::cases(),
            'prefill' => $this->prefillFromQuery($request),
            'formToken' => Crypt::encryptString((string) now()->timestamp),
        ]);
    }

    public function store(StoreEnquiryRequest $request): RedirectResponse
    {
        $enquiry = Enquiry::create([
            ...$request->safe()->only(['name', 'organization', 'email', 'phone', 'type', 'subject', 'message']),
            'privacy_accepted_at' => now(),
        ]);

        $this->notify($enquiry);

        return redirect()->to(route('contact').'#confirmation')->with('enquiry_sent', true);
    }

    /**
     * Notify the sales team, and optionally the sender. A mail failure must never lose the
     * enquiry, which is already stored.
     */
    private function notify(Enquiry $enquiry): void
    {
        try {
            Mail::to(config('rdm.sales_email'))->send(new NewEnquiry($enquiry));

            if (config('rdm.send_confirmation')) {
                Mail::to($enquiry->email)->send(new EnquiryReceived($enquiry));
            }
        } catch (Throwable $exception) {
            Log::error('Enquiry notification failed', ['enquiry_id' => $enquiry->id, 'error' => $exception->getMessage()]);
        }
    }

    /**
     * Pre-select the enquiry type and subject from links such as /contact?application=mrna.
     *
     * @return array{type: string, subject: string}
     */
    private function prefillFromQuery(Request $request): array
    {
        $catalog = config('catalog');
        $type = EnquiryType::tryFrom((string) $request->query('type'))?->value;
        $subject = '';

        $lookups = [
            'application' => ['applications', 'Enquiry about %s'],
            'category' => ['categories', 'Enquiry about %s'],
            'industry' => ['industries', 'Supplies for %s'],
        ];

        foreach ($lookups as $key => [$list, $format]) {
            $match = collect($catalog[$list])->firstWhere('id', (string) $request->query($key));

            if ($match) {
                $subject = sprintf($format, $match['name']);
                $type ??= EnquiryType::Product->value;
                break;
            }
        }

        if ($request->query('topic') === 'documents') {
            $subject = 'Request for catalogues, datasheets and safety data sheets';
            $type ??= EnquiryType::General->value;
        }

        return ['type' => $type ?? EnquiryType::Quotation->value, 'subject' => $subject];
    }
}
