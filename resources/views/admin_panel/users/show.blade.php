<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'User Show |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard/users') }}"> Users </a></li>
                            <li class="breadcrumb-item active"> Show </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> User Show </h4>
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
                <div class="card text-center">
                    <div class="card-body">
                        @if ($user->profile_image)
                            <img src="{{ url('images/users', $user->profile_image) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile_image" />
                        @else
                            <img src="{{ asset('assets/images/avator.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile_image" />
                        @endif

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="text-start mt-3">
                                    <p class="text-muted mb-2 font-13"><strong>Name :</strong> <span class="ms-2"> {{ $user->name ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Date Of Birth :</strong> <span class="ms-2"> {{ $user->date_of_birth ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Gender :</strong> <span class="ms-2"> {{ $user->gender ?? "" }} </span></p>
                                
                                    <p class="text-muted mb-2 font-13"><strong>Mobile Number :</strong> <span class="ms-2"> {{ $user->mobile_number ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2"> {{ $user->email ?? "" }} </span></p>
                                    
                                    <p class="text-muted mb-2 font-13"><strong>Password :</strong> <span class="ms-2"> ******* </span></p>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="text-start mt-3">
                                    <p class="text-muted mb-2 font-13"><strong>Department :</strong> <span class="ms-2"> {{ ($user->department) ? ($user->department->name ?? "") : "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Position :</strong> <span class="ms-2"> {{ $user->position ?? "" }} </span></p>
                                    
                                    <p class="text-muted mb-2 font-13"><strong>Degree :</strong> <span class="ms-2"> {{ $user->degree ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Address :</strong> <span class="ms-2"> {{ $user->address ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Permission :</strong>
                                        <span class="ms-2">
                                            @forelse ($user->roles as $role)
                                                {{ $role->name }}
                                            @empty
                                                No Permission
                                            @endforelse
                                        </span>
                                    </p>

                                    <p class="text-muted mb-2 font-13"><strong>Status :</strong>
                                        <span class="ms-2">
                                            @if ($user->status == "active")
                                                <span class="badge badge-success-lighten"> Active </span>
                                            @elseif ($user->status == "inactive")
                                                <span class="badge badge-warning-lighten"> Inactive </span>
                                            @elseif ($user->status == "blocked")
                                                <span class="badge badge-danger-lighten"> Blocked </span>
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="float-end">
                            @can('user_create')
                                <a href="{{ url('admin-panel/dashboard/users') }}" class="btn btn-primary button-last"> Go Back </a>
                            @endcan

                            @can('user_edit')
                                <a href="{{ url('admin-panel/dashboard/users/'. $user->id .'/edit') }}" class="btn btn-success button-last"> Edit </a>
                            @endcan

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
