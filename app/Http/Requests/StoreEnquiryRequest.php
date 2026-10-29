<?php

namespace App\Http\Requests;

use App\Enums\EnquiryType;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Validator;

class StoreEnquiryRequest extends FormRequest
{
    /**
     * Seconds a real visitor needs before the form can be submitted.
     */
    public const MIN_FILL_SECONDS = 3;

    protected function getRedirectUrl(): string
    {
        return route('contact').'#form-errors';
    }

    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'organization' => ['nullable', 'string', 'max:160'],
            'email' => ['required', 'email:rfc', 'max:190'],
            'phone' => ['nullable', 'string', 'max:25', 'regex:/^[0-9+()\-\s]{6,25}$/'],
            'type' => ['required', Rule::enum(EnquiryType::class)],
            'subject' => ['nullable', 'string', 'max:160'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'privacy' => ['accepted'],
            'website_url' => ['prohibited'],
            'form_token' => ['required', 'string'],
        ];
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Please enter your full name.',
            'email.required' => 'Please enter your email address so we can reply.',
            'email.email' => 'Please enter a valid email address, for example name@company.com.',
            'phone.regex' => 'Please enter a valid telephone number, for example +260 977 783636.',
            'type.required' => 'Please choose the type of enquiry.',
            'message.required' => 'Please tell us how we can help.',
            'message.min' => 'Please add a little more detail (at least 10 characters).',
            'privacy.accepted' => 'Please confirm that you have read the privacy notice.',
            'website_url.prohibited' => 'Your submission could not be accepted.',
        ];
    }

    /**
     * Reject submissions that arrive faster than a person could fill in the form.
     *
     * @return array<int, callable>
     */
    public function after(): array
    {
        return [
            function (Validator $validator): void {
                if ($validator->errors()->has('form_token')) {
                    return;
                }

                try {
                    $issuedAt = (int) Crypt::decryptString((string) $this->input('form_token'));
                } catch (DecryptException) {
                    $validator->errors()->add('form_token', 'The form expired. Please try again.');

                    return;
                }

                if (now()->timestamp - $issuedAt < self::MIN_FILL_SECONDS) {
                    $validator->errors()->add('form_token', 'That was very quick. Please check your details and send again.');
                }
            },
        ];
    }
}
