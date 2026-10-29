@extends('layouts.app')

@section('title', 'Products & Applications | RDM Scientific Products Limited')
@section('description', 'Laboratory chemicals, reagents, glassware, consumables and equipment from RDM Scientific Products Limited, for analytical chemistry, diagnostics, environmental testing, research and manufacturing.')
@section('og_title', 'Products & Applications | RDM Scientific Products Limited')
@section('og_description', 'Browse laboratory product categories, the applications they support and the industries RDM serves in Zambia and the DRC.')

@php
    $categoryNames = collect($catalog['categories'])->pluck('name', 'id');
    $applicationNames = collect($catalog['applications'])->pluck('name', 'id');
    $enquire = fn (array $query) => url('/contact').'?'.http_build_query($query).'#quote';
@endphp

@section('content')

<section class="page-hero" aria-labelledby="h1">
  <span class="crumb">Products &amp; Applications</span>
  <h1 id="h1">Laboratory supplies for every application</h1>
  <p>Chemicals, reagents, glassware, consumables and equipment, matched to the scientific work they support. Browse by category, application or industry, then send us an enquiry.</p>
  <div class="links-row">
    <a href="{{ url('/contact').'#quote' }}" class="btn btn-red">Request a Quote <x-icon name="arrow" :size="16" /></a>
    <a href="#applications" class="btn btn-ghost">Browse applications</a>
  </div>
</section>

<section class="card sec discover" aria-labelledby="disc-h" data-discover>
  <div class="sec-head">
    <span class="eyebrow">Find what you need</span>
    <h2 class="sec-title" id="disc-h">Search and filter</h2>
  </div>
  <form class="toolbar" role="search" data-discover-form>
    <div class="search-box">
      <x-icon name="search" :size="18" />
      <label for="discover-q" class="visually-hidden">Search categories, applications and industries</label>
      <input id="discover-q" type="search" placeholder="Search by product category, application or industry" autocomplete="off" data-discover-q>
    </div>
    <div class="chip-row" role="group" aria-label="Filter by product category">
      <button type="button" class="filter-chip" aria-pressed="true" data-cat="all">All</button>
      @foreach ($catalog['categories'] as $category)
        <button type="button" class="filter-chip" aria-pressed="false" data-cat="{{ $category['id'] }}">{{ $category['name'] }}</button>
      @endforeach
    </div>
    <p class="status" role="status" aria-live="polite" data-discover-status></p>
  </form>
</section>

<section class="card sec" id="categories" aria-labelledby="cat-h">
  <div class="sec-head">
    <span class="eyebrow">Product categories</span>
    <h2 class="sec-title" id="cat-h">What we supply</h2>
    <p>Each category is available on an enquiry basis. Tell us what you need and we will confirm availability and pricing.</p>
  </div>
  <div class="grid cat-grid" data-discover-grid>
    @foreach ($catalog['categories'] as $category)
      <article class="pcat" id="{{ $category['id'] }}" data-item data-cats="{{ $category['id'] }}" data-text="{{ strtolower($category['name'].' '.$category['summary'].' '.implode(' ', $category['types']).' '.$category['uses']) }}">
        <div class="ph"><img src="{{ asset('images/'.$category['image']) }}" alt="{{ $category['alt'] }}" loading="lazy"></div>
        <div class="tx">
          <h3>{{ $category['name'] }}</h3>
          <p>{{ $category['summary'] }}</p>
          <ul class="ticks">
            @foreach ($category['types'] as $type)
              <li>{{ $type }}</li>
            @endforeach
          </ul>
          <p class="uses"><b>Typical uses:</b> {{ $category['uses'] }}</p>
          <a href="{{ $enquire(['category' => $category['id']]) }}" class="btn btn-ghost">Enquire about {{ strtolower($category['name']) }}</a>
        </div>
      </article>
    @endforeach
  </div>
  <p class="empty" data-empty hidden>No categories match your search.</p>
</section>

<section class="card sec apps" id="applications" aria-labelledby="app-h">
  <div class="sec-head">
    <span class="eyebrow">Applications</span>
    <h2 class="sec-title" id="app-h">The science our products support</h2>
    <p>Each application lists the product categories that typically support it.</p>
  </div>
  <div class="grid acard-grid" data-discover-grid>
    @foreach ($catalog['applications'] as $application)
      <article class="acard" id="app-{{ $application['id'] }}" data-item data-cats="{{ implode(' ', $application['categories']) }}" data-text="{{ strtolower($application['name'].' '.$application['need'].' '.collect($application['categories'])->map(fn ($id) => $categoryNames[$id])->implode(' ')) }}">
        <span class="app-ic"><x-icon :name="$application['icon']" /></span>
        <h3>{{ $application['name'] }}</h3>
        <p>{{ $application['need'] }}</p>
        <ul class="tags" aria-label="Relevant product categories">
          @foreach ($application['categories'] as $categoryId)
            <li><a href="#{{ $categoryId }}">{{ $categoryNames[$categoryId] }}</a></li>
          @endforeach
        </ul>
        <a href="{{ $enquire(['application' => $application['id']]) }}" class="more">Enquire about this application <x-icon name="arrow" :size="16" /></a>
      </article>
    @endforeach
  </div>
  <p class="empty" data-empty hidden>No applications match your search.</p>
</section>

<section class="card sec" id="industries" aria-labelledby="ind-h">
  <div class="sec-head">
    <span class="eyebrow">Industries we serve</span>
    <h2 class="sec-title" id="ind-h">Experience across nine sectors</h2>
    <p>RDM understands the laboratory supply needs of the sectors it serves across Zambia and the DRC.</p>
  </div>
  <div class="grid icard-grid" data-discover-grid>
    @foreach ($catalog['industries'] as $industry)
      <article class="icard" id="industry-{{ $industry['id'] }}" data-item data-cats="{{ implode(' ', $industry['categories']) }}" data-text="{{ strtolower($industry['name'].' '.$industry['text'].' '.collect($industry['applications'])->map(fn ($id) => $applicationNames[$id])->implode(' ')) }}">
        <span class="app-ic"><x-icon :name="$industry['icon']" /></span>
        <h3>{{ $industry['name'] }}</h3>
        <p>{{ $industry['text'] }}</p>
        <ul class="tags" aria-label="Relevant applications">
          @foreach ($industry['applications'] as $applicationId)
            <li><a href="#app-{{ $applicationId }}">{{ $applicationNames[$applicationId] }}</a></li>
          @endforeach
        </ul>
        <a href="{{ $enquire(['industry' => $industry['id']]) }}" class="more">Enquire for this industry <x-icon name="arrow" :size="16" /></a>
      </article>
    @endforeach
  </div>
  <p class="empty" data-empty hidden>No industries match your search.</p>
</section>

<section class="card sec" id="brands" aria-labelledby="br-h">
  <div class="sec-head">
    <span class="eyebrow">Our brands</span>
    <h2 class="sec-title" id="br-h">Authorized Merck-Sigma Aldrich dealer</h2>
    <p>Our partnership ensures access to cutting-edge chemicals, reagents and supplies renowned for their precision, reliability and innovation, alongside products from other leading manufacturers.</p>
  </div>
  <ul class="logo-grid">
    @foreach ($catalog['brands'] as [$file, $label])
      <li><img src="{{ asset('images/brands/'.$file.'.webp') }}" alt="{{ $label }}" height="52" loading="lazy"></li>
    @endforeach
  </ul>
</section>

<section class="card sec" id="resources" aria-labelledby="res-h">
  <div class="sec-head">
    <span class="eyebrow">Resources</span>
    <h2 class="sec-title" id="res-h">Catalogues, datasheets and safety documents</h2>
    <p>Technical documents are supplied on request, so you always receive the current version from the manufacturer.</p>
  </div>
  <ul class="caps">
    @foreach ($catalog['resources'] as [$title, $text])
      <li class="cap">
        <span class="cap-ic"><x-icon name="file" /></span>
        <h3>{{ $title }}</h3>
        <p>{{ $text }}</p>
      </li>
    @endforeach
  </ul>
  <div class="center"><a href="{{ $enquire(['topic' => 'documents']) }}" class="btn btn-ghost">Request documents</a></div>
</section>

<section class="cta" aria-labelledby="cta-h">
  <div>
    <h2 id="cta-h">Not sure which product you need?</h2>
    <p>Tell us your application and our team will recommend the right products and send you a quote.</p>
  </div>
  <div class="cta-actions">
    <a href="{{ url('/contact').'#quote' }}" class="btn btn-white">Request a Quote</a>
    <a href="tel:{{ config('rdm.phone_href') }}" class="btn btn-ghost">Call {{ config('rdm.phone') }}</a>
  </div>
</section>

@endsection
