<footer class="foot wrap" id="contact">
  <div class="foot-grid">
    <div>
      <a href="{{ route('home') }}" class="brand" aria-label="RDM home">
        <span class="hexes" aria-hidden="true"><span class="hex"><i>R</i></span><span class="hex"><i>D</i></span><span class="hex"><i>M</i></span></span>
      </a>
      <p class="about">RDM Scientific Products Limited. Reliable laboratory solutions for science and industry since 1984.</p>
    </div>
    <div>
      <h4>Quick links</h4>
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li><a href="{{ url('/products') }}">Products &amp; Applications</a></li>
        <li><a href="{{ url('/contact') }}">Contact Us</a></li>
      </ul>
    </div>
    <div>
      <h4>Products</h4>
      <ul>
        <li><a href="{{ url('/products') }}#chemicals">Chemicals &amp; Reagents</a></li>
        <li><a href="{{ url('/products') }}#glassware">Glassware</a></li>
        <li><a href="{{ url('/products') }}#consumables">Consumables</a></li>
        <li><a href="{{ url('/products') }}#equipment">Equipment</a></li>
        <li><a href="{{ url('/products') }}#brands">Brands</a></li>
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
