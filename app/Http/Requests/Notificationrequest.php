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
            'montant' => 'nullable|gt:0',
            'num' => 'required|unique:notifications,num,' . $this->id,
            'date_notif' => 'required|date',
            'etablissement_id' => 'required|exists:etabs,id',
            'labo_id' => 'required|exists:labos,id',

        ];
    }

    public function messages()
    {
        return [
            'label.required' => trans('notif.label.required'),
            'num.montant' => 'Invalid category value.',
            'num.required' => 'le champs numéro de notification est obligatoire.',
            'date_notif.required' => 'le champs date de notification est obligatoire.',
            'etablissement_id.exists' => 'Not an existing ID',
            'etablissement_id.required' => 'le champs Etablisement est obligatoire',
            'labo_id.exists' => 'Not an existing ID',
            'labo_id.required' => 'le champs Entité est obligatoire',
        ];
    }


}
