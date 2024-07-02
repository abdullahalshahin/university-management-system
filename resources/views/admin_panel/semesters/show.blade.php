<x-app-layout>
    <x-slot name="page_title">{{ $page_title ?? 'Semester Show |' }}</x-slot>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard') }}"> Dashboard </a></li>
                            <li class="breadcrumb-item"><a href="{{ url('admin-panel/dashboard/semesters') }}"> Semesters </a></li>
                            <li class="breadcrumb-item active"> Show </li>
                        </ol>
                    </div>

                    <h4 class="page-title"> Semester Show </h4>
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
                <div class="card text-center">
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="text-start mt-3">
                                <p class="text-muted mb-2 font-13"><strong>Name :</strong> <span class="ms-2"> {{ $semester->name ?? "" }} </span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>Department :</strong> <span class="ms-2"> {{ $semester->department->name ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Open Date :</strong> <span class="ms-2"> {{ $semester->open_date ?? "" }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Closed Date :</strong> <span class="ms-2"> {{ $semester->closed_date ?? "" }} </span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>Semester Courses :</strong> <span class="ms-2"> {{ $semester->semester_courses->count() }} </span></p>

                                <p class="text-muted mb-2 font-13"><strong>Description :</strong> <span class="ms-2"> {{ $semester->description ?? "" }} </span></p>
                                
                                <p class="text-muted mb-2 font-13"><strong>Status :</strong>
                                    <span class="ms-2"> 
                                        @if ($semester->status == "active")
                                            <span class="badge badge-success-lighten"> Active </span>
                                        @elseif ($semester->status == "inactive")
                                            <span class="badge badge-danger-lighten"> Inactive </span>
                                        @elseif ($semester->status == "closed")
                                            <span class="badge badge-danger-lighten"> Closed </span>
                                        @endif
                                    </span>
                                </p>
                            </div>
                        </div>

                        <div class="float-end">
                            <button type="button" class="btn btn-info" data-bs-toggle="modal" id="semester_courses_btn" data-bs-target="#semester_course_modal">Semester Course Assign</button>
                            <a href="{{ url('admin-panel/dashboard/semesters') }}" class="btn btn-primary button-last"> Go Back </a>
                            <a href="{{ url('admin-panel/dashboard/semesters/'. $semester->id .'/edit') }}" class="btn btn-success button-last"> Edit </a>
                        </div>
                    </div>

                    @if ($semester->semester_courses->count())
                        <hr>

                        <div class="card-body text-start">
                            <h4>Assigned Semester Course</h4>

                            <table class="table table-sm table-centered mb-0">
                                <thead>
                                    <tr>
                                        <td> SL </td>
                                        <th> Course </th>
                                        <th> Teacher </th>
                                        <th> Description </th>
                                        <th> Action </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($semester->semester_courses as $key => $semester_course)
                                        <tr>
                                            <td> {{ ++$key }} </td>

                                            <td> {{ $semester_course->course->name }} </td>

                                            <td> {{ $semester_course->teacher->name }} </td>

                                            <td> {{ $semester_course->description }} </td>

                                            <td>
                                                <form action="{{ url('admin-panel/dashboard/unassign-semester-course', $semester_course->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="button" class="btn action-icon" data-bs-toggle="modal" id="semester_courses_edit_btn" data-id="{{ $semester_course->id }}" data-bs-target="#semester_course_edit_modal"><i class="mdi mdi-square-edit-outline"></i></button>

                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit" class="btn action-icon" data-toggle="tooltip" title='Delete'><i class="mdi mdi-delete"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="semester_course_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"> Semester Course Assign </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>

                <div class="modal-body">
                    <form action="{{ url('admin-panel/dashboard/semester-course-assign', $semester->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="course_id"> Course <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" name="course_id" id="course_id" required>
                                    <option value="" selected disabled> Choose Course </option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="teacher_id"> Teacher <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" name="teacher_id" id="teacher_id" required>
                                    <option value="" selected disabled> Choose Teacher </option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->name }} - {{ $teacher->email }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="mb-2 col-md-12">
                                <label for="description"> Description </label>
                                <textarea class="form-control" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="semester_course_edit_modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myLargeModalLabel"> Assigned Semester Course Edit </h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                </div>

                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data" id="assigned_semester_course_edit_form">
                        @csrf
                        
                        <div class="row g-2">
                            <div class="mb-3 col-md-6">
                                <label for="edit_course_id"> Course <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" name="edit_course_id" id="edit_course_id" required>
                                    <option value="" selected disabled> Choose Course </option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">
                                            {{ $course->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="edit_teacher_id"> Teacher <span class="text-danger">*</span></label>
                                <select class="form-control form-control-sm" name="edit_teacher_id" id="edit_teacher_id" required>
                                    <option value="" selected disabled> Choose Teacher </option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">
                                            {{ $teacher->name }} - {{ $teacher->email }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="mb-2 col-md-12">
                                <label for="edit_description"> Description </label>
                                <textarea class="form-control" id="edit_description" name="edit_description" rows="5">{{ old('edit_description') }}</textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- script -->
    <x-slot name="script">
        <script type="text/javascript">
            $('body').on('click', '#semester_courses_edit_btn', function () {
                var semester_course_id = $(this).data('id');

                var assigned_semester_course_edit_form_ction = `{{ url('admin-panel/dashboard/assigned-semester-course') }}/${semester_course_id}/update`;
                $('#assigned_semester_course_edit_form').attr('action', assigned_semester_course_edit_form_ction);

                $.ajax({
                    url: `{{ url('admin-panel/dashboard/assigned-semester-course/${semester_course_id}/edit') }}`,
                    type: "GET",
                    dataType: 'json',
                    success: function (result) {
                        console.log(result);
                        $('#edit_course_id').val(result.semester_course.course_id || '');
                        $('#edit_teacher_id').val(result.semester_course.teacher_id || '');
                        $('#edit_description').val(result.semester_course.description || '');
                    }
                });
            });
        </script>
    </x-slot>
</x-app-layout>
