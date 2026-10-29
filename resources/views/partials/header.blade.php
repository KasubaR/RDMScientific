<header class="top card wrap">
  <a href="{{ route('home') }}" class="brand" aria-label="RDM Scientific Products Limited home">
    <span class="hexes" aria-hidden="true"><span class="hex"><i>R</i></span><span class="hex"><i>D</i></span><span class="hex"><i>M</i></span></span>
    <span class="brand-txt"><b>SCIENTIFIC PRODUCTS</b><span>LIMITED</span></span>
  </a>
  <button class="menu-btn" aria-label="Open menu" aria-expanded="false" aria-controls="nav" id="menuBtn">
    <svg class="i-open" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
    <svg class="i-close" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
  </button>
  <nav class="main" id="nav" aria-label="Main">
    <a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
    <a href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>About Us</a>
    <a href="{{ route('products') }}" @if(request()->routeIs('products')) aria-current="page" @endif>Products &amp; Applications</a>
    <a href="{{ route('contact') }}" @if(request()->routeIs('contact')) aria-current="page" @endif>Contact Us</a>
  </nav>
  <a href="{{ route('contact') }}#quote" class="btn btn-red">Request a Quote</a>
</header>
