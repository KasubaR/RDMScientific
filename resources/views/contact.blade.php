@extends('layouts.app')

@section('title', 'Contact Us | RDM Scientific Products Limited')
@section('description', 'Contact RDM Scientific Products Limited in Lusaka, Zambia. Call +260 977 783636, email sales@rdmscientific.com or send a product enquiry or quote request.')
@section('og_title', 'Contact Us | RDM Scientific Products Limited')
@section('og_description', 'Reach RDM for laboratory supplies, quotations and technical assistance in Zambia and the DRC.')

@php
    $field = fn (string $name) => $errors->has($name) ? ['aria-invalid' => 'true', 'aria-describedby' => 'err-'.$name] : [];
    $whatsappUrl = 'https://wa.me/'.config('rdm.whatsapp').'?text='.rawurlencode('Hello RDM, I would like to make an enquiry.');
    $mapsSearch ='https://www.google.com/maps/search/?api=1&query='.urlencode(config('rdm.address'));
@endphp

@section('content')

<section class="page-hero" aria-labelledby="h1">
  <span class="crumb">Contact Us</span>
  <h1 id="h1">Let's talk about your laboratory needs</h1>
  <p>Call, email or send an enquiry. Our team will respond with availability, advice and pricing.</p>
</section>

<section class="card sec" id="quote" aria-labelledby="form-h">
  <div class="contact-layout">
  <div class="form-col">
  <div class="sec-head left">
    <span class="eyebrow">Enquiries &amp; quotations</span>
    <h2 class="sec-title" id="form-h">Send us an enquiry</h2>
    <p>Tell us what you need. Prices and availability are confirmed by our team after we receive your enquiry.</p>
  </div>

  @if (session('enquiry_sent'))
    <div class="alert alert-success" id="confirmation" role="status" tabindex="-1">
      <b>Thank you. Your enquiry has been sent.</b>
      <span>A member of our team will reply to the email address you provided. For urgent requests, call {{ config('rdm.phone') }}.</span>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-error" id="form-errors" role="alert" tabindex="-1">
      <b>Your enquiry has not been sent. Please fix the following:</b>
      <ul>
        @foreach ($errors->all() as $message)
          <li>{{ $message }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form class="quote enquiry-form" action="{{ route('contact.store') }}" method="post" novalidate>
    @csrf
    <input type="hidden" name="form_token" value="{{ $formToken }}">
    <div class="hp" aria-hidden="true">
      <label>Leave this field empty <input type="text" name="website_url" value="" tabindex="-1" autocomplete="off"></label>
    </div>

    <div class="row2">
      <div class="field">
        <label for="name">Full name <span class="req">*</span></label>
        <input id="name" name="name" type="text" value="{{ old('name') }}" autocomplete="name" required @foreach ($field('name') as $k => $v) {{ $k }}="{{ $v }}" @endforeach>
        @error('name') <p class="err" id="err-name">{{ $message }}</p> @enderror
      </div>
      <div class="field">
        <label for="organization">Organization</label>
        <input id="organization" name="organization" type="text" value="{{ old('organization') }}" autocomplete="organization" @foreach ($field('organization') as $k => $v) {{ $k }}="{{ $v }}" @endforeach>
        @error('organization') <p class="err" id="err-organization">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="row2">
      <div class="field">
        <label for="email">Email address <span class="req">*</span></label>
        <input id="email" name="email" type="email" value="{{ old('email') }}" autocomplete="email" required @foreach ($field('email') as $k => $v) {{ $k }}="{{ $v }}" @endforeach>
        @error('email') <p class="err" id="err-email">{{ $message }}</p> @enderror
      </div>
      <div class="field">
        <label for="phone">Telephone number</label>
        <input id="phone" name="phone" type="tel" value="{{ old('phone') }}" autocomplete="tel" @foreach ($field('phone') as $k => $v) {{ $k }}="{{ $v }}" @endforeach>
        @error('phone') <p class="err" id="err-phone">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="row2">
      <div class="field">
        <label for="type">Enquiry type <span class="req">*</span></label>
        <select id="type" name="type" required @foreach ($field('type') as $k => $v) {{ $k }}="{{ $v }}" @endforeach>
          @foreach ($types as $type)
            <option value="{{ $type->value }}" @selected(old('type', $prefill['type']) === $type->value)>{{ $type->label() }}</option>
          @endforeach
        </select>
        @error('type') <p class="err" id="err-type">{{ $message }}</p> @enderror
      </div>
      <div class="field">
        <label for="subject">Product or subject</label>
        <input id="subject" name="subject" type="text" value="{{ old('subject', $prefill['subject']) }}" @foreach ($field('subject') as $k => $v) {{ $k }}="{{ $v }}" @endforeach>
        @error('subject') <p class="err" id="err-subject">{{ $message }}</p> @enderror
      </div>
    </div>

    <div class="field">
      <label for="message">Message <span class="req">*</span></label>
      <textarea id="message" name="message" rows="6" required placeholder="Product names, quantities, catalogue numbers or the help you need..." @foreach ($field('message') as $k => $v) {{ $k }}="{{ $v }}" @endforeach>{{ old('message') }}</textarea>
      @error('message') <p class="err" id="err-message">{{ $message }}</p> @enderror
    </div>

    <div class="field">
      <label class="check" for="privacy">
        <input id="privacy" name="privacy" type="checkbox" value="1" @checked(old('privacy')) required @foreach ($field('privacy') as $k => $v) {{ $k }}="{{ $v }}" @endforeach>
        <span>I have read the <a href="#privacy">privacy notice</a> and agree that RDM may use my details to respond to this enquiry. <span class="req">*</span></span>
      </label>
      @error('privacy') <p class="err" id="err-privacy">{{ $message }}</p> @enderror
    </div>

    @error('form_token') <p class="err" id="err-form_token">{{ $message }}</p> @enderror

    <button type="submit" class="btn btn-red">Send enquiry <x-icon name="arrow" :size="16" /></button>
    <p class="fine">Fields marked * are required.</p>
  </form>
  </div>
    <aside class="details-col" aria-labelledby="details-h">
      <h2 id="details-h">Contact details</h2>
      <ul class="contact-cards">
        <li class="crow">
          <span class="ic"><x-icon name="phone" :size="22" /></span>
          <div><b>Telephone</b><a href="tel:{{ config('rdm.phone_href') }}">{{ config('rdm.phone') }}</a></div>
        </li>
        <li class="crow">
          <span class="ic"><x-icon name="whatsapp" :size="22" /></span>
          <div><b>WhatsApp</b><a href="{{ $whatsappUrl }}" rel="noopener" target="_blank">Chat with us on WhatsApp</a></div>
        </li>
        <li class="crow">
          <span class="ic"><x-icon name="mail" :size="22" /></span>
          <div><b>Email</b><a href="mailto:{{ config('rdm.email') }}">{{ config('rdm.email') }}</a></div>
        </li>
        <li class="crow">
          <span class="ic"><x-icon name="pin" :size="22" /></span>
          <div>
            <b>Office address</b>
            <address>{{ config('rdm.address') }}</address>
            <a href="{{ $mapsSearch }}" rel="noopener" target="_blank">Search this address on Google Maps</a>
          </div>
        </li>
      </ul>
    </aside>
  </div>
</section>

<section class="card sec privacy" id="privacy" aria-labelledby="priv-h">
  <div class="sec-head">
    <span class="eyebrow">Privacy notice</span>
    <h2 class="sec-title" id="priv-h">How we use your information</h2>
  </div>
  <div class="prose">
    <p>When you send an enquiry through this form, {{ config('rdm.name') }} receives the details you enter: your name, organization, email address, telephone number, enquiry type, subject and message.</p>
    <ul>
      <li>We use these details only to respond to your enquiry, for example to send a quotation or technical advice.</li>
      <li>Your enquiry is emailed to our sales team and stored on our website's database so it is not lost.</li>
      <li>We do not sell your details or use them for unrelated marketing.</li>
      <li>You can ask us to correct or delete your details at any time by emailing <a href="mailto:{{ config('rdm.email') }}">{{ config('rdm.email') }}</a>.</li>
    </ul>
  </div>
</section>

@endsection
