<x-student-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Notice |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('student-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> Notice </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Notice </h4>
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
                <div class="card d-block">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <h3 class="mt-0">{{ $notice->name ?? "" }} <span><i>({{ ($notice->created_at) ? $notice->created_at->diffForHumans() : "" }})</i></span></h3>
                        </div>

                        <h5>Details:</h5>

                        <p class="text-muted mb-2">{{ $notice->details ?? "" }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-student-layout>
