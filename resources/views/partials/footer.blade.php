<footer class="foot wrap" id="contact">
  <div class="foot-grid">
    <div>
      <a href="{{ route('home') }}" class="foot-logo" aria-label="RDM Scientific Products Limited home">
        <img src="{{ asset('images/logos/rdm-footer-logo.svg') }}" alt="RDM Scientific Products Limited, Authorised Merck and Metrohm Dealer" width="240" height="142" loading="lazy">
      </a>
      <p class="about">RDM Scientific Products Limited. Reliable laboratory solutions for science and industry since 1984.</p>
    </div>
    <div>
      <h4>Quick links</h4>
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ route('products') }}">Products &amp; Applications</a></li>
        <li><a href="{{ route('contact') }}">Contact Us</a></li>
      </ul>
    </div>
    <div>
      <h4>Products</h4>
      <ul>
        <li><a href="{{ route('products') }}#chemicals">Chemicals</a></li>
        <li><a href="{{ route('products') }}#reagents">Reagents</a></li>
        <li><a href="{{ route('products') }}#glassware">Glassware</a></li>
        <li><a href="{{ route('products') }}#consumables">Consumables</a></li>
        <li><a href="{{ route('products') }}#equipment">Equipment</a></li>
        <li><a href="{{ route('products') }}#brands">Brands</a></li>
      </ul>
    </div>
    <div>
      <h4>Contact</h4>
      <ul>
        <li><a href="tel:{{ config('rdm.phone_href') }}">{{ config('rdm.phone') }}</a></li>
        <li><a href="mailto:{{ config('rdm.email') }}">{{ config('rdm.email') }}</a></li>
        <li>{{ config('rdm.address') }}</li>
      </ul>
    </div>
  </div>
  <div class="copy">
    <span>&copy; 2026 RDM Scientific Products Limited. All rights reserved.</span>
    <span><a href="https://www.rdmscientific.com">www.rdmscientific.com</a></span>
  </div>
</footer>
