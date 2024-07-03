<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="department_id"> Department <span class="text-danger">*</span></label>
        <select id="department_id" name="department_id" class="form-select" required>
            <option value="" selected disabled> Choose Designation </option>
            @foreach ($departments as $designation)
                <option value="{{ $designation->id }}" {{ (old('department_id') ?? ($semester->department_id ?? '')) == $designation->id ? 'selected' : '' }}>
                    {{ $designation->name ?? "" }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-2 col-md-6">
        <label for="name"> Name <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $semester->name ?? "") }}" placeholder="" required>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="open_date"> Open Date <span class="text-danger">*</span> </label>
        <input type="date" class="form-control" id="open_date" name="open_date" value="{{ old('open_date', $semester->open_date ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-6">
        <label for="closed_date"> Closed Date <span class="text-danger">*</span> </label>
        <input type="date" class="form-control" id="closed_date" name="closed_date" value="{{ old('closed_date', $semester->closed_date ?? "") }}" placeholder="" required>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-12">
        <label for="description"> Description </label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $semester->description ?? "") }}</textarea>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="input_status"> Status <span class="text-danger">*</span> </label>
        <select class="form-select" id="input_status" name="input_status" required>
            <option value="" selected disabled> Choose Status </option>
            <option value="active" {{ (old('input_status') ?? ($semester->status ?? "")) == "active" ? 'selected' : "" }}> Active </option>
            <option value="inactive" {{ (old('input_status') ?? ($semester->status ?? "")) == "inactive" ? 'selected' : "" }}> Inactive </option>
            <option value="closed" {{ (old('input_status') ?? ($semester->status ?? "")) == "closed" ? 'selected' : "" }}> Closed </option>
        </select>
    </div>
</div>
