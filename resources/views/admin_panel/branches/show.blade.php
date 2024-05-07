<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Branch Show |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard/branches') }}"> Branches </a></li>
                            <li class="breadcrumb-item active"> Show </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Branch Show </h4>
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
                        @if ($branch->thumbnail_image)
                            <img src="{{ url('images/branches', $branch->thumbnail_image) }}" class="rounded avatar-lg img-thumbnail" alt="thumbnail_image" />
                        @else
                            <img src="{{ asset('assets/images/no-image.png') }}" class="rounded avatar-lg img-thumbnail" alt="thumbnail_image" />
                        @endif

                        <div class="row mb-2">
                            <div class="text-start mt-3">
                                <p class="text-muted mb-2 font-13"><strong>Code :</strong> <span class="ms-2"> {{ $branch->code ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Name :</strong> <span class="ms-2"> {{ $branch->name ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Contact Number 1 :</strong> <span class="ms-2"> {{ $branch->contact_number_1 ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Contact Number 2 :</strong> <span class="ms-2"> {{ $branch->contact_number_2 ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Email :</strong> <span class="ms-2"> {{ $branch->email ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Domain :</strong> <span class="ms-2"> {{ $branch->domain ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Address :</strong> <span class="ms-2"> {{ $branch->address ?? "" }} </span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>Status :</strong>
                                    <span class="ms-2"> 
                                        @if ($branch->status == "active")
                                            <span class="badge badge-success-lighten"> Active </span>
                                        @elseif ($branch->status == "inactive")
                                            <span class="badge badge-danger-lighten"> Inactive </span>
                                        @elseif ($branch->status == "closed")
                                            <span class="badge badge-danger-lighten"> Closed </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="float-end">
                            <a href="{{ url('admin-panel/dashboard/branches') }}" class="btn btn-primary button-last"> Go Back </a>
                            <a href="{{ url('admin-panel/dashboard/branches/'. $branch->id .'/edit') }}" class="btn btn-success button-last"> Edit </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
