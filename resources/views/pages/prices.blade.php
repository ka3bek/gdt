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
                <h1 class="text-3xl md:text-4xl lg:text-6xl font-black leading-tight mb-6 md:mb-8 hyphenate">
                    Цены на ремонт гидротрансформаторов в Минске
                </h1>

                <div class="mb-8 md:mb-12">
                    <p class="text-lg md:text-xl lg:text-2xl opacity-90 mb-2">Прозрачное ценообразование и гарантия 6 месяцев</p>
                    <p class="text-xl md:text-2xl lg:text-3xl font-bold text-accent-400">Опыт 20 лет • Оборудование TCRS (США) • Оригинальные запчасти</p>
                </div>

                <p class="text-base md:text-lg lg:text-xl mb-10 md:mb-12 opacity-90 max-w-4xl 2xl:max-w-6xl mx-auto">
                    Бесплатная диагностика • Четкие сроки работ • Гарантия на все виды ремонта
                </p>
                <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center items-center">
                    <a href="#prices" class="bg-secondary-500 hover:bg-secondary-600 text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl transform hover:scale-105 transition duration-300 flex items-center">
                        <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Смотреть цены
                    </a>
                    <button onclick="openCallback()" class="bg-white/20 glass text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl hover:bg-white/30 transition">
                        Бесплатная диагностика
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-900/80 via-gray-900/30 to-transparent pointer-events-none"></div>
    </section>

    <!-- Формирование стоимости -->
    <section class="py-16 md:py-24 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                    Как формируется стоимость ремонта гидротрансформатора?
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>

            <div class="max-w-4xl 2xl:max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-lg p-6 md:p-8 lg:p-10 mb-8">
                    <p class="text-lg md:text-xl text-gray-700 mb-6 md:mb-8 leading-relaxed">
                        Точную стоимость ремонта гидротрансформатора можно определить только после диагностики, так как каждый случай уникален.
                        Мы предлагаем <strong class="text-primary-700">бесплатную предварительную диагностику</strong> для оценки объема работ.
                    </p>

                    <div class="mb-8">
                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4">Что влияет на цену?</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6">
                            @foreach([
                                ['title' => 'Тип и модель гидротрансформатора', 'desc' => 'Легковые, внедорожники, коммерческие авто'],
                                ['title' => 'Степень износа внутренних компонентов', 'desc' => 'Фрикционы, сальники, подшипники'],
                                ['title' => 'Необходимость замены муфт и подшипников', 'desc' => 'Комплектующие от проверенных поставщиков'],
                                ['title' => 'Требуется ли балансировка', 'desc' => 'Оборудование TCRS США'],
                            ] as $factor)
                                <div class="flex items-start p-4 bg-primary-50 rounded-xl">
                                    <svg class="w-6 h-6 text-secondary-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    <div>
                                        <h4 class="font-bold text-gray-900">{{ $factor['title'] }}</h4>
                                        <p class="text-sm text-gray-600 mt-1">{{ $factor['desc'] }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="bg-gradient-to-r from-secondary-500/10 to-secondary-600/10 border-l-4 border-secondary-500 p-4 md:p-6 rounded-r-lg">
                        <p class="text-gray-800 italic">
                            <strong>Важно:</strong> Ниже представлены ориентировочные цены на основные виды работ.
                            Точную стоимость назовем после вскрытия и дефектовки ГДТ.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Цены на услуги -->
    <section id="prices" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-20">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                    Цены на ремонт гидротрансформаторов
                </h2>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">Ориентировочная стоимость основных работ (окончательная цена после диагностики)</p>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <!-- Услуга 1 -->
                <div class="group relative bg-gradient-to-br from-primary-700 to-primary-800 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 md:hover:-translate-y-6 hover:shadow-2xl md:hover:shadow-3xl">
                    <!-- Анимация shimmer -->
                    <div class="absolute inset-0 overflow-hidden rounded-2xl md:rounded-3xl">
                        <div class="absolute -inset-[100%] bg-gradient-to-r from-transparent via-white/5 to-transparent group-hover:animate-[shimmer_2s_infinite] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Overlay эффект при наведении -->
                    <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10">
                        <!-- Иконка -->
                        <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 lg:mb-8 mx-auto">
                            <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>

                        <!-- Заголовок -->
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate">
                            Ремонт гидротрансформатора
                        </h3>

                        <!-- Цена -->
                        <div class="text-center mb-6 md:mb-8">
                            <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 tracking-tight">от 250 BYN</div>
                            <p class="text-sm md:text-base opacity-90">Средняя стоимость</p>
                        </div>

                        <!-- Список услуг -->
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Замена сальников и уплотнений</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Замена изношенных подшипников</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Восстановление муфт</span>
                            </li>
                        </ul>

                        <!-- Кнопка -->
                        <button onclick="openCallback()" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold md:font-black text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition duration-300 group/btn">
                            Уточнить для вашего авто
                            <svg class="w-4 h-4 md:w-5 md:h-5 ml-2 inline-block transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Услуга 2 -->
                <div class="group relative bg-gradient-to-br from-secondary-500 to-secondary-600 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 md:hover:-translate-y-6 hover:shadow-2xl md:hover:shadow-3xl">
                    <!-- Анимация shimmer -->
                    <div class="absolute inset-0 overflow-hidden rounded-2xl md:rounded-3xl">
                        <div class="absolute -inset-[100%] bg-gradient-to-r from-transparent via-white/5 to-transparent group-hover:animate-[shimmer_2s_infinite] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Overlay эффект при наведении -->
                    <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10">
                        <!-- Иконка -->
                        <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 lg:mb-8 mx-auto">
                            <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04"/>
                            </svg>
                        </div>

                        <!-- Заголовок -->
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate">
                            Балансировка ГДТ
                        </h3>

                        <!-- Цена -->
                        <div class="text-center mb-6 md:mb-8">
                            <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 tracking-tight">от 180 BYN</div>
                            <p class="text-sm md:text-base opacity-90">Средняя стоимость</p>
                        </div>

                        <!-- Список услуг -->
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-white mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">На оборудовании TCRS (США)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-white mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Устранение вибраций</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-white mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Проверка на биение</span>
                            </li>
                        </ul>

                        <!-- Кнопка -->
                        <button onclick="openCallback()" class="w-full bg-white text-secondary-600 hover:bg-gray-100 font-bold md:font-black text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition duration-300 group/btn">
                            Уточнить для вашего авто
                            <svg class="w-4 h-4 md:w-5 md:h-5 ml-2 inline-block transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Услуга 3 -->
                <div class="group relative bg-gradient-to-br from-gray-800 to-gray-900 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 lg:p-10 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-2 md:hover:-translate-y-6 hover:shadow-2xl md:hover:shadow-3xl">
                    <!-- Анимация shimmer -->
                    <div class="absolute inset-0 overflow-hidden rounded-2xl md:rounded-3xl">
                        <div class="absolute -inset-[100%] bg-gradient-to-r from-transparent via-white/5 to-transparent group-hover:animate-[shimmer_2s_infinite] opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                    </div>

                    <!-- Overlay эффект при наведении -->
                    <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                    <div class="relative z-10">
                        <!-- Иконка -->
                        <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 lg:mb-8 mx-auto">
                            <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>

                        <!-- Заголовок -->
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate">
                            Диагностика ГДТ
                        </h3>

                        <!-- Цена -->
                        <div class="text-center mb-6 md:mb-8">
                            <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2 tracking-tight">от 120 BYN</div>
                            <p class="text-sm md:text-base opacity-90">Средняя стоимость</p>
                        </div>

                        <!-- Список услуг -->
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Проверка на герметичность</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Тестирование работы муфт</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Дефектовка компонентов</span>
                            </li>
                        </ul>

                        <!-- Кнопка -->
                        <button onclick="openCallback()" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold md:font-black text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition duration-300 group/btn">
                            Записаться на диагностику
                            <svg class="w-4 h-4 md:w-5 md:h-5 ml-2 inline-block transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Примечание -->
            <div class="mt-12 md:mt-16 text-center max-w-3xl mx-auto">
                <p class="text-gray-600 text-sm md:text-base p-4 md:p-6 bg-gray-50 rounded-xl md:rounded-2xl border border-gray-100">
                    *Цены указаны в белорусских рублях. Окончательная стоимость определяется после диагностики.
                    В стоимость включены оригинальные запчасти и работа специалистов.
                </p>
            </div>
        </div>
    </section>

    <style>
        @keyframes shimmer {
            0% {
                transform: translateX(-100%);
            }
            100% {
                transform: translateX(100%);
            }
        }

        .hyphenate {
            hyphens: auto;
            -webkit-hyphens: auto;
            -moz-hyphens: auto;
            -ms-hyphens: auto;
        }

        /* Улучшенные эффекты для кнопок */
        #prices button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        #prices button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        #prices button:hover::before {
            left: 100%;
        }

        /* Анимация для иконок в списке */
        #prices li svg {
            transition: transform 0.3s ease;
        }

        #prices li:hover svg {
            transform: scale(1.1);
        }

        /* Анимация для цен */
        #prices .text-3xl,
        #prices .text-4xl,
        #prices .text-5xl {
            transition: transform 0.3s ease;
        }

        #prices .group:hover .text-3xl,
        #prices .group:hover .text-4xl,
        #prices .group:hover .text-5xl {
            transform: scale(1.05);
        }
    </style>

    <!-- Гарантии -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-gray-100 to-gray-200">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                    Наши гарантии
                </h2>
                <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto">Гарантия на ремонт гидротрансформаторов</p>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>

            <div class="max-w-4xl 2xl:max-w-6xl mx-auto">
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-xl overflow-hidden">
                    <div class="md:flex">
                        <!-- Левая часть - гарантия -->
                        <div class="md:w-2/5 bg-gradient-to-br from-primary-700 to-primary-800 text-white p-6 md:p-8 lg:p-10">
                            <div class="text-center mb-6">
                                <div class="text-5xl md:text-6xl lg:text-7xl font-bold mb-2">до 2 лет</div>
                                <div class="text-xl font-bold">гарантия</div>
                                <p class="text-sm opacity-90 mt-2">на все виды работ</p>
                            </div>
                            <p class="text-center text-sm opacity-90">
                                на ремонт гидротрансформатора
                            </p>
                        </div>
                        <!-- Правая часть - что покрывает -->
                        <div class="md:w-3/5 p-6 md:p-8 lg:p-10">
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-4">Что покрывает гарантия?</h3>

                            <ul class="space-y-4 mb-6">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-secondary-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <div>
                                        <h4 class="font-bold text-gray-900">Качество выполненных работ</h4>
                                        <p class="text-sm text-gray-600 mt-1">Все ремонтные операции выполнены в соответствии с технологией</p>
                                    </div>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-secondary-500 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <div>
                                        <h4 class="font-bold text-gray-900">Установленные оригинальные запчасти</h4>
                                        <p class="text-sm text-gray-600 mt-1">Raybestos, Alto, Transtec и другие проверенные производители</p>
                                    </div>
                                </li>
                            </ul>

                            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-4 rounded-r-lg">
                                <p class="text-sm text-yellow-800">
                                    <strong>Важно:</strong> Гарантия не распространяется на случаи неправильной эксплуатации
                                    или использования некачественного трансмиссионного масла.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Почему доверять -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-20">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                    Почему можно доверять нашим гарантиям?
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <div class="text-center group">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full mx-auto mb-4 md:mb-6 lg:mb-8 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition duration-300">
                        <span class="text-2xl md:text-3xl lg:text-4xl font-black text-white">20</span>
                    </div>
                    <h3 class="text-lg md:text-xl lg:text-2xl font-bold mb-2 md:mb-3">Лет опыта</h3>
                    <p class="text-gray-600 text-sm md:text-base lg:text-lg">В ремонте гидротрансформаторов</p>
                </div>

                <div class="text-center group">
                    <div class="bg-gradient-to-br from-secondary-500 to-secondary-600 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full mx-auto mb-4 md:mb-6 lg:mb-8 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl lg:text-2xl font-bold mb-2 md:mb-3">Оборудование TCRS (США)</h3>
                    <p class="text-gray-600 text-sm md:text-base lg:text-lg">Для точной диагностики и балансировки</p>
                </div>

                <div class="text-center group">
                    <div class="bg-gradient-to-br from-primary-600 to-primary-800 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-full mx-auto mb-4 md:mb-6 lg:mb-8 flex items-center justify-center shadow-xl md:shadow-2xl group-hover:scale-105 md:group-hover:scale-110 transition duration-300">
                        <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2 2 0 009.5 8h1a2 2 0 002 2v8"/>
                        </svg>
                    </div>
                    <h3 class="text-lg md:text-xl lg:text-2xl font-bold mb-2 md:mb-3">Только оригинальные запчасти</h3>
                    <p class="text-gray-600 text-sm md:text-base lg:text-lg">От проверенных поставщиков</p>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Анимация для иконок */
        .group:hover svg {
            transform: rotate(5deg);
            transition: transform 0.3s ease;
        }

        .group:hover .text-2xl,
        .group:hover .text-3xl,
        .group:hover .text-4xl {
            transform: scale(1.1);
            transition: transform 0.3s ease;
        }

        /* Эффект для заголовков */
        .group h3 {
            transition: color 0.3s ease;
        }

        .group:hover h3 {
            color: #1a56db; /* primary-700 примерно */
        }

        /* Эффект для описания */
        .group p {
            transition: transform 0.3s ease;
        }

        .group:hover p {
            transform: translateY(-2px);
        }
    </style>



    @include('partials.cta')


@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Плавный скролл до цен
            document.querySelectorAll('a[href="#prices"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pricesSection = document.getElementById('prices');
                    if (pricesSection) {
                        pricesSection.scrollIntoView({
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
