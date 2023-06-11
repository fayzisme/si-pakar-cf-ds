@extends('clients.cl_main')
@section('title', 'Form Diagnosa')

@section('cl_content')

    <div class="container">
       <div class="row mx-auto my-4">
        <div class="col-lg-10 mx-auto">

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Diagnosa ID</th>
                    <th scope="col">Nama Penyakit</th>
                    <th scope="col">Persentase CF</th>
                    <th scope="col">Persentase DS</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>{{ $diagnosa->diagnosa_id }}</td>
                    <td> {{ $data_diagnosa["kode_penyakit"]}} | {{ $data_diagnosa["kode_penyakit"] }}</td>
                    {{-- <td>{{ ($data_diagnosa["value"] * 100) }} %</td> --}}
                    <td>{{ round(($data_diagnosa["value_cf"] * 100), 2)}} %</td>
                    <td>{{ round(($data_diagnosa["value_ds"] * 100), 2)}} %</td>
                  </tr>
                </tbody>
            </table>
        </div>

        {{-- section 2 --}}
        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="d-flex">
                    {{-- Pakar --}}
                    <table class="table table-hover mt-lg-5 border border-primary p-3 mx-3">
                        <thead>
                            <tr>
                                <th scope="col">Pakar</th>
                            </tr>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Gejala</th>
                                <th scope="col">Nilai (Pakar)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pakar as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        {{ $item->kode_gejala }} | {{ $item->kode_penyakit }}
                                    </td>
                                    <td>{{ $item->mb}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                   
                    {{-- User --}}
                    <table class="table table-hover mt-lg-5 border border-primary p-3 mx-3">
                        <thead>
                            <tr>
                                <th scope="col">User</th>
                            </tr>
                            <tr>
                                <th scope="col">Gejala</th>
                            <th scope="col">Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($gejala_by_user as $key)
                            <tr>
                                <td>{{ $key[0] }}</td>
                                <td>{{ $key[1] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 mx-auto">
                <div class="d-flex">
                    {{-- TabelGabungan --}}
                    {{-- CF Gabungan --}}
                    <table class="table table-hover mt-lg-5 border border-info p-3 mx-3">
                        <thead>
                            <tr>
                                <th scope="col">Hasil</th>
                            </tr>
                            <tr>
                                <th scope="col">Nilai CF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_diagnosa["cf"] as $key)
                            <tr>
                                <td>{{ $key }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
    
                     {{-- DS Gabungan --}}
                     <table class="table table-hover mt-lg-5 border border-info p-3 mx-3">
                        <thead>
                            <tr>
                                <th scope="col">Hasil</th>
                            </tr>
                            <tr>
                                <th scope="col">Nilai  DS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_diagnosa["ds"] as $key)
                            <tr>
                                <td>{{ $key[0] }}</td>
                                <td>{{ $key[1] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- section 3 --}}
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card my-4">
                    <div class="card-header">
                      Hasil
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">
                        {{$data_diagnosa["kode_penyakit"]}} | {{$data_diagnosa["kode_penyakit"]}}
                        </h5>
                      <p class="card-text">Jadi dapat disimpulkan dari hasil diagnosa dengan menggunakan metode Certainty Factor dan Dempster Shaver Theory bahwa pasien terkena penyakit dari Parechovirus dengan tingkat kepastian yaitu :</p> 
                      <div>
                          <b>Certainty Factor</b> =
                          <span class="fw-semibold fs-4">{{ round(($data_diagnosa["value_cf"] * 100), 2)}}%</span>
                      </div>
                      <div>
                          <b>Dempster Shaver</b> =
                          <span class="fw-semibold fs-4">{{ round(($data_diagnosa["value_ds"] * 100), 2)}}%</span> </p>
                      </div>
                      {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                    </div>
                  </div>
            </div>
        </div>
        @include('components.cl_article')
        <div >
            <a style="align-content: flex-end" href="/dashboard" class="btn btn-primary"> Kembali</a>
        </div>
       </div>
    </div>
@endsection
