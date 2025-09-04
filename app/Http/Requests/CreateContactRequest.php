<?php

namespace Modules\Isite\Http\Requests;

use Imagina\Icore\Http\Request\CoreFormRequest;
use Illuminate\Contracts\Validation\Validator;

class CreateContactRequest extends CoreFormRequest
{
    public function rules(): array
    {
        return [
            'system_name' => 'required|min:3|unique:isite__contacts,system_name'
        ];
    }

    public function translationRules(): array
    {
        return [
            'title' => 'required|min:3|max:255',
            'value' => 'required|min:3|max:255',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    public function messages(): array
    {
        return [
            'system_name.required' => itrans('isite::contact.messages.systemNameIsRequired'),
            'system_name.unique' => itrans('isite::contact.messages.systemNameUnique'),
        ];
    }

    public function translationMessages(): array
    {
        return [
            'title.required' => itrans('isite::contact.messages.titleIsRequired'),
            'title.min' => itrans('isite::contact.messages.titleMin'),
            'value.required' => itrans('isite::contact.messages.valueIsRequired'),
            'value.min' => itrans('isite::contact.messages.valueMin'),
        ];
    }

    public function getValidator(): Validator
    {
        return $this->getValidatorInstance();
    }
}
