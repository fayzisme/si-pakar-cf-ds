@extends('main')
@section('title', "Login")
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
      <div class="row">
        <div class="col">
          @if(session()->has('success'))
          <div class="alert alert-secondary alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="float:right;">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          @endif

          <form action="{{ route('login')}}" method="POST">
            @csrf
      
            <div class="form-box">
              <div class="login-container" id="login">
                  <div class="top">
                      <header>Login</header>
                  </div>
                  
                  <div class="input-box">
                      <input class="input-field" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan email">
                      <i class="bx bx-user"></i>
                      @error('email')
                          <span class="invalid-feedback d-block" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="input-box">
                      <input class="input-field" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                      <i class="bx bx-lock-alt"></i>
                      @error('password')
                          <span class="invalid-feedback d-block" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
                  <div class="input-box" style="padding: 0 0 20px 15px;">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Remember Me') }}
                    </label>
                  </div>
                  <div class="input-box">
                      <button type="submit" class="submit">Sign In</button>
                  </div>
                  <br>
                  <div class="top">
                      <span>Belum punya akun ? <a href="/register">Daftar</a></span>
                  </div>
              </div>
            </div>
      
          </form> 
        </div>
      </div>
         
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
    b.className = "btn-landing";
    x.style.opacity = 1;
    y.style.opacity = 0;
}

function register() {
    x.style.left = "-510px";
    y.style.right = "5px"
    a.className = "btn-landing";
    b.className += " white-btn";
    x.style.opacity = 0;
    y.style.opacity = 1;
}
</script>
@endsection
