@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/classes">Classes</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                    <h2 class="h4">Add new Class</h2>
                </div>
            </div>

            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <form action="{{ action('ClassesController@store') }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-12 col-sm-12">
                            <div class="mb-4">
                                <select class="selectpicker form-select" data-live-search="true" name="teacher">
                                    <option value="" selected>Select Teacher</option>
                                    @foreach ($teachers as $teacher)
                                        <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <div class="mb-4">
                                <select class="selectpicker form-select" data-live-search="true" name="course"
                                    width='auto'>
                                    <option value="" selected>Select Course</option>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="mb-4">
                                <label for="classId">Class ID</label>
                                <input type="text" class="form-control @error('classId') is-invalid @enderror"
                                    name="classId" aria-describedby="code" required>
                                @error('classId')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
