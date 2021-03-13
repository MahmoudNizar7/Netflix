@extends('layouts.dashboard.app')
@section('content')


    <h2>Role</h2>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('dashboard.roles.index') }}">Role</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ul>



    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form action="{{ route('dashboard.roles.store') }}" method="post">
                    @csrf

                    {{-- Name --}}
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror">
                        @error('name') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    {{-- Permission --}}
                    <div class="form-group">
                        <h4 style="font-weight: 400">Permissions</h4>
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th style="width: 10%">#</th>
                                <th style="width: 30%">Model</th>
                                <th>Permissions</th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $models = ['categories', 'movies', 'users', 'settings'];
                                $permission_maps = ['create', 'read', 'update', 'delete'];
                            @endphp

                            @foreach($models as $index => $model)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td class="text-capitalize">{{ $model }}</td>
                                    <td>

                                        @if($model == 'settings')
                                            @php
                                                $permission_maps = ['create', 'read'];
                                            @endphp
                                        @endif

                                        <select name="permissions[]" class="form-control select2  @error('permissions') is-invalid @enderror" multiple>
                                            @foreach($permission_maps as $permission_map)
                                                <option value="{{ $model . '_' . $permission_map }}">{{ $permission_map }}</option>
                                            @endforeach
                                        </select>
                                        @error('permissions') <span class="invalid-feedback">{{ $message }}</span> @enderror

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@stop
