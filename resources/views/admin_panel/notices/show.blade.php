<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Notice Show |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard/notices') }}"> Notices </a></li>
                            <li class="breadcrumb-item active"> Show </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Notice Show </h4>
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
                        <div class="row mb-2">
                            <div class="text-start mt-3">
                                <p class="text-muted mb-2 font-13"><strong>Name :</strong> <span class="ms-2"> {{ $noticename ?? "" }} </span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>Date From :</strong> <span class="ms-2"> {{ $notice->date_from ?? "" }} </span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>Date To :</strong> <span class="ms-2"> {{ $notice->date_to ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>details :</strong> <span class="ms-2"> {{ $notice->details ?? "" }} </span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>Status :</strong>
                                    <span class="ms-2"> 
                                        @if ($notice->status == "Active")
                                            <span class="badge badge-success-lighten"> Active </span>
                                        @elseif ($notice->status == "Inactive")
                                            <span class="badge badge-danger-lighten"> Inactive </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="float-end">
                            <a href="{{ url('admin-panel/dashboard/notices') }}" class="btn btn-primary button-last"> Go Back </a>
                            <a href="{{ url('admin-panel/dashboard/notices/'. $notice->id .'/edit') }}" class="btn btn-success button-last"> Edit </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
