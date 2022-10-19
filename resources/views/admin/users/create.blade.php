@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a
                                    href="/admin/users?type={{ $userType }}">{{ Str::of($userType)->title()->plural() }}</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                    <h2 class="h4">Add new {{ Str::of($userType)->title()->singular }}</h2>
                </div>
            </div>

            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <form action="{{ action('UsersController@store', ['type' => $userType]) }}" method="post">
                    @csrf
                    <div class="row mb-4">
                        <div class="col-lg-8 col-sm-12">
                            <div class="mb-4">
                                <label for="name">Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" aria-describedby="name" required>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="mb-4">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" aria-describedby="email" required>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="mb-4">
                                <label for="email">Date of birth</label>
                                <input type="date" class="form-control @error('DOB') is-invalid @enderror" name="DOB"
                                    aria-describedby="DOB" required>
                                @error('DOB')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="mb-4">
                                <label for="email">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror"
                                    name="address" aria-describedby="address" required>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="mb-4">
                                <label for="gender">Gender</label>
                                <select class="form-control  @error('gender') is-invalid @enderror" name="gender" required>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if ($userType === 'students')
                            <div class="col-lg-8 col-sm-12">
                                <div class="mb-4">
                                    <label for="ID">Student ID</label>
                                    <input type="text" class="form-control @error('Id') is-invalid @enderror"
                                        name="Id" aria-describedby="text" required>
                                    @error('Id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-4">
                                <label for="email">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    name="password" aria-describedby="password" required>
                                @unless($errors->has('password'))
                                    <small class="form-text text-muted">Password must be at least 8 characters long</small>
                                @endunless
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="mb-4">
                                <label for="password_confirmation">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    aria-describedby="password_confirmation" required>
                            </div>
                        </div>
                        <div class="col-lg-8 col-sm-12">
                            <div class="mb-4">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror"
                                    name="phone" aria-describedby="phone">
                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input type="hidden" name="type" value="{{ $userType }}">
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
