@php
    $clientLogos = [
        ['fqm-trident', 'FQM Trident Limited'], ['lubambe-copper-mine', 'Lubambe Copper Mine'], ['first-quantum-minerals', 'First Quantum Minerals'],
        ['client-s-logo', 'RDM client'], ['kisanfu-mining', 'Kisanfu Mining SAS'], ['somika', 'Somika'], ['sgs', 'SGS'], ['zabs', 'Zambia Bureau of Standards'],
        ['mining-engineering-services', 'Mining Engineering Services'], ['macha-research-trust', 'Macha Research Trust'], ['als', 'ALS'], ['unc-global', 'UNC Global'],
        ['zamra', 'Zambia Medicines Regulatory Authority'], ['zambian-breweries', 'Zambian Breweries'], ['coca-cola', 'Coca-Cola'], ['varun-beverages', 'Varun Beverages Limited'],
        ['zammsa', 'Zambia Medicines and Medical Supplies Agency'], ['national-breweries', 'National Breweries PLC'], ['tradekings-zambia', 'TradeKings Zambia'],
    ];
@endphp
<section class="card sec" id="clients" aria-labelledby="cl-h">
  <div class="sec-head">
    <h2 class="sec-title" id="cl-h">Our Clients</h2>
  </div>
  <ul class="grid logo-wall">
    @foreach ($clientLogos as [$logo, $logoName])
      <li><img src="{{ asset('images/clients/'.$logo.'.webp') }}" alt="{{ $logoName }}" loading="lazy"></li>
    @endforeach
  </ul>
</section>
