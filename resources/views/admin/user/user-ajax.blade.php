@foreach ($users as $user)
    <tr class="odd">
        <th scope="row">{{ $loop->iteration }}</th>

        <td class="">
            {{ $user->name }}
        </td>
        <td>{{ $user->email }}</td>



        <td class="" style="">
            <div class="d-flex align-items-center">


                <a href="" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}"
                    class="text-body delete-record">
                    <i class="ti ti-trash x`ti-sm mx-2"></i>
                </a>


            </div>
            <div class="modal fade" data-bs-backdrop='static' id="deleteModal{{ $user->id }}" tabindex="-1"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content deleteModal verifymodal">
                        <div class="modal-header">
                            <div class="modal-title" id="modalCenterTitle">Are you
                                sure you want to delete
                                this account?
                            </div>
                        </div>
                        <div class="modal-body">
                            <div class="body">After delete this account user cannot
                                access anything in application</div>
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
                                        href="{{ route('admin-user-delete', $user->id) }}">Delete</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>



        </td>

    </tr>
@endforeach
