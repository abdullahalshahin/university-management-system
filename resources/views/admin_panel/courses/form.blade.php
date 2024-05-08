<div class="row g-2">
    <div class="mb-2 col-md-3">
        <label for="code"> Code <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="code" name="code" value="{{ old('code', $course->code ?? "") }}" placeholder="" required>
    </div>
    
    <div class="mb-2 col-md-6">
        <label for="name"> Name <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $course->name ?? "") }}" placeholder="" required>
    </div>

    <div class="mb-2 col-md-3">
        <label for="credits"> Credits </label>
        <input type="text" class="form-control" id="credits" name="credits" value="{{ old('credits', $course->credits ?? "") }}" placeholder="">
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-12">
        <label for="description"> Description </label>
        <textarea class="form-control" id="description" name="description" rows="5">{{ old('description', $course->description ?? "") }}</textarea>
    </div>
</div>

<div class="row g-2">
    <div class="mb-2 col-md-6">
        <label for="pdf_file"> PDF File </label>
        <input type="file" class="form-control" id="pdf_file" name="pdf_file" accept="">

        @if (Request::segment(5) == "edit" && $course->pdf_file)
            <a href="{{ url('files/courses', $course->pdf_file) }}" target="_blank" rel="noopener noreferrer">{{ $course->pdf_file ?? '' }}</a>
        @endif
    </div>

    <div class="mb-2 col-md-6">
        <label for="input_status"> Status <span class="text-danger">*</span> </label>
        <select class="form-select" id="input_status" name="input_status" required>
            <option value="" selected disabled> Choose Status </option>
            <option value="active" {{ (old('input_status') ?? ($course->status ?? "")) == "active" ? 'selected' : "" }}> Active </option>
            <option value="inactive" {{ (old('input_status') ?? ($course->status ?? "")) == "inactive" ? 'selected' : "" }}> Inactive </option>
        </select>
    </div>
</div>
