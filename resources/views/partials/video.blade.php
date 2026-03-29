<!-- Видео -->
<section class="py-16 md:py-24 bg-gradient-to-b from-gray-100 to-gray-200">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12 md:mb-16">
            <h2 class="text-2xl md:text-3xl lg:text-4xl font-black mb-3 md:mb-4 hyphenate">
                Как мы ремонтируем гидротрансформаторы
            </h2>
            <div class="w-24 md:w-32 h-1.5 bg-secondary-500 mx-auto rounded-full"></div>
        </div>
        <div class="max-w-4xl 2xl:max-w-6xl mx-auto rounded-xl md:rounded-2xl lg:rounded-3xl overflow-hidden shadow-xl md:shadow-2xl lg:shadow-3xl">
            <video id="hero-video" class="w-full aspect-video video-player"
                   muted
                   playsinline
                   loop
                   controls
                   preload="metadata"
                   poster="{{ asset('video/preview.jpg') }}"
                   aria-label="Видео процесса ремонта гидротрансформатора"
                   data-video-id="repair-process">
                <source src="{{ asset('video/output.m3u8') }}" type="application/x-mpegURL">
{{--                <source src="{{ asset('video/output.mp4') }}" type="video/mp4">--}}
{{--                Ваш браузер не поддерживает воспроизведение видео.--}}
{{--                <a href="{{ asset('video/output.mp4') }}" class="text-accent-500 underline">Скачайте видео по ссылке</a>--}}
{{--                или посмотрите на нашем--}}
{{--                <a href="https://www.youtube.com/channel/..." class="text-accent-500 underline">YouTube канале</a>.--}}
            </video>
        </div>
        <div class="mt-8 md:mt-12 text-center max-w-3xl mx-auto">
            <p class="text-lg md:text-xl text-gray-700">
                Процесс ремонта гидротрансформатора включает полную разборку, диагностику, замену изношенных деталей и точную балансировку на современном оборудовании.
            </p>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const video = document.getElementById('hero-video');
        const videoId = video.dataset.videoId;
        const storageKey = `video_${videoId}_position`;

        // Сохраняем позицию при уходе со страницы
        window.addEventListener('beforeunload', function() {
            if (!video.paused) {
                localStorage.setItem(storageKey, video.currentTime.toString());
            }
        });

        // Сохраняем позицию при паузе
        video.addEventListener('pause', function() {
            localStorage.setItem(storageKey, video.currentTime.toString());
        });

        // Восстанавливаем позицию при загрузке страницы
        const savedPosition = localStorage.getItem(storageKey);
        if (savedPosition) {
            // Ждем, пока видео загрузит достаточно данных
            video.addEventListener('loadedmetadata', function() {
                const time = parseFloat(savedPosition);
                if (time < video.duration) {
                    video.currentTime = time;
                }

                // Автовоспроизведение с сохраненной позиции
                const playPromise = video.play();
                if (playPromise !== undefined) {
                    playPromise.then(() => {
                        console.log('Автовоспроизведение начато с сохраненной позиции');
                    }).catch(error => {
                        console.log('Автовоспроизведение заблокировано, ждем взаимодействия пользователя');
                        // Добавляем кнопку для ручного воспроизведения
                        addPlayButton();
                    });
                }
            });
        }

        // Сохраняем позицию каждые 5 секунд во время воспроизведения
        video.addEventListener('timeupdate', function() {
            if (!video.paused) {
                // Сохраняем каждые 5 секунд
                const currentTime = Math.floor(video.currentTime);
                if (currentTime % 5 === 0) {
                    localStorage.setItem(storageKey, video.currentTime.toString());
                }
            }
        });

        // Функция для добавления кнопки воспроизведения
        function addPlayButton() {
            const container = video.parentElement;
            const playBtn = document.createElement('button');
            playBtn.className = 'absolute inset-0 flex items-center justify-center bg-black/20 hover:bg-black/30 transition-colors z-10';
            playBtn.innerHTML = `
            <div class="bg-white/90 rounded-full p-4 md:p-6 shadow-lg hover:scale-110 transition-transform">
                <svg class="w-8 h-8 md:w-12 md:h-12 text-primary-600" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
        `;
            playBtn.addEventListener('click', function() {
                video.play();
                this.remove();
            });
            container.style.position = 'relative';
            container.appendChild(playBtn);
        }

        // Очистка сохраненной позиции при завершении видео
        video.addEventListener('ended', function() {
            localStorage.removeItem(storageKey);
        });
    });

    // Для Single Page Applications (SPA) - сохранение при переходе
    if (typeof window.history !== 'undefined') {
        const originalPushState = window.history.pushState;
        const originalReplaceState = window.history.replaceState;

        window.history.pushState = function(state, title, url) {
            const video = document.getElementById('hero-video');
            if (video) {
                localStorage.setItem(`video_${video.dataset.videoId}_position`, video.currentTime.toString());
            }
            return originalPushState.apply(window.history, arguments);
        };

        window.history.replaceState = function(state, title, url) {
            const video = document.getElementById('hero-video');
            if (video) {
                localStorage.setItem(`video_${video.dataset.videoId}_position`, video.currentTime.toString());
            }
            return originalReplaceState.apply(window.history, arguments);
        };

        // Сохраняем при нажатии кнопок навигации
        window.addEventListener('popstate', function() {
            const video = document.getElementById('hero-video');
            if (video) {
                localStorage.setItem(`video_${video.dataset.videoId}_position`, video.currentTime.toString());
            }
        });
    }
</script>

<style>
    .video-player {
        /* Улучшенное отображение контролов */
        &::-webkit-media-controls-panel {
            background: linear-gradient(to top, rgba(0,0,0,0.7) 0%, transparent 100%);
        }

        &::-webkit-media-controls-play-button,
        &::-webkit-media-controls-volume-slider,
        &::-webkit-media-controls-mute-button {
            filter: brightness(1.5);
        }
    }

    /* Стили для состояния загрузки */
    .video-player:not([src]) {
        background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
        background-size: 200% 100%;
        animation: loading 1.5s infinite;
    }

    @keyframes loading {
        0% { background-position: 200% 0; }
        100% { background-position: -200% 0; }
    }

    /* Адаптивные стили */
    @media (max-width: 768px) {
        .video-player {
            max-height: 50vh;
        }
    }
</style>
