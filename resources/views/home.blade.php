@extends('layouts.app')

@section('title', 'RDM Scientific Products Limited | Laboratory Chemicals, Glassware & Equipment in Zambia')
@section('description', 'RDM Scientific Products Limited, founded in 1984 in Lusaka, supplies laboratory chemicals, reagents, glassware, consumables and equipment across Zambia and the DRC. Authorized dealer for Merck-Sigma Aldrich.')
@section('og_title', 'RDM Scientific Products Limited | Reliable Laboratory Solutions')
@section('og_description', 'Laboratory chemicals, glassware, consumables and equipment for science and industry in Zambia and the DRC.')

@section('content')

<!-- HERO -->
<section class="hero" aria-labelledby="h1">
  <div class="hero-in">
    <h1 id="h1">Reliable Laboratory Solutions for <em>Science and Industry</em></h1>
    <p>Chemicals, reagents, glassware, consumables and equipment for laboratories across Zambia and the DRC, backed by expert advice and authorized Merck-Sigma Aldrich supply.</p>
    <div class="hero-cta">
      <a href="{{ url('/products') }}" class="btn btn-white">Explore Products</a>
      <a href="{{ url('/contact') }}#quote" class="btn btn-ghost">Request a Quote</a>
    </div>
    <div class="trust">
      <span><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFBD59" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 5 5L20 7"/></svg>Authorized Merck-Sigma Aldrich dealer</span>
      <span><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#FFBD59" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m5 12 5 5L20 7"/></svg>Serving Zambia &amp; DRC</span>
    </div>
  </div>
</section>

<!-- CATEGORIES -->
<section class="card sec" id="categories" aria-labelledby="cat-h">
  <div class="sec-head">
    <span class="eyebrow">What we supply</span>
    <h2 class="sec-title" id="cat-h">Our Product Categories</h2>
    <p>Everything your laboratory needs, from one trusted supplier.</p>
  </div>
  <div class="grid cats">
    <a class="cat" href="{{ url('/products') }}#chemicals">
      <div class="ph"><img src="{{ asset('images/hero-lab.jpg') }}" alt="Pipette dispensing reagent into laboratory wells" width="700" height="500" loading="lazy"></div>
      <div class="tx"><h3>Laboratory Chemicals &amp; Reagents</h3><p>High-purity chemicals and reagents for analysis, synthesis and research.</p><span class="more">View catalogue &rarr;</span></div>
    </a>
    <a class="cat" href="{{ url('/products') }}#glassware">
      <div class="ph"><img src="{{ asset('images/glassware.jpg') }}" alt="Laboratory flasks, beakers and cylinders" width="700" height="466" loading="lazy"></div>
      <div class="tx"><h3>Laboratory Glassware</h3><p>Flasks, beakers, cylinders and more for precise lab work.</p><span class="more">View catalogue &rarr;</span></div>
    </a>
    <a class="cat" href="{{ url('/products') }}#consumables">
      <div class="ph"><img src="{{ asset('images/consumables.jpg') }}" alt="Syringe filters and syringes" width="700" height="466" loading="lazy"></div>
      <div class="tx"><h3>Laboratory Consumables</h3><p>Filters, syringes, filter papers and everyday lab essentials.</p><span class="more">View catalogue &rarr;</span></div>
    </a>
    <a class="cat" href="{{ url('/products') }}#equipment">
      <div class="ph"><img src="{{ asset('images/equipment.jpg') }}" alt="Water purification system and consumable box" width="700" height="393" loading="lazy"></div>
      <div class="tx"><h3>Laboratory Equipment</h3><p>Instruments and purification systems from leading manufacturers.</p><span class="more">View catalogue &rarr;</span></div>
    </a>
  </div>
</section>

<!-- APPLICATIONS & INDUSTRIES -->
<section class="card sec apps" aria-labelledby="app-h">
  <div class="sec-head">
    <span class="eyebrow">Where it counts</span>
    <h2 class="sec-title" id="app-h">Featured Applications &amp; Industries</h2>
    <p>From the analytical bench to the mine site, RDM supplies the laboratories that keep work accurate and safe.</p>
  </div>
  <div class="app-layout">
    <div>
      <h3 class="sub">Applications</h3>
      <ul class="app-grid">
      <li class="app-card">
        <span class="app-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2"/><path d="M8.5 2h7"/><path d="M7 16h10"/></svg></span>
        <h4>Analytical Chemistry</h4>
        <p>Precise testing and measurement</p>
      </li>
      <li class="app-card">
        <span class="app-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 2v2"/><path d="M5 2v2"/><path d="M5 3H4a2 2 0 0 0-2 2v4a6 6 0 0 0 12 0V5a2 2 0 0 0-2-2h-1"/><path d="M8 15a6 6 0 0 0 12 0v-3"/><circle cx="20" cy="10" r="2"/></svg></span>
        <h4>Clinical Diagnostics</h4>
        <p>Supplies for healthcare labs</p>
      </li>
      <li class="app-card">
        <span class="app-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M11 20A7 7 0 0 1 9.8 6.1C15.5 5 17 4.48 19 2c1 2 2 4.18 2 8 0 5.5-4.78 10-10 10Z"/><path d="M2 21c0-3 1.85-5.36 5.08-6C9.5 14.52 12 13 13 12"/></svg></span>
        <h4>Environmental Testing</h4>
        <p>Water, soil and air analysis</p>
      </li>
      <li class="app-card">
        <span class="app-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 2v7c0 1.1.9 2 2 2h4a2 2 0 0 0 2-2V2"/><path d="M7 2v20"/><path d="M21 15V2a5 5 0 0 0-5 5v6c0 1.1.9 2 2 2h3Zm0 0v7"/></svg></span>
        <h4>Food &amp; Beverage Testing</h4>
        <p>Quality and safety checks</p>
      </li>
      <li class="app-card">
        <span class="app-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 2v17.5c0 1.4-1.1 2.5-2.5 2.5s-2.5-1.1-2.5-2.5V2"/><path d="M8.5 2h7"/><path d="M14.5 16h-5"/></svg></span>
        <h4>Cell Culture &amp; Analysis</h4>
        <p>Reagents and consumables for cell work</p>
      </li>
      <li class="app-card">
        <span class="app-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m10.5 20.5 10-10a4.95 4.95 0 1 0-7-7l-10 10a4.95 4.95 0 1 0 7 7Z"/><path d="m8.5 8.5 7 7"/></svg></span>
        <h4>Pharmaceutical Manufacturing</h4>
        <p>Materials for drug production</p>
      </li>
      </ul>
    </div>
    <aside class="ind-panel" aria-labelledby="ind-h">
      <h3 id="ind-h">Industries served</h3>
      <ul class="ind-list">
        <li><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m8 3 4 8 5-5 5 15H2L8 3z"/></svg><span>Mining</span></li>
        <li><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M9 3h6v6h6v6h-6v6H9v-6H3V9h6z"/></svg><span>Healthcare</span></li>
        <li><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M22 10v6"/><path d="M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg><span>Research &amp; Academia</span></li>
        <li><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M2 20a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8l-7 5V8l-7 5V4a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2Z"/></svg><span>Manufacturing</span></li>
        <li><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22a7 7 0 0 0 7-7c0-2-1-3.9-3-5.5s-3.5-4-4-6.5c-.5 2.5-2 4.9-4 6.5C6 11.1 5 13 5 15a7 7 0 0 0 7 7z"/></svg><span>Water Utilities</span></li>
        <li><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 22h18"/><path d="M6 18v-7"/><path d="M10 18v-7"/><path d="M14 18v-7"/><path d="M18 18v-7"/><path d="M12 2 3 7h18z"/></svg><span>Government &amp; Contract Labs</span></li>
      </ul>
      <a href="{{ url('/products') }}#applications" class="btn btn-white">See all applications</a>
    </aside>
  </div>
</section>

<!-- BRANDS -->
<section class="card sec" aria-labelledby="br-h">
  <div class="sec-head">
    <span class="eyebrow">Brands &amp; partners</span>
    <h2 class="sec-title" id="br-h">World-Class Manufacturers</h2>
    <p>Authorized dealers for Merck-Sigma Aldrich, with access to a wide range of other leading brands.</p>
  </div>
  <div class="marquee" aria-label="Brands we supply">
    <ul class="marquee-track">
      <li><img src="{{ asset('images/brands/merck.webp') }}" alt="Merck" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/sigma-aldrich.webp') }}" alt="Sigma-Aldrich" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/millipore.webp') }}" alt="Millipore" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/milli-q.webp') }}" alt="Milli-Q" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/supelco.webp') }}" alt="Supelco" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/safc.webp') }}" alt="SAFC" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/bioreliance.webp') }}" alt="BioReliance" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/cytiva.webp') }}" alt="Cytiva" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/whatman.webp') }}" alt="Whatman" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/eppendorf.webp') }}" alt="Eppendorf" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/duran.webp') }}" alt="DURAN Group" height="52" loading="lazy"></li>
      <li><img src="{{ asset('images/brands/brand.webp') }}" alt="BRAND" height="52" loading="lazy"></li>
    </ul>
  </div>
  <div class="center"><a href="{{ url('/products') }}#brands" class="btn btn-ghost">View all brands</a></div>
</section>

<!-- WHY CHOOSE -->
<section class="sec card why" aria-labelledby="why-h">
  <div class="sec-head">
    <span class="eyebrow eyebrow-gold">Why choose RDM?</span>
    <h2 class="sec-title" id="why-h">Quality You Can Count On</h2>
    <p>Supplies that meet your specifications, delivered with service you can rely on.</p>
  </div>
  <div class="grid why-grid">
    <div class="why-item"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2 0 4.5-1.2 6.24-2.72a1.17 1.17 0 0 1 1.52 0C14.51 3.81 17 5 19 5a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg><h3>Product Quality</h3><p>Precision, reliability and innovation from globally recognized manufacturers.</p></div>
    <div class="why-item"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="12" r="9"/><path d="M14.5 9.2c-.4-.8-1.4-1.2-2.5-1.2-1.4 0-2.5.8-2.5 1.9 0 2.6 5 1.4 5 4 0 1.1-1.1 2-2.5 2-1.1 0-2.1-.4-2.5-1.2M12 6.5V8m0 8v1.5"/></svg><h3>Competitive Pricing</h3><p>Laboratory products that meet your needs at competitive prices.</p></div>
    <div class="why-item"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg><h3>Customer Service</h3><p>World-class service from a team that understands your requirements.</p></div>
    <div class="why-item"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2M8.5 2h7M7 16h10"/></svg><h3>Professional Advice</h3><p>Expert guidance and reliable support when you need it.</p></div>
  </div>
</section>

<!-- HISTORY -->
<section class="card sec" aria-labelledby="hist-h">
  <div class="hist">
    <img src="{{ asset('images/glassware.jpg') }}" alt="Colourful laboratory glassware" width="700" height="466" loading="lazy">
    <div class="txt">
      <span class="eyebrow">Our story</span>
      <h2 class="sec-title" id="hist-h">Over Three Decades of Laboratory Expertise</h2>
      <p>Founded in 1984, RDM Scientific Products Limited has built a strong reputation as a trusted provider of laboratory solutions across Zambia and Central Africa, including the Democratic Republic of Congo.</p>
      <div class="stats">
        <div class="stat"><b>1984</b><span>Year founded</span></div>
        <div class="stat"><b>2</b><span>Countries served</span></div>
        <div class="stat"><b>4</b><span>Product categories</span></div>
      </div>
      <div><a href="{{ url('/about') }}" class="btn btn-ghost">Read our story</a></div>
    </div>
  </div>
</section>

<!-- CTA -->
<section class="cta" aria-labelledby="cta-h">
  <div>
    <h2 id="cta-h">Need laboratory supplies? Talk to our team.</h2>
    <p>Tell us what you need and we will respond with availability and pricing.</p>
  </div>
  <div class="cta-actions">
    <a href="{{ url('/contact') }}#quote" class="btn btn-white">Request a Quote</a>
    <a href="tel:{{ config('rdm.phone_href') }}" class="btn btn-ghost">Call {{ config('rdm.phone') }}</a>
  </div>
</section>

@endsection
