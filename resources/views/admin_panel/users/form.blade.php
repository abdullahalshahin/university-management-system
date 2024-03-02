<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="name"> Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-3">
        <label for="gender"> Gender </label>
        <select class="form-select" id="gender" name="gender" required>
            <option value="" selected disabled> Choose Gender </option>
            <option value="Male" {{ (old('gender') ?? ($user->gender ?? "")) == "Male" ? 'selected' : "" }}> Male </option>
            <option value="Female" {{ (old('gender') ?? ($user->gender ?? "")) == "Female" ? 'selected' : "" }}> Female </option>
            <option value="Others" {{ (old('gender') ?? ($user->gender ?? "")) == "Others" ? 'selected' : "" }}> Others </option>
        </select>
    </div>

    <div class="mb-2 col-md-3">
        <label id=""> Date Of Birth </label>
        <input type="text" id="basic-datepicker" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth ?? "") }}" class="form-control" placeholder="">
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-4">
        <label for="department_id"> Department <span class="text-danger">*</span></label>
        <select id="department_id" name="department_id" class="form-select">
            <option value="" selected disabled> Choose Department </option>
            @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ (old('department_id') ?? ($user->department_id ?? '')) == $department->id ? 'selected' : '' }}>
                    {{ $department->name ?? "" }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-2 col-md-4">
        <label for="degree"> Degree <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="degree" name="degree" value="{{ old('degree', $user->degree ?? "") }}" placeholder="">
    </div>

    <div class="mb-2 col-md-4">
        <label for="position"> Position <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="position" name="position" value="{{ old('position', $user->position ?? "") }}" placeholder="">
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="mobile_number"> Mobile Number <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-6">
        <label for="email"> Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email ?? "") }}" placeholder="" required>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="password"> Password <span class="text-danger">*</span></label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" name="password" value="{{ old('password', $user->security ?? "") }}" class="form-control" placeholder="" required>
            <div class="input-group-text" data-password="false">
                <span class="password-eye"></span>
            </div>
        </div>
    </div>

    <div class="mb-2 col-md-6">
        <label for="password_confirmation"> Confirm Password <span class="text-danger">*</span></label>
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
        <label for="role_ids"> Role <span class="text-danger">*</span> </label>
        <select class="select2 form-control select2-multiple" id="role_ids" name="role_ids[]" data-toggle="select2" multiple="multiple" data-placeholder="Choose ..." required>
            @foreach ($roles as $role)
                <option value="{{ $role->id }}" {{ in_array($role->id, (old('role_ids', []) ? old('role_ids', []) : $role_ids ?? [])) ? 'selected' : '' }}>
                    {{ $role->name ?? "" }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-12">
        <label for="address"> Address </label>
        <textarea class="form-control" id="address" name="address" rows="5">{{ old('address', $user->address ?? "") }}</textarea>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="profile_image"> Profile Image </label>
        <input type="file" class="form-control" id="profile_image" name="profile_image" accept="image/png, image/gif, image/jpeg">
    </div>

    <div class="mb-2 col-md-6">
        <label for="input_status"> Status <span class="text-danger">*</span></label>
        <select class="form-select" id="input_status" name="input_status" required>
            <option value="" selected disabled> Choose Status </option>
            <option value="active" {{ (old('input_status') ?? ($user->status ?? "")) == "active" ? 'selected' : "" }}> Active </option>
            <option value="inactive" {{ (old('input_status') ?? ($user->status ?? "")) == "inactive" ? 'selected' : "" }}> Inactive </option>
            <option value="blocked" {{ (old('input_status') ?? ($user->status ?? "")) == "blocked" ? 'selected' : "" }}> Blocked </option>
        </select>
    </div>
</div>
