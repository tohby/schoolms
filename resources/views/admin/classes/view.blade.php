@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/classes">Classes</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $class->classId }}</li>
                        </ol>
                    </nav>
                    <h2 class="h4">View User</h2>
                </div>
            </div>

            <div class="card card-body border-0 shadow table-wrapper table-responsive mb-4">
                <div class="row">
                    <div class="col-lg-8">
                        <h6>Teacher: <strong>{{ $class->teacher->name }}</strong></h6>
                        <p>Course: {{ $class->course->name }}</p>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow table-wrapper table-responsive">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Students</h6>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <button type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#modal-default"> <svg class="icon icon-xs me-2"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Add student to class</button>
                            </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">#</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Email</th>
                                    <th class="border-0">DOB</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($class->students as $key => $student)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td class="fw-bold d-flex align-items-center">{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->DOB }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card border-0 shadow table-wrapper table-responsive mt-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Attendance</h6>
                            <div class="btn-toolbar mb-2 mb-md-0">
                                <button type="button" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center"
                                    data-bs-toggle="modal" data-bs-target="#modal-attendance"> <svg
                                        class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                    </svg>
                                    Take attendance</button>
                            </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($class->attendances->unique('date') as $item)
                            <div class="col">
                                <a href="{{ $class->id }}/{{ $item->date }}">
                                    {{ $item->date }}
                                </a>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
        @include('admin/classes/addStudent')
        @include('admin/classes/takeAttendance')
    </div>
@endsection
