<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keputusan extends Model
{
    use HasFactory;
    protected $table = 'keputusan';
    protected $guard = ["id"];

    public function penyakit()
    {
        return $this->hasMany(Tingkatpenyakit::class, 'kode_penyakit', 'kode_penyakit');
    }
    public function gejala()
    {
        return $this->hasMany(Gejala::class, 'kode_gejala' /* tbl gejala */, 'kode_gejala');
    }

    public function fillTable()
    {
        $rule = [
            // P1 => Gangguan Mood
            [
                'kode_penyakit' => 'P1',
                'kode_gejala' => 'G1',
                'mb' => 1.0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_penyakit' => 'P1',
                'kode_gejala' => 'G2',
                'mb' => 0.1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_penyakit' => 'P1',
                'kode_gejala' => 'G3',
                'mb' => 0.6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_penyakit' => 'P1',
                'kode_gejala' => 'G4',
                'mb' => 0.8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_penyakit' => 'P1',
                'kode_gejala' => 'G5',
                'mb' => 0.8,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_penyakit' => 'P1',
                'kode_gejala' => 'G6',
                'mb' => 1.0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_penyakit' => 'P1',
                'kode_gejala' => 'G7',
                'mb' => 0.3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kode_penyakit' => 'P1',
                'kode_gejala' => 'G8',
                'mb' => 0.8,
                'created_at' => now(),
                'updated_at' => now()
                ]
        ];
        return $rule;
    }
}
