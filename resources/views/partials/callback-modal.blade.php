<!-- Модальное окно обратного звонка -->
<div id="callback-modal" class="fixed inset-0 bg-black/70 z-50 hidden items-center justify-center px-4 md:px-6">
    <div class="bg-white rounded-xl md:rounded-2xl lg:rounded-3xl shadow-2xl max-w-md md:max-w-lg w-full p-6 md:p-8 lg:p-10 relative animate-float" onclick="event.stopPropagation()">
        <button onclick="closeCallback()" class="absolute top-3 right-3 md:top-4 md:right-4 lg:top-6 lg:right-6 text-gray-500 hover:text-gray-800" aria-label="Закрыть">
            <svg class="w-6 h-6 md:w-8 md:h-8 lg:w-10 lg:h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <!-- SEO: Заголовок с ключевым словом -->
        <h3 class="text-xl md:text-2xl lg:text-3xl font-black mb-6 md:mb-8 text-center hyphenate">
            Заявка на ремонт гидротрансформатора
        </h3>

        <!-- УДАЛИТЕ action и method - оставьте только id -->
        <form id="callback-form" novalidate>
            @csrf
            <!-- Скрытое поле для защиты от спама -->
            <input type="hidden" name="antispam" value="" class="antispam">

            <input type="text" name="name" placeholder="Ваше имя" required
                   class="w-full px-4 md:px-5 lg:px-6 py-3 md:py-4 lg:py-5 mb-4 md:mb-5 lg:mb-6 rounded-lg md:rounded-xl lg:rounded-2xl border-2 border-gray-300 focus:border-secondary-500 focus:outline-none text-base md:text-lg">

            <div class="relative mb-6 md:mb-8 lg:mb-10">
                <input type="tel"
                       name="phone"
                       id="phone-input"
                       placeholder="+375 (29) 123-45-67"
                       required
                       class="phone-input w-full px-4 md:px-5 lg:px-6 py-3 md:py-4 lg:py-5 rounded-lg md:rounded-xl lg:rounded-2xl border-2 border-gray-300 focus:border-secondary-500 focus:outline-none text-base md:text-lg">

                <!-- Сообщение валидации -->
                <div id="phone-validation" class="validation-message absolute left-0 right-0 -bottom-6 text-sm"></div>

                <!-- Подсказка -->
                <div class="text-xs text-gray-500 mt-2">
                    Формат: +375 (29/33/44/25) XXX-XX-XX
                </div>
            </div>

            <!-- Скрытое поле для определения страницы -->
            <input type="hidden" name="page" id="callback-page" value="">

            <button type="submit" id="submit-btn" class="w-full bg-gradient-to-r from-secondary-500 to-secondary-600 text-white font-bold md:font-black text-base md:text-lg lg:text-xl py-3 md:py-4 lg:py-5 rounded-lg md:rounded-xl lg:rounded-2xl shadow-xl md:shadow-2xl hover:shadow-2xl md:hover:shadow-3xl transform hover:scale-105 transition disabled:opacity-50 disabled:cursor-not-allowed">
                Заказать консультацию
            </button>
        </form>
    </div>
</div>
