<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Client Show' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard/clients') }}"> Clients </a></li>
                            <li class="breadcrumb-item active"> Show </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Client Show </h4>
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
                        @if ($client->profile_image)
                            <img src="{{ url('images/clients', $client->profile_image) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile_image" />
                        @else
                            <img src="{{ asset('assets/images/avator.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile_image" />
                        @endif

                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="text-start mt-3">
                                    <p class="text-muted mb-2 font-13"><strong>Name :</strong> <span class="ms-2"> {{ $client->full_name ?? "" }} </span></p>
                                    
                                    <p class="text-muted mb-2 font-13"><strong>Mobile Number :</strong> <span class="ms-2"> {{ $client->mobile_number ?? "" }} </span></p>
    
                                    <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2"> {{ $client->email ?? "" }} </span></p>
    
                                    <p class="text-muted mb-2 font-13"><strong>Password :</strong> <span class="ms-2"> {{ $client->security ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Address :</strong> <span class="ms-2"> {{ $client->address ?? "" }} </span></p>

                                    <p class="text-muted mb-2 font-13"><strong>Status :</strong>
                                        <span class="ms-2">
                                            @if ($client->status == "active")
                                                <span class="badge badge-success-lighten"> Active </span>
                                            @elseif ($client->status == "inactive")
                                                <span class="badge badge-warning-lighten"> Inactive </span>
                                            @elseif ($client->status == "blocked")
                                                <span class="badge badge-danger-lighten"> Blocked </span>
                                            @endif
                                        </span>
                                    </p>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="text-start mt-3">
                                </div>
                            </div>
                        </div>

                        <div class="float-end">
                            @can('client_view')
                                <a href="{{ url('admin-panel/dashboard/clients') }}" class="btn btn-primary button-last"> Go Back </a>
                            @endcan
                            
                            @can('client_edit')
                                <a href="{{ url('admin-panel/dashboard/clients/'. $client->id .'/edit') }}" class="btn btn-success button-last"> Edit </a>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
