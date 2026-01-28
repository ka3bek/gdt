@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <section class="hero-bg text-white pt-32 pb-24 md:pt-40 md:pb-32 relative overflow-hidden">
        <!-- Фоновое изображение с альтернативным текстом -->
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('img/XXXL.webp') }}" alt="" class="w-full h-full object-cover object-center">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <!-- SEO-оптимизированный заголовок -->
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-black leading-tight mb-6 md:mb-8 hyphenate">
                    Ремонт гидротрансформатора<br class="hidden sm:block"> АКПП в Минске
                </h1>

                <div class="mb-8 md:mb-12">
                    <p class="text-lg md:text-xl lg:text-2xl opacity-90 mb-2">Профессиональное восстановление ГДТ</p>
                    <p class="text-xl md:text-2xl lg:text-3xl font-bold text-accent-400">(гидротрансформатора)</p>
                </div>

                <p class="text-base md:text-lg lg:text-xl mb-10 md:mb-12 opacity-90 max-w-4xl lg:max-w-6xl mx-auto">
                    Полное восстановление • Балансировка на стенде TCRS (США) • Оригинальные запчасти • Гарантия до 2 лет
                </p>
                <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center items-center">
                    <a href="tel:+375447348543" class="bg-secondary-500 hover:bg-secondary-600 text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl transform hover:scale-105 transition duration-300 flex items-center">
                        <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        Позвонить сейчас
                    </a>
                    <button onclick="openCallback()" class="bg-white/20 glass text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl hover:bg-white/30 transition">
                        Заказать звонок
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent pointer-events-none"></div>
    </section>

    <!-- О компании -->
    <section id="about" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4 hyphenate">
                    Восстановление гидротрансформаторов АКПП
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>
            <div class="max-w-4xl lg:max-w-6xl mx-auto">
                <p class="text-lg md:text-xl text-gray-700 mb-6 md:mb-8 leading-relaxed">
                    ЧТУП «Гидротрансформатор» — первая специализированная компания в Беларуси, занимающаяся исключительно <strong>ремонтом гидротрансформаторов (ГДТ) АКПП</strong>. За 20 лет работы мы восстановили более 15 000 гидротрансформаторов для автомобилей всех марок.
                </p>
                <p class="text-lg md:text-xl text-gray-700 leading-relaxed">
                    Наше главное преимущество — специализация. Мы не ремонтируем всю АКПП целиком, а фокусируемся только на гидротрансформаторах. Это позволяет нам использовать самое современное оборудование, оригинальные запчасти и давать расширенную гарантию до 2 лет.
                </p>
            </div>
        </div>
    </section>

    <!-- Услуги -->
    <section id="services" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-20">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4 hyphenate">
                    Ремонт и восстановление гидротрансформатора
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <!-- Услуга 1 -->
                <div class="group relative bg-gradient-to-br from-primary-700 to-primary-800 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 md:hover:-translate-y-6 hover:shadow-2xl md:hover:shadow-3xl">
                    <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>
                    <div class="relative z-10">
                        <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 lg:mb-8 mx-auto">
                            <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate">Ремонт гидротрансформатора</h3>
                        <p class="text-sm md:text-base lg:text-lg opacity-90 mb-4 md:mb-6 lg:mb-8">Разборка, дефектовка, замена фрикционов, сальников, подшипников, муфты блокировки</p>
                        <button onclick="openCallback()" class="inline-flex items-center text-accent-400 font-bold text-sm md:text-base lg:text-lg hover:text-white transition">
                            Заказать ремонт →
                        </button>
                    </div>
                </div>
                <!-- Услуга 2 -->
                <div class="group relative bg-gradient-to-br from-secondary-500 to-secondary-600 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 md:hover:-translate-y-6 hover:shadow-2xl md:hover:shadow-3xl">
                    <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>
                    <div class="relative z-10">
                        <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 lg:mb-8 mx-auto">
                            <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04"/></svg>
                        </div>
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate">Балансировка ГДТ</h3>
                        <p class="text-sm md:text-base lg:text-lg opacity-90 mb-4 md:mb-6 lg:mb-8">Точная балансировка гидротрансформатора на профессиональном оборудовании TCRS (США)</p>
                        <button onclick="openCallback()" class="inline-flex items-center text-white font-bold text-sm md:text-base lg:text-lg hover:text-accent-400 transition">
                            Узнать стоимость →
                        </button>
                    </div>
                </div>
                <!-- Услуга 3 -->
                <div class="group relative bg-gradient-to-br from-gray-800 to-gray-900 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 md:hover:-translate-y-6 hover:shadow-2xl md:hover:shadow-3xl">
                    <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>
                    <div class="relative z-10">
                        <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 lg:mb-8 mx-auto">
                            <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        </div>
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate">Диагностика гидротрансформатора</h3>
                        <p class="text-sm md:text-base lg:text-lg opacity-90 mb-4 md:mb-6 lg:mb-8">Проверка на герметичность, износ и работоспособность ГДТ</p>
                        <button onclick="openCallback()" class="inline-flex items-center text-accent-400 font-bold text-sm md:text-base lg:text-lg hover:text-white transition">
                            Записаться на диагностику →
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Видео -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-gray-100 to-gray-200">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4 hyphenate">
                    Как мы ремонтируем гидротрансформаторы
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>
            <div class="max-w-4xl lg:max-w-6xl mx-auto rounded-xl md:rounded-2xl lg:rounded-3xl overflow-hidden shadow-xl md:shadow-2xl lg:shadow-3xl">
                <video id="hero-video" class="w-full aspect-video"
                       autoplay
                       muted
                       playsinline
                       loop
                       controls
                       preload="auto"
                       poster="{{ asset('video/preview.jpg') }}"
                       aria-label="Видео процесса ремонта гидротрансформатора">
                    <source src="{{ asset('video/output.m3u8') }}" type="application/x-mpegURL">
                    <source src="{{ asset('video/output.mp4') }}" type="video/mp4">
                    Ваш браузер не поддерживает воспроизведение видео.
                    <a href="{{ asset('video/output.mp4') }}" class="text-accent-500 underline">Скачайте видео по ссылке</a>
                    или посмотрите на нашем
                    <a href="https://www.youtube.com/channel/..." class="text-accent-500 underline">YouTube канале</a>.
                </video>
            </div>
            <div class="mt-8 md:mt-12 text-center max-w-3xl mx-auto">
                <p class="text-lg md:text-xl text-gray-700">
                    Процесс ремонта гидротрансформатора включает полную разборку, диагностику, замену изношенных деталей и точную балансировку на современном оборудовании.
                </p>
            </div>
        </div>
    </section>

    <!-- Преимущества -->
    <section id="advantages" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-20">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                    Почему выбирают наш ремонт ГДТ
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12">
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full mx-auto mb-4 md:mb-6 lg:mb-8 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition">
                        <span class="text-3xl md:text-4xl lg:text-5xl font-black text-white">20</span>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-2 md:mb-3">Лет опыта</h3>
                    <p class="text-gray-600 text-sm md:text-base">Пионеры ремонта гидротрансформаторов в Беларуси</p>
                </div>
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-secondary-500 to-secondary-600 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full mx-auto mb-4 md:mb-6 lg:mb-8 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition">
                        <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-2 md:mb-3">Гарантия до 2 лет</h3>
                    <p class="text-gray-600 text-sm md:text-base">На все виды работ по ремонту гидротрансформатора</p>
                </div>
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full mx-auto mb-4 md:mb-6 lg:mb-8 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition">
                        <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-2 md:mb-3">Оборудование TCRS</h3>
                    <p class="text-gray-600 text-sm md:text-base">Профессиональные стенды из США для балансировки ГДТ</p>
                </div>
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-secondary-500 to-secondary-600 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full mx-auto mb-4 md:mb-6 lg:mb-8 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition">
                        <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2 2 0 009.5 8h1a2 2 0 002 2v8"/></svg>
                    </div>
                    <h3 class="text-lg md:text-xl font-bold mb-2 md:mb-3">Оригинальные запчасти</h3>
                    <p class="text-gray-600 text-sm md:text-base">Raybestos, Alto, Transtec для гидротрансформаторов</p>
                </div>
            </div>
        </div>
    </section>
   @include('partials.partners')
   @include('partials.cta')
@endsection
