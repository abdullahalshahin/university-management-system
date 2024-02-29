<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'My Account Edit' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item active"> My Account Edit </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> My Account Edit </h4>
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
                        @if ($user->profile_image)
                            <img src="{{ url('images/users', $user->profile_image) }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile_image" />
                        @else
                            <img src="{{ asset('assets/images/avator.png') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile_image" />
                        @endif

                        <div class="row mb-2">
                            <div class="text-start mt-3">
                                <form action="{{ url('admin-panel/dashboard/my-account-update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="row g-2">
                                        <div class="mb-2 col-md-12">
                                            <label for="name"> Name <span class="text-danger">*</span> </label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name ?? "") }}" placeholder="" required>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="mobile_number"> Mobile Number </label>
                                            <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number ?? "") }}" placeholder="" readonly>
                                        </div>
                                    
                                        <div class="mb-2 col-md-6">
                                            <label for="email"> Email </label>
                                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email ?? "") }}" placeholder="" readonly>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="password"> Password <span class="text-danger">*</span> </label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password" name="password" value="{{ old('password', $user->security ?? "") }}" class="form-control" placeholder="" required>
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="mb-2 col-md-6">
                                            <label for="password_confirmation"> Confirm Password <span class="text-danger">*</span> </label>
                                            <div class="input-group input-group-merge">
                                                <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation', $user->security ?? "") }}" class="form-control" placeholder="" required>
                                                <div class="input-group-text" data-password="false">
                                                    <span class="password-eye"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2">
                                        <div class="mb-2 col-md-12">
                                            <label for="address"> Address <span class="text-danger">*</span> </label>
                                            <textarea class="form-control" id="address" name="address" rows="5" required>{{ old('address', $user->address ?? "") }}</textarea>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-2">
                                        <div class="mb-2 col-md-6">
                                            <label for="profile_image"> Profile Image </label>
                                            <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/gif, image/jpeg">
                                        </div>
                                    </div>
                                    
                                    <div class="float-end">
                                        <a href="{{ url('admin-panel/dashboard/my-account') }}" class="btn btn-primary"> Go Back </a>
                                        <button type="submit" class="btn btn-success"> Save </button>
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
