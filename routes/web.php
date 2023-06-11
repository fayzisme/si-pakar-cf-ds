<?php

use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\TingkatpenyakitController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FormDiagnosaController;
use App\Models\Diagnosa;
use App\Models\Tingkatpenyakit;
use App\Models\KondisiUser;
use App\Models\Gejala;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
})->middleware('guest');

// Route::resource('/login', LoginController::class)->name('index','login');


Route::middleware('auth')->group(function () {

    Route::get('/dashboard', function () {
        $data = [
            'gejala' => Gejala::all(),
            'kondisi_user' => KondisiUser::all(),
            'diagnosa' => Diagnosa::where("user_id", Auth::user()->id)->get(),
            'tingkat_penyakit' => Tingkatpenyakit::all(),

        ];
        return view('admin.dashboard', $data);
    });

    Route::get('/dashboard/admin', function () {
        $data = [
            'user' => User::all()
        ];
        return view('admin.list_admin', $data);
    });

    Route::get('/dashboard/add_admin', function () {
        return view('admin.add_admin');
    });

    Route::get('/home', function () {
        return redirect('/dashboard');
    });

    Route::resource('/gejala', GejalaController::class);
    Route::resource('/penyakit', TingkatpenyakitController::class);
    Route::resource('/form', FormDiagnosaController::class);
    Route::resource('/spk', DiagnosaController::class);
});

Route::get('/spk/result/{diagnosa_id}', [DiagnosaController::class, 'diagnosaResult'])->name('spk.result')->middleware('auth');

Auth::routes();