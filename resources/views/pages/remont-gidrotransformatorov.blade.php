@extends('layouts.app')

@section('content')
    <!-- Hero -->
    <section class="hero-bg text-white pt-32 pb-24 md:pt-40 md:pb-32 relative overflow-hidden">
        <!-- Фоновое изображение с альтернативным текстом -->
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('img/XXXL.webp') }}" alt="Ремонт гидротрансформатора — полный процесс" class="w-full h-full object-cover object-center">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <!-- SEO-оптимизированный заголовок (оставил почти без изменений, он хороший) -->
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-black leading-tight mb-6 md:mb-8 hyphenate">
                    Профессиональный ремонт<br class="hidden sm:block"> гидротрансформаторов
                </h1>

                <!-- Самый сильный блок — хук + вызов -->
                <div class="mb-8 md:mb-12">
                    <p class="text-2xl md:text-3xl lg:text-4xl font-black text-accent-400 mb-3">
                        Не верь словам — смотри сам!
                    </p>
                    <p class="text-lg md:text-xl lg:text-2xl opacity-90">
                        Разбираем. Чистим. Варим. Тестируем. Всё на твоих глазах.
                    </p>
                </div>

                <!-- Усиливающий доверие абзац, короче и жёстче -->
                <p class="text-base md:text-lg lg:text-xl mb-10 md:mb-14 opacity-90 max-w-4xl lg:max-w-5xl mx-auto font-medium">
                    Никаких «волшебных» ремонтов и скрытых наценок.
                    Только честный процесс от первой диагностики до стендовых испытаний — и видео без купюр.
                </p>

                <!-- Кнопки — оставил структуру, но можно чуть усилить текст на кнопках ниже -->
                <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center items-center">
                    <a href="#hero-video" class="bg-secondary-500 hover:bg-secondary-600 text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl transform hover:scale-105 transition duration-300 flex items-center">
                        <svg class="w-7 h-7 mr-3 group-hover:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                        </svg>
                        Смотреть полный процесс
                    </a>
                    <button onclick="openCallback()" class="bg-white/20 glass text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl hover:bg-white/30 transition">
                        Получить консультацию
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent pointer-events-none"></div>
    </section>


    @include('partials.video')

    @include('partials.reviews')

    @include('partials.cta')
@endsection

