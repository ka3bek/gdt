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

                <p class="text-base md:text-lg lg:text-xl mb-10 md:mb-12 opacity-90 max-w-4xl mx-auto">
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
        <div class="absolute bottom-0 left-0 right-0 h-32 bg-gradient-to-t from-gray-50 to-transparent"></div>
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

            <div class="max-w-4xl mx-auto">
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
                    <div class="absolute inset-0 bg-white/10 rounded-2xl md:rounded-3xl opacity-0 group-hover:opacity-100 transition"></div>
                    <div class="relative z-10">
                        <div class="bg-white/20 w-16 h-16 md:w-20 md:h-20 lg:w-24 lg:h-24 rounded-xl md:rounded-2xl flex items-center justify-center mb-4 md:mb-6 lg:mb-8 mx-auto">
                            <svg class="w-8 h-8 md:w-10 md:h-10 lg:w-12 lg:h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        </div>
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6">Ремонт гидротрансформатора</h3>

                        <div class="text-center mb-6">
                            <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2">от 250 BYN</div>
                            <p class="text-sm opacity-90">Средняя стоимость</p>
                        </div>

                        <ul class="space-y-3 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-accent-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">Замена сальников и уплотнений</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-accent-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">Замена изношенных подшипников</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-accent-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">Восстановление муфт</span>
                            </li>
                        </ul>

                        <button onclick="openCallback()" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold md:font-black text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                            Уточнить для вашего авто
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
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6">Балансировка ГДТ</h3>

                        <div class="text-center mb-6">
                            <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2">от 180 BYN</div>
                            <p class="text-sm opacity-90">Средняя стоимость</p>
                        </div>

                        <ul class="space-y-3 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-white mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">На оборудовании TCRS (США)</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-white mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">Устранение вибраций</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-white mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">Проверка на биение</span>
                            </li>
                        </ul>

                        <button onclick="openCallback()" class="w-full bg-white text-secondary-600 hover:bg-gray-100 font-bold md:font-black text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                            Уточнить для вашего авто
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
                        <h3 class="text-lg md:text-xl lg:text-2xl font-black mb-3 md:mb-4 lg:mb-6">Диагностика ГДТ</h3>

                        <div class="text-center mb-6">
                            <div class="text-3xl md:text-4xl lg:text-5xl font-bold mb-2">от 120 BYN</div>
                            <p class="text-sm opacity-90">Средняя стоимость</p>
                        </div>

                        <ul class="space-y-3 mb-6 md:mb-8">
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-accent-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">Проверка на герметичность</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-accent-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">Тестирование работы муфт</span>
                            </li>
                            <li class="flex items-start">
                                <svg class="w-5 h-5 text-accent-400 mr-2 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                <span class="text-sm md:text-base">Дефектовка компонентов</span>
                            </li>
                        </ul>

                        <button onclick="openCallback()" class="w-full bg-accent-500 hover:bg-accent-600 text-white font-bold md:font-black text-base md:text-lg py-3 md:py-4 rounded-lg md:rounded-xl shadow-lg hover:shadow-xl transform hover:scale-105 transition">
                            Записаться на диагностику
                        </button>
                    </div>
                </div>
            </div>

            <!-- Примечание -->
            <div class="mt-12 text-center max-w-3xl mx-auto">
                <p class="text-gray-600 text-sm md:text-base">
                    *Цены указаны в белорусских рублях. Окончательная стоимость определяется после диагностики.
                    В стоимость включены оригинальные запчасти и работа специалистов.
                </p>
            </div>
        </div>
    </section>

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

            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-2xl md:rounded-3xl shadow-xl overflow-hidden">
                    <div class="md:flex">
                        <!-- Левая часть - гарантия -->
                        <div class="md:w-2/5 bg-gradient-to-br from-primary-700 to-primary-800 text-white p-6 md:p-8 lg:p-10">
                            <div class="text-center mb-6">
                                <div class="text-5xl md:text-6xl lg:text-7xl font-bold mb-2">6</div>
                                <div class="text-xl font-bold">месяцев</div>
                                <p class="text-sm opacity-90 mt-2">срок гарантии</p>
                            </div>
                            <p class="text-center text-sm opacity-90">
                                или согласно гарантии на ремонт АКПП
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

                <!-- Почему доверять -->
                <div class="mt-12">
                    <h3 class="text-xl md:text-2xl font-bold text-center text-gray-900 mb-8">Почему можно доверять нашим гарантиям?</h3>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-8">
                        <div class="text-center">
                            <div class="bg-gradient-to-br from-primary-600 to-primary-800 w-16 h-16 md:w-20 md:h-20 rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                                <span class="text-2xl md:text-3xl font-bold text-white">20</span>
                            </div>
                            <h4 class="font-bold text-gray-900">Лет опыта</h4>
                            <p class="text-sm text-gray-600 mt-2">В ремонте гидротрансформаторов</p>
                        </div>

                        <div class="text-center">
                            <div class="bg-gradient-to-br from-secondary-500 to-secondary-600 w-16 h-16 md:w-20 md:h-20 rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            </div>
                            <h4 class="font-bold text-gray-900">Оборудование TCRS (США)</h4>
                            <p class="text-sm text-gray-600 mt-2">Для точной диагностики и балансировки</p>
                        </div>

                        <div class="text-center">
                            <div class="bg-gradient-to-br from-primary-600 to-primary-800 w-16 h-16 md:w-20 md:h-20 rounded-full mx-auto mb-4 flex items-center justify-center shadow-lg">
                                <svg class="w-8 h-8 md:w-10 md:h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2 2 0 009.5 8h1a2 2 0 002 2v8"/></svg>
                            </div>
                            <h4 class="font-bold text-gray-900">Только оригинальные запчасти</h4>
                            <p class="text-sm text-gray-600 mt-2">От проверенных поставщиков</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
