<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Users |' }}</x-slot>

    <x-slot name="style">
        <link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    </x-slot>
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> Users </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> User List </h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="notification_alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @can('user_create')
                            <div class="row mb-2">
                                <div class="col-sm-5">
                                    <a href="{{ url('admin-panel/dashboard/users/create') }}" class="btn btn-danger mb-2"><i class="mdi mdi-plus-circle me-2"></i> Add User </a>
                                </div>
                            </div>
                        @endcan

                        <div class="table-responsive">
                            <table id="basic-datatable" class="table table-centered table-striped dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th> SL </th>
                                        <th> User </th>
                                        <th> Mobile Number </th>
                                        <th> Email </th>
                                        <th> Permission </th>
                                        <th> Status </th>
                                        <th style="width: 75px;"> Action </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($users as $key => $user)
                                        <tr>
                                            <td> {{ ++$key }} </td>
                                            
                                            <td class="table-user">
                                                @if ($user->profile_image)
                                                    <img src="{{ url('images/users', $user->profile_image) }}" alt="profile_image" class="me-2 rounded-circle" />
                                                @else
                                                    <img src="{{ asset('assets/images/avator.png') }}" alt="profile_image" class="me-2 rounded-circle" />
                                                @endif

                                                <a href="{{ url('admin-panel/dashboard/users', $user->id) }}" class="text-body fw-semibold"> {{ $user->name ?? "" }} </a>
                                            </td>

                                            <td> {{ $user->mobile_number ?? "" }} </td>

                                            <td> {{ $user->email ?? "" }} </td>

                                            <td>
                                                @forelse ($user->roles as $role)
                                                    ({{ $role->name }}) <br>
                                                @empty
                                                    No Permission
                                                @endforelse
                                            </td>

                                            <td>
                                                <input type="checkbox" id="status_{{ $user->id }}" {{ ($user->status == "active") ? "checked" : "" }} data-switch="success" value="{{ $user->id }}" onchange="change_status(this)"/>
                                                <label for="status_{{ $user->id }}" data-on-label="Yes" data-off-label="No"></label>
                                            </td>

                                            <td>
                                                <form action="{{ url('admin-panel/dashboard/users', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    
                                                    @can('user_view')
                                                        <a href="{{ url('admin-panel/dashboard/users', $user->id) }}" class="action-icon"> <i class="mdi mdi-eye"></i></a>
                                                    @endcan

                                                    @can('user_edit')
                                                        <a href="{{ url('admin-panel/dashboard/users/'. $user->id . '/edit') }}" class="action-icon"> <i class="mdi mdi-square-edit-outline"></i></a>
                                                    @endcan

                                                    <input name="_method" type="hidden" value="DELETE">

                                                    @can('user_delete')
                                                        <button type="submit" class="btn action-icon show_confirm" data-toggle="tooltip" title='Delete'><i class="mdi mdi-delete"></i></button>
                                                    @endcan
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <x-slot name="script">
        <script src="{{ asset('assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/vendor/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>

        <script src="{{ asset('assets/js/pages/demo.datatable-init.js') }}"></script>

        <script type="text/javascript">
            function change_status(status) {
                let user_id = status.value;
                
                if (status.checked) {
                    $.ajax({
                        url: "{{ url('admin-panel/dashboard/users-change-status') }}",
                        type: "POST",
                        data: {
                            user_id: user_id,
                            status: "active",
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(response) {
                            //
                        }
                    });
                } else {
                    $.ajax({
                        url: "{{ url('admin-panel/dashboard/users-change-status') }}",
                        type: "POST",
                        data: {
                            user_id: user_id,
                            status: "inactive",
                            _token: '{{ csrf_token() }}'
                        },
                        dataType: 'json',
                        success: function(response) {
                            //
                        }
                    });
                }
            }

            $(document).ready(function() {
                $('#DataTable').DataTable();

                $('#notification_alert').delay(3000).fadeOut('slow');

                $('.show_confirm').click(function(event) {
                    var form =  $(this).closest("form");
                    var name = $(this).data("name");

                    event.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to delete this item ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel!',
                        reverseButtons: true
                    })
                    .then((willDelete) => {
                        if (willDelete.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        </script>
    </x-slot>
</x-app-layout>
