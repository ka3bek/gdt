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
            <video id="hero-video" class="w-full aspect-video"
                   autoplay
                   muted
                   playsinline
                   loop
                   controls
                   preload="auto"
                   poster="{{ asset('video/preview.jpg') }}"
                   aria-label="Видео процесса ремонта гидротрансформатора">
                <source src="{{ asset('video/output.m3u8') }}" type="application/x-mpegURL">
                <source src="{{ asset('video/output.mp4') }}" type="video/mp4">
                Ваш браузер не поддерживает воспроизведение видео.
                <a href="{{ asset('video/output.mp4') }}" class="text-accent-500 underline">Скачайте видео по ссылке</a>
                или посмотрите на нашем
                <a href="https://www.youtube.com/channel/..." class="text-accent-500 underline">YouTube канале</a>.
            </video>
        </div>
        <div class="mt-8 md:mt-12 text-center max-w-3xl mx-auto">
            <p class="text-lg md:text-xl text-gray-700">
                Процесс ремонта гидротрансформатора включает полную разборку, диагностику, замену изношенных деталей и точную балансировку на современном оборудовании.
            </p>
        </div>
    </div>
</section>
