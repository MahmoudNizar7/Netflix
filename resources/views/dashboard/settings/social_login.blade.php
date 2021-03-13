@extends('layouts.dashboard.app')
@section('content')


    <h2>Settings</h2>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Social Logins</li>
    </ul>



    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form action="{{ route('dashboard.settings.store') }}" method="post">
                    @csrf

                    @php
                        $social_sites = ['facebook', 'google'];
                    @endphp

                    @foreach($social_sites as $social_site)

                        {{-- client id --}}
                        <div class="form-group">
                            <label class="text-capitalize">{{ $social_site }} client id</label>
                            <input type="text" name="{{ $social_site }}_client_id" value="{{ setting($social_site . '_client_id') }}" class="form-control @error($social_site . '_client_id') is-invalid @enderror">
                            @error($social_site . '_client_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        {{-- client secret --}}
                        <div class="form-group">
                            <label class="text-capitalize">{{ $social_site }} client secret</label>
                            <input type="text" name="{{ $social_site }}_client_secret" value="{{ setting($social_site . '_client_secret') }}" class="form-control @error($social_site . '_client_secret') is-invalid @enderror">
                            @error($social_site . '_client_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>

                        {{-- redirect url --}}
                        <div class="form-group">
                            <label class="text-capitalize">{{ $social_site }} redirect url</label>
                            <input type="text" name="{{ $social_site }}_redirect_url" value="{{ setting($social_site . '_redirect_url') }}" class="form-control @error($social_site . '_redirect_url') is-invalid @enderror">
                            @error($social_site . '_client_id') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>


                    @endforeach

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

@stop
