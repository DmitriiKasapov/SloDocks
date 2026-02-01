# Views Structure

```
views/
├── pages/                      # Complete pages
│   ├── home.blade.php         # Homepage with services list
│   ├── services/
│   │   └── show.blade.php     # Service detail page (public + paid content)
│   ├── payment/
│   │   ├── success.blade.php  # Payment success page
│   │   ├── cancel.blade.php   # Payment cancel page
│   │   └── mock-checkout.blade.php  # Mock payment page (dev only)
│   └── legal/
│       ├── terms.blade.php    # Terms of Service
│       └── privacy.blade.php  # Privacy Policy
│
├── layouts/                    # Layout templates
│   └── app.blade.php          # Main public layout
│
├── components/                 # Reusable components
│   ├── blocks/                # Large blocks (hero, cards, sections)
│   │   └── (to be created)
│   └── elements/              # Small elements (buttons, inputs, badges)
│       └── (to be created)
│
├── partials/                   # Partial templates
│   └── (to be created)        # header, footer, modals, etc.
│
└── emails/                     # Email templates
    └── access-granted.blade.php  # Access granted notification
```

## Usage

### Pages
```php
// In controller
return view('pages.home', compact('services'));
return view('pages.services.show', compact('service'));
```

### Components (future)
```blade
{{-- In blade template --}}
<x-blocks.hero :title="$title" />
<x-elements.button type="primary">Click me</x-elements.button>
```

### Partials (future)
```blade
@include('partials.header')
@include('partials.footer')
```
