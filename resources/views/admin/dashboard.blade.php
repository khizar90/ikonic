@extends('admin.layouts.base')
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
                    <h5 class="card-title text-center">Wlecome Admin {{ auth()->user()->name }} 👋</h5>
                </div>

                <div class="container">

                    <div class="row g-4 mb-4">
                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start justify-content-between">
                                        <div class="content-left">
                                            <span>Total User</span>
                                            <div class="d-flex align-items-center my-1">
                                                <h4 class="mb-0 me-2">{{ $total }}</h4>
                                            </div>
                                        </div>
                                        <span class="badge bg-label-primary rounded p-2">
                                            <i class="ti ti-user ti-sm"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start justify-content-between">
                                        <div class="content-left">
                                            <span>Today New Users</span>
                                            <div class="d-flex align-items-center my-1">
                                                <h4 class="mb-0 me-2">{{ $todayNew }}</h4>
                                            </div>
                                        </div>
                                        <span class="badge bg-label-danger rounded p-2">
                                            <i class="ti ti-user-plus ti-sm"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-xl-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex align-items-start justify-content-between">
                                        <div class="content-left">
                                            <span>Total Feedback</span>
                                            <div class="d-flex align-items-center my-1">
                                                <h4 class="mb-0 me-2">{{ $feedback }}</h4>
                                            </div>
                                        </div>
                                        <span class="badge bg-label-danger rounded p-2">
                                            <i class="ti ti-user-plus ti-sm"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            @endsection

            @section('script')

            @endsection
