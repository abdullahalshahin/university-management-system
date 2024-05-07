<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="full_name"> Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="full_name" name="full_name" value="{{ old('full_name', $student->full_name ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-3">
        <label for="gender"> Gender </label>
        <select class="form-select" id="gender" name="gender">
            <option value="" selected disabled> Choose Gender </option>
            <option value="Male" {{ (old('gender') ?? ($student->gender ?? "")) == "Male" ? 'selected' : "" }}> Male </option>
            <option value="Female" {{ (old('gender') ?? ($student->gender ?? "")) == "Female" ? 'selected' : "" }}> Female </option>
            <option value="Oters" {{ (old('gender') ?? ($student->gender ?? "")) == "Oters" ? 'selected' : "" }}> Oters </option>
        </select>
    </div>

    <div class="mb-2 col-md-3">
        <label for="date_of_birth"> Date of Birth </label>
        <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth ?? "") }}" placeholder="">
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-4">
        <label for="department_id"> Department <span class="text-danger">*</span></label>
        <select id="department_id" name="department_id" class="form-select" required>
            <option value="" selected disabled> Choose Designation </option>
            @foreach ($departments as $designation)
                <option value="{{ $designation->id }}" {{ (old('department_id') ?? ($student->department_id ?? '')) == $designation->id ? 'selected' : '' }}>
                    {{ $designation->name ?? "" }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-2 col-md-4">
        <label for="mobile_number"> Mobile Number <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="mobile_number" name="mobile_number" value="{{ old('mobile_number', $student->mobile_number ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-4">
        <label for="email"> Email <span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $student->email ?? "") }}" placeholder="" required>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="password"> Password <span class="text-danger">*</span></label>
        <div class="input-group input-group-merge">
            <input type="password" id="password" name="password" value="{{ old('password', $student->security ?? "") }}" class="form-control" placeholder="" required>
            <div class="input-group-text" data-password="false">
                <span class="password-eye"></span>
            </div>
        </div>
    </div>

    <div class="mb-2 col-md-6">
        <label for="password_confirmation"> Confirm Password <span class="text-danger">*</span></label>
        <div class="input-group input-group-merge">
            <input type="password" id="password_confirmation" name="password_confirmation" value="{{ old('password_confirmation', $student->security ?? "") }}" class="form-control" placeholder="" required>
            <div class="input-group-text" data-password="false">
                <span class="password-eye"></span>
            </div>
        </div>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="guardian_name"> Guardian Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="guardian_name" name="guardian_name" value="{{ old('guardian_name', $student->guardian_name ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-6">
        <label for="guardian_mobile"> Guardian Mobile <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="guardian_mobile" name="guardian_mobile" value="{{ old('guardian_mobile', $student->guardian_mobile ?? "") }}" placeholder="" required>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-12">
        <label for="address"> Address </label>
        <textarea class="form-control" id="address" name="address" rows="5">{{ old('address', $student->address ?? "") }}</textarea>
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
            <option value="active" {{ (old('input_status') ?? ($student->status ?? "")) == "active" ? 'selected' : "" }}> Active </option>
            <option value="inactive" {{ (old('input_status') ?? ($student->status ?? "")) == "inactive" ? 'selected' : "" }}> Inactive </option>
            <option value="blocked" {{ (old('input_status') ?? ($student->status ?? "")) == "blocked" ? 'selected' : "" }}> Blocked </option>
        </select>
    </div>
</div>
