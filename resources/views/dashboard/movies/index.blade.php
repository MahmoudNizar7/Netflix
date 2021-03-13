@extends('layouts.dashboard.app')
@section('content')

    <h2>Movie</h2>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">Movies</li>
        </ol>
    </nav>

    <div class="tile mb-4">
        <div class="row">
            <div class="col-12">
                <form action="">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" name="search" value="{{ request()->search }}" autofocus
                                       class="form-control" placeholder="search by name, description, rating, year">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <select name="category" class="form-control">
                                    <option value="">All Categories</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ request()->category == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>

                            @if(auth()->user()->hasPermission('movies_create'))
                                <a href="{{ route('dashboard.movies.create') }}" class="btn btn-primary"><i class="fa fa-plus"> Add</i></a>
                            @else
                                <a href="#" disabled class="btn btn-primary"><i class="fa fa-plus"> Add</i></a>
                            @endif
                        </div>


                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @if($movies->count() > 0)

                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Categories</th>
                            <th>Year</th>
                            <th>Rating</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($movies as $index => $movie)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $movie->name }}</td>
                                <td>{{ Str::limit($movie->description, 50) }}</td>
                                <td>
                                    @foreach($movie->categories as $category)
                                        <h5 style="display: inline-block"><span class="badge badge-primary">{{ $category->name }}</span></h5>
                                    @endforeach
                                </td>
                                <td>{{ $movie->year }}</td>
                                <td>{{ $movie->rating }}</td>
                                <td>
                                    @if(auth()->user()->hasPermission('movies_update'))
                                        <a href="{{ route('dashboard.movies.edit', $movie->id) }}"
                                           class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    @else
                                        <a href="#" disabled class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit
                                        </a>
                                    @endif

                                    @if(auth()->user()->hasPermission('movies_delete'))
                                        <a href="#" data-id="{{$movie->id}}"
                                           class="delete btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                    @else
                                        <a href="#" disabled class="delete btn btn-danger btn-sm"><i
                                                class="fa fa-trash"></i> Delete
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    {{ $movies->appends(request()->query())->links('pagination::bootstrap-4') }}

                @else

                    <h3 style="font-weight: 400">Sorry no data records found</h3>

                @endif
            </div>
        </div>

    </div>

@stop
@section('scripts')

    @if($movies->count() > 0)
        <script>
            $(document).on('click', '.delete', function (e) {
                e.preventDefault();
                var id = $(this).data('id');
                swal({
                    title: "Are you sure?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then(
                    (willDelete) => {
                        if (willDelete) {
                            $.ajax({
                                type: "DELETE",
                                url: "{{ route('dashboard.movies.destroy', $movie->id) }}",
                                data: {
                                    "_token": "{{ csrf_token() }}",
                                    id: id
                                },
                                success: function (data) {
                                    window.location = data.url;
                                }
                            });
                        }
                    }
                );
            });
        </script>
    @endif
@stop
