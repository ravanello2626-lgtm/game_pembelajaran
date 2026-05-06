<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'pos_id','soal','opsi_a','opsi_b','opsi_c','opsi_d','opsi_e','jawaban_benar'
    ];
}