<?php

namespace App\Http\Controllers;

use App\Models\Diagnosa;
use App\Http\Requests\StoreDiagnosaRequest;
use App\Http\Requests\UpdateDiagnosaRequest;
use App\Models\Gejala;
use App\Models\Keputusan;
use App\Models\Kode_Gejala;
use App\Models\KondisiUser;
use App\Models\Tingkatpenyakit;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use function PHPSTORM_META\map;
use function PHPSTORM_META\type;

use Illuminate\Support\Facades\Auth;

class DiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $user = Auth::user();
        $diagnosa = Diagnosa::where("user_id", $user->id)->get();

        return view('admin.hasil_diagnosa.admin_semua_diagnosa', [
            "diagnosa" => $diagnosa,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiagnosaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiagnosaRequest $request)
    {
        $filteredArray = $request->post('kondisi');
        $fillKondisi = array_filter($filteredArray, function ($value) {
            return $value !== null;
        });

        $kodeGejala = Gejala::all();
        $fillGejala = [];

        foreach ($kodeGejala as $gejala) {
            array_push($fillGejala, "$gejala->kode_gejala");
        }

        // dd($fillKondisi, $fillGejala);

        $bobotPilihan = [];
        foreach ($fillKondisi as $key => $val) {
            if ($val != "#") {
                array_push($bobotPilihan, array($key, $val));
            }
        }

        // dd($fillKondisi,$fillGejala, $bobotPilihan);

        $penyakits = Tingkatpenyakit::all();
        $cf = 0;
        // penyakit
        $arrGejala = [];
        foreach ($penyakits as $penyakit) {
            $cfArr = [];
            $res = [];
            // mencari nilai rule CF
            $ruleSetiapPenyakit = Keputusan::whereIn("kode_gejala", $fillGejala)->where("kode_penyakit", $penyakit->kode_penyakit)->get();
            if (count($ruleSetiapPenyakit) > 0) {
                foreach ($ruleSetiapPenyakit as $ruleKey) {
                    $cf = $ruleKey->mb;
                    $cfArr[$ruleKey->kode_gejala] = $cf;
                }
                $res = $this->getGabunganCfandDs($cfArr, $fillKondisi, $penyakit->kode_penyakit);
                // dd($res);
                
                array_push($arrGejala, $res);
            } else {
                continue;
            }
        }
        // for ($i = 0; $i < count($penyakit); $i++) {
           
        // }

        $diagnosa_id = uniqid();

        $user = Auth::user();


        $ins =  Diagnosa::create([
            'diagnosa_id' => strval($diagnosa_id),
            'data_diagnosa' => json_encode($arrGejala),
            'user_id' => $user->id,
            'kondisi' => json_encode($bobotPilihan)
        ]);
        // dd($ins);
        return redirect()->route('spk.result', ["diagnosa_id" => $diagnosa_id]);
    }

    public function getGabunganCfandDs($cfArr, $userGejala, $kodePenyakit)
    {
        // dd($cfArr, $userGejala, $kodePenyakit);
        if (count($cfArr) < 1){
            return [
                "value_cf" => 0,
                "value_ds" => 0,
                "kode_penyakit" => ""
            ];
        }

        // Menghitung CF
        $nilaiCf = 0;
        $arrTempCfGabungan = [];
        foreach ($cfArr as $key => $value) {
            array_push($arrTempCfGabungan, (floatval($value) * floatval($userGejala[$key])));
        }
        $cfCombine = [];
        if (count($arrTempCfGabungan) > 0) {
            $nilaiCf = array_reduce($arrTempCfGabungan, function($carry, $item) {
                // echo("$carry $item '<br>'");
                return $carry + $item * (1 - $carry);
            }, 0);

            $sum = 0;
            $cfCombine = array_reduce($arrTempCfGabungan, function ($carry, $item) use (&$sum) {
                $sum += $item * (1 - $sum);
                $carry[] = $sum;
                return $carry;
            }, []);
        }

        //Menghitung DS  
        $nilaiDs = 0;
        $dsCombine = [];
        $belief = [];
        $mass = [];
        $resultDs = [];
        foreach ($userGejala as $key => $value) {
            if (round(floatval($value)) > 0) {
                $belief["$key"] = round(floatval($value));
            }
        }

        if (count($belief) > 0) {
            foreach ($belief as $key => $value){
                array_push($mass, [$cfArr["$key"], ($value - $cfArr["$key"])]);
            }

            for ($i=0; $i < count($mass); $i++) { 

                if ($i < 1) {
                    $resultDs = $mass[0];
                }
                else{
                    $m = [($resultDs[0] * $mass[$i][0]), ($resultDs[1] * $mass[$i][0]), ($resultDs[0] * $mass[$i][1])];
                    $discrement = ($resultDs[1] * $mass[$i][1]);
                    
                    $resultDs[0] = array_sum($m);
                    $resultDs[1] = $discrement;
                    // var_dump($m);
                    // echo('<br>');
                    // var_dump($resultDs[0]);
                    // echo('<br>');
    
                }
                array_push($dsCombine, $resultDs); 
            }

            // dd($mass, $dsCombine);

            $nilaiDs = $resultDs[0];
        }

        // dd($cfArr, $userGejala, $kodePenyakit, $belief, $mass);


        return [
            "value_cf" => $nilaiCf,
            "value_ds" => $nilaiDs,
            "kode_penyakit" => $kodePenyakit,
            "cf" => $cfCombine,
            "ds" => $dsCombine
        ];
    }

    public function diagnosaResult($diagnosa_id)
    {
        $diagnosa = Diagnosa::where('diagnosa_id', $diagnosa_id)->first();
        $gejala = json_decode($diagnosa->kondisi, true);
        $data_diagnosa = json_decode($diagnosa->data_diagnosa, true);
        // dd($data_diagnosa);
        $int = 0.0;
        $kodePenyakit = "";
        $diagnosa_dipilih = [];
        foreach ($data_diagnosa as $val) {
            if (floatval($val["value_cf"]) > $int) {
                $int = floatval($val["value_cf"]);
                $diagnosa_dipilih["value"] = $int;
                $kodePenyakit = $val["kode_penyakit"];
            }
        }
        $diagnosa_dipilih["kode_penyakit"] = Tingkatpenyakit::where("kode_penyakit", $kodePenyakit)->first();

        $kodeGejala = [];
        foreach ($gejala as $key) {
            array_push($kodeGejala, $key[0]);
        }
        // dd($kodeGejala);
        $kode_penyakit = $diagnosa_dipilih["kode_penyakit"]->kode_penyakit;
        $pakar = Keputusan::whereIn("kode_gejala", $kodeGejala)->where("kode_penyakit", $kode_penyakit)->get();
        // dd($pakar);
        $gejala_by_user = [];
        $arrKondisiUser = [];
        foreach ($pakar as $key) {
            foreach ($gejala as $gKey) {
                if ($gKey[0] == $key->kode_gejala) {
                    array_push($gejala_by_user, $gKey);
                    $arrKondisiUser["$gKey[0]"] = $gKey[1];
                }
            }
        }
        // dd($gejala_by_user);

        $nilaiPakar = [];
        $arrPakar = [];
        foreach ($pakar as $key) {
            array_push($nilaiPakar, ($key->mb));
            $arrPakar["$key->kode_gejala"] = $key->mb;
        }
        $nilaiUser = [];
        foreach ($gejala_by_user as $key) {
            array_push($nilaiUser, $key[1]);
        }
        // dd($nilaiPakar);
        // dd($nilaiUser);

        $kombinasi = $this->getGabunganCfandDs($arrPakar, $arrKondisiUser, $kode_penyakit);
        // dd($cfKombinasi);
        $hasil = $int;
        // dd($hasil);

        // dd($kombinasi);

        return view('clients.cl_diagnosa_result', [
            "diagnosa" => $diagnosa,
            "diagnosa_dipilih" => $diagnosa_dipilih,
            "gejala" => $gejala,
            "pakar" => $pakar,
            "gejala_by_user" => $gejala_by_user,
            "data_diagnosa" => $kombinasi,
            "hasil" => $hasil
        ]);
    }

    public function getCfCombinasi($pakar, $user)
    {
        $cfComb = [];
        if (count($pakar) == count($user)) {
            for ($i = 0; $i < count($pakar); $i++) {
                $res = $pakar[$i] * $user[$i];
                array_push($cfComb, floatval($res));
            }
            return [
                "cf" => $cfComb,
                "kode_penyakit" => ["0"]
            ];
        } else {
            return "Data tidak valid";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function show(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function edit(Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiagnosaRequest  $request
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiagnosaRequest $request, Diagnosa $diagnosa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diagnosa  $diagnosa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diagnosa $diagnosa)
    {
        //
    }
}
