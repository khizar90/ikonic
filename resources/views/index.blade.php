@extends('layouts.base')
@section('title', 'User Posts')
@section('main', 'Welcome')
@section('link')
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css" />
@endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <!-- posts List Table -->
            <div class="card h-100">
                <div class="card-header justify-content-between align-items-center">
                        <h5 class="card-title text-center">Wlecome {{ auth()->user()->name }} 👋</h5>
                </div>
              
            @endsection

            @section('script')

            @endsection
