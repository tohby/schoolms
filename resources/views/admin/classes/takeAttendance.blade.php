<div class="modal fade show" id="modal-attendance" tabindex="-1" role="dialog" aria-labelledby="modal-attendance"
    aria-modal="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Take Attendance</h2><button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ action('ClassesController@attendance') }}" method="post">
                @csrf
                <div class="modal-body">
                    @foreach ($class->students as $student)
                        <div class="row px-4">
                            <div class="col-md-8">{{ $student->name }}
                                <input type="hidden" name="student[] {{ $student->id }}" value="{{ $student->id }}">
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="{{ $student->id }}"
                                        name="status[] {{ $student->id }}" value="1" checked>Present
                                    <label class="form-check-label" for="status"></label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="form-check-input" id="{{ $student->id }}"
                                        name="status[] {{ $student->id }}" value="0">Absent
                                    <label class="form-check-label" for="status"></label>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <input type="hidden" name="classId" value="{{ $class->id }}">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link text-gray-600 ms-auto"
                        data-bs-dismiss="modal">Close</button>
                    <button type="Submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
