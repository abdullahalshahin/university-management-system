<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'System Settings |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> System Settings </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> System Settings </h4>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success" id="notification_alert">
                <p>{{ $message }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input. <br><br>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">System Cache Clear</h4>
                                <p class="text-muted font-14">Clearing the system cache can help to resolve issues and improve the performance of your application.</p>

                                <form action="{{ url('admin-panel/dashboard/application-cache-clear') }}" method="GET" class="ml-3">
                                    @csrf
                                    @method('GET')

                                    <button type="submit" class="btn btn-secondary rounded-pill">Clear Cache</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <x-slot name="script">
        <script type="text/javascript">
            $(document).ready(function() {
                $('#notification_alert').delay(3000).fadeOut('slow');
            });
        </script>
    </x-slot>
</x-app-layout>
