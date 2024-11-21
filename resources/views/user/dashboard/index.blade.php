@extends('user.layouts.wrapper') <!-- Extend wrapper user -->

@section('content') <!-- Bagian konten -->
    <h1>Selamat Datang di Dashboard User</h1>
    <p>Ini adalah halaman dashboard khusus user.</p>
    <div class="container-fluid mt-2">
        <div class="alert alert-success">Halo {{ auth()->user()->name }} Selamat datang di halaman user !</div>
    </div>
@endsection
