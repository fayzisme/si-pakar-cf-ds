@extends('main')
@section('main_section')
    {{-- Navbar dan header --}}
    @include('components.admin_header')

    {{-- seidebar --}}
    @include('components.admin_sidebar')

    {{-- isi --}}
    <main class="body-dashboard">
        @yield('admin_content')
    </main>

@endsection
