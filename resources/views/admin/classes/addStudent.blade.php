<div class="modal fade show" id="modal-default" tabindex="-1" role="dialog" aria-labelledby="modal-default"
    aria-modal="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="h6 modal-title">Add students to class</h2><button type="button" class="btn-close"
                    data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ action('ClassesController@addStudent') }}" method="post">
                @csrf
                <div class="modal-body">
                    <select class="selectpicker" name="students" data-width="100%" data-live-search="true" multiple>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>
                    <input type="hidden" name="class" value="{{ $class->id }}">
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
