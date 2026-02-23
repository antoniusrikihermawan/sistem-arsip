@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="container-fluid p-0">
<div class="row">
        <div class="col-12 col-md-8">
            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">Informasi Profil</h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="card card-primary card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title">Ubah Kata Sandi</h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="card card-danger card-outline mb-4">
                <div class="card-header">
                    <h3 class="card-title text-danger">Hapus Akun</h3>
                </div>
                <div class="card-body">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
