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
                    <h2 class="h4">View Attendance for {{ $class->classId }} on {{ $date }}</h2>
                </div>
            </div>

            <div class="card card-body border-0 shadow table-wrapper table-responsive mb-4">
                <div class="row">
                    <div class="col-lg-8">
                        <h6>Teacher: <strong>{{ $class->teacher->name }}</strong></h6>
                        <p>Course: {{ $class->course->code }}</p>
                    </div>
                </div>
            </div>

            <div class="card border-0 shadow table-wrapper table-responsive">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0 rounded">
                            <thead class="thead-light">
                                <tr>
                                    <th class="border-0 rounded-start">#</th>
                                    <th class="border-0">Code</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($attendance as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $item->student->studentId }}</td>
                                        <td>{{ $item->student->name }}</td>
                                        <td class="{{ $item->status === 1 ? 'text-success' : 'text-danger' }}">
                                            {{ $item->status === 0 ? 'Absent' : 'Present' }}</td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
@endsection
