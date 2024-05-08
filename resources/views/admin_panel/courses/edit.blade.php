<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Course Edit' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard/courses') }}"> Courses </a></li>
                            <li class="breadcrumb-item active"> Edit </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Course Edit </h4>
                </div>
            </div>
        </div>

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
                <div class="card text-center">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="text-start mt-3">
                                <form action="{{ url('admin-panel/dashboard/courses', $course->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
            
                                    @include('admin_panel.courses.form')
                                    
                                    <div class="float-end">
                                        <a href="{{ url('admin-panel/dashboard/courses') }}" class="btn btn-primary button-last"> Go Back </a>
                                        <button type="submit" class="btn btn-success button-last"> Save </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
