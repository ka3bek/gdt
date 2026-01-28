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
                    Профессиональный ремонт гидротрансформаторов в Минске
                </h1>

                <div class="mb-8 md:mb-12">
                    <p class="text-lg md:text-xl lg:text-2xl opacity-90 mb-2">Полный комплекс услуг по восстановлению ГДТ</p>
                    <p class="text-xl md:text-2xl lg:text-3xl font-bold text-accent-400">Гарантия качества • Оригинальные запчасти • Опыт 20 лет</p>
                </div>

                <p class="text-base md:text-lg lg:text-xl mb-10 md:mb-12 opacity-90 max-w-4xl mx-auto">
                    Современное оборудование TCRS (США) • Квалифицированные специалисты • Гарантия до 6 месяцев
                </p>
                <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center items-center">
                    <a href="#services" class="bg-secondary-500 hover:bg-secondary-600 text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl transform hover:scale-105 transition duration-300 flex items-center">
                        <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        Все услуги
                    </a>
                    <button onclick="openCallback()" class="bg-white/20 glass text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-12 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl shadow-2xl hover:bg-white/30 transition">
                        Бесплатная консультация
                    </button>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Наши услуги -->
    <section id="services" class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-20">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                    Наши услуги по ремонту гидротрансформаторов
                </h2>
                <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">Качественное восстановление ГДТ для всех типов автоматических коробок передач</p>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-12">
                @foreach($services as $service)
                    <div class="group relative bg-gradient-to-br {{ $service['color'] }} text-white rounded-2xl md:rounded-3xl p-6 md:p-8 shadow-xl md:shadow-2xl transform transition-all duration-500 hover:-translate-y-4 hover:shadow-2xl md:hover:shadow-3xl">
                        <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>
                        <div class="relative z-10">
                            <!-- Иконка услуги -->
                            <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 rounded-xl md:rounded-2xl flex items-center justify-center mb-6 mx-auto">
                                @if($service['icon'] === 'wrench')
                                    <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                @elseif($service['icon'] === 'scale')
                                    <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                                @elseif($service['icon'] === 'search')
                                    <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                @elseif($service['icon'] === 'cog')
                                    <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                @elseif($service['icon'] === 'wrench-screwdriver')
                                    <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                @elseif($service['icon'] === 'lightning-bolt')
                                    <svg class="w-8 h-8 md:w-10 md:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                                @endif
                            </div>

                            <!-- Заголовок и описание -->
                            <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-4 text-center">{{ $service['title'] }}</h3>
                            <p class="text-sm md:text-base opacity-90 mb-6 text-center">{{ $service['description'] }}</p>

                            <!-- Цена -->
                            <div class="text-center mb-6">
                                <div class="text-2xl md:text-3xl font-bold mb-1">{{ $service['price'] }}</div>
                                <p class="text-sm opacity-80">Средняя стоимость</p>
                            </div>

                            <!-- Кнопка -->
                            <button onclick="openCallback()" class="w-full {{ $service['button_class'] }} text-white font-bold md:font-bold text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                                Узнать стоимость
                            </button>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Процесс ремонта -->
    <section class="py-16 md:py-24 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-20">
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-black mb-4 md:mb-6">
                    Как выполняется ремонт гидротрансформатора?
                </h2>
                <p class="text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
                    Четкий технологический процесс от диагностики до балансировки на современном оборудовании
                </p>
                <div class="w-32 md:w-40 h-2 bg-gradient-to-r from-secondary-500 to-accent-500 mx-auto rounded-full mt-6"></div>
            </div>

            <div class="max-w-6xl mx-auto">
                <!-- Desktop версия -->
                <div class="hidden lg:block">
                    <div class="relative">
                        <!-- Основная линия процесса -->
                        <div class="absolute left-0 right-0 top-1/2 transform -translate-y-1/2 h-1 bg-gradient-to-r from-primary-600 via-secondary-500 to-accent-500 rounded-full opacity-30"></div>
                        <div class="absolute left-0 right-0 top-1/2 transform -translate-y-1/2 h-1 bg-gradient-to-r from-primary-600 via-secondary-500 to-accent-500 rounded-full opacity-70 animate-pulse-slow"></div>

                        <!-- Шаги процесса -->
                        <div class="relative flex justify-between">
                            @foreach([
                                [
                                    'number' => '1',
                                    'title' => 'Диагностика',
                                    'description' => 'Точное определение неисправностей с помощью профессионального оборудования TCRS',
                                    'icon' => 'search',
                                    'color' => 'from-primary-600 to-primary-700',
                                    'accent' => 'secondary-500'
                                ],
                                [
                                    'number' => '2',
                                    'title' => 'Разборка',
                                    'description' => 'Аккуратная разборка ГДТ с сохранением всех компонентов',
                                    'icon' => 'wrench-screwdriver',
                                    'color' => 'from-secondary-500 to-secondary-600',
                                    'accent' => 'primary-600'
                                ],
                                [
                                    'number' => '3',
                                    'title' => 'Замена деталей',
                                    'description' => 'Установка оригинальных запчастей от проверенных поставщиков',
                                    'icon' => 'package',
                                    'color' => 'from-primary-600 to-primary-700',
                                    'accent' => 'accent-500'
                                ],
                                [
                                    'number' => '4',
                                    'title' => 'Балансировка',
                                    'description' => 'Точная балансировка на оборудовании TCRS (США)',
                                    'icon' => 'scale',
                                    'color' => 'from-accent-500 to-accent-600',
                                    'accent' => 'primary-600'
                                ]
                            ] as $step)
                                <div class="flex flex-col items-center text-center w-56 relative group">
                                    <!-- Верхняя часть с номером -->
                                    <div class="mb-4 relative">
                                        <!-- Анимированный фон -->
                                        <div class="absolute inset-0 {{ $step['color'] }} rounded-full opacity-20 group-hover:opacity-40 transition-opacity duration-300 animate-pulse"></div>

                                        <!-- Основной круг -->
                                        <div class="relative bg-gradient-to-br {{ $step['color'] }} w-24 h-24 rounded-full flex items-center justify-center shadow-2xl group-hover:shadow-3xl transform group-hover:scale-110 transition-all duration-300">
                                            <span class="text-4xl font-black text-white">{{ $step['number'] }}</span>

                                            <!-- Внешнее кольцо -->
                                            <div class="absolute -inset-4 border-4 border-{{ $step['accent'] }}/30 rounded-full animate-ping opacity-0 group-hover:opacity-100"></div>
                                        </div>

                                        <!-- Иконка -->
                                        <div class="absolute -bottom-2 -right-2 w-14 h-14 rounded-full bg-white shadow-xl flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300">
                                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-{{ $step['accent'] }} to-{{ $step['accent'] }}/80 flex items-center justify-center">
                                                @if($step['icon'] === 'search')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                                @elseif($step['icon'] === 'wrench-screwdriver')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                @elseif($step['icon'] === 'package')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                @elseif($step['icon'] === 'scale')
                                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Контент -->
                                    <div class="mt-6 px-2">
                                        <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-3 group-hover:text-primary-700 transition-colors duration-300">
                                            {{ $step['title'] }}
                                        </h3>
                                        <p class="text-gray-600 leading-relaxed text-sm md:text-base">
                                            {{ $step['description'] }}
                                        </p>
                                    </div>

                                    <!-- Соединительная линия (справа) -->
                                    @if(!$loop->last)
                                        <div class="absolute top-12 right-0 w-full h-0.5 bg-gradient-to-r from-{{ $step['accent'] }}/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                    @endif
                                </div>
                            @endforeach
                        </div>

                        <!-- Анимированные элементы на линии -->
                        <div class="absolute left-0 right-0 top-1/2 transform -translate-y-1/2">
                            <div class="h-2 bg-gradient-to-r from-transparent via-white/50 to-transparent animate-[shimmer_2s_infinite]"></div>
                        </div>
                    </div>
                </div>

                <!-- Mobile & Tablet версия -->
                <div class="lg:hidden">
                    <div class="space-y-12">
                        @foreach([
                            [
                                'number' => '1',
                                'title' => 'Диагностика',
                                'description' => 'Точное определение неисправностей с помощью профессионального оборудования TCRS',
                                'icon' => 'search',
                                'color' => 'from-primary-600 to-primary-700',
                                'accent' => 'secondary-500'
                            ],
                            [
                                'number' => '2',
                                'title' => 'Разборка',
                                'description' => 'Аккуратная разборка ГДТ с сохранением всех компонентов',
                                'icon' => 'wrench-screwdriver',
                                'color' => 'from-secondary-500 to-secondary-600',
                                'accent' => 'primary-600'
                            ],
                            [
                                'number' => '3',
                                'title' => 'Замена деталей',
                                'description' => 'Установка оригинальных запчастей от проверенных поставщиков',
                                'icon' => 'package',
                                'color' => 'from-primary-600 to-primary-700',
                                'accent' => 'accent-500'
                            ],
                            [
                                'number' => '4',
                                'title' => 'Балансировка',
                                'description' => 'Точная балансировка на оборудовании TCRS (США)',
                                'icon' => 'scale',
                                'color' => 'from-accent-500 to-accent-600',
                                'accent' => 'primary-600'
                            ]
                        ] as $step)
                            <div class="relative group">
                                <!-- Линия слева -->
                                @if(!$loop->first)
                                    <div class="absolute left-12 top-0 bottom-0 w-0.5 bg-gradient-to-b from-primary-600/30 via-secondary-500/30 to-accent-500/30"></div>
                                @endif

                                <div class="flex items-start">
                                    <!-- Номер и иконка -->
                                    <div class="relative mr-6">
                                        <div class="relative">
                                            <!-- Анимированный фон -->
                                            <div class="absolute inset-0 {{ $step['color'] }} rounded-full opacity-20 group-hover:opacity-40 transition-opacity duration-300"></div>

                                            <!-- Основной круг -->
                                            <div class="relative bg-gradient-to-br {{ $step['color'] }} w-20 h-20 rounded-full flex items-center justify-center shadow-xl group-hover:shadow-2xl transform group-hover:scale-105 transition-all duration-300">
                                                <span class="text-3xl font-black text-white">{{ $step['number'] }}</span>

                                                <!-- Внешнее кольцо -->
                                                <div class="absolute -inset-3 border-3 border-{{ $step['accent'] }}/30 rounded-full animate-ping opacity-0 group-hover:opacity-100"></div>
                                            </div>

                                            <!-- Иконка -->
                                            <div class="absolute -bottom-2 -right-2 w-12 h-12 rounded-full bg-white shadow-lg flex items-center justify-center transform group-hover:rotate-12 transition-transform duration-300">
                                                <div class="w-8 h-8 rounded-full bg-gradient-to-br from-{{ $step['accent'] }} to-{{ $step['accent'] }}/80 flex items-center justify-center">
                                                    @if($step['icon'] === 'search')
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                                    @elseif($step['icon'] === 'wrench-screwdriver')
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                    @elseif($step['icon'] === 'package')
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                                    @elseif($step['icon'] === 'scale')
                                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"/></svg>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Контент -->
                                    <div class="flex-1 pt-2">
                                        <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary-700 transition-colors duration-300">
                                            {{ $step['title'] }}
                                        </h3>
                                        <p class="text-gray-600 leading-relaxed">
                                            {{ $step['description'] }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Индикатор соединения -->
                                @if(!$loop->last)
                                    <div class="absolute left-12 top-20 bottom-0 w-0.5 bg-gradient-to-b from-{{ $step['accent'] }}/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Кнопка CTA -->
                <div class="mt-16 md:mt-20 text-center">
                    <div class="inline-flex flex-col sm:flex-row gap-4 md:gap-6 items-center justify-center bg-gradient-to-r from-primary-600/10 to-secondary-500/10 rounded-2xl md:rounded-3xl p-6 md:p-8 shadow-lg">
                        <div class="text-left">
                            <h3 class="text-xl md:text-2xl font-bold text-gray-900 mb-2">Готовы начать ремонт?</h3>
                            <p class="text-gray-600">Оставьте заявку и мы проведем бесплатную диагностику</p>
                        </div>
                        <button onclick="openCallback()"
                                class="bg-gradient-to-r from-secondary-500 to-secondary-600 hover:from-secondary-600 hover:to-secondary-700 text-white font-bold px-8 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition-all duration-300">
                            Записаться на диагностику
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Оборудование -->
    <section class="py-16 md:py-24 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 md:mb-16">
                <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                    Наше оборудование
                </h2>
                <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
            </div>

            <div class="max-w-4xl mx-auto">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
                    <!-- Текст -->
                    <div>
                        <div class="bg-gradient-to-br from-primary-700 to-primary-800 text-white rounded-2xl md:rounded-3xl p-6 md:p-8 shadow-xl">
                            <h3 class="text-2xl md:text-3xl font-bold mb-4">Оборудование TCRS (США)</h3>
                            <p class="text-lg opacity-90 mb-6">Профессиональное стендовое оборудование для точной диагностики и балансировки гидротрансформаторов.</p>

                            <ul class="space-y-3 mb-6">
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-accent-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>Прецизионная балансировка с точностью до 0.1 грамма</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-accent-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>Тестирование под нагрузкой (имитация реальных условий)</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-accent-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>Диагностика герметичности и давления</span>
                                </li>
                                <li class="flex items-start">
                                    <svg class="w-6 h-6 text-accent-400 mr-3 mt-1 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                    <span>Сертифицировано по международным стандартам</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Изображение оборудования -->
                    <div class="relative">
                        <div class="rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl">
                            <img src="{{ asset('img/tcrs-equipment.jpg') }}"
                                 alt="Оборудование TCRS для балансировки гидротрансформаторов"
                                 class="w-full h-auto object-cover transform hover:scale-105 transition-transform duration-500">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 hover:opacity-100 transition-opacity duration-300"></div>
                        </div>
                        <div class="absolute -bottom-4 -right-4 bg-secondary-500 text-white px-4 py-2 rounded-lg shadow-lg">
                            <p class="text-sm font-bold">США</p>
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
                Нужен профессиональный ремонт гидротрансформатора?
            </h2>
            <p class="text-lg md:text-xl lg:text-2xl mb-8 md:mb-12 opacity-90">Получите бесплатную консультацию и расчет стоимости работ</p>
            <div class="flex flex-col md:flex-row gap-6 md:gap-8 justify-center">
                <a href="tel:+375447348543" class="bg-secondary-500 hover:bg-secondary-600 text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-14 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl lg:rounded-3xl shadow-xl md:shadow-2xl lg:shadow-3xl transform hover:scale-105 transition flex items-center justify-center">
                    <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                    +375 (44) 734-85-43
                </a>
                <button onclick="openCallback()" class="bg-white/20 glass border border-white text-white font-black text-base md:text-lg lg:text-xl px-6 md:px-10 lg:px-14 py-3 md:py-4 lg:py-5 rounded-xl md:rounded-2xl lg:rounded-3xl hover:bg-white/30 transition">
                    Заказать диагностику
                </button>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Плавный скролл до услуг
            document.querySelectorAll('a[href="#services"]').forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const servicesSection = document.getElementById('services');
                    if (servicesSection) {
                        servicesSection.scrollIntoView({
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
