<!DOCTYPE html>
<html lang="ru">
<head>
    @include('layouts.meta')

    {{-- УДАЛИТЬ ЭТУ СТРОКУ: <script src="https://cdn.tailwindcss.com"></script> --}}

    @vite(['resources/js/app.js'])
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" preload>

    <!-- Google Fonts с оптимизацией -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">

    <!-- HLS.js с отложенной загрузкой -->
    <script src="https://cdn.jsdelivr.net/npm/hls.js@latest" defer></script>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Предзагрузка критичных ресурсов -->
    <link rel="preload" href="{{ asset('video/output.m3u8') }}" as="fetch" crossorigin>

    <style>
        /* Критические стили */
        .hero-bg { background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #334155 100%); }
        /*.glass { backdrop-filter: blur(12px); background: rgba(255,255,255,0.12); border: 1px solid rgba(255,255,255,0.2); }*/
        #callback-modal, #mobile-menu { display: none; }
        #callback-modal.show, #mobile-menu.show { display: flex; }
        #mobile-menu.show ~ .mobile-menu-overlay { display: block; }
        .hyphenate { overflow-wrap: break-word; word-wrap: break-word; -webkit-hyphens: auto; -ms-hyphens: auto; hyphens: auto; }
        .phone-input.valid { border-color: #10b981; background-color: #f0fdf4; }
        .phone-input.invalid { border-color: #ef4444; background-color: #fef2f2; }
        .validation-message { display: none; }
        .validation-message.show { display: block; }

        /* Оптимизация анимаций */
        @media (prefers-reduced-motion: no-preference) {
            .pulse-slow { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .7; } }

        /* Оверлей для мобильного меню */
        .mobile-menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 49;
            display: none;
        }
    </style>

    @yield('styles')
</head>
<body class="bg-gray-50 text-gray-800 overflow-x-hidden">
<!-- Запасные стили для шрифтов -->
<noscript>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
</noscript>

@include('partials.header')

<main>
    @yield('content')
</main>

@include('partials.footer')
@include('partials.callback-modal')

<!-- Плавающая кнопка -->
<button onclick="openCallback()"
        class="fixed bottom-6 right-6 md:bottom-8 md:right-8 bg-gradient-to-r from-secondary-500 to-secondary-600 text-white rounded-full p-3 md:p-4 lg:p-5 shadow-xl md:shadow-2xl z-40 hover:shadow-2xl md:hover:shadow-3xl transform hover:scale-110 transition pulse-slow"
        aria-label="Заказать звонок"
        id="floating-callback-btn">
    <svg class="w-5 h-5 md:w-6 md:h-6 lg:w-7 lg:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
    </svg>
    <span class="sr-only">Заказать звонок</span>
</button>

<!-- Оверлей для мобильного меню -->
<div class="mobile-menu-overlay" id="mobile-overlay" onclick="closeMobileMenu()"></div>

<script>
    // CSRF токен для AJAX запросов
    window.csrfToken = "{{ csrf_token() }}";

    // Объект состояния приложения
    const AppState = {
        isMobileMenuOpen: false,
        isCallbackModalOpen: false
    };

    // Mobile menu
    const mobileMenu = document.getElementById('mobile-menu');
    const mobileOverlay = document.getElementById('mobile-overlay');

    function openMobileMenu() {
        if (!mobileMenu || !mobileOverlay) return;
        mobileMenu.classList.add('show');
        mobileOverlay.style.display = 'block';
        document.body.style.overflow = 'hidden';
        AppState.isMobileMenuOpen = true;
    }

    function closeMobileMenu() {
        if (!mobileMenu || !mobileOverlay) return;
        mobileMenu.classList.remove('show');
        mobileOverlay.style.display = 'none';
        document.body.style.overflow = '';
        AppState.isMobileMenuOpen = false;
    }

    // Callback modal
    const callbackModal = document.getElementById('callback-modal');

    function openCallback() {
        if (!callbackModal) return;
        callbackModal.classList.add('show');
        document.body.style.overflow = 'hidden';
        AppState.isCallbackModalOpen = true;

        // Фокус на первое поле формы
        const firstInput = callbackModal.querySelector('input');
        if (firstInput) setTimeout(() => firstInput.focus(), 100);
    }

    function closeCallback() {
        if (!callbackModal) return;
        callbackModal.classList.remove('show');
        document.body.style.overflow = '';
        AppState.isCallbackModalOpen = false;
    }

    // Функция уведомлений
    function showNotification(message, type = 'info') {
        // Удаляем старые уведомления
        document.querySelectorAll('.custom-notification').forEach(el => el.remove());

        const notification = document.createElement('div');
        notification.className = `custom-notification fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-xl transform transition-all duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' : 'bg-blue-500 text-white'
        }`;
        notification.textContent = message;
        notification.style.top = '20px';
        notification.style.right = '20px';
        notification.style.opacity = '0';
        notification.style.transform = 'translateX(100%)';

        document.body.appendChild(notification);

        // Анимация появления
        setTimeout(() => {
            notification.style.opacity = '1';
            notification.style.transform = 'translateX(0)';
        }, 10);

        // Автоматическое скрытие через 5 секунд
        setTimeout(() => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        }, 5000);

        // Закрытие по клику
        notification.addEventListener('click', () => {
            notification.style.opacity = '0';
            notification.style.transform = 'translateX(100%)';
            setTimeout(() => {
                if (notification.parentNode) {
                    notification.parentNode.removeChild(notification);
                }
            }, 300);
        });
    }

    // Упрощенная маска для телефона (без мешающего форматирования)
    function initPhoneInput() {
        const phoneInput = document.getElementById('phone-input');
        if (!phoneInput) return;

        // Убираем старые обработчики
        const newPhoneInput = phoneInput.cloneNode(true);
        phoneInput.parentNode.replaceChild(newPhoneInput, phoneInput);

        // Простая валидация при вводе
        newPhoneInput.addEventListener('input', function(e) {
            const value = e.target.value;
            const digits = value.replace(/\D/g, '');

            // Простая валидация - минимум 10 цифр
            if (digits.length >= 10) {
                e.target.classList.add('border-green-500');
                e.target.classList.remove('border-red-500');
            } else if (value.length > 0) {
                e.target.classList.add('border-red-500');
                e.target.classList.remove('border-green-500');
            } else {
                e.target.classList.remove('border-green-500', 'border-red-500');
            }
        });

        // Автодобавление + если начинается с цифры
        newPhoneInput.addEventListener('blur', function(e) {
            let value = e.target.value.trim();
            if (value && !value.startsWith('+') && /^\d/.test(value)) {
                // Если номер начинается с 8 (Россия/Беларусь)
                if (value.startsWith('8')) {
                    e.target.value = '+7' + value.substring(1);
                } else {
                    e.target.value = '+' + value;
                }
            }
        });

        // Разрешаем ввод любых символов, но показываем подсказку
        newPhoneInput.setAttribute('title', 'Введите номер телефона. Пример: +375291234567 или 80291234567');

        console.log('📱 Поле телефона инициализировано');
    }

    // AJAX отправка формы
    // AJAX отправка формы
    function initFormHandler() {
        const form = document.getElementById('callback-form');
        if (!form) {
            console.error('❌ Форма не найдена');
            return;
        }

        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            e.stopPropagation();

            console.log('🚀 Форма отправляется...');

            const submitBtn = document.getElementById('submit-btn');
            if (!submitBtn) {
                console.error('❌ Кнопка отправки не найдена');
                return;
            }

            const phoneInput = document.getElementById('phone-input');
            const nameInput = form.querySelector('input[name="name"]');

            if (!phoneInput || !nameInput) {
                console.error('❌ Поля формы не найдены');
                return;
            }

            // Базовая валидация
            const name = nameInput.value.trim();
            const phone = phoneInput.value.trim();

            if (!name) {
                showNotification('Пожалуйста, введите ваше имя', 'error');
                nameInput.focus();
                return;
            }

            if (!phone) {
                showNotification('Пожалуйста, введите номер телефона', 'error');
                phoneInput.focus();
                return;
            }

            // Валидация телефона (только цифры)
            const phoneDigits = phone.replace(/\D/g, '');
            if (phoneDigits.length < 10) {
                showNotification('Введите корректный номер телефона (минимум 10 цифр)', 'error');
                phoneInput.focus();
                return;
            }

            // Показываем загрузку
            const originalText = submitBtn.textContent;
            submitBtn.disabled = true;
            submitBtn.textContent = 'Отправка...';
            submitBtn.classList.add('opacity-70');

            try {
                // Подготавливаем данные (используем URLSearchParams для простоты)
                const params = new URLSearchParams();
                params.append('_token', window.csrfToken);
                params.append('name', name);

                // Нормализуем телефон
                let normalizedPhone = phone;
                if (phone.startsWith('8') && phoneDigits.length === 11) {
                    // Белорусский номер 8029... -> +37529...
                    normalizedPhone = '+375' + phoneDigits.substring(2);
                } else if (!phone.startsWith('+') && phoneDigits.length >= 10) {
                    // Добавляем + если его нет
                    normalizedPhone = '+' + phoneDigits;
                }
                params.append('phone', normalizedPhone);
                params.append('page', window.location.href);
                params.append('antispam', ''); // Honeypot поле

                // Получаем UTM параметры из localStorage
                const utmParams = localStorage.getItem('utm_params') ? JSON.parse(localStorage.getItem('utm_params')) : {};
                Object.entries(utmParams).forEach(([key, value]) => {
                    params.append(key, value);
                });

                console.log('📤 Отправляемые данные:');
                console.log('  Имя:', name);
                console.log('  Телефон:', normalizedPhone);
                console.log('  Страница:', window.location.href);
                console.log('  UTM параметры:', utmParams);
                console.log('  CSRF Token:', window.csrfToken ? 'есть' : 'нет');
                console.log('  URL запроса:', '{{ route("callback.submit") }}');

                // Отправляем запрос
                const response = await fetch('{{ route("callback.submit") }}', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': window.csrfToken,
                        'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8'
                    },
                    body: params.toString(),
                    credentials: 'same-origin'
                });

                console.log('📥 Статус ответа:', response.status, response.statusText);

                // Читаем ответ
                const responseText = await response.text();
                console.log('📥 Текст ответа:', responseText);

                let data;
                try {
                    data = JSON.parse(responseText);
                } catch (parseError) {
                    console.error('❌ Ошибка парсинга JSON:', parseError);
                    console.error('❌ Сырой ответ:', responseText);
                    throw new Error('Неверный формат ответа от сервера');
                }

                console.log('📊 Данные ответа:', data);

                if (response.ok && data.success) {
                    // Успешная отправка
                    showNotification(data.message || '✅ Заявка отправлена! Мы свяжемся с вами в ближайшее время.', 'success');

                    // 🔥 ОТПРАВКА СОБЫТИЙ В АНАЛИТИКУ
                    try {
                        // Google Analytics 4
                        if (typeof gtag !== 'undefined') {
                            gtag('event', 'callback_request', {
                                'event_category': 'Lead',
                                'event_label': 'Callback Form',
                                'value': 1,
                                'callback_id': data.callback_id,
                                'service': document.querySelector('input[name="service"]')?.value || 'unknown',
                                'page_path': window.location.pathname,
                                'page_title': document.title,
                                ...utmParams // Добавляем UTM параметры
                            });
                            console.log('📊 Google Analytics: событие отправлено');
                        } else {
                            console.warn('⚠️ Google Analytics не загружен');
                        }

                        // Яндекс Метрика
                        if (typeof ym !== 'undefined' && window.YM_COUNTER_ID) {
                            // Цель "Заявка на звонок"
                            ym(window.YM_COUNTER_ID, 'reachGoal', 'callback_request', {
                                callback_id: data.callback_id,
                                service: document.querySelector('input[name="service"]')?.value || 'unknown',
                                ...utmParams
                            });

                            // Альтернативная цель
                            // ym(window.YM_COUNTER_ID, 'reachGoal', 'form_submit');

                            console.log('📊 Яндекс Метрика: цели отправлены');
                        } else {
                            console.warn('⚠️ Яндекс Метрика не загружена');
                        }

                        // Facebook Pixel (если есть)
                        if (typeof fbq !== 'undefined') {
                            fbq('track', 'Lead', {
                                value: 1,
                                currency: 'BYN',
                                callback_id: data.callback_id,
                                content_name: document.title
                            });
                        }

                        // VK Pixel (если есть)
                        if (typeof VK !== 'undefined') {
                            VK.Goal('lead', {
                                callback_id: data.callback_id
                            });
                        }

                    } catch (analyticsError) {
                        console.error('❌ Ошибка отправки в аналитику:', analyticsError);
                    }

                    // Очищаем форму и закрываем модалку через 1.5 секунды
                    setTimeout(() => {
                        form.reset();
                        closeCallback();
                    }, 1500);

                } else {
                    // Ошибка от сервера
                    console.error('❌ Ошибка сервера:', data);

                    let errorMessage = data.message || 'Ошибка отправки формы';

                    // Если есть ошибки валидации
                    if (data.errors) {
                        const firstError = Object.values(data.errors)[0];
                        if (firstError && firstError[0]) {
                            errorMessage = firstError[0];
                        }
                    }

                    throw new Error(errorMessage);
                }

            } catch (error) {
                console.error('❌ Ошибка при отправке формы:', error);

                // Детальная диагностика
                if (error.name === 'TypeError' && error.message.includes('fetch')) {
                    showNotification('🌐 Нет соединения с сервером. Проверьте интернет подключение.', 'error');
                } else if (error.message.includes('network') || error.message.includes('Network')) {
                    showNotification('🔌 Сетевая ошибка. Пожалуйста, попробуйте позже.', 'error');
                } else if (error.message.includes('Failed to fetch')) {
                    showNotification('🔗 Не удалось подключиться к серверу. Проверьте соединение.', 'error');
                } else {
                    showNotification('❌ Ошибка: ' + error.message, 'error');
                }

            } finally {
                // Восстанавливаем кнопку
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
                submitBtn.classList.remove('opacity-70');
            }
        });

        console.log('✅ Обработчик формы инициализирован');
    }


    // Тестовая функция для отладки
    {{--function initTestButton() {--}}
    {{--    // Добавляем кнопку для теста (только в development)--}}
    {{--    if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {--}}
    {{--        const testBtn = document.createElement('button');--}}
    {{--        testBtn.textContent = '🧪 Тест формы';--}}
    {{--        testBtn.className = 'fixed bottom-32 right-6 bg-gray-800 text-white p-2 rounded text-xs z-50 shadow-lg';--}}
    {{--        testBtn.onclick = async function() {--}}
    {{--            const testData = {--}}
    {{--                name: 'Тестовый пользователь',--}}
    {{--                phone: '+375291234567',--}}
    {{--                page: window.location.href,--}}
    {{--                _token: window.csrfToken,--}}
    {{--                antispam: ''--}}
    {{--            };--}}

    {{--            console.log('🧪 Тестовая отправка:', testData);--}}

    {{--            try {--}}
    {{--                const response = await fetch('{{ route("callback.submit") }}', {--}}
    {{--                    method: 'POST',--}}
    {{--                    headers: {--}}
    {{--                        'X-Requested-With': 'XMLHttpRequest',--}}
    {{--                        'Accept': 'application/json',--}}
    {{--                        'Content-Type': 'application/json',--}}
    {{--                        'X-CSRF-TOKEN': window.csrfToken--}}
    {{--                    },--}}
    {{--                    body: JSON.stringify(testData)--}}
    {{--                });--}}

    {{--                console.log('🧪 Статус:', response.status);--}}
    {{--                const data = await response.json();--}}
    {{--                console.log('🧪 Ответ:', data);--}}

    {{--                showNotification('🧪 Тест: ' + (data.success ? '✅ Успешно!' : '❌ ' + data.message),--}}
    {{--                    data.success ? 'success' : 'error');--}}
    {{--            } catch (error) {--}}
    {{--                console.error('🧪 Ошибка теста:', error);--}}
    {{--                showNotification('🧪 Тест провален: ' + error.message, 'error');--}}
    {{--            }--}}
    {{--        };--}}
    {{--        document.body.appendChild(testBtn);--}}

    {{--        // Добавляем кнопку для ручного ввода--}}
    {{--        const manualBtn = document.createElement('button');--}}
    {{--        manualBtn.textContent = '📝 Ввод данных';--}}
    {{--        manualBtn.className = 'fixed bottom-44 right-6 bg-blue-600 text-white p-2 rounded text-xs z-50 shadow-lg';--}}
    {{--        manualBtn.onclick = function() {--}}
    {{--            const name = prompt('Введите имя:', 'Тестовый пользователь');--}}
    {{--            const phone = prompt('Введите телефон:', '+375291234567');--}}
    {{--            if (name && phone) {--}}
    {{--                const phoneInput = document.getElementById('phone-input');--}}
    {{--                const nameInput = document.querySelector('input[name="name"]');--}}
    {{--                if (phoneInput && nameInput) {--}}
    {{--                    phoneInput.value = phone;--}}
    {{--                    nameInput.value = name;--}}
    {{--                    showNotification('✅ Данные введены в форму', 'success');--}}
    {{--                }--}}
    {{--            }--}}
    {{--        };--}}
    {{--        document.body.appendChild(manualBtn);--}}
    {{--    }--}}
    {{--}--}}


    // Обработчики событий
    document.addEventListener('DOMContentLoaded', function() {
        console.log('📄 DOM загружен, инициализация...');
        console.log('🔑 CSRF Token:', window.csrfToken ? 'есть' : 'отсутствует');

        // Мобильное меню
        document.getElementById('mobile-btn')?.addEventListener('click', openMobileMenu);
        document.getElementById('mobile-close')?.addEventListener('click', closeMobileMenu);
        mobileOverlay?.addEventListener('click', closeMobileMenu);

        // Callback modal
        callbackModal?.addEventListener('click', function(event) {
            if (event.target === callbackModal) closeCallback();
        });

        // Video HLS
        const video = document.getElementById('hero-video');
        if (video && typeof Hls !== 'undefined' && Hls.isSupported()) {
            const hls = new Hls();
            hls.loadSource('{{ asset("video/output.m3u8") }}');
            hls.attachMedia(video);

            video.addEventListener('loadedmetadata', function() {
                video.play().catch(e => console.log('Автовоспроизведение заблокировано:', e));
            });
        }

        // Инициализация поля телефона (упрощенная версия)
        initPhoneInput();

        // Инициализация обработчика формы
        initFormHandler();


        // Быстрый тест подключения
        setTimeout(() => {
            console.log('🔍 Проверка формы...');
            const form = document.getElementById('callback-form');
            const phoneInput = document.getElementById('phone-input');
            const nameInput = form?.querySelector('input[name="name"]');

            console.log('  Форма найдена:', !!form);
            console.log('  Поле телефона:', phoneInput ? `найдено (значение: "${phoneInput.value}")` : 'не найдено');
            console.log('  Поле имени:', nameInput ? `найдено (значение: "${nameInput.value}")` : 'не найдено');

            // Автозаполнение для теста
            if (phoneInput && !phoneInput.value && window.location.hostname.includes('localhost')) {
                phoneInput.value = '+375291234567';
                console.log('  📱 Тестовый телефон добавлен');
            }
            if (nameInput && !nameInput.value && window.location.hostname.includes('localhost')) {
                nameInput.value = 'Тестовый пользователь';
                console.log('  👤 Тестовое имя добавлено');
            }
        }, 500);

        // Отложенная загрузка
        if ('requestIdleCallback' in window) {
            requestIdleCallback(() => {
                console.log('💤 Загрузка отложенных ресурсов...');
            });
        }
    });

    // Закрытие по Escape
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            if (AppState.isCallbackModalOpen) closeCallback();
            if (AppState.isMobileMenuOpen) closeMobileMenu();
        }
    });

    // Оптимизация производительности при скролле
    let scrollTimeout;
    window.addEventListener('scroll', function() {
        const btn = document.getElementById('floating-callback-btn');
        if (!btn) return;

        btn.style.transform = 'translateY(10px)';
        btn.style.opacity = '0.8';

        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            btn.style.transform = '';
            btn.style.opacity = '';
        }, 100);
    }, { passive: true });
</script>

@yield('scripts')


<!-- Яндекс Метрика -->
<script type="text/javascript" >
    (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
    (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

    ym(39907965, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        // Добавляем дебаг информацию
        triggerEvent: true
    });

    // Отладочная информация
    console.log('✅ Яндекс Метрика инициализирована, счетчик 39907965');
</script>

<!-- Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-29WCNVETJ4"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-29WCNVETJ4');
    console.log('✅ Google Analytics инициализирован');
</script>

<!-- Наши глобальные переменные -->
<script>
    window.YM_COUNTER_ID = 39907965;
    window.YM_LOADED = false;

    // Функция проверки загрузки Яндекс Метрики
    function checkYM() {
        if (typeof ym !== 'undefined' && typeof ym.a !== 'undefined') {
            window.YM_LOADED = true;
            console.log('✅ Яндекс Метрика полностью готова к работе');
        } else {
            setTimeout(checkYM, 100);
        }
    }
    setTimeout(checkYM, 500);
</script>


</body>
</html>
