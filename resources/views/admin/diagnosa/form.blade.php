@extends('admin.admin_main')
@section('title', 'Tes Diagnosa')

{{-- isi --}}
@section('admin_content')
    <!-- Page content-->
    <div class="content">
        <div class="container text-center mt-lg-5 pt-lg-5">
            <div class="row">
              <div class="col-lg-12 justify-content-center mx-auto">
                 <!-- Header -->
                <div class="ex-header">
                        <div class="row">
                            <div class="col-xl-10 offset-xl-1"><br><br>
                                <h1>Diagnosa Penyakit Balita</h1>
                            </div>
                        </div>
                    </div>

                <!-- Isi -->
                <div class="ex-basic-1">
                    <div class="container">
                        <div class="row mx-auto">
                            <div class="col-xl-10 offset-xl-1 mx-auto">
                                <form action="{{ route('spk.store') }}" method="post" class="p-4 m-2" enctype="multipart/form-data" id='gform_1'>
                                    @csrf()
                                    
                                    <p>Seberapa sering masalah-masalah berikut ini terlihat pada si bayi?<br>
                                        Semua field harus diisi, jadi pastikan untuk memberikan jawaban yang tepat sesuai dengan yang terlihat.</p>
                                        
                                    @foreach ($gejala as $item)
                                    <h5 class="my-3">{{ $loop->iteration }}. Apakah pasien terlihat {{ $item->gejala }} ?</h5>
                                        
                                            {{-- <div class="btn-group" role="group" aria-label="Basic radio toggle button group"> --}}
                                                @foreach ($kondisi_user as $kondisi)
                                                <input type="radio" class="btn-check" name="kondisi[{{ $item->kode_gejala }}]" id="kondisi_{{ $kondisi->nilai }}_{{ $item->kode_gejala }}" value="{{ $kondisi->nilai }}" autocomplete="off" required>
                                                <label class="btn btn-outline-primary" for="kondisi_{{ $kondisi->nilai }}_{{ $item->kode_gejala }}">{{ $kondisi->kondisi }}</label>
                                                @endforeach
                                            {{-- </div> --}}
                                        
                                    @endforeach
                                    <br><br>
                                    <button type="submit" class="btn btn-tertiary">Submit</button><br><br>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
            </div>
        </div>
    </div>
@endsection
