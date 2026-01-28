@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section class="hero-bg text-white pt-32 pb-24 md:pt-40 md:pb-32 relative overflow-hidden">
        <!-- Фоновое изображение -->
        <div class="absolute inset-0 opacity-20">
            <img src="{{ asset('img/XXXL.webp') }}" alt="Фон ремонта гидротрансформаторов" class="w-full h-full object-cover object-center">
        </div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="max-w-5xl mx-auto text-center">
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-black leading-tight mb-6 md:mb-8">
                    Контакты
                </h1>

                <div class="mb-8 md:mb-12">
                    <p class="text-lg md:text-xl lg:text-2xl opacity-90 mb-2">Мы находимся в Минске и работаем с клиентами со всей Беларуси</p>
                    <p class="text-xl md:text-2xl lg:text-3xl font-bold text-accent-400">Профессиональный ремонт гидротрансформаторов</p>
                </div>

                <p class="text-base md:text-lg lg:text-xl mb-10 md:mb-12 opacity-90 max-w-4xl mx-auto">
                    Работаем с 2005 года • Оборудование TCRS (США) • Оригинальные запчасти • Гарантия качества
                </p>
                <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center items-center">
                    <a href="https://yandex.by/maps/org/gidrotransformator/193710186009" class="bg-secondary-500 hover:bg-secondary-600 text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl transform hover:scale-105 transition duration-300 flex items-center">
                        <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        Открыть карту
                    </a>
                    <button onclick="openCallback()" class="bg-white/20 glass text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl hover:bg-white/30 transition">
                        Заказать звонок
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Контактная информация -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="max-w-6xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
                    <!-- Адрес -->
                    <div class="group relative bg-gradient-to-br from-primary-700 to-primary-800 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl md:hover:shadow-3xl">
                        <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>
                        <div class="relative z-10">
                            <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>

                            <h3 class="text-xl md:text-2xl font-bold mb-4 text-center">Адрес сервиса</h3>

                            <div class="space-y-3 text-center">
                                <p class="text-lg font-medium">ул. Котовского, д. 9а, ком. 12</p>
                                <p class="text-lg">г. Минск</p>
                                <p class="text-lg">220021</p>
                            </div>

                            <div class="mt-8">
                                <a href="https://yandex.by/maps/org/gidrotransformator/193710186009"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition flex items-center justify-center">
                                    <svg class="w-5 h-5 md:w-6 md:h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                                    Открыть в Яндекс.Картах
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Телефоны -->
                    <div class="group relative bg-gradient-to-br from-secondary-500 to-secondary-600 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl md:hover:shadow-3xl">
                        <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>
                        <div class="relative z-10">
                            <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>

                            <h3 class="text-xl md:text-2xl font-bold mb-4 text-center">Телефоны для связи</h3>

                            <div class="space-y-4 text-center">
                                <div>
                                    <a href="tel:+375172737620"
                                       class="text-xl md:text-2xl font-semibold tracking-tight hover:text-accent-400 transition-colors">
                                        +375 (17) 273-76-20
                                    </a>
                                    <p class="text-sm opacity-80 mt-1">городской</p>
                                </div>
                                <div>
                                    <a href="tel:+375447348543"
                                       class="text-xl md:text-2xl font-semibold tracking-tight hover:text-accent-400 transition-colors">
                                        +375 44 734-85-43
                                    </a>
                                    <p class="text-sm opacity-80 mt-1">мобильный</p>
                                </div>
                            </div>

                            <div class="mt-8">
                                <button onclick="openCallback()"
                                        class="w-full bg-white text-secondary-600 hover:bg-gray-100 font-bold text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                                    Заказать обратный звонок
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- График работы -->
                    <div class="group relative bg-gradient-to-br from-gray-800 to-gray-900 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 hover:shadow-2xl md:hover:shadow-3xl">
                        <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>
                        <div class="relative z-10">
                            <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 mx-auto">
                                <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>

                            <h3 class="text-xl md:text-2xl font-bold mb-4 text-center">График работы</h3>

                            <div class="space-y-4 text-center">
                                <div>
                                    <p class="text-lg font-medium">Пн-Пт</p>
                                    <p class="text-xl md:text-2xl font-bold text-accent-400">9:00 - 18:00</p>
                                </div>
                                <div>
                                    <p class="text-lg font-medium">Сб-Вс</p>
                                    <p class="text-xl md:text-2xl font-bold text-accent-400">выходной</p>
                                </div>
                            </div>

                            <div class="mt-8 pt-6 border-t border-white/20">
                                <p class="text-center text-sm opacity-90">
                                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L2.694 16.5c-.77.833.192 2.5 1.732 2.5z"/></svg>
                                    Прием гидротрансформаторов - до 17:00
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Карта -->
    <section id="map" class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                    Как добраться до нашего сервиса
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>

            <div class="max-w-6xl mx-auto">
                <!-- Контейнер для карты -->
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-xl overflow-hidden">
                    <!-- Ваша встроенная Яндекс Карта -->
                    <div class="h-96 md:h-[500px] relative">
                        <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A094877591a1c9522e26fba09a49fc75749ba9308cf5525f8233faaeea82baf19&amp;width=100%25&amp;height=100%&amp;lang=ru_RU&amp;scroll=true"></script>

                        <!-- Наложение с информацией -->
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm rounded-lg p-4 shadow-lg max-w-xs">
                            <h4 class="font-bold text-gray-900 mb-2">ЧТУП «Гидротрансформатор»</h4>
                            <p class="text-sm text-gray-600 mb-2">ул. Котовского, д. 9а, ком. 12, Минск</p>
                            <div class="flex items-center text-sm text-gray-600">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                Пн-Пт: 9:00 - 18:00
                            </div>
                        </div>
                    </div>

                    <!-- Под картой -->
                    <div class="p-6 md:p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">На общественном транспорте</h3>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>Автобусы: 4, 14, 28, 40, 48, 53</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>Троллейбусы: 2, 22, 33, 37</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>Остановка: «Улица Котовского»</span>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-4">На автомобиле</h3>
                                <ul class="space-y-2 text-gray-600">
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>Бесплатная парковка на территории</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>Въезд со стороны ул. Котовского</span>
                                    </li>
                                    <li class="flex items-start">
                                        <svg class="w-5 h-5 text-secondary-500 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        <span>GPS координаты: 53.9023, 27.5619</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="hero-bg text-white py-16 md:py-24 relative overflow-hidden">
        <div class="container mx-auto px-6 text-center relative z-10">
            <h2 class="text-2xl md:text-3xl lg:text-4xl xl:text-5xl font-black mb-6 md:mb-8">
                Остались вопросы?
            </h2>
            <p class="text-lg md:text-xl lg:text-2xl mb-8 md:mb-12 opacity-90">Свяжитесь с нами удобным способом или приезжайте в сервис</p>
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center">
                <a href="tel:+375447348543" class="bg-secondary-500 hover:bg-secondary-600 text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-14 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl lg:rounded-3xl shadow-xl md:shadow-2xl lg:shadow-3xl transform hover:scale-105 transition flex items-center justify-center">
                    <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    +375 (44) 734-85-43
                </a>
                <a href="https://yandex.by/maps/157/minsk/?ll=27.656621%2C53.870665&mode=routes&rtext=~53.870665%2C27.656621&rtt=mt&ruri=~ymapsbm1%3A%2F%2Forg%3Foid%3D193710186009&z=14"
                   target="_blank"
                   rel="noopener noreferrer"
                   class="bg-white/20 glass border border-white text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-14 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl lg:rounded-3xl hover:bg-white/30 transition flex items-center justify-center">
                    <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Проложить маршрут
                </a>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Плавный скролл до карты
            document.querySelectorAll('a[href="#map"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const mapSection = document.getElementById('map');
                    if (mapSection) {
                        mapSection.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        });
    </script>

    <script type="application/ld+json">
        @json($structuredData, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES)
    </script>
@endpush
