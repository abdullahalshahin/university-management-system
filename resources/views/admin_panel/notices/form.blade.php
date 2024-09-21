<div class="row g-2">
    <div class="mb-2 col-md-8">
        <label for="name"> Name <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $notice->name ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-2">
        <label for="date_from"> Date From <span class="text-danger">*</span> </label>
        <input type="date" class="form-control" id="date_from" name="date_from" value="{{ old('date_from', $notice->date_from ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-2">
        <label for="date_to"> Date To <span class="text-danger">*</span> </label>
        <input type="date" class="form-control" id="date_to" name="date_to" value="{{ old('date_to', $notice->date_to ?? "") }}" placeholder="" required>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-12">
        <label for="details"> Details </label>
        <textarea class="form-control" id="details" name="details" rows="5">{{ old('details', $notice->details ?? "") }}</textarea>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="input_status"> Status <span class="text-danger">*</span> </label>
        <select class="form-select" id="input_status" name="input_status" required>
            <option value="" selected disabled> Choose Status </option>
            <option value="Active" {{ (old('input_status') ?? ($notice->status ?? "")) == "Active" ? 'selected' : "" }}> Active </option>
            <option value="Inactive" {{ (old('input_status') ?? ($notice->status ?? "")) == "Inactive" ? 'selected' : "" }}> Inactive </option>
        </select>
    </div>
</div>
