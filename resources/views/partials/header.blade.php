<header class="fixed top-0 left-0 right-0 z-50 bg-white/90 backdrop-blur-md shadow-lg">
    <div class="container mx-auto px-6 py-4">
        <nav class="flex items-center justify-between">
            <a href="/" class="flex items-center group">
                <img src="{{ asset('favicon.svg') }}" alt="Ремонт гидротрансформатора АКПП Минск - ЧТУП Гидротрансформатор" class="h-14 md:h-18 transition-transform group-hover:scale-110">
                <div class="ml-4 hidden md:block">
                    <div class="text-xl font-black text-gray-900 leading-tight">ЧТУП «Гидротрансформатор»</div>
                    <div class="text-sm text-gray-600">Ремонт гидротрансформаторов АКПП</div>
                </div>
            </a>
            <div class="hidden lg:flex items-center space-x-10">
                <a href="/about" class="text-gray-700 hover:text-primary-600 font-semibold transition relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-primary-600 after:transition-all after:duration-300 hover:after:w-full">О компании</a>
                <a href="/services" class="text-gray-700 hover:text-primary-600 font-semibold transition relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-primary-600 after:transition-all after:duration-300 hover:after:w-full">Услуги компании</a>
                <a href="/prices" class="text-gray-700 hover:text-primary-600 font-semibold transition relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-primary-600 after:transition-all after:duration-300 hover:after:w-full">Цены и гарантии</a>
                <a href="/contacts" class="text-gray-700 hover:text-primary-600 font-semibold transition relative after:absolute after:bottom-0 after:left-0 after:w-0 after:h-0.5 after:bg-primary-600 after:transition-all after:duration-300 hover:after:w-full">Контакты</a>
                <a href="tel:+375447348543" class="bg-secondary-500 hover:bg-secondary-600 text-white px-8 py-3 rounded-full font-bold shadow-xl hover:shadow-2xl transition transform hover:scale-105">+375 (44) 734-85-43</a>
            </div>
            <button id="mobile-btn" class="lg:hidden text-gray-800" aria-label="Открыть меню">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </nav>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu" class="fixed inset-0 bg-white z-40 hidden flex items-center justify-center">
    <button id="mobile-close" class="absolute top-8 right-8 text-gray-800" aria-label="Закрыть меню">
        <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <div class="text-center space-y-8">
        <a href="#about" class="block text-3xl font-bold hover:text-primary-600 transition" onclick="closeMobileMenu()">О компании</a>
        <a href="#services" class="block text-3xl font-bold hover:text-primary-600 transition" onclick="closeMobileMenu()">Услуги</a>
        <a href="#advantages" class="block text-3xl font-bold hover:text-primary-600 transition" onclick="closeMobileMenu()">Преимущества</a>
        <a href="tel:+375447348543" class="block text-3xl font-bold text-secondary-500">+375 (44) 734-85-43</a>
        <button onclick="openCallback(); closeMobileMenu();" class="block mx-auto bg-secondary-500 hover:bg-secondary-600 text-white text-xl px-8 py-3 rounded-full font-bold transition">Заказать звонок</button>
    </div>
</div>
