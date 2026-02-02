<script>
    const bannerConfig = {
        title: "Не верь на слово — смотри!",
        subtitle: "Полный ремонт гидротрансформатора от и до",
        image: "/img/gdt.jpg",
        button: "/remont-gidrotransformatorov#hero-video"
    };
</script>

<div
    x-data="banner"
    x-show="show"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 scale-95"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-95"
    class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/50 backdrop-blur-sm min-h-screen"
    x-cloak
    style="display: none;"
    role="dialog"
    aria-modal="true"
    aria-labelledby="banner-title"
>
    <div class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl overflow-hidden transform-gpu">

        <!-- Кнопка закрытия -->
        <button
            @click="close"
            class="absolute top-4 right-4 z-20 bg-white/90 hover:bg-white backdrop-blur-md text-gray-500 hover:text-gray-700 rounded-full p-2.5 transition-all duration-200 shadow-lg hover:shadow-xl min-w-[44px] min-h-[44px] flex items-center justify-center"
            aria-label="Закрыть баннер"
        >
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>

        <!-- Изображение -->
        <div class="relative h-48 md:h-56 overflow-hidden">
            <img
                :src="config.image"
                alt="Ремонт гидротрансформатора"
                class="w-full h-full object-cover transition-transform duration-700 hover:scale-105"
            >
            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/40 via-transparent to-transparent"></div>
        </div>

        <!-- Контент -->
        <div class="p-6 md:p-8 text-center space-y-5">
            <!-- Заголовок -->
            <h2
                id="banner-title"
                class="text-xl md:text-2xl font-bold text-gray-800 leading-tight"
                x-text="config.title"
            ></h2>

            <!-- Подзаголовок -->
            <p
                class="text-gray-600 text-base md:text-lg"
                x-text="config.subtitle"
            ></p>

            <!-- Кнопка действия -->
            <button
                @click="redirect"
                class="w-full bg-secondary-500 hover:bg-secondary-600 text-white font-bold py-3.5 px-6 rounded-xl transition-all duration-300 shadow-lg hover:shadow-2xl transform hover:-translate-y-0.5 flex items-center justify-center gap-2 text-base group"
            >
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"/>
                </svg>
                <span>Смотреть видео</span>
                <svg class="w-5 h-5 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('banner', () => ({
            config: bannerConfig,
            show: false,

            init() {
                // Проверка URL
                const currentPath = window.location.pathname;
                const targetPath = this.config.button.split('#')[0];

                // Не показываем на целевой странице
                if (currentPath === targetPath) return;

                // Проверяем, закрывался ли баннер ранее
                if (!this.wasClosed()) {
                    setTimeout(() => this.show = true, 7000);
                    setTimeout(() => this.autoClose(), 28000);
                }
            },

            wasClosed() {
                return localStorage.getItem('tukan_banner_closed') === 'true';
            },

            close() {
                this.show = false;
                localStorage.setItem('tukan_banner_closed', 'true');
            },

            autoClose() {
                if (this.show) this.close();
            },

            redirect() {
                this.show = false;
                localStorage.setItem('tukan_banner_closed', 'true');
                window.location.href = this.config.button;
            }
        }));
    });
</script>
