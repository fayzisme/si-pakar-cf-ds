<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tingkatpenyakit extends Model
{
    use HasFactory;
    protected $table = 'tingkat_penyakit';
    protected $guard = ["id"];
    protected $fillable = ['kode_penyakit', 'penyakit'];

    public function fillTable()
    {
        $penyakit = [
            [
                "kode_penyakit" => "P1",
                "penyakit" => "Parechovirus",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        return $penyakit;
    }
}
