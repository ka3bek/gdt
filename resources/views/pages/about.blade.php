@extends('layouts.app')

@section('content')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">

    <!-- Hero Section -->
    <section class="hero-bg text-white pt-32 pb-24 md:pt-40 md:pb-32 relative overflow-hidden">
        <!-- Фоновое изображение -->
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('img/XXXL.webp') }}" alt="Фон ремонта гидротрансформаторов" class="w-full h-full object-cover object-center">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-black leading-tight mb-6 md:mb-8 hyphenate">
                    О компании
                </h1>

                <div class="mb-8 md:mb-12">
                    <p class="text-lg md:text-xl lg:text-2xl opacity-90 mb-2">ЧТУП «Гидротрансформатор»</p>
                    <p class="text-xl md:text-2xl lg:text-3xl font-bold text-accent-400">20 лет опыта в ремонте ГДТ</p>
                </div>

                <p class="text-base md:text-lg lg:text-xl mb-10 md:mb-12 opacity-90 max-w-4xl mx-auto">
                    Первая специализированная компания в Беларуси • Более 15 000 восстановленных ГДТ • Оборудование TCRS США
                </p>
                <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center items-center">
                    <a href="tel:+375447348543" class="bg-secondary-500 hover:bg-secondary-600 text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl transform hover:scale-105 transition duration-300 flex items-center">
                        <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Позвонить сейчас
                    </a>
                    <button onclick="openCallback()" class="bg-white/20 glass text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl hover:bg-white/30 transition">
                        Заказать консультацию
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent pointer-events-none"></div>
    </section>

    <!-- О компании -->
    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4 hyphenate">
                    ЧТУП "Гидротрансформатор" - лидер в ремонте ГДТ
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>

            <!-- Статистика в стиле главной -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8 mb-16 md:mb-20">
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 w-20 h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 rounded-full mx-auto mb-4 md:mb-6 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition">
                        <span class="text-3xl md:text-4xl lg:text-5xl font-black text-white">{{ $companyInfo['years'] }}</span>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-2">Лет опыта</h3>
                    <p class="text-gray-600 text-sm md:text-base">Пионеры ремонта гидротрансформаторов</p>
                </div>

                <div class="text-center group">
                    <div class="bg-gradient-to-br from-secondary-500 to-secondary-600 w-20 h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 rounded-full mx-auto mb-4 md:mb-6 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition">
                        <span class="text-3xl md:text-4xl lg:text-5xl font-black text-white">{{ number_format($companyInfo['repaired_count'] / 1000, 1) }}K</span>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-2">Восстановленных ГДТ</h3>
                    <p class="text-gray-600 text-sm md:text-base">Более {{ number_format($companyInfo['repaired_count'], 0, ',', ' ') }} единиц</p>
                </div>

                <div class="text-center group">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 w-20 h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 rounded-full mx-auto mb-4 md:mb-6 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition">
                        <span class="text-3xl md:text-4xl lg:text-5xl font-black text-white">{{ $companyInfo['specialists'] }}+</span>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-2">Специалистов</h3>
                    <p class="text-gray-600 text-sm md:text-base">Квалифицированные мастера</p>
                </div>

                <div class="text-center group">
                    <div class="bg-gradient-to-br from-secondary-500 to-secondary-600 w-20 h-20 md:w-24 md:h-24 lg:w-28 lg:h-28 rounded-full mx-auto mb-4 md:mb-6 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition">
                        <svg class="w-10 h-10 md:w-12 md:h-12 lg:w-14 lg:h-14 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-2">{{ $companyInfo['guarantee'] }}</h3>
                    <p class="text-gray-600 text-sm md:text-base">На все виды работ</p>
                </div>
            </div>

            <!-- Основной контент -->
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg p-6 md:p-8 lg:p-10 mb-8">
                    <p class="text-lg md:text-xl text-gray-700 mb-6 md:mb-8 leading-relaxed">
                        Специализируемся на <strong class="text-primary-700">ремонте гидротрансформаторов АКПП</strong> для легковых автомобилей с 2005 года.
                        Мы — первая компания в Беларуси, которая фокусируется исключительно на восстановлении ГДТ.
                    </p>

                    <div class="mb-8">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4">Наши ключевые преимущества:</h3>
                        <ul class="space-y-3">
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-secondary-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-gray-700">Профессиональное оборудование TCRS (США) для точной диагностики и балансировки</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-secondary-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-gray-700">Оригинальные запчасти от Sonnax, Raybestos, Alto, Transtec</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-secondary-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-gray-700">Гарантия до 2 лет на все виды работ</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-6 h-6 text-secondary-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-gray-700">Опыт более 20 лет в восстановлении гидротрансформаторов</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Процесс работы -->
                <div class="mb-12">
                    <h3 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 text-center">Как мы работаем?</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4 md:gap-6">
                        @foreach([
                            ['num' => '1', 'title' => 'Диагностика', 'desc' => 'неисправностей'],
                            ['num' => '2', 'title' => 'Разборка', 'desc' => 'и дефектовка'],
                            ['num' => '3', 'title' => 'Замена', 'desc' => 'компонентов'],
                            ['num' => '4', 'title' => 'Балансировка', 'desc' => 'на TCRS'],
                            ['num' => '5', 'title' => 'Контроль', 'desc' => 'качества'],
                        ] as $step)
                            <div class="text-center group">
                                <div class="bg-gradient-to-br from-primary-700 to-primary-800 text-white w-16 h-16 md:w-20 md:h-20 rounded-full mx-auto mb-3 flex items-center justify-center shadow-lg group-hover:scale-110 transition">
                                    <span class="text-2xl md:text-3xl font-bold">{{ $step['num'] }}</span>
                                </div>
                                <h4 class="font-bold text-gray-900">{{ $step['title'] }}</h4>
                                <p class="text-sm text-gray-600">{{ $step['desc'] }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Оборудование -->
                <div class="bg-gradient-to-br from-primary-700 to-primary-800 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl">
                    <h3 class="text-2xl md:text-3xl font-bold mb-4">Наше оборудование: {{ $companyInfo['equipment'] }}</h3>
                    <p class="text-lg opacity-90 mb-6">Профессиональное стендовое оборудование TCRS производства США позволяет:</p>
                    <ul class="space-y-3 mb-6">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-accent-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Точно диагностировать неисправности гидротрансформатора</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-accent-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Выполнять прецизионную балансировку с точностью до 0.1 г</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-accent-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Тестировать ГДТ под нагрузкой, имитируя реальные условия</span>
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-accent-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span>Гарантировать качество восстановления на уровне нового изделия</span>
                        </li>
                    </ul>
                    <p class="italic opacity-90">Мы участвуем в международных форумах по ремонту АКПП и постоянно совершенствуем технологии восстановления гидротрансформаторов. Работаем с клиентами из Беларуси, России и Литвы.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Секция сертификатов -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">

            <!-- Заголовок -->
            <div class="text-center mb-14">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-4">
                    Наши сертификаты и лицензии
                </h2>
                <p class="text-lg text-gray-500 max-w-2xl mx-auto">
                    Подтверждение качества и допуска к профессиональному ремонту
                </p>
                <div class="w-24 h-1 bg-secondary-500 mx-auto rounded-full mt-5"></div>
            </div>

            <!-- Сетка -->
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 md:gap-8">
                <!-- Сертификат 1 -->
                <a
                    data-fancybox="gallery"
                    href="/img/01_sertificat.jpg"
                    data-caption="Сертификат соответствия стандартам качества"
                    class="group block focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary-500 rounded-2xl"
                >
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 transition-all duration-300
                            hover:shadow-xl hover:-translate-y-1">
                        <img
                            src="/img/01_sertificat.jpg"
                            alt="Сертификат соответствия стандартам качества"
                            loading="lazy"
                            class="w-full h-full object-contain p-4 transition-transform duration-500 group-hover:scale-105"
                        >
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-black/40  opacity-0
                                group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="flex flex-col items-center text-white text-sm font-medium">
                                <svg class="w-8 h-8 mb-2 opacity-90" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10l4.553 2.276A2 2 0 0120 14.118V19a2 2 0 01-2 2h-1M9 14l-4.553-2.276A2 2 0 014 9.882V5a2 2 0 012-2h1m8 11V5m0 9H9"/>
                                </svg>
                                Увеличить
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Сертификат 2 -->
                <a
                    data-fancybox="gallery"
                    href="/img/02_sertificat.jpg"
                    data-caption="Лицензия на ремонт гидротрансформаторов"
                    class="group block focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary-500 rounded-2xl"
                >
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 transition-all duration-300
                            hover:shadow-xl hover:-translate-y-1">
                        <img
                            src="/img/02_sertificat.jpg"
                            alt="Лицензия на ремонт гидротрансформаторов"
                            loading="lazy"
                            class="w-full h-full object-contain p-4 transition-transform duration-500 group-hover:scale-105"
                        >
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-black/40  opacity-0
                                group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="flex flex-col items-center text-white text-sm font-medium">
                                <svg class="w-8 h-8 mb-2 opacity-90" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10l4.553 2.276A2 2 0 0120 14.118V19a2 2 0 01-2 2h-1M9 14l-4.553-2.276A2 2 0 014 9.882V5a2 2 0 012-2h1m8 11V5m0 9H9"/>
                                </svg>
                                Увеличить
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Сертификат 3 -->
                <a
                    data-fancybox="gallery"
                    href="/img/03_sertificat.jpg"
                    data-caption="Сертификат специалиста по АКПП"
                    class="group block focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary-500 rounded-2xl"
                >
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 transition-all duration-300
                            hover:shadow-xl hover:-translate-y-1">
                        <img
                            src="/img/03_sertificat.jpg"
                            alt="Сертификат специалиста по АКПП"
                            loading="lazy"
                            class="w-full h-full object-contain p-4 transition-transform duration-500 group-hover:scale-105"
                        >
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-black/40  opacity-0
                                group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="flex flex-col items-center text-white text-sm font-medium">
                                <svg class="w-8 h-8 mb-2 opacity-90" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10l4.553 2.276A2 2 0 0120 14.118V19a2 2 0 01-2 2h-1M9 14l-4.553-2.276A2 2 0 014 9.882V5a2 2 0 012-2h1m8 11V5m0 9H9"/>
                                </svg>
                                Увеличить
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Сертификат 4 -->
                <a
                    data-fancybox="gallery"
                    href="/img/04_sertificat.jpg"
                    data-caption="Допуск к оборудованию TCRS"
                    class="group block focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary-500 rounded-2xl"
                >
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 transition-all duration-300
                            hover:shadow-xl hover:-translate-y-1">
                        <img
                            src="/img/04_sertificat.jpg"
                            alt="Допуск к оборудованию TCRS"
                            loading="lazy"
                            class="w-full h-full object-contain p-4 transition-transform duration-500 group-hover:scale-105"
                        >
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-black/40  opacity-0
                                group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="flex flex-col items-center text-white text-sm font-medium">
                                <svg class="w-8 h-8 mb-2 opacity-90" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10l4.553 2.276A2 2 0 0120 14.118V19a2 2 0 01-2 2h-1M9 14l-4.553-2.276A2 2 0 014 9.882V5a2 2 0 012-2h1m8 11V5m0 9H9"/>
                                </svg>
                                Увеличить
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Сертификат 5 -->
                <a
                    data-fancybox="gallery"
                    href="/img/05_sertificat.jpg"
                    data-caption="Сертификат поставщика запчастей"
                    class="group block focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary-500 rounded-2xl"
                >
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 transition-all duration-300
                            hover:shadow-xl hover:-translate-y-1">
                        <img
                            src="/img/05_sertificat.jpg"
                            alt="Сертификат поставщика запчастей"
                            loading="lazy"
                            class="w-full h-full object-contain p-4 transition-transform duration-500 group-hover:scale-105"
                        >
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-black/40  opacity-0
                                group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="flex flex-col items-center text-white text-sm font-medium">
                                <svg class="w-8 h-8 mb-2 opacity-90" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10l4.553 2.276A2 2 0 0120 14.118V19a2 2 0 01-2 2h-1M9 14l-4.553-2.276A2 2 0 014 9.882V5a2 2 0 012-2h1m8 11V5m0 9H9"/>
                                </svg>
                                Увеличить
                            </div>
                        </div>
                    </div>
                </a>

                <!-- Сертификат 6 -->
                <a
                    data-fancybox="gallery"
                    href="/img/06_sertificat.jpg"
                    data-caption="Лицензия международного образца"
                    class="group block focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary-500 rounded-2xl"
                >
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 transition-all duration-300
                            hover:shadow-xl hover:-translate-y-1">
                        <img
                            src="/img/06_sertificat.jpg"
                            alt="Лицензия международного образца"
                            loading="lazy"
                            class="w-full h-full object-contain p-4 transition-transform duration-500 group-hover:scale-105"
                        >
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-black/40  opacity-0
                                group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="flex flex-col items-center text-white text-sm font-medium">
                                <svg class="w-8 h-8 mb-2 opacity-90" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10l4.553 2.276A2 2 0 0120 14.118V19a2 2 0 01-2 2h-1M9 14l-4.553-2.276A2 2 0 014 9.882V5a2 2 0 012-2h1m8 11V5m0 9H9"/>
                                </svg>
                                Увеличить
                            </div>
                        </div>
                    </div>

                </a>

                <!-- Сертификат 7 -->
                <a
                    data-fancybox="gallery"
                    href="/img/07_sertificat.jpg"
                    data-caption="Сертификат качества услуг"
                    class="group block focus:outline-none focus-visible:ring-2 focus-visible:ring-secondary-500 rounded-2xl"
                >
                    <div class="relative aspect-[3/4] overflow-hidden rounded-2xl border border-gray-200 bg-gray-50 transition-all duration-300
                            hover:shadow-xl hover:-translate-y-1">
                        <img
                            src="/img/07_sertificat.jpg"
                            alt="Сертификат качества услуг"
                            loading="lazy"
                            class="w-full h-full object-contain p-4 transition-transform duration-500 group-hover:scale-105"
                        >
                        <!-- Hover overlay -->
                        <div class="absolute inset-0 bg-black/40  opacity-0
                                group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                            <div class="flex flex-col items-center text-white text-sm font-medium">
                                <svg class="w-8 h-8 mb-2 opacity-90" fill="none" stroke="currentColor" stroke-width="2"
                                     viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                          d="M15 10l4.553 2.276A2 2 0 0120 14.118V19a2 2 0 01-2 2h-1M9 14l-4.553-2.276A2 2 0 014 9.882V5a2 2 0 012-2h1m8 11V5m0 9H9"/>
                                </svg>
                                Увеличить
                            </div>
                        </div>
                    </div>

                </a>

            </div>
        </div>
    </section>

    <!-- Подключаем Fancybox JS -->
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script>
        // Инициализация Fancybox
        Fancybox.bind('[data-fancybox="gallery"]', {
            // Настройки Fancybox
            Thumbs: {
                type: 'modern',
            },
            Toolbar: {
                display: {
                    left: [],
                    middle: [],
                    right: ['close'],
                },
            },
            Image: {
                zoom: true,
                click: 'close',
                wheel: 'slide',
            },
            // Для удобства на мобильных
            on: {
                init: (fancybox) => {
                    // Адаптация под мобильные устройства
                    if (window.innerWidth < 768) {
                        fancybox.setOptions({
                            Image: {
                                zoom: false,
                            }
                        });
                    }
                }
            }
        });
    </script>



    @include('partials.partners')
    @include('partials.cta')

@endsection

    <script type="application/ld+json">
        @json($structuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
    </script>
