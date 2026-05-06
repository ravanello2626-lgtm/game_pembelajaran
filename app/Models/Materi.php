<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $fillable = ['nama_materi'];

    public function pos()
    {
        return $this->hasMany(Pos::class);
    }
}