<header class="fixed top-0 left-0 right-0 z-50 bg-white/95 border-b border-gray-200 shadow-lg">
    <div class="container mx-auto px-6 py-4">
        <nav class="flex items-center justify-between">
            <a href="/" class="flex items-center group">
                <img src="{{ asset('favicon.svg') }}" alt="Ремонт гидротрансформатора АКПП Минск - ЧТУП Гидротрансформатор" class="h-12 md:h-18">
                <div class="ml-4 hidden md:block">
                    <div class="text-xl font-black text-gray-900 leading-tight">Гидротрансформатор</div>
                    <div class="text-sm text-gray-600">Ремонт гидротрансформаторов АКПП</div>
                </div>
            </a>
            <div class="hidden lg:flex items-center space-x-10">
                <a href="/about" class="text-gray-700 hover:text-primary-600 font-semibold transition-colors duration-200 pb-1 border-b-2 border-transparent hover:border-primary-600">О компании</a>
                <a href="/services" class="text-gray-700 hover:text-primary-600 font-semibold transition-colors duration-200 pb-1 border-b-2 border-transparent hover:border-primary-600">Услуги компании</a>
                <a href="/prices" class="text-gray-700 hover:text-primary-600 font-semibold transition-colors duration-200 pb-1 border-b-2 border-transparent hover:border-primary-600">Цены и гарантии</a>
                <a href="/contacts" class="text-gray-700 hover:text-primary-600 font-semibold transition-colors duration-200 pb-1 border-b-2 border-transparent hover:border-primary-600">Контакты</a>
                <a href="tel:+375447348543" class="hidden xl:block bg-secondary-500 hover:bg-secondary-600 text-white px-8 py-3 rounded-full font-bold shadow-lg transition-colors duration-200">+375 (44) 734-85-43</a>
            </div>
            <button id="mobile-btn" class="lg:hidden text-gray-800 relative w-8 h-8" aria-label="Открыть меню" aria-expanded="false" aria-controls="mobile-menu">
                <!-- Бургер-иконка -->
                <svg id="burger-icon" class="w-8 h-8 absolute inset-0 transition-opacity duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
                <!-- Крестик (скрыт по умолчанию) -->
                <svg id="close-icon" class="w-8 h-8 absolute inset-0 transition-opacity duration-200 opacity-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </nav>
    </div>
</header>

<!-- Mobile Menu -->
<div id="mobile-menu"
     class="fixed inset-0 bg-white z-40 hidden"
     aria-hidden="true"
     role="dialog"
     aria-modal="true"
     aria-label="Мобильное меню">
    <div class="h-full flex items-center justify-center">
        <div class="text-center space-y-8 px-6">
            <a href="/about" class="block text-3xl font-bold hover:text-primary-600 transition-colors" onclick="closeMobileMenu()">О компании</a>
            <a href="/services" class="block text-3xl font-bold hover:text-primary-600 transition-colors" onclick="closeMobileMenu()">Услуги компании</a>
            <a href="/prices" class="block text-3xl font-bold hover:text-primary-600 transition-colors" onclick="closeMobileMenu()">Цены и гарантии</a>
            <a href="/contacts" class="block text-3xl font-bold hover:text-primary-600 transition-colors" onclick="closeMobileMenu()">Контакты</a>
            <a href="tel:+375447348543" class="block text-3xl font-bold text-secondary-500 hover:text-secondary-600 transition-colors">+375 (44) 734-85-43</a>
            <button onclick="openCallback(); closeMobileMenu();" class="block mx-auto bg-secondary-500 hover:bg-secondary-600 text-white text-xl px-8 py-3 rounded-full font-bold transition-colors">Заказать звонок</button>
        </div>
    </div>
</div>

<!-- Оверлей для мобильного меню -->
<div class="mobile-menu-overlay" id="mobile-overlay" onclick="closeMobileMenu()"></div>

<!-- СКРИПТ ДЛЯ МОБИЛЬНОГО МЕНЮ -->
<script>
    // Mobile menu functions
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileOverlay = document.getElementById('mobile-overlay');
    const mobileBtn = document.getElementById('mobile-btn');
    const burgerIcon = document.getElementById('burger-icon');
    const closeIcon = document.getElementById('close-icon');

    function openMobileMenu() {
        console.log('🟢 Открываем меню...');
        if (!mobileMenu || !mobileOverlay) {
            console.error('❌ Элементы меню не найдены');
            return;
        }

        // Убираем hidden
        mobileMenu.classList.remove('hidden');

        // Показываем оверлей
        mobileOverlay.style.display = 'block';

        // Меняем иконки: скрываем бургер, показываем крестик
        burgerIcon.classList.remove('opacity-100');
        burgerIcon.classList.add('opacity-0');
        closeIcon.classList.remove('opacity-0');
        closeIcon.classList.add('opacity-100');

        // Обновляем состояние и доступность
        if (mobileBtn) mobileBtn.setAttribute('aria-expanded', 'true');
        mobileMenu.setAttribute('aria-hidden', 'false');
        document.body.style.overflow = 'hidden';

        // Обновляем состояние в AppState если он есть
        if (window.AppState) {
            window.AppState.isMobileMenuOpen = true;
        }

        // Меняем aria-label
        mobileBtn.setAttribute('aria-label', 'Закрыть меню');
    }

    function closeMobileMenu() {
        console.log('🔴 Закрываем меню...');
        if (!mobileMenu || !mobileOverlay) return;

        // Скрываем меню
        mobileMenu.classList.add('hidden');

        // Скрываем оверлей
        mobileOverlay.style.display = 'none';

        // Меняем иконки: показываем бургер, скрываем крестик
        burgerIcon.classList.remove('opacity-0');
        burgerIcon.classList.add('opacity-100');
        closeIcon.classList.remove('opacity-100');
        closeIcon.classList.add('opacity-0');

        // Обновляем состояние и доступность
        if (mobileBtn) mobileBtn.setAttribute('aria-expanded', 'false');
        mobileMenu.setAttribute('aria-hidden', 'true');
        document.body.style.overflow = '';

        // Обновляем состояние в AppState если он есть
        if (window.AppState) {
            window.AppState.isMobileMenuOpen = false;
        }

        // Меняем aria-label
        mobileBtn.setAttribute('aria-label', 'Открыть меню');
    }

    // Инициализация при загрузке DOM
    document.addEventListener('DOMContentLoaded', function() {
        console.log('🔄 Инициализация мобильного меню...');

        // Добавляем обработчики
        document.getElementById('mobile-btn')?.addEventListener('click', function(e) {
            e.stopPropagation();
            if (mobileMenu.classList.contains('hidden')) {
                openMobileMenu();
            } else {
                closeMobileMenu();
            }
        });

        // Закрытие при клике на оверлей
        mobileOverlay?.addEventListener('click', closeMobileMenu);

        // Проверка стилей оверлея
        if (mobileOverlay) {
            if (!mobileOverlay.style.cssText) {
                // Добавляем базовые стили если их нет
                mobileOverlay.style.cssText = `
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    right: 0;
                    bottom: 0;
                    background: rgba(0,0,0,0.5);
                    z-index: 39;
                `;
            }
        }
    });

    // Закрытие по Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (window.AppState?.isMobileMenuOpen) {
                closeMobileMenu();
            }
        }
    });

    // Закрытие при клике на ссылку в меню
    document.querySelectorAll('#mobile-menu a').forEach(link => {
        link.addEventListener('click', closeMobileMenu);
    });

    // Экспортируем функции в глобальную область видимости
    window.openMobileMenu = openMobileMenu;
    window.closeMobileMenu = closeMobileMenu;
</script>
