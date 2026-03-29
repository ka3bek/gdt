@php
    $seo = $seo ?? [
        'title' => 'Ремонт гидротрансформатора АКПП в Минске',
        'description' => 'Профессиональный ремонт гидротрансформаторов',
        'keywords' => 'ремонт гидротрансформатора, ремонт гидротрансформатора акпп, ремонт гидротрансформатора акпп цена, ремонт гидротрансформатора цена, ремонт гидротрансформатора минск, ремонт гидротрансформатора в минске',
        'og_image' => asset('img/og-image.jpg'),
    ];
@endphp

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- SEO мета-теги -->
<title>{{ $seo['title'] }}</title>
<meta name="description" content="{{ $seo['description'] }}">
<meta name="keywords" content="{{ $seo['keywords'] }}">
<meta name="robots" content="index, follow">

<!-- Open Graph -->
<meta property="og:title" content="{{ $seo['title'] }}">
<meta property="og:description" content="{{ $seo['description'] }}">
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ $seo['og_image'] }}">

<!-- Canonical -->
<link rel="canonical" href="{{ url()->current() }}">

<!-- Favicon -->
<link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />

<!-- Плавная прокрутка -->
<style> html { scroll-behavior: smooth; } </style>
