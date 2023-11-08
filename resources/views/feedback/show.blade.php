@extends('layouts.base')
@section('title', 'Users')
@section('main', 'Feedback Management')
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

            <!-- Users List Table -->
            <div class="card">
                <div class="card-header border-bottom">
                    <div class="d-flex justify-content-between">
                        <h5 class="card-title mb-3">Feedback List</h5>
                        <div class="">
                            {{-- <button class="btn btn-primary btn-sm" id="clearFiltersBtn">Clear Filter</button> --}}
                        </div>
                    </div>



                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                            {{ session()->get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                </div>
                <div class="card-datatable table-responsive">
                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">


                        @foreach ($feedbacks as $item)
                            <div class="d-flex justify-content-center bg-white mb-2 mt-3">
                                <div>
                                    <div class="card border-0" style="width: 50rem;">

                                        <div class="card-header d-flex justify-contenet-between">
                                            <h5 class="card-title ">Feedback</h5>

                                        </div>
                                        <div class="card-body">
                                            <h6 class="card-title mb-0"> Title: </h6>
                                            <div class="text-body">
                                                {{ $item->title }}
                                            </div>

                                            <h5 class="card-title mb-0">Description: </h5>
                                            <div class="text-body ">
                                                {{ $item->description }}
                                            </div>
                                            <h6 class="card-title mb-0"> Category: </h6>
                                            <div class="text-body mb-3">
                                                {{ $item->category }}
                                            </div>
                                            <div class="d-flex justify-content-start align-items-center user-name ">

                                                <div class="avatar-wrapper">
                                                    <div class="avatar avatar-sm me-3"><img
                                                            src="https://platinumlist.net/guide/wp-content/uploads/2023/03/IMG-worlds-of-adventure.webp"
                                                            alt="Avatar" class="rounded-circle">
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-column"><a href=""
                                                        class="text-body text-truncate"><span
                                                            class="fw-semibold user-name-text">{{ $item->user->name }}</span></a>
                                                    <small class="text-muted">&#64;{{ $item->user->email }}</small>

                                                </div>
                                            </div>

                                            <div class="action d-flex gap-2 mt-3">

                                                @if ($item->vote)
                                                    <a class="text-body delete-record">
                                                        <i class="ti ti-thumb-up x`ti-sm mx-2" style="color: blue">
                                                        </i>{{ $item->count }}
                                                    </a>
                                                @else
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#verifyModal{{ $item->id }}"
                                                        class="text-body delete-record">
                                                        <i class="ti ti-thumb-up x`ti-sm mx-2"></i>{{ $item->votecount }}

                                                    </a>
                                                @endif


                                                <div class="modal fade" id="verifyModal{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered modal-sm"
                                                        role="document">
                                                        <div class="modal-content verifymodal">
                                                            <div class="modal-header">
                                                                <div class="modal-title" id="modalCenterTitle">Are you
                                                                    sure you want to vote
                                                                    this feedback?
                                                                </div>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="body">If you will vote this feedback its
                                                                    permanent</div>
                                                            </div>
                                                            <hr class="hr">

                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="first">
                                                                        <a href="" class="btn"
                                                                            data-bs-dismiss="modal"
                                                                            style="color: #a8aaae ">Cancel</a>
                                                                    </div>
                                                                    <div class="second">
                                                                        <a class="btn text-center"
                                                                            href="{{ route('dashboard-feedback-vote', ['id' => auth()->user()->id, 'fid' => $item->id]) }}">VOTE</a>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>



                                                @if ($switch == 1)
                                                    <a href="" data-bs-toggle="modal"
                                                        data-bs-target="#comment{{ $item->id }}"
                                                        class="text-body delete-record">
                                                        <i
                                                            class="ti ti-message-circle x`ti-sm mx-2"></i>{{ $item->feedcount }}

                                                    </a>
                                                @else
                                                    <a class="text-muted ">
                                                        <i class="ti ti-message-circle x`ti-sm mx-2"></i>Commnet is disable by admin

                                                    </a>
                                                @endif

                                                <div class="modal fade" id="comment{{ $item->id }}" tabindex="-1"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content verifymodal">
                                                            <div class="modal-header">
                                                                <div class="modal-title" id="modalCenterTitle">
                                                                    Comment
                                                                </div>
                                                            </div>
                                                            <form action="{{ route('dashboard-comment') }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="text" hidden name="feedback_id"
                                                                    id="" value="{{ $item->id }}">
                                                                <div class="modal-body">
                                                                    <input type="text" hidden name="user_id"
                                                                        value="{{ $item->id }}" id="">
                                                                    <div class="body">
                                                                        <textarea rows="5" class="form-control" placeholder="Type Here" name="comment" required></textarea>
                                                                    </div>
                                                                </div>
                                                                <hr class="hr">

                                                                <div class="container">
                                                                    <div class="row">
                                                                        <div class="first">
                                                                            <a href="" class="btn"
                                                                                data-bs-dismiss="modal"
                                                                                style="color: #a8aaae ">Cancel</a>
                                                                        </div>
                                                                        <div class="second">
                                                                            <button class="btn text-center"
                                                                                href="">Send</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>


                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" data-bs-backdrop='static' id="deleteModal{{ $item->id }}"
                                tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                                    <div class="modal-content deleteModal verifymodal">
                                        <div class="modal-header">
                                            <div class="modal-title" id="modalCenterTitle">Are you
                                                sure you want to delete
                                                this feedback?
                                            </div>
                                        </div>
                                        <div class="modal-body">
                                            <div class="body">After delete this feedback user cannot
                                                see this</div>
                                        </div>
                                        <hr class="hr">

                                        <div class="container">
                                            <div class="row">
                                                <div class="first">
                                                    <a href="" class="btn" data-bs-dismiss="modal"
                                                        style="color: #a8aaae ">Cancel</a>
                                                </div>
                                                <div class="second">
                                                    <a class="btn text-center"
                                                        href="{{ route('admin-feedback-delete', $item->id) }}">Delete</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach


                        <div id="paginationContainer">
                            <div class="row mx-2">
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_info" id="DataTables_Table_0_info" role="status"
                                        aria-live="polite">Showing {{ $feedbacks->firstItem() }} to
                                        {{ $feedbacks->lastItem() }}
                                        of
                                        {{ $feedbacks->total() }} entries</div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="dataTables_paginate paging_simple_numbers" id="paginationLinks">
                                        {{-- <h1>{{ @json($data) }}</h1> --}}
                                        @if ($feedbacks->hasPages())
                                            {{ $feedbacks->links('pagination::bootstrap-4') }}
                                        @endif


                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>








            </div>
        </div>
    @endsection

    @section('script')

    @endsection
