<?php

namespace Modules\Isite\Http\Requests;

use Imagina\Icore\Http\Request\CoreFormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateWhatsappRequest extends CoreFormRequest
{
    public function rules(): array
    {
        return [
            'icon' => 'nullable|string|max:255',
        ];
    }

    public function translationRules(): array
    {
        return [
            'country_code' => 'required',
            'phone' => 'required|integer',
            'message' => 'nullable|string|max:255',
            'label' => 'nullable|string|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'icon.string' => itrans('isite::whatsapp.messages.iconMustBeString'),
            'icon.max' => itrans('isite::whatsapp.messages.iconMax'),
        ];
    }

    public function translationMessages(): array
    {
        return [
            'country_code.required' => itrans('isite::whatsapp.messages.countryCodeIsRequired'),
            'phone.required' => itrans('isite::whatsapp.messages.phoneIsRequired'),
            'phone.integer' => itrans('isite::whatsapp.messages.phoneMustBeInteger'),
            'message.string' => itrans('isite::whatsapp.messages.messageMustBeString'),
            'label.string' => itrans('isite::whatsapp.messages.labelMustBeString'),
        ];
    }

    public function getValidator(): Validator
    {
        return $this->getValidatorInstance();
    }
}
