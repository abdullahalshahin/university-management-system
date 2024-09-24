<x-student-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Notices |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('student-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> Notices </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Notices </h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="notification_alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
            @foreach ($notices as $notice)
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="flex-shrink-0">
                                    <div class="avatar-sm">
                                        <span class="avatar-title bg-info-lighten text-info rounded">
                                            <i class="mdi mdi-page-layout-header font-24"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <a href="{{ url('student-panel/dashboard/notices', $notice->id) }}" class="font-16 fw-bold text-secondary">{{ $notice->name ?? "" }} <span><i>({{ ($notice->created_at) ? $notice->created_at->diffForHumans() : "" }})</i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-student-layout>
