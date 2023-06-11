
@extends('main')
@section('title', "Register")
@section('main_section')
  @php
    use Illuminate\Support\Facades\Session;
@endphp
<section class="home">
  <div class="wrapper">
    <nav class="nav">
        <div class="nav-logo">
            <p>Sistem Pakar</p>
        </div>
    </nav>
    <form action="{{ route('register')}}" method="POST">
      @csrf
        <div class="form-box">
            <div class="login-container" id="login">
                <div class="top">
                    <header>Register</header>
                </div>
                {{-- <div class="two-form"> --}}
                    {{-- <div class="div input-box">
                        <input type="text" class="input-field" id="nama" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{ old('nama') }}" required autocomplete="curent-nama" autofocus placeholder="Nama" required>
                        <i class="bx bx-user"></i>
                    </div> --}}
                    {{-- </div> --}}
                  <div class="input-box">
                      <input type="text" class="input-field" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="curent-name" placeholder="Nama" required>
                      <i class="bx bx-user"></i>
                  </div>
                <div class="input-box">
                  <input class="input-field" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                  <i class="bx bx-user"></i>
                  @error('email')
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="input-box">
                    <input type="password" class="input-field" class="form-control @error('password')is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                    <i class="bx bx-lock-alt"></i>
                    @error('password')
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>
                <div class="input-box">
                  <input type="password" class="input-field" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="current-password_confirmation" placeholder="Retype Password">
                  <i class="bx bx-lock-alt"></i>
                  @error('password_confirmation')
                      <span class="invalid-feedback d-block" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
                <div class="input-box">
                    <button type="submit" class="submit">Submit</button>
                </div><br>
                <div class="top">
                    <span>Sudah punya akun ? <a href="/login">Login</a></span>
                </div>
            </div>
        </div>
    </form>
  </div>
</section>

<script>
function myMenuFunction() {
  var i = document.getElementById("navMenu");

  if(i.className === "naav-Menu"){
      i.className += " responsive";
  } else{
      i.className = "nav-menu";
  }
}
</script>

<script>
var a = document.getElementById("loginbtn");
var b = document.getElementById("registerbtn");
var x = document.getElementById("login");
var y = document.getElementById("register");

function login() {
  x.style.left = "4px";
  y.style.right = "-520px"
  a.className += " white-btn";
  b.className = "btn";
  x.style.opacity = 1;
  y.style.opacity = 0;
}

function register() {
  x.style.left = "-510px";
  y.style.right = "5px"
  a.className = "btn";
  b.className += " white-btn";
  x.style.opacity = 0;
  y.style.opacity = 1;
}
</script>
  @endsection
