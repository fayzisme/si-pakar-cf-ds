<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';

    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function fillTable()
    {
        $role = [
            [
                "name" => "admin",
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                "name" => "user",
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];
        return $role;
    }
}
