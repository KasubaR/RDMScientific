@extends('layouts.app')

@section('title', 'About Us | RDM Scientific Products Limited')
@section('description', 'Founded in 1984, RDM Scientific Products Limited is a trusted laboratory supplier in Zambia and Central Africa, including the DRC, and an authorized Merck-Sigma Aldrich dealer.')
@section('og_title', 'About Us | RDM Scientific Products Limited')
@section('og_description', 'Over three decades supplying laboratory chemicals, reagents, glassware, consumables and equipment across Zambia and the DRC.')

@section('content')

<section class="page-hero" aria-labelledby="h1">
  <span class="crumb">About Us</span>
  <h1 id="h1">Trusted laboratory partner since 1984</h1>
  <p>RDM Scientific Products Limited supplies laboratory solutions across Zambia and Central Africa, including the Democratic Republic of Congo.</p>
</section>

<section class="card sec" aria-labelledby="intro-h">
  <div class="split">
    <div>
      <span class="eyebrow">Company introduction</span>
      <h2 class="sec-title" id="intro-h">Experience you can rely on</h2>
      <p>Founded in 1984, RDM Scientific Products Limited has built a strong reputation as a trusted provider of laboratory solutions across Zambia and Central Africa, including the Democratic Republic of Congo (DRC).</p>
      <p>With over three decades of experience, RDM has grown into the region's leading supplier of laboratory products, serving a wide array of industries, including mining, manufacturing, healthcare and research. We provide laboratory products and equipment through our supplier relationships, backed by world-class customer service and a commitment to supporting scientific progress and industrial development.</p>
      <div class="links-row">
        <a href="{{ route('products') }}" class="btn btn-red">Our Products <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M12 5l7 7-7 7"/></svg></a>
        <a href="{{ route('contact') }}" class="btn btn-ghost">Contact Us</a>
      </div>
    </div>
    <ul class="facts">
      <li><b>1984</b><span>Year founded</span></li>
      <li><b>Zambia &amp; DRC</b><span>Service coverage</span></li>
      <li><b>4 sectors</b><span>Mining, manufacturing, healthcare and research</span></li>
    </ul>
  </div>
</section>

<section class="card sec" id="history" aria-labelledby="hist-h">
  <div class="sec-head">
    <span class="eyebrow">Company history</span>
    <h2 class="sec-title" id="hist-h">From a 1984 start to a regional leader</h2>
  </div>
  <div class="split">
    <figure class="figure">
      <img src="{{ asset('images/history-1989.jpg') }}" alt="Historical photograph from the 1989 State House exhibition where the RDM founder demonstrated the Rotavapor" width="869" height="1100" loading="lazy">
      <figcaption>1989: the late Mr. R. M. Namala demonstrates the Rotavapor at a State House exhibition.</figcaption>
    </figure>
    <div>
      <p>In 1989, RDM Scientific's founder, the late Mr. R. M. Namala, demonstrated the operation of the Rotavapor to Dr. Kenneth Kaunda, then President of Zambia, at a State House exhibition.</p>
      <ol class="timeline">
        <li><b>1984</b><span>RDM Scientific Products Limited is founded.</span></li>
        <li><b>1989</b><span>The founder demonstrates the Rotavapor to Dr. Kenneth Kaunda at a State House exhibition.</span></li>
        <li><b>Today</b><span>Over three decades of experience as an authorized Merck-Sigma Aldrich dealer serving Zambia and the DRC.</span></li>
      </ol>
    </div>
  </div>
</section>

<section class="card sec" aria-labelledby="cap-h">
  <div class="sec-head">
    <span class="eyebrow">Business capabilities</span>
    <h2 class="sec-title" id="cap-h">What we do</h2>
  </div>
  <ul class="caps">
    <li class="cap"><span class="cap-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 7h13v10H3z"/><path d="M16 10h3l2 3v4h-5"/><circle cx="7" cy="18" r="2"/><circle cx="17" cy="18" r="2"/></svg></span><h3>Sourcing &amp; distribution</h3><p>We source laboratory products through our supplier relationships and distribute them to customers across Zambia and the DRC.</p></li>
    <li class="cap"><span class="cap-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M10 2v7.527a2 2 0 0 1-.211.896L4.72 20.55a1 1 0 0 0 .9 1.45h12.76a1 1 0 0 0 .9-1.45l-5.069-10.127A2 2 0 0 1 14 9.527V2"/><path d="M8.5 2h7"/><path d="M7 16h10"/></svg></span><h3>Chemicals, reagents, supplies &amp; equipment</h3><p>One supplier for laboratory chemicals, reagents, glassware, consumables and equipment.</p></li>
    <li class="cap"><span class="cap-ic"><svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.9" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg></span><h3>Customer support &amp; product guidance</h3><p>Expert advice and reliable support, so clients choose the right products for their work.</p></li>
  </ul>
</section>

<section class="card sec" aria-labelledby="mv-h">
  <div class="sec-head">
    <span class="eyebrow">Mission &amp; vision</span>
    <h2 class="sec-title" id="mv-h">What drives us</h2>
  </div>
  <div class="vm">
    <div>
      <h3>MISSION</h3>
      <p>Our mission is to stock and distribute laboratory products that meet specific customer requirements at competitive prices, coupled with world-class customer service. We strive to provide solutions that support the scientific community and contribute to the growth and sustainability of industries that rely on laboratory products.</p>
    </div>
    <div>
      <h3>VISION</h3>
      <p>To remain the leading supplier of high-quality laboratory supplies in Zambia and beyond, resolutely determined to uphold a position of sustainable technology and market leadership. We are committed to pushing the boundaries of innovation while ensuring that our solutions contribute to long-term success for our clients and partners.</p>
    </div>
  </div>
</section>

<section class="card sec" aria-labelledby="cv-h">
  <div class="sec-head">
    <span class="eyebrow">Core values</span>
    <h2 class="sec-title" id="cv-h">How we work</h2>
    <p>Instrumental to RDM's mission success, these values define our approach to stakeholder relations and business operations.</p>
  </div>
  <ul class="values">
    <li><b>Integrity</b><span>We conduct our business with the highest ethical standards, ensuring honesty and transparency in all interactions.</span></li>
    <li><b>Responsibility</b><span>We are accountable for our actions and dedicated to delivering on our commitments.</span></li>
    <li><b>Commitment</b><span>Our team is fully committed to providing our customers with top-tier products and services.</span></li>
    <li><b>Professionalism</b><span>We maintain a high level of professionalism, ensuring that our clients receive expert advice and reliable support.</span></li>
    <li><b>Sensitivity</b><span>We understand the specific needs of our customers and strive to address them with care and attention.</span></li>
    <li><b>Innovation</b><span>We embrace innovation to offer cutting-edge solutions that help our clients stay ahead in their respective fields.</span></li>
  </ul>
</section>

<section class="card sec" id="brands" aria-labelledby="br-h">
  <div class="sec-head">
    <span class="eyebrow">Our brands</span>
    <h2 class="sec-title" id="br-h">Partnerships with leading manufacturers</h2>
    <p>As authorized dealers for Merck-Sigma Aldrich, we offer an extensive range of high-quality life science products and laboratory equipment from one of the world's leading manufacturers. This partnership gives our customers access to cutting-edge chemicals, reagents and supplies renowned for their precision, reliability and innovation.</p>
  </div>
  <ul class="logo-grid">
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
  <div class="center"><a href="{{ route('products') }}#brands" class="btn btn-ghost">See brands by product</a></div>
</section>

<section class="card sec commit" aria-labelledby="cm-h">
  <div class="sec-head">
    <span class="eyebrow">Our commitment</span>
    <h2 class="sec-title" id="cm-h">Customers first, science always</h2>
    <p>We are dedicated to providing lasting and sustainable solutions, backed by world-class customer service and a commitment to supporting scientific progress and industrial development.</p>
  </div>
</section>

<section class="cta" aria-labelledby="cta-h">
  <div>
    <h2 id="cta-h">Need laboratory supplies? Talk to our team.</h2>
    <p>Tell us what you need and we will respond with availability and pricing.</p>
  </div>
  <div class="cta-actions">
    <a href="{{ route('contact') }}#quote" class="btn btn-white">Request a Quote</a>
    <a href="tel:{{ config('rdm.phone_href') }}" class="btn btn-ghost">Call {{ config('rdm.phone') }}</a>
  </div>
</section>

@endsection
