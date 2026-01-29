<!-- Оборудование -->
<section class="py-16 md:py-24 bg-white">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4">
                Наше оборудование
            </h2>
            <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
        </div>

        <div class="max-w-4xl 2xl:max-w-6xl mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 md:gap-12 items-center">
                <!-- Текст (без изменений) -->
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

                <!-- Слайдшоу без фиксированной высоты -->
                <div class="relative">
                    <div class="rounded-2xl md:rounded-3xl overflow-hidden shadow-2xl group">
                        <!-- Контейнер слайдов -->
                        <div id="slideshow" class="relative w-full overflow-hidden">
                            <!-- Слайды -->
                            <img src="{{ asset('img/tcrs-equipment-1.jpg') }}"
                                 class="w-full h-auto object-contain slide transition-opacity duration-1000 ease-in-out opacity-100"
                                 alt="Оборудование TCRS 1">
                            <img src="{{ asset('img/tcrs-equipment-2.jpg') }}"
                                 class="w-full h-auto object-contain slide transition-opacity duration-1000 ease-in-out opacity-0 absolute inset-0"
                                 alt="Оборудование TCRS 2">
                            <img src="{{ asset('img/tcrs-equipment-3.jpg') }}"
                                 class="w-full h-auto object-contain slide transition-opacity duration-1000 ease-in-out opacity-0 absolute inset-0"
                                 alt="Оборудование TCRS 3">
                            <img src="{{ asset('img/tcrs-equipment-4.jpg') }}"
                                 class="w-full h-auto object-contain slide transition-opacity duration-1000 ease-in-out opacity-0 absolute inset-0"
                                 alt="Оборудование TCRS 4">
                            <img src="{{ asset('img/tcrs-equipment-5.jpg') }}"
                                 class="w-full h-auto object-contain slide transition-opacity duration-1000 ease-in-out opacity-0 absolute inset-0"
                                 alt="Оборудование TCRS 5">

                            <!-- Градиент при наведении -->
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                        </div>

                        <!-- Стрелки -->
                        <button id="prev" class="absolute left-3 top-1/2 -translate-y-1/2 bg-black/40 text-white p-3 rounded-full opacity-0 group-hover:opacity-80 transition-opacity hover:bg-black/60 z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <button id="next" class="absolute right-3 top-1/2 -translate-y-1/2 bg-black/40 text-white p-3 rounded-full opacity-0 group-hover:opacity-80 transition-opacity hover:bg-black/60 z-10">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                        </button>

                        <!-- Точки-индикаторы -->
                        <div class="absolute bottom-4 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
                            <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer hover:bg-white transition"></span>
                            <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer hover:bg-white transition"></span>
                            <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer hover:bg-white transition"></span>
                            <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer hover:bg-white transition"></span>
                            <span class="dot w-3 h-3 bg-white/60 rounded-full cursor-pointer hover:bg-white transition"></span>
                        </div>
                    </div>

                    <div class="absolute -bottom-4 -right-4 bg-secondary-500 text-white px-4 py-2 rounded-lg shadow-lg">
                        <p class="text-sm font-bold">США</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript остаётся почти без изменений -->
<script>
    const slides = document.querySelectorAll('#slideshow .slide');
    const dots = document.querySelectorAll('.dot');
    const prevBtn = document.getElementById('prev');
    const nextBtn = document.getElementById('next');
    let currentSlide = 0;
    let interval;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.opacity = i === index ? '1' : '0';
        });
        dots.forEach((dot, i) => {
            dot.classList.toggle('bg-white', i === index);
            dot.classList.toggle('bg-white/60', i !== index);
        });
        currentSlide = index;
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function startAutoSlide() {
        interval = setInterval(nextSlide, 4000);
    }

    document.getElementById('slideshow').addEventListener('mouseenter', () => clearInterval(interval));
    document.getElementById('slideshow').addEventListener('mouseleave', startAutoSlide);

    prevBtn.addEventListener('click', () => {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    });

    nextBtn.addEventListener('click', nextSlide);

    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => showSlide(index));
    });

    showSlide(0);
    startAutoSlide();
</script>


