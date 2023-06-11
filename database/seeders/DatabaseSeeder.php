<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\CertainFactor;
use App\Models\Gejala;
use App\Models\Keputusan;
use App\Models\KondisiUser;
use App\Models\Role;
use App\Models\Tingkatpenyakit;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\New_;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $keputusan = new Keputusan();
        $gejala = new Gejala();
        $penyakit = new Tingkatpenyakit();
        $kondisi = new KondisiUser();
        $role = new Role();

        Keputusan::insert($keputusan->fillTable());
        Gejala::insert($gejala->fillTable());
        Tingkatpenyakit::insert($penyakit->fillTable());
        KondisiUser::insert($kondisi->fillTable());
        Role::insert($role->fillTable());

        \App\Models\User::factory(3)->create([
            'role_id' => 2
        ]);
        // Artikel::factory(4)->create();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // password
            // '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
            'role_id' => 1
        ]);
    }
}
