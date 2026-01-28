<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Propaganistas\LaravelPhone\Rules\Phone;

class CallbackRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:100',
            'phone' => [
                'required',
                'string',
                'min:9',
                'max:20',
                function ($attribute, $value, $fail) {
                    $digits = preg_replace('/\D/', '', $value);

                    if (strlen($digits) < 9) {
                        $fail('Номер телефона слишком короткий');
                        return;
                    }

                    // Разрешаем белорусские и российские номера
                    $validPrefixes = ['375', '7', '80'];
                    $valid = false;

                    foreach ($validPrefixes as $prefix) {
                        if (str_starts_with($digits, $prefix)) {
                            $valid = true;
                            break;
                        }
                    }

                    if (!$valid) {
                        $fail('Введите корректный номер телефона (Беларусь или Россия)');
                    }
                }
            ],
            'page' => 'nullable|string|url',
            'service' => 'nullable|string|max:255',
            'message' => 'nullable|string|max:1000',
            'antispam' => 'nullable|string|max:0', // Honeypot - должно быть пустым
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Пожалуйста, введите ваше имя',
            'name.min' => 'Имя должно содержать минимум 2 символа',
            'phone.required' => 'Пожалуйста, введите номер телефона',
            'phone.min' => 'Номер слишком короткий',
            'phone.max' => 'Номер слишком длинный',
        ];
    }

    /**
     * Подготовка данных перед валидацией
     */
    protected function prepareForValidation()
    {
        // Нормализуем телефон
        if ($this->has('phone')) {
            $phone = $this->phone;

            // Убираем все кроме цифр и +
            $phone = preg_replace('/[^\d+]/', '', $phone);

            // Если начинается с 8 (российский/белорусский формат)
            if (str_starts_with($phone, '8')) {
                // Проверяем, белорусский ли номер (80...)
                if (str_starts_with($phone, '80') && strlen($phone) === 11) {
                    $phone = '+375' . substr($phone, 2);
                } else if (strlen($phone) === 11) {
                    $phone = '+7' . substr($phone, 1);
                }
            }

            $this->merge(['phone' => $phone]);
        }

        // Устанавливаем страницу по умолчанию
        if (!$this->has('page') || empty($this->page)) {
            $this->merge(['page' => $this->header('referer', url()->previous())]);
        }
    }
}
