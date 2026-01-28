// Общие функции для всего приложения
class App {
    constructor() {
        this.init();
    }

    init() {
        this.initMobileMenu();
        this.initVideo();
        this.initCallbacks();
        this.initForms();
        this.initScroll();
        this.initModals();
    }

    // Мобильное меню
    initMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileBtn = document.getElementById('mobile-btn');
        const mobileClose = document.getElementById('mobile-close');

        if (mobileBtn) {
            mobileBtn.addEventListener('click', () => this.openMobileMenu());
        }

        if (mobileClose) {
            mobileClose.addEventListener('click', () => this.closeMobileMenu());
        }

        // Закрытие по клику вне меню
        document.addEventListener('click', (e) => {
            if (mobileMenu && mobileMenu.classList.contains('show') && 
                !mobileMenu.contains(e.target) && 
                !mobileBtn.contains(e.target)) {
                this.closeMobileMenu();
            }
        });
    }

    openMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    }

    closeMobileMenu() {
        const mobileMenu = document.getElementById('mobile-menu');
        if (mobileMenu) {
            mobileMenu.classList.remove('show');
            document.body.style.overflow = '';
        }
    }

    // Видео HLS
    initVideo() {
        const video = document.getElementById('hero-video');
        if (video && Hls && Hls.isSupported()) {
            const hls = new Hls();
            hls.loadSource(video.dataset.src || '{{ asset("video/output.m3u8") }}');
            hls.attachMedia(video);
        }
    }

    // Модальные окна
    initModals() {
        // Callback modal
        window.openCallback = () => {
            const callbackModal = document.getElementById('callback-modal');
            if (callbackModal) {
                callbackModal.classList.add('show');
                document.body.style.overflow = 'hidden';

                // Фокус на поле имени
                setTimeout(() => {
                    const nameInput = callbackModal.querySelector('input[name="name"]');
                    if (nameInput) nameInput.focus();
                }, 300);
            }
        };

        window.closeCallback = () => {
            const callbackModal = document.getElementById('callback-modal');
            if (callbackModal) {
                callbackModal.classList.remove('show');
                document.body.style.overflow = '';
            }
        };

        // Закрытие по клику на оверлей
        document.addEventListener('click', (e) => {
            const callbackModal = document.getElementById('callback-modal');
            if (callbackModal && callbackModal.classList.contains('show') && 
                e.target === callbackModal) {
                this.closeCallback();
            }
        });
    }

    // Формы
    initForms() {
        const form = document.getElementById('callback-form');
        if (form) {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                await this.submitCallbackForm(form);
            });
        }

        // Инициализация других форм
        document.querySelectorAll('form[data-ajax]').forEach(form => {
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                await this.submitAjaxForm(form);
            });
        });
    }

    async submitCallbackForm(form) {
        const submitBtn = document.getElementById('submit-btn');
        const originalText = submitBtn?.textContent || 'Отправить';

        // Показываем загрузку
        if (submitBtn) {
            submitBtn.disabled = true;
            submitBtn.innerHTML = '<span class="inline-block animate-spin mr-2">⟳</span> Отправка...';
        }

        try {
            const formData = new FormData(form);
            const response = await fetch(form.action || '{{ route("callback.submit") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': window.csrfToken || document.querySelector('meta[name="csrf-token"]')?.content,
                    'Accept': 'application/json'
                },
                body: formData
            });

            const data = await response.json();

            if (data.success) {
                this.showNotification(data.message || 'Заявка отправлена успешно!', 'success');
                form.reset();
                setTimeout(() => window.closeCallback?.(), 1500);
            } else {
                throw new Error(data.message || 'Ошибка отправки формы');
            }
        } catch (error) {
            this.showNotification('Ошибка: ' + error.message, 'error');
            console.error('Form submission error:', error);
        } finally {
            if (submitBtn) {
                submitBtn.disabled = false;
                submitBtn.textContent = originalText;
            }
        }
    }

    async submitAjaxForm(form) {
        // Аналогичная логика для других форм
    }

    // Уведомления
    showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 px-6 py-4 rounded-lg shadow-lg transform transition-all duration-300 ${
            type === 'success' ? 'bg-green-500 text-white' :
            type === 'error' ? 'bg-red-500 text-white' :
            'bg-blue-500 text-white'
        }`;
        notification.textContent = message;
        notification.style.transform = 'translateX(400px)';
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.style.transform = 'translateX(0)';
        }, 10);

        setTimeout(() => {
            notification.style.transform = 'translateX(400px)';
            setTimeout(() => notification.remove(), 300);
        }, 5000);
    }

    // Плавный скролл
    initScroll() {
        // Плавный скролл до якорей
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            if (anchor.getAttribute('href') !== '#') {
                anchor.addEventListener('click', (e) => {
                    e.preventDefault();
                    const targetId = anchor.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    
                    if (targetElement) {
                        // Закрываем мобильное меню если открыто
                        this.closeMobileMenu();
                        
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            }
        });

        // Кнопка "Наверх"
        const scrollTopBtn = document.getElementById('scroll-top');
        if (scrollTopBtn) {
            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    scrollTopBtn.classList.add('show');
                } else {
                    scrollTopBtn.classList.remove('show');
                }
            });

            scrollTopBtn.addEventListener('click', () => {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }
    }

    // Callbacks
    initCallbacks() {
        // Обработчики для кнопок
        document.addEventListener('click', (e) => {
            if (e.target.matches('[data-callback]') || e.target.closest('[data-callback]')) {
                window.openCallback?.();
            }
            
            if (e.target.matches('[data-close]') || e.target.closest('[data-close]')) {
                const target = e.target.closest('[data-close]');
                const modalId = target.dataset.close;
                if (modalId) {
                    const modal = document.getElementById(modalId);
                    if (modal) modal.classList.remove('show');
                    document.body.style.overflow = '';
                }
            }
        });

        // Закрытие по Escape
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                window.closeCallback?.();
                this.closeMobileMenu();
                
                // Закрытие других модалок
                document.querySelectorAll('.modal.show').forEach(modal => {
                    modal.classList.remove('show');
                });
                document.body.style.overflow = '';
            }
        });
    }
}

// Инициализация при загрузке
document.addEventListener('DOMContentLoaded', () => {
    window.app = new App();
    
    // Для обратной совместимости
    window.openCallback = () => window.app?.openCallback?.();
    window.closeCallback = () => window.app?.closeCallback?.();
    window.openMobileMenu = () => window.app?.openMobileMenu?.();
    window.closeMobileMenu = () => window.app?.closeMobileMenu?.();
});
