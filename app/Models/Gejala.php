<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;
    protected $table = 'gejala';
    protected $guard = ["id"];
    protected $fillable = ["kode_gejala", "gejala"];

    public function fillTable()
    {


        $gejala2 = [
            [
                "kode_gejala" => "G1",
                "gejala" => "Demam",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "kode_gejala" => "G2",
                "gejala" => "Mual",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "kode_gejala" => "G3",
                "gejala" => "Mual hingga muntah",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "kode_gejala" => "G4",
                "gejala" => "Bintik merah pada tangan",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "kode_gejala" => "G5",
                "gejala" => "Bintik merah pada kaki",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "kode_gejala" => "G6",
                "gejala" => "Sulit bernafas",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "kode_gejala" => "G7",
                "gejala" => "Lemas",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "kode_gejala" => "G8",
                "gejala" => "Dada terasa sesak",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        return $gejala2;
    }
}
