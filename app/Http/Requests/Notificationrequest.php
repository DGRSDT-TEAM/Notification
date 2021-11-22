<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Notificationrequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */


    public function rules()
    {
        return [
            'label' => 'required|max:255|min:7',
            'montant' => 'nullable|integer|gt:0',
            'num' => 'required|integer|unique:notifications,num,' . $this->id,
            'date_notif' => 'required|date',
            'entite_benif_id' => 'exists:etablissements,id',
            'etablissement_id' => 'exists:etablissements,id',

        ];
    }

    public function messages()
    {
        return [
            'label.required' => trans('notif.label.required'),
            'num.montant' => 'Invalid category value.',
            'num.numeric' => 'Invalid category value.',
            'entite_benif_id.exists' => 'Not an existing ID',
            'etablissement_id.exists' => 'Not an existing ID',
        ];
    }


}
