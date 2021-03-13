@extends('layouts.dashboard.app')
@section('content')


    <h2>Users</h2>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.users.index') }}">Users</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>



    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form action="{{ route('dashboard.users.store') }}" method="post">
                    @csrf

                    {{-- Name --}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Email --}}
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror">
                        @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Password --}}
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror">
                        @error('password') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Password Confirmation --}}
                    <div class="form-group">
                        <label>Password Confirmation</label>
                        <input type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" class="form-control @error('password_confirmation') is-invalid @enderror">
                        @error('password_confirmation') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Roles --}}
                    <div class="form-group">
                        <label>Roles</label>
                        <select name="role_id" class="form-control @error('role_id') is-invalid @enderror">
                            <option></option>
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        <a href="{{ route('dashboard.roles.create') }}">Create new role</a>
                    </div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@stop
