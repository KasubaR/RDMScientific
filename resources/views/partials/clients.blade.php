@php
    $clientLogos = [
        ['fqm-trident.svg', 'FQM Trident Limited'], ['lubambe-copper-mine.webp', 'Lubambe Copper Mine'], ['first-quantum-minerals.svg', 'First Quantum Minerals'],
        ['client-s-logo.webp', 'RDM client'], ['kisanfu-mining.webp', 'Kisanfu Mining SAS'], ['somika.webp', 'Somika'], ['sgs.webp', 'SGS'], ['zabs.webp', 'Zambia Bureau of Standards'],
        ['mining-engineering-services.webp', 'Mining Engineering Services'], ['macha-research-trust.webp', 'Macha Research Trust'], ['als.webp', 'ALS'], ['unc-global.webp', 'UNC Global'],
        ['zamra.webp', 'Zambia Medicines Regulatory Authority'], ['zambian-breweries.svg', 'Zambian Breweries'], ['coca-cola.webp', 'Coca-Cola'], ['varun-beverages.webp', 'Varun Beverages Limited'],
        ['zammsa.svg', 'Zambia Medicines and Medical Supplies Agency'], ['national-breweries.webp', 'National Breweries PLC'], ['tradekings-zambia.webp', 'TradeKings Zambia'],
    ];
@endphp
<section class="card sec" id="clients" aria-labelledby="cl-h">
  <div class="sec-head">
    <h2 class="sec-title" id="cl-h">Our Clients</h2>
  </div>
  <div class="marquee client-marquee" aria-label="Our clients">
    <ul class="marquee-track">
      @foreach ($clientLogos as [$logo, $logoName])
        <li><img src="{{ asset('images/clients/'.$logo) }}" alt="{{ $logoName }}"></li>
      @endforeach
    </ul>
  </div>
</section>
