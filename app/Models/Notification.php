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

    public function getEtab($id)
    {
        return Etablissement::where('id', $id)->first()->lib_etab_1;
    }
}
