# RDM Scientific Products Limited

Marketing site for RDM, built on Laravel 13.

## Stack

| Layer | Choice | Why |
|---|---|---|
| Framework | Laravel 13, PHP 8.3+ | Routing, validation, mail and queues ready for the quote form |
| Views | Blade layouts and partials | Shared header, footer and SEO tags; no JS framework needed for a content site |
| Styling | Plain CSS (`resources/css/app.css`) with design tokens | Keeps the brand palette in one place |
| JS | Vanilla (`resources/js/app.js`) | Menu, back-to-top, scroll-reveal and brand marquee |
| Assets | Vite | Hashed, cached builds |
| Database | SQLite (default) | Enough for quote enquiries; switch to MySQL in `.env` for production |
| Tests | PHPUnit (`php artisan test`) | |

## Run locally

```
composer install
npm install && npm run build
php artisan serve
```

Contact details live in `config/rdm.php`.
# RDMScientific
