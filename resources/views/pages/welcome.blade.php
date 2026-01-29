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
                <!-- Услуга 1: Ремонт гидротрансформатора -->
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
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate text-center">
                            Ремонт гидротрансформаторов АКПП
                        </h3>

                        <!-- Краткое описание -->
                        <div class="text-center mb-6 md:mb-8">
                            <p class="text-lg md:text-xl font-bold mb-2">Полное восстановление</p>
                            <p class="text-sm md:text-base opacity-90">Качественный ремонт любой сложности</p>
                        </div>

                        <!-- Список работ -->
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Замена фрикционов и сальников</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Замена подшипников и муфт</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Оригинальные комплектующие</span>
                            </li>
                        </ul>

                        <!-- Кнопка -->
                        <button onclick="openCallback()" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold md:font-black text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition duration-300 group/btn">
                            Заказать ремонт
                            <svg class="w-4 h-4 md:w-5 md:h-5 ml-2 inline-block transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Услуга 2: Балансировка ГДТ -->
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
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate text-center">
                            Балансировка ГДТ
                        </h3>

                        <!-- Краткое описание -->
                        <div class="text-center mb-6 md:mb-8">
                            <p class="text-lg md:text-xl font-bold mb-2">Профессиональная балансировка</p>
                            <p class="text-sm md:text-base opacity-90">На стенде TCRS (США)</p>
                        </div>

                        <!-- Список работ -->
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-white mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Оборудование TCRS (США)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-white mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Устранение вибраций и шума</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-white mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Продление срока службы АКПП</span>
                            </li>
                        </ul>

                        <!-- Кнопка -->
                        <button onclick="openCallback()" class="w-full bg-white text-secondary-600 hover:bg-gray-100 font-bold md:font-black text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition duration-300 group/btn">
                            Узнать стоимость
                            <svg class="w-4 h-4 md:w-5 md:h-5 ml-2 inline-block transform group-hover/btn:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Услуга 3: Диагностика гидротрансформатора -->
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
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6 hyphenate text-center">
                            Диагностика гидротрансформатора
                        </h3>

                        <!-- Краткое описание -->
                        <div class="text-center mb-6 md:mb-8">
                            <p class="text-lg md:text-xl font-bold mb-2">Комплексная диагностика</p>
                            <p class="text-sm md:text-base opacity-90">Точное определение неисправностей</p>
                        </div>

                        <!-- Список работ -->
                        <ul class="space-y-3 md:space-y-4 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 md:w-6 md:h-6 text-accent-400 mr-2 md:mr-3 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="text-sm md:text-base">Проверка герметичности</span>
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
        #services button {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        #services button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s ease;
        }

        #services button:hover::before {
            left: 100%;
        }

        /* Анимация для иконок в списке */
        #services li svg {
            transition: transform 0.3s ease;
        }

        #services li:hover svg {
            transform: scale(1.1);
        }

        /* Анимация для заголовков услуг */
        #services h3 {
            transition: transform 0.3s ease;
        }

        #services .group:hover h3 {
            transform: scale(1.05);
        }
    </style>


    @include('partials.video')
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


{{--        <div class="max-w-4xl 2xl:max-w-6xl mx-auto">--}}
{{--            <!-- Только картинка -->--}}
{{--            <div class="relative">--}}
{{--                <div class="rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl group">--}}
{{--                    <!-- Контейнер для одной картинки -->--}}
{{--                    <div id="single-image" class="relative w-full overflow-hidden">--}}
{{--                        <!-- Одна картинка альбомного формата -->--}}
{{--                        <img src="{{ asset('img/XXXL.webp') }}"--}}
{{--                             class="w-full h-auto object-contain transition-opacity duration-1000 ease-in-out opacity-100"--}}
{{--                             alt="Описание картинки">--}}

{{--                        <!-- Градиент при наведении -->--}}
{{--                        <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <!-- Декоративный элемент (опционально) -->--}}
{{--                <div class="absolute -bottom-4 -right-4 bg-secondary-500 text-white px-4 py-2 rounded-lg shadow-lg">--}}
{{--                    <p class="text-sm font-bold">Метка</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


    </section>



{{--   @include('partials.partners')--}}
   @include('partials.cta')
@endsection
