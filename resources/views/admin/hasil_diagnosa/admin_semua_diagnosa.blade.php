@extends('admin.admin_main')
@section('title', 'Dashboard')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                          <h5 class="card-title">Daftar <span>| Hasil Diagnosa</span></h5>
                            <table class="table table-hover mt-2 p-2">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Diagnosa ID</th>
                                    <th scope="col">Tingkat penyakit</th>
                                    <th scope="col">Persentase CF</th>
                                    <th scope="col">Persentase DS</th>
                                    <th scope="col">Detail</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($diagnosa as $item)
                                        <?php $data_diagnosa = json_decode($item->data_diagnosa, true) ?>
                                        <?php foreach ($data_diagnosa as $val ) {
                                                $diagnosa_dipilih["value_cf"] = floatval($val["value_cf"]);
                                                $diagnosa_dipilih["value_ds"] = floatval($val["value_ds"]);
                                                $diagnosa_dipilih["kode_penyakit"] = App\Models\Tingkatpenyakit::where("kode_penyakit", $val["kode_penyakit"])->first();
                                        } ?>
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $item->diagnosa_id }}</td>
                                            <td> {{ $diagnosa_dipilih["kode_penyakit"]->kode_penyakit }} | {{ $diagnosa_dipilih["kode_penyakit"]->penyakit }}</td>
                                            <td>{{ round(($diagnosa_dipilih["value_cf"] * 100), 2)}} %</td>
                                            <td>{{ round(($diagnosa_dipilih["value_ds"] * 100), 2)}} %</td>
                                            <td><a href="{{ route('spk.result', ["diagnosa_id" => $item->diagnosa_id]) }}">Detail</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
    
                        </div>
    
                      </div>
                    
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
