@extends('layouts.app')
  
@section('title', 'Profil Akun')

@section('contents')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card shadow-lg border-0 rounded">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Profil Pengguna</h3>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">Nama</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ auth()->user()->name }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ auth()->user()->email }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="row mb-4">
                            <div class="col-sm-3">
                                <p class="mb-0 font-weight-bold">Level</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">{{ auth()->user()->level }}</p>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        .card {
            border-radius: 15px;
            overflow: hidden;
        }

        .card-header {
            background-color: #007bff;
            padding: 1.5rem;
            border-bottom: none;
        }

        .card-body {
            padding: 2rem;
        }

        .row {
            margin-bottom: 20px;
        }

        .font-weight-bold {
            font-weight: 600;
        }

        .text-muted {
            color: #6c757d !important;
        }

        hr {
            border-top: 1px solid #ddd;
        }
    </style>
@endpush
