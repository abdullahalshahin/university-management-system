<div class="row g-2">
    <div class="mb-2 col-md-8">
        <label for="name"> Name <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $branch->name ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-4">
        <label for="code"> Code <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $branch->code ?? "") }}" placeholder="" required>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="contact_number_1"> Contact Number 1 <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="contact_number_1" name="contact_number_1" value="{{ old('contact_number_1', $branch->contact_number_1 ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-6">
        <label for="contact_number_2"> Contact Number 2 </label>
        <input type="text" class="form-control" id="contact_number_2" name="contact_number_2" value="{{ old('contact_number_2', $branch->contact_number_2 ?? "") }}" placeholder="">
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="email"> Email </label>
        <input type="text" class="form-control" id="email" name="email" value="{{ old('email', $branch->email ?? "") }}" placeholder="">
    </div>

    <div class="mb-2 col-md-6">
        <label for="domain"> Domain </label>
        <input type="text" class="form-control" id="domain" name="domain" value="{{ old('domain', $branch->domain ?? "") }}" placeholder="">
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-12">
        <label for="address"> Address <span class="text-danger">*</span> </label>
        <textarea class="form-control" id="address" name="address" rows="3" required>{{ old('address', $branch->address ?? "") }}</textarea>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="input_status"> Status <span class="text-danger">*</span> </label>
        <select class="form-select" id="input_status" name="input_status" required>
            <option value="" selected disabled> Choose Status </option>
            <option value="active" {{ (old('input_status') ?? ($branch->status ?? "")) == "active" ? 'selected' : "" }}> Active </option>
            <option value="inactive" {{ (old('input_status') ?? ($branch->status ?? "")) == "inactive" ? 'selected' : "" }}> Inactive </option>
            <option value="closed" {{ (old('input_status') ?? ($branch->status ?? "")) == "closed" ? 'selected' : "" }}> Closed </option>
        </select>
    </div>

    <div class="mb-2 col-md-6">
        <label for="thumbnail_image"> Thumbnail Image </label>
        <input type="file" class="form-control" id="thumbnail_image" name="thumbnail_image" accept="image/png, image/gif, image/jpeg">
    </div>
</div>
