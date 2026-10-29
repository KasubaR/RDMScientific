<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>@yield('title', config('rdm.name'))</title>
<meta name="description" content="@yield('description')">
<meta property="og:title" content="@yield('og_title', config('rdm.name'))">
<meta property="og:description" content="@yield('og_description')">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:image" content="{{ asset('images/hero-lab.jpg') }}">
<meta name="theme-color" content="#E81C1C">
<link rel="canonical" href="{{ url()->current() }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<script type="application/ld+json">
{!! json_encode([
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    'name' => config('rdm.name'),
    'foundingDate' => '1984',
    'url' => config('app.url'),
    'email' => config('rdm.email'),
    'telephone' => config('rdm.phone_href'),
    'address' => [
        '@type' => 'PostalAddress',
        'streetAddress' => 'Plot No. 1 Chisokone Road, Off Great East Road',
        'addressLocality' => 'Lusaka',
        'addressCountry' => 'ZM',
    ],
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
</script>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@stack('head')
</head>
<body>
<div class="page">

@include('partials.header')

<main class="wrap stack">
@yield('content')
</main>

@include('partials.footer')

</div>

@include('partials.quick-actions')
</body>
</html>
