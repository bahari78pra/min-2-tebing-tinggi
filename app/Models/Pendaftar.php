<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftar extends Model
{
    protected $table='pendaftar';
    protected $guarded=['id'];

    public function paket_keahlian(){
    	return $this->belongsTo(PaketKeahlian::class);
    }
}
