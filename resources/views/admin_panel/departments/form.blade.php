<div class="row g-2">
    <div class="mb-2 col-md-8">
        <label for="name"> Name <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $department->name ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-4">
        <label for="code"> Code <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $department->code ?? "") }}" placeholder="" required>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-4">
        <label for="branch_id"> Branch <span class="text-danger">*</span> </label>
        <select id="branch_id" name="branch_id" class="form-select" required>
            <option value=""> Choose Branch </option>
            @foreach ($branches as $branch)
                <option value="{{ $branch->id }}" {{ (old('branch_id') ?? ($department->branch_id ?? '')) == $branch->id ? 'selected' : '' }}>
                    {{ $branch->name ?? "" }}
                </option>
            @endforeach
        </select>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-12">
        <label for="description"> Description </label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $department->description ?? "") }}</textarea>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="input_status"> Status <span class="text-danger">*</span> </label>
        <select class="form-select" id="input_status" name="input_status" required>
            <option value="" selected disabled> Choose Status </option>
            <option value="active" {{ (old('input_status') ?? ($department->status ?? "")) == "active" ? 'selected' : "" }}> Active </option>
            <option value="inactive" {{ (old('input_status') ?? ($department->status ?? "")) == "inactive" ? 'selected' : "" }}> Inactive </option>
            <option value="closed" {{ (old('input_status') ?? ($department->status ?? "")) == "closed" ? 'selected' : "" }}> Closed </option>
        </select>
    </div>
</div>
