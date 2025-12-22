<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLeadRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'time_range_to_contact' => ['nullable', 'string', 'max:255'],
            'property_id' => ['nullable', 'exists:properties,id'],
            'agent_id' => ['nullable', 'exists:agents,id'],
            'message' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'الاسم يجب أن لا يتجاوز 255 حرف',
            'email.email' => 'البريد الإلكتروني غير صحيح',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.max' => 'رقم الهاتف يجب أن لا يتجاوز 20 حرف',
            'property_id.exists' => 'العقار المحدد غير موجود',
            'agent_id.exists' => 'الوكيل المحدد غير موجود',
            'message.max' => 'الرسالة يجب أن لا تتجاوز 1000 حرف',
        ];
    }
}
