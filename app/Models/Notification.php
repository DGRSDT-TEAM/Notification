<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }


    public function labo()
    {
        return $this->belongsTo(Labo::class, 'labo_id', 'id');
    }

    public function inscriptions()
    {
        return $this->hasMany(Inscription::class)->orderBy('date','DESC');
    }

    public function getEtab()
    {
        return $this->etablissement->name;
    }

    public function getEtabCode()
    {
        return $this->etablissement->code;
    }

    public function getLabo()
    {
        return $this->labo->labo_name ?? "";
    }

    public function getLaboCode_dprep()
    {
        return $this->labo->code_dprep ?? "";
    }

    public function getLaboNum_labo()
    {
        return $this->labo->num_labo ?? "";
    }

    public function addedBy()
    {
        $user = \Auth::user()->find($this->added_by)->name;
        return $user ?? "";
    }
}
