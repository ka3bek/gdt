import './bootstrap';
// Функция валидации телефона для Беларуси
function validateBelarusPhone(phone) {
    // Если поле пустое, считаем валидным (required сам проверит)
    if (!phone || phone.trim() === '') {
        return { isValid: false, message: '' };
    }

    // Убираем все нецифровые символы, кроме плюса
    const cleanPhone = phone.replace(/[^\d+]/g, '');

    // Проверяем формат +375XXXXXXXXX
    if (!cleanPhone.startsWith('+375')) {
        return {
            isValid: false,
            message: 'Номер должен начинаться с +375'
        };
    }

    // Проверяем длину
    if (cleanPhone.length !== 13) {
        return {
            isValid: false,
            message: 'Недостаточно цифр в номере'
        };
    }

    // Проверяем код оператора
    const operatorCode = cleanPhone.substring(4, 6);
    const validOperators = ['29', '33', '44', '25', '17', '16', '15'];

    if (!validOperators.includes(operatorCode)) {
        return {
            isValid: false,
            message: 'Неверный код оператора'
        };
    }

    return { isValid: true, message: '✓ Номер корректен' };
}

// Функция форматирования телефона
function formatPhoneNumber(value) {
    // Убираем все нецифровые символы
    const digits = value.replace(/\D/g, '');

    // Если цифр нет, возвращаем пустую строку
    if (digits.length === 0) {
        return '+375 (';
    }

    // Если начинается с 375, форматируем как полный номер
    if (digits.startsWith('375')) {
        // Берем только цифры после 375
        const remainingDigits = digits.substring(3);

        // Форматируем оставшиеся цифры
        let formatted = '+375 (';
        let formattedDigits = '';

        for (let i = 0; i < remainingDigits.length && i < 9; i++) {
            if (i === 2) {
                formattedDigits += ') ';
            } else if (i === 5 || i === 7) {
                formattedDigits += '-';
            }
            formattedDigits += remainingDigits[i];
        }

        return formatted + formattedDigits;
    }

    // Если пользователь вводит код оператора (например, 29), добавляем +375 перед ним
    if (digits.length <= 2) {
        return '+375 (' + digits;
    }

    // Для других случаев
    let formatted = '+375 (';

    for (let i = 0; i < digits.length && i < 9; i++) {
        if (i === 2) {
            formatted += ') ';
        } else if (i === 5 || i === 7) {
            formatted += '-';
        }
        formatted += digits[i];
    }

    return formatted;
}

// Функция для вычисления новой позиции курсора
function getNewCursorPosition(oldValue, newValue, oldCursorPos) {
    // Если старых значение пустое или курсор в начале
    if (!oldValue || oldCursorPos === 0) {
        return newValue.length;
    }

    // Подсчитываем сколько цифр было до курсора в старом значении
    let digitsBeforeCursor = 0;
    for (let i = 0; i < oldCursorPos && i < oldValue.length; i++) {
        if (/\d/.test(oldValue[i])) {
            digitsBeforeCursor++;
        }
    }

    // Находим позицию в новом значении после той же цифры
    let digitsCounted = 0;
    for (let i = 0; i < newValue.length; i++) {
        if (/\d/.test(newValue[i])) {
            digitsCounted++;
            if (digitsCounted === digitsBeforeCursor) {
                // Возвращаем позицию после этой цифры
                return i + 1;
            }
        }
    }

    // Если не нашли, ставим в конец
    return newValue.length;
}

// Инициализация при загрузке страницы
document.addEventListener('DOMContentLoaded', function() {
    const phoneInput = document.getElementById('phone-input');
    const validationMessage = document.getElementById('phone-validation');
    const submitBtn = document.getElementById('submit-btn');
    const form = document.getElementById('callback-form');

    // Флаги для отслеживания состояния
    let isPhoneTouched = false;
    let isPhoneValidated = false;
    let oldPhoneValue = '';

    if (phoneInput) {
        // Устанавливаем начальное значение
        phoneInput.value = '+375 (';

        // Маска ввода телефона
        phoneInput.addEventListener('input', function(e) {
            // Сохраняем старое значение и позицию курсора
            const oldCursorPos = this.selectionStart;
            oldPhoneValue = this.value;

            // Получаем новое отформатированное значение
            const newValue = formatPhoneNumber(this.value);

            // Устанавливаем новое значение
            this.value = newValue;

            // Вычисляем новую позицию курсора
            const newCursorPos = getNewCursorPosition(oldPhoneValue, newValue, oldCursorPos);

            // Устанавливаем курсор на правильную позицию
            setTimeout(() => {
                this.setSelectionRange(newCursorPos, newCursorPos);
            }, 0);

            // Отмечаем, что пользователь начал вводить
            isPhoneTouched = true;

            // Сбрасываем стили валидации при вводе
            phoneInput.classList.remove('valid', 'invalid', 'animate-shake');
            if (validationMessage) {
                validationMessage.classList.remove('show');
            }
        });

        // Устанавливаем курсор в конец при фокусе
        phoneInput.addEventListener('focus', function() {
            if (this.value === '+375 (' || this.value === '') {
                setTimeout(() => {
                    this.setSelectionRange(this.value.length, this.value.length);
                }, 0);
            }

            // Скрываем сообщение валидации
            if (validationMessage) {
                validationMessage.classList.remove('show');
            }
            phoneInput.classList.remove('animate-shake');
        });

        // Валидация только при потере фокуса (blur)
        phoneInput.addEventListener('blur', function() {
            if (!isPhoneTouched) return;

            validatePhoneInput(true);
            isPhoneValidated = true;
        });

        // Обработка Backspace для предотвращения удаления "+375 ("
        phoneInput.addEventListener('keydown', function(e) {
            const cursorPos = this.selectionStart;
            const value = this.value;

            // Если пытаемся удалить символы из "+375 ("
            if (e.key === 'Backspace' && cursorPos <= 7) {
                e.preventDefault();
                return;
            }

            // Если пытаемся удалить разделитель, перемещаем курсор назад
            if (e.key === 'Backspace' && cursorPos > 0) {
                const charBefore = value.charAt(cursorPos - 1);
                if (charBefore === ' ' || charBefore === '(' || charBefore === ')' || charBefore === '-') {
                    e.preventDefault();
                    this.setSelectionRange(cursorPos - 1, cursorPos - 1);
                    // Имитируем Backspace на новой позиции
                    const event = new InputEvent('input', {
                        inputType: 'deleteContentBackward'
                    });
                    this.dispatchEvent(event);
                }
            }

            // Если пытаемся удалить разделитель Delete, перемещаем курсор вперед
            if (e.key === 'Delete' && cursorPos < value.length) {
                const charAfter = value.charAt(cursorPos);
                if (charAfter === ' ' || charAfter === '(' || charAfter === ')' || charAfter === '-') {
                    e.preventDefault();
                    this.setSelectionRange(cursorPos + 1, cursorPos + 1);
                    // Имитируем Delete на новой позиции
                    const event = new InputEvent('input', {
                        inputType: 'deleteContentForward'
                    });
                    this.dispatchEvent(event);
                }
            }
        });
    }

    function validatePhoneInput(showMessage = false) {
        const phone = phoneInput.value;

        // Если поле содержит только "+375 (", считаем пустым
        if (phone === '+375 (') {
            phoneInput.classList.remove('valid', 'invalid', 'animate-shake');
            if (validationMessage) {
                validationMessage.classList.remove('show');
                validationMessage.textContent = '';
            }
            submitBtn.disabled = true;
            return { isValid: false };
        }

        const validation = validateBelarusPhone(phone);

        if (validation.isValid) {
            phoneInput.classList.remove('invalid', 'animate-shake');
            phoneInput.classList.add('valid');
            submitBtn.disabled = false;

            if (showMessage && validationMessage) {
                validationMessage.textContent = validation.message;
                validationMessage.classList.add('show');
                validationMessage.className = 'validation-message absolute left-0 right-0 -bottom-6 text-sm text-success-500 show';
            }

            return { isValid: true, message: validation.message };
        } else {
            phoneInput.classList.remove('valid');
            phoneInput.classList.add('invalid');
            submitBtn.disabled = true;

            if (showMessage && validationMessage) {
                validationMessage.textContent = validation.message || '✗ Введите номер в формате: +375 (29/33/44/25) XXX-XX-XX';
                validationMessage.classList.add('show');
                validationMessage.className = 'validation-message absolute left-0 right-0 -bottom-6 text-sm text-error-500 show';

                // Анимация тряски
                phoneInput.classList.add('animate-shake');
                setTimeout(() => {
                    phoneInput.classList.remove('animate-shake');
                }, 500);
            }

            return { isValid: false, message: validation.message };
        }
    }

    // Защита формы от спама (honeypot)
    if (form) {
        const antispam = form.querySelector('.antispam');
        if (antispam) {
            // Случайное значение для honeypot (роботы могут заполнять скрытые поля)
            antispam.value = Math.random().toString(36).substring(7);
        }
    }
});
