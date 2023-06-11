<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KondisiUser extends Model
{
    use HasFactory;
    // protected $table = 'kondisi_users';

    public function fillTable()
    {
        $cf_user = [
            [
                'kondisi' => 'Mungkin Tidak',
                'nilai' => 0.1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kondisi' => 'Kemungkinan Besar Tidak',
                'nilai' => 0.3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kondisi' => 'Mungkin',
                'nilai' => 0.6,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kondisi' => 'Kemungkinan Besar',
                'nilai' => 0.7,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'kondisi' => 'Hampir Pasti',
                'nilai' => 0.8,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        return $cf_user;
    }
}
