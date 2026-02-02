<?php

namespace App\Http\Controllers;

use App\Http\Requests\CallbackRequest;
use App\Models\Callback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    private function getCommonSeo(string $page, array $additionalKeywords = []): array
    {
        $currentYear = date('Y');
        $nextYear = $currentYear + 1;

        // Базовые ключевые слова с приоритетом по региону
        $baseKeywords = [
            'ремонт гидротрансформатора',
            'ремонт гидротрансформатора Минск',
            'ремонт ГДТ',
            'ремонт ГДТ Минск',
            'ремонт гидротрансформатора АКПП',
            'ремонт бублика АКПП',
            'гидротрансформатор ремонт цена',
            'мастерская по ремонту гидротрансформаторов',
        ];

        // Добавляем переданные дополнительные ключевые слова
        $allKeywords = array_merge($baseKeywords, $additionalKeywords);

        // Убираем дубликаты и формируем строку
        $keywordsString = implode(', ', array_unique($allKeywords));

        $base = [
            'og_image' => asset('img/og-image.jpg'),
            'keywords_base' => $keywordsString,
        ];

        $pages = [
            'welcome' => [
                'title' => "Ремонт гидротрансформатора АКПП в Минске — Цена {$currentYear}, гарантия 2 года | ЧТУП «Гидротрансформатор»",
                'description' => "✅ Профессиональный ремонт гидротрансформаторов (ГДТ) в Минске. 🔧 Полное восстановление АКПП, балансировка, замена фрикционов и муфт. 💰 Цены {$currentYear} года. 🏆 Гарантия 2 года. 📍 Минск, ул. Котовского 9а. 📞 +375 (44) 734-85-43",
                'keywords' => $base['keywords_base'] . ', гидротрансформатор цена Минск, ремонт бублика, ремонт АКПП Минск',
                'og_image' => asset('img/og-welcome.jpg'),
                'h1' => 'Ремонт гидротрансформаторов АКПП в Минске',
            ],
            'about' => [
                'title' => "О компании — Ремонт гидротрансформаторов в Минске с 2005 года | ЧТУП «Гидротрансформатор»",
                'description' => "🏆 Первая специализированная мастерская по ремонту ГДТ в Беларуси. 📊 20+ лет опыта, 15000+ отремонтированных гидротрансформаторов. 🛠 Оборудование TCRS (США). 💯 Гарантия 2 года. 📍 Минск.",
                'keywords' => $base['keywords_base'] . ', компания ремонт АКПП Минск, специалисты по гидротрансформаторам, история компании',
                'og_image' => asset('img/og-about.jpg'),
                'h1' => 'О нашей компании по ремонту гидротрансформаторов',
            ],
            'services' => [
                'title' => "Услуги по ремонту гидротрансформаторов АКПП в Минске — полный цикл работ | {$currentYear}",
                'description' => "🛠 Полный спектр услуг: ремонт ГДТ, балансировка, диагностика АКПП, замена обгонной муфты, ремонт гидроблоков. 📍 Минск. 💰 Прозрачные цены {$currentYear} года. ⏱ Срочный ремонт 1-2 дня.",
                'keywords' => $base['keywords_base'] . ', балансировка ГДТ Минск, замена муфты гидротрансформатора, ремонт гидроблока АКПП Минск',
                'og_image' => asset('img/og-services.jpg'),
                'h1' => 'Услуги по ремонту гидротрансформаторов',
            ],
            'prices' => [
                'title' => "Цены на ремонт гидротрансформаторов АКПП в Минске {$currentYear} — актуальный прайс",
                'description' => "💰 Актуальные цены {$currentYear} года на ремонт гидротрансформаторов в Минске. 📊 Диагностика от 120 руб, балансировка от 180 руб. 💎 Качественные комплектующие. 📞 Бесплатная консультация.",
                'keywords' => $base['keywords_base'] . ', прайс ремонт ГДТ Минск, стоимость балансировки гидротрансформатора, цена замены фрикционов АКПП',
                'og_image' => asset('img/og-prices.jpg'),
                'h1' => 'Цены на ремонт гидротрансформаторов',
            ],
            'contacts' => [
                'title' => "Контакты — ремонт гидротрансформаторов АКПП в Минске | ЧТУП «Гидротрансформатор»",
                'description' => "📍 Минск, ул. Котовского, 9а, ком. 12. 📞 Телефоны: +375 (44) 734-85-43, +375 (17) 273-76-20. 🕘 Пн–Пт 8:00–18:00. 🚗 Схема проезда. 📧 info@gidrotransformator.by",
                'keywords' => $base['keywords_base'] . ', адрес мастерской Минск, телефон ремонта ГДТ, как доехать на ремонт гидротрансформатора',
                'og_image' => asset('img/og-contacts.jpg'),
                'h1' => 'Контакты мастерской по ремонту гидротрансформаторов',
            ],
        ];

        return $pages[$page] ?? $pages['welcome'];
    }

    private function getCommonStructuredData(string $page): array
    {
        $currentYear = date('Y');

        $base = [
            '@context' => 'https://schema.org',
            '@type' => 'AutoRepair',
            'name' => 'ЧТУП «Гидротрансформатор»',
            'description' => 'Специализированный ремонт гидротрансформаторов АКПП в Минске',
            'telephone' => '+375447348543',
            'email' => 'info@gidrotransformator.by',
            'url' => url('/'),
            'logo' => asset('img/logo.png'),
            'image' => asset('img/og-image.jpg'),
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'ул. Котовского, д. 9а, ком. 12',
                'addressLocality' => 'Минск',
                'addressRegion' => 'Минская область',
                'postalCode' => '220021',
                'addressCountry' => 'BY',
            ],
            'geo' => [
                '@type' => 'GeoCoordinates',
                'latitude' => 53.9023,
                'longitude' => 27.5619,
            ],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '08:00',
                    'closes' => '18:00',
                ],
            ],
            'priceRange' => '$$',
            'aggregateRating' => [
                '@type' => 'AggregateRating',
                'ratingValue' => '4.9',
                'reviewCount' => '127',
                'bestRating' => '5',
                'worstRating' => '1',
            ],
        ];

        // Добавляем специфичные данные для разных страниц
        if ($page === 'about') {
            $base['foundingDate'] = '2005';
            $base['numberOfEmployees'] = '12';
            $base['knowsAbout'] = [
                'Ремонт гидротрансформаторов',
                'Балансировка ГДТ',
                'Диагностика АКПП',
                'Замена фрикционов гидротрансформатора',
            ];
        }

        if ($page === 'services') {
            $base['makesOffer'] = [
                '@type' => 'Offer',
                'itemOffered' => [
                    '@type' => 'Service',
                    'name' => 'Ремонт гидротрансформаторов АКПП',
                    'description' => 'Полный комплекс услуг по ремонту и восстановлению гидротрансформаторов',
                ],
            ];
        }

        return $base;
    }

    public function welcome()
    {
        $seo = $this->getCommonSeo('welcome');
        $structuredData = $this->getCommonStructuredData('welcome');

        // Добавляем BreadcrumbList для главной
        $structuredData['breadcrumb'] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Главная',
                    'item' => url('/'),
                ],
            ],
        ];

        // Статистика для главной страницы
        $stats = [
            ['value' => '20+', 'label' => 'лет опыта'],
            ['value' => '15000+', 'label' => 'отремонтированных ГДТ'],
            ['value' => '2 года', 'label' => 'гарантия'],
            ['value' => '1-2 дня', 'label' => 'средний срок ремонта'],
        ];

        return view('pages.welcome', compact('seo', 'structuredData', 'stats'));
    }

    public function about()
    {
        $seo = $this->getCommonSeo('about');
        $structuredData = $this->getCommonStructuredData('about');

        $companyInfo = [
            'years' => 20,
            'repaired_count' => 15000,
            'specialists' => 12,
            'equipment' => 'TCRS (США)',
            'guarantee' => '2 года',
            'founding_year' => 2005,
        ];

        // Breadcrumbs для страницы "О нас"
        $structuredData['breadcrumb'] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Главная',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'О компании',
                    'item' => url('/about'),
                ],
            ],
        ];

        return view('pages.about', compact('seo', 'companyInfo', 'structuredData'));
    }

    public function services()
    {
        $seo = $this->getCommonSeo('services');
        $structuredData = $this->getCommonStructuredData('services');

        $services = [
            [
                'id' => 1,
                'title' => 'Ремонт гидротрансформаторов АКПП',
                'description' => 'Полное восстановление гидротрансформатора: замена фрикционов, сальников, подшипников, муфт блокировки. Используем оригинальные и проверенные аналоговые комплектующие.',
                'price' => 'от 250 руб',
                'details' => ['Замена фрикционов', 'Замена сальников', 'Ремонт муфты блокировки', 'Замена подшипников'],
                'icon' => 'wrench',
                'color' => 'from-primary-700 to-primary-800',
                'button_class' => 'bg-accent-500 hover:bg-accent-600',
                'seo_title' => 'Ремонт гидротрансформатора АКПП в Минске',
            ],
            [
                'id' => 2,
                'title' => 'Балансировка ГДТ',
                'description' => 'Профессиональная балансировка гидротрансформатора на стенде TCRS (США). Устранение вибраций, шума и продление срока службы АКПП.',
                'price' => 'от 180 руб',
                'details' => ['Динамическая балансировка', 'Статическая балансировка', 'Контроль точности', 'Гарантия на работу'],
                'icon' => 'scale',
                'color' => 'from-secondary-500 to-secondary-600',
                'button_class' => 'bg-white !text-secondary-600 hover:bg-gray-100',
                'seo_title' => 'Балансировка гидротрансформатора в Минске',
            ],
            [
                'id' => 3,
                'title' => 'Диагностика гидротрансформатора',
                'description' => 'Комплексная диагностика ГДТ: проверка герметичности, износ деталей, давление масла, работа муфты блокировки и обгонной муфты.',
                'price' => 'от 120 руб',
                'details' => ['Визуальная диагностика', 'Проверка герметичности', 'Тест давления', 'Анализ износа'],
                'icon' => 'search',
                'color' => 'from-gray-800 to-gray-900',
                'button_class' => 'bg-accent-500 hover:bg-accent-600',
                'seo_title' => 'Диагностика гидротрансформатора АКПП',
            ],
            // ... остальные услуги с аналогичной структурой
        ];

        // Структурированные данные для услуг
        $structuredData['hasOfferCatalog'] = [
            '@type' => 'OfferCatalog',
            'name' => 'Услуги по ремонту гидротрансформаторов',
            'itemListElement' => array_map(function($service) {
                return [
                    '@type' => 'Offer',
                    'itemOffered' => [
                        '@type' => 'Service',
                        'name' => $service['title'],
                        'description' => $service['description'],
                        'serviceType' => 'Ремонт гидротрансформатора',
                    ],
                    'priceSpecification' => [
                        '@type' => 'PriceSpecification',
                        'price' => $service['price'],
                        'priceCurrency' => 'BYN',
                    ],
                    'areaServed' => [
                        '@type' => 'City',
                        'name' => 'Минск',
                    ],
                ];
            }, $services),
        ];

        // Breadcrumbs
        $structuredData['breadcrumb'] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Главная',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Услуги',
                    'item' => url('/services'),
                ],
            ],
        ];

        return view('pages.services', compact('seo', 'services', 'structuredData'));
    }

    public function prices()
    {
        $currentYear = date('Y');

        $seo = $this->getCommonSeo('prices', [
            "цена ремонта гидротрансформатора {$currentYear}",
            "стоимость ремонта ГДТ Минск",
            "прайс ремонт бублика АКПП",
        ]);

        $structuredData = $this->getCommonStructuredData('prices');

        $priceCategories = [
            [
                'category' => 'Диагностика',
                'services' => [
                    ['name' => 'Полная диагностика гидротрансформатора', 'price' => 'от 120 руб', 'description' => 'Комплексная проверка состояния ГДТ'],
                    ['name' => 'Тест на герметичность', 'price' => 'от 50 руб', 'description' => 'Проверка уплотнений и сальников'],
                    ['name' => 'Компьютерная диагностика АКПП', 'price' => 'от 80 руб', 'description' => 'Считывание ошибок и параметров работы'],
                ],
            ],
            [
                'category' => 'Ремонт ГДТ',
                'services' => [
                    ['name' => 'Ремонт гидротрансформатора (легковые авто)', 'price' => 'от 250 руб', 'description' => 'Для автомобилей B, C, D класса'],
                    ['name' => 'Ремонт ГДТ (внедорожники)', 'price' => 'от 350 руб', 'description' => 'Для кроссоверов и SUV'],
                    ['name' => 'Ремонт ГДТ (грузовые авто)', 'price' => 'от 550 руб', 'description' => 'Для микроавтобусов и легких грузовиков'],
                    ['name' => 'Замена фрикционов блокировки', 'price' => 'от 100 руб', 'description' => 'Стоимость работы без учета запчастей'],
                ],
            ],
            [
                'category' => 'Балансировка',
                'services' => [
                    ['name' => 'Балансировка ГДТ (легковые)', 'price' => 'от 180 руб', 'description' => 'Динамическая балансировка на стенде'],
                    ['name' => 'Балансировка ГДТ (внедорожники)', 'price' => 'от 220 руб', 'description' => 'Для тяжелых гидротрансформаторов'],
                    ['name' => 'Срочная балансировка', 'price' => 'от 250 руб', 'description' => 'Выполнение в течение 4 часов'],
                ],
            ],
        ];

        // Структурированные данные для прайса
        $structuredData['@type'] = 'PriceSpecification';
        $structuredData['name'] = "Прайс-лист на ремонт гидротрансформаторов {$currentYear}";
        $structuredData['price'] = '120';
        $structuredData['minPrice'] = '120';
        $structuredData['maxPrice'] = '750';
        $structuredData['priceCurrency'] = 'BYN';
        $structuredData['validFrom'] = "{$currentYear}-01-01";
        $structuredData['validThrough'] = "{$currentYear}-12-31";
        $structuredData['eligibleRegion'] = [
            '@type' => 'City',
            'name' => 'Минск',
        ];

        return view('pages.prices', compact('seo', 'priceCategories', 'structuredData'));
    }

    public function contacts()
    {
        $seo = $this->getCommonSeo('contacts', [
            'адрес ремонта гидротрансформаторов Минск',
            'телефон ремонт ГДТ',
            'как доехать на ремонт бублика',
        ]);

        $structuredData = $this->getCommonStructuredData('contacts');

        $contacts = [
            'address' => [
                'text' => 'ул. Котовского, д. 9а, ком. 12, Минск, 220021',
                'map_link' => 'https://yandex.by/maps/157/minsk/?ll=27.561900%2C53.902300&mode=search&oid=1037261225&ol=biz&z=17',
                'coordinates' => ['lat' => 53.9023, 'lng' => 27.5619],
            ],
            'phones' => [
                ['number' => '+375 (44) 734-85-43', 'type' => 'мобильный (основной)', 'icon' => 'phone'],
                ['number' => '+375 (17) 273-76-20', 'type' => 'городской', 'icon' => 'office'],
                ['number' => '+375 (29) 123-45-67', 'type' => 'Viber/WhatsApp', 'icon' => 'chat'],
            ],
            'email' => 'info@gidrotransformator.by',
            'work_hours' => [
                ['days' => 'Понедельник – Пятница', 'hours' => '08:00 – 18:00', 'note' => 'прием заявок'],
                ['days' => 'Суббота', 'hours' => '09:00 – 15:00', 'note' => 'по предварительной записи'],
                ['days' => 'Воскресенье', 'hours' => 'выходной', 'note' => 'прием заявок онлайн'],
            ],
            'social' => [
                'telegram' => ['url' => 'https://t.me/gidrotransformator', 'name' => 'Telegram'],
                'viber' => ['url' => 'viber://chat?number=%2B375447348543', 'name' => 'Viber'],
                'whatsapp' => ['url' => 'https://wa.me/375447348543', 'name' => 'WhatsApp'],
            ],
        ];

        // Дополняем структурированные данные
        $structuredData['@type'] = 'ContactPage';
        $structuredData['mainEntity'] = [
            '@type' => 'AutoRepair',
            'name' => 'ЧТУП «Гидротрансформатор»',
            'description' => 'Специализированный ремонт гидротрансформаторов АКПП в Минске',
            'telephone' => '+375447348543',
            'email' => $contacts['email'],
            'openingHoursSpecification' => [
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
                    'opens' => '08:00',
                    'closes' => '18:00',
                ],
                [
                    '@type' => 'OpeningHoursSpecification',
                    'dayOfWeek' => ['Saturday'],
                    'opens' => '09:00',
                    'closes' => '15:00',
                ],
            ],
        ];

        return view('pages.contacts', compact('seo', 'contacts', 'structuredData'));
    }

    // Метод для отдельной страницы "Ремонт гидротрансформатора Минск" (можно добавить)
    public function gdtRepairMinsk()
    {
        $seo = [
            'title' => 'Ремонт гидротрансформатора в Минске — Срочный ремонт ГДТ АКПП | Цены ' . date('Y'),
            'description' => '🔧 Срочный ремонт гидротрансформаторов в Минске. 🚗 Ремонт ГДТ для любых марок авто. 💰 Цены от 250 руб. ⏱ Срок 1-2 дня. 📍 ул. Котовского 9а. 📞 +375 (44) 734-85-43. Гарантия 2 года.',
            'keywords' => 'ремонт гидротрансформатора минск, ремонт гдт минск срочно, ремонт бублика акпп минск, цена ремонта гидротрансформатора, гидротрансформатор ремонт стоимость',
            'og_image' => asset('img/og-gdt-repair.jpg'),
            'h1' => 'Ремонт гидротрансформатора в Минске',
        ];

        $structuredData = $this->getCommonStructuredData('welcome');
        $structuredData['breadcrumb'] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Главная', 'item' => url('/')],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Ремонт ГДТ Минск', 'item' => url('/remont-gidrotransformatora-minsk')],
            ],
        ];

        return view('pages.gdt-repair-minsk', compact('seo', 'structuredData'));
    }

    public function callback(CallbackRequest $request)
    {
        Log::info('📥 Запрос на обратный звонок получен', $request->all());

        $page = $request->input('page', url()->previous());
        if (empty($page)) {
            $page = $request->header('referer') ?: 'Прямой запрос';
        }

        $callback = Callback::create([
            'name'     => $request->input('name'),
            'phone'    => $request->input('phone'),
            'page'     => $page,
            'service'  => $request->input('service'),
            'message'  => $request->input('message'),
            'status'   => 'new',
            'ip_address' => $request->ip(),
        ]);

        Log::info('✅ Заявка создана в БД', [
            'id' => $callback->id,
            'name' => $callback->name,
            'phone' => $callback->phone,
            'page' => $callback->page
        ]);

        $this->sendNotifications($callback);

        // Отправляем события в аналитику
        $this->sendAnalyticsEvents($callback, $request);

        return response()->json([
            'success' => true,
            'message' => 'Спасибо! Мы свяжемся с вами в ближайшее время.',
            'callback_id' => $callback->id,
        ]);
    }

    /**
     * Отправка событий в аналитические системы
     */
    private function sendAnalyticsEvents(Callback $callback, Request $request): void
    {
        try {
            // 1. Google Analytics 4 (через Measurement Protocol)
            $this->sendToGoogleAnalytics($callback, $request);

            // 2. Яндекс Метрика
            $this->sendToYandexMetrika($callback, $request);

            Log::info('📊 События отправлены в аналитику', ['callback_id' => $callback->id]);

        } catch (\Exception $e) {
            Log::error('❌ Ошибка отправки в аналитику', [
                'callback_id' => $callback->id,
                'error' => $e->getMessage()
            ]);
        }
    }

    /**
     * Отправка в Google Analytics 4
     */
    private function sendToGoogleAnalytics(Callback $callback, Request $request): void
    {
        $measurementId = config('services.google_analytics.measurement_id');
        $apiSecret = config('services.google_analytics.api_secret');

        if (!$measurementId || !$apiSecret) {
            return;
        }

        $clientId = $this->getClientId($request); // Получаем или генерируем client_id
        $userId = $this->getUserId($request); // Идентификатор пользователя, если есть

        $eventData = [
            'client_id' => $clientId,
            'events' => [
                [
                    'name' => 'callback_request',
                    'params' => [
                        'page_title' => $this->getPageTitle($callback->page),
                        'page_location' => $callback->page,
                        'service_type' => $callback->service,
                        'callback_id' => $callback->id,
                        'engagement_time_msec' => '100',
                        'session_id' => $this->getSessionId($request),
                        'user_agent' => $request->userAgent(),
                        'ip' => $callback->ip_address,
                        // Дополнительные параметры
                        'event_category' => 'Lead',
                        'event_label' => 'Callback Form',
                        'value' => 1, // Ценность события
                    ]
                ]
            ]
        ];

        // Добавляем user_id если есть
        if ($userId) {
            $eventData['user_id'] = $userId;
        }

        $url = "https://www.google-analytics.com/mp/collect?measurement_id={$measurementId}&api_secret={$apiSecret}";

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
            CURLOPT_POSTFIELDS => json_encode($eventData),
            CURLOPT_TIMEOUT => 5
        ]);

        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Отправка в Яндекс Метрику
     */
    private function sendToYandexMetrika(Callback $callback, Request $request): void
    {
        $counterId = config('services.yandex_metrika.counter_id');

        if (!$counterId) {
            return;
        }

        // Яндекс Метрика - JavaScript на фронтенде, но можно и серверно
        // Лучше использовать фронтенд, но для полноты покажу оба варианта

        // Вариант 1: Через фронтенд (рекомендуется)
        // Нужно добавить JavaScript код в ответ

        // Вариант 2: Серверный вызов (менее точный)
        $params = http_build_query([
            'wmode' => 3,
            'ut' => 'noindex',
            'cnt-class' => 1,
            'browser-info' => $request->userAgent(),
            'page-ref' => $callback->page,
            'site-info' => json_encode([
                'callback_id' => $callback->id,
                'service' => $callback->service
            ])
        ]);

        $url = "https://mc.yandex.ru/watch/{$counterId}?" . $params;

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 3,
            CURLOPT_HEADER => false
        ]);

        curl_exec($ch);
        curl_close($ch);
    }

    /**
     * Получение client_id для GA4
     */
    private function getClientId(Request $request): string
    {
        // Пытаемся получить из куки
        $clientId = $request->cookie('_ga_client_id');

        if (!$clientId) {
            // Генерируем новый
            $clientId = 'GA1.2.' . time() . '.' . rand(1000000000, 9999999999);
        }

        return $clientId;
    }

    /**
     * Получение user_id если пользователь авторизован
     */
    private function getUserId(Request $request): ?string
    {
        // Если у вас есть аутентификация
        // return $request->user() ? (string)$request->user()->id : null;

        return null;
    }

    /**
     * Получение ID сессии
     */
    private function getSessionId(Request $request): string
    {
        return $request->session()->getId();
    }

    /**
     * Получение заголовка страницы
     */
    private function getPageTitle(?string $url): string
    {
        if (!$url) {
            return 'Прямой запрос';
        }

        $parsed = parse_url($url);
        $host = $parsed['host'] ?? 'unknown';

        return $host . ($parsed['path'] ?? '');
    }

    /**
     * Отправка уведомлений
     */
    /**
     * Отправка уведомлений (только в базу и Telegram)
     */
    private function sendNotifications(Callback $callback): void
    {
        try {
            // Логируем создание заявки
            Log::info('✅ Заявка создана в БД', [
                'id' => $callback->id,
                'name' => $callback->name,
                'phone' => $callback->phone,
                'page' => $callback->page,
                'ip' => $callback->ip_address,
                'time' => now()->format('d.m.Y H:i:s')
            ]);

            // Отправляем уведомление в Telegram
            $this->sendTelegramNotification($callback);

        } catch (\Exception $e) {
            Log::error('❌ Ошибка при отправке уведомлений', [
                'callback_id' => $callback->id,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }

    /**
     * Отправка в Telegram с картинкой и простым текстом
     */

    private function sendTelegramNotification(Callback $callback): void
    {
        $botToken = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        // Логируем проверку настроек
        Log::info('🔧 Проверка настроек Telegram', [
            'bot_token_exists' => !empty($botToken),
            'chat_id_exists' => !empty($chatId),
            'callback_id' => $callback->id
        ]);

        if (!$botToken || !$chatId) {
            Log::error('❌ Не настроены параметры Telegram', [
                'bot_token' => $botToken ? 'есть' : 'отсутствует',
                'chat_id' => $chatId ? 'есть' : 'отсутствует'
            ]);
            return;
        }

        $phone = trim($callback->phone ?? '');

        $message = "Заявка #{$callback->id} на GDT\n"
            . "Имя: " . ($callback->name ?: 'Не указано') . "\n"
            . "Телефон: " . ($phone ?: 'Не указан') . "\n"
            . "IP: " . ($callback->ip_address ?: 'Неизвестно') . "\n"
            . "Время: " . $callback->created_at->format('d.m.Y H:i:s') . "\n";

        // Исправленная проверка для страницы
        if (!empty($callback->page) && $callback->page !== 'Прямой запрос') {
            $host = parse_url($callback->page, PHP_URL_HOST);
            $message .= "\nСтраница: " . ($host ?: $callback->page);
        } else {
            $message .= "\nСтраница: Прямой запрос";
        }

        if ($callback->service) {
            $message .= "\nУслуга: " . $callback->service;
        }

        if ($callback->message) {
            $message .= "\nСообщение: " . $callback->message;
        }

        try {
            // Логируем начало отправки
            Log::info('📤 Отправка в Telegram', [
                'callback_id' => $callback->id,
                'message_length' => strlen($message)
            ]);

            // Прямая отправка фото с текстом
            $url = "https://api.telegram.org/bot{$botToken}/sendPhoto";
            $imageUrl = "https://images.pexels.com/photos/16886249/pexels-photo-16886249.jpeg";

            $data = [
                'chat_id' => $chatId,
                'photo' => $imageUrl,
                'caption' => $message,
                'parse_mode' => 'HTML' // Добавьте это для форматирования
            ];

            $ch = curl_init($url);
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_POSTFIELDS => http_build_query($data),
                CURLOPT_HTTPHEADER => [
                    'Content-Type: application/x-www-form-urlencoded'
                ]
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);

            curl_close($ch);

            // Логируем ответ от Telegram
            Log::info('📨 Ответ Telegram', [
                'callback_id' => $callback->id,
                'http_code' => $httpCode,
                'response' => $response,
                'error' => $error ?: 'нет'
            ]);

            if ($error) {
                throw new \Exception("CURL Error: " . $error);
            }

        } catch (\Exception $e) {
            Log::error('❌ Telegram error', [
                'callback_id' => $callback->id,
                'error' => $e->getMessage()
            ]);

            // Резервный вариант - только текст
            try {
                Log::info('🔄 Попытка резервной отправки (текст)', [
                    'callback_id' => $callback->id
                ]);

                $url = "https://api.telegram.org/bot{$botToken}/sendMessage";
                $data = [
                    'chat_id' => $chatId,
                    'text' => $message,
                    'disable_web_page_preview' => true,
                    'parse_mode' => 'HTML'
                ];

                $ch = curl_init($url);
                curl_setopt_array($ch, [
                    CURLOPT_POST => true,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_TIMEOUT => 10,
                    CURLOPT_POSTFIELDS => http_build_query($data)
                ]);

                $response = curl_exec($ch);
                $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

                curl_close($ch);

                Log::info('📨 Ответ Telegram (резервный)', [
                    'callback_id' => $callback->id,
                    'http_code' => $httpCode,
                    'response' => $response
                ]);

            } catch (\Exception $e2) {
                Log::error('❌ Telegram fallback error', [
                    'callback_id' => $callback->id,
                    'error' => $e2->getMessage()
                ]);
            }
        }
    }

    /**
     * Страница с видео-процессом ремонта
     */
    public function howWeRepair()
    {
        $currentYear = date('Y');

        // Специфичные ключевые слова для этой страницы
        $additionalKeywords = [
            'процесс ремонта гидротрансформатора',
            'как ремонтируют ГДТ',
            'технология ремонта гидротрансформаторов',
            'видео ремонта гидротрансформатора',
            'ремонт бублика видео',
            'процесс восстановления ГДТ',
            'балансировка ГДТ видео',
            'ремонт ГДТ своими глазами',
            'станок для ремонта гидротрансформаторов',
            'оборудование для балансировки ГДТ',
            'ремонт гидротрансформатора по этапам',
            'посмотреть ремонт ГДТ',
        ];


        $structuredData = $this->getCommonStructuredData('services');

        // Добавляем специфичные структурированные данные для видео
        $structuredData['video'] = [
            '@type' => 'VideoObject',
            'name' => 'Процесс ремонта гидротрансформатора',
            'description' => 'Полный процесс ремонта и балансировки гидротрансформатора на профессиональном оборудовании',
            'thumbnailUrl' => asset('img/video-thumbnail.jpg'), // Создайте превью для видео
            'uploadDate' => date('Y-m-d'), // Дата публикации видео
            'duration' => 'PT5M', // Длительность видео в формате ISO 8601
            'contentUrl' => 'https://www.youtube.com/watch?v=ВАШ_ИДЕНТИФИКАТОР', // Ссылка на видео
            'embedUrl' => 'https://www.youtube.com/embed/ВАШ_ИДЕНТИФИКАТОР', // Ссылка для встраивания
            'publisher' => [
                '@type' => 'Organization',
                'name' => 'ЧТУП «Гидротрансформатор»',
                'logo' => [
                    '@type' => 'ImageObject',
                    'url' => asset('img/logo.png'),
                ],
            ],
        ];

        // Breadcrumbs для страницы
        $structuredData['breadcrumb'] = [
            '@type' => 'BreadcrumbList',
            'itemListElement' => [
                [
                    '@type' => 'ListItem',
                    'position' => 1,
                    'name' => 'Главная',
                    'item' => url('/'),
                ],
                [
                    '@type' => 'ListItem',
                    'position' => 2,
                    'name' => 'Как мы ремонтируем',
                    'item' => url('/kak-my-remontiruem-gidrotransformatory'),
                ],
            ],
        ];

        // Данные для отображения на странице
        $videoData = [
            'youtube_id' => 'ВАШ_ИДЕНТИФИКАТОР_ВИДЕО', // Или путь к локальному видео
            'title' => 'Процесс ремонта гидротрансформатора на нашем производстве',
            'duration' => '5:30',
            'upload_date' => '15.12.2024',
            'views' => '1247',
            'description' => 'Полный цикл работ: от диагностики до балансировки на профессиональном оборудовании',
        ];

        // Ключевые этапы, которые показаны в видео
        $processSteps = [
            [
                'number' => '01',
                'title' => 'Диагностика и разборка',
                'description' => 'Полная диагностика состояния, разборка гидротрансформатора, оценка износа деталей',
                'icon' => 'magnify',
                'color' => 'from-blue-500 to-blue-600',
            ],
            [
                'number' => '02',
                'title' => 'Замена изношенных деталей',
                'description' => 'Замена фрикционов, сальников, подшипников, проверка состояния обгонной муфты',
                'icon' => 'refresh',
                'color' => 'from-green-500 to-green-600',
            ],
            [
                'number' => '03',
                'title' => 'Профессиональная балансировка',
                'description' => 'Балансировка на стенде TCRS (США). Устранение вибраций до стандартов завода-изготовителя',
                'icon' => 'scale',
                'color' => 'from-purple-500 to-purple-600',
            ],
            [
                'number' => '04',
                'title' => 'Контроль качества и сборка',
                'description' => 'Многоступенчатый контроль, герметичность, окончательная сборка и проверка',
                'icon' => 'check',
                'color' => 'from-orange-500 to-orange-600',
            ],
        ];

        return view('pages.remont-gidrotransformatorov', compact(
            'structuredData',
            'videoData',
            'processSteps'
        ));
    }


}
