@extends('layouts.dashboard.app')
@section('content')


    <h2>Settings</h2>


    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item active">Social Links</li>
    </ul>



    <div class="row">
        <div class="col-md-12">
            <div class="tile mb-4">

                <form action="{{ route('dashboard.settings.store') }}" method="post">
                    @csrf

                    @php
                        $social_sites = ['facebook', 'google', ' youtube'];
                    @endphp

                    @foreach($social_sites as $social_site)

                        <div class="form-group">
                            <label class="text-capitalize">{{ $social_site }} link</label>
                            <input type="text" name="{{ $social_site }}_link" value="{{ setting($social_site . '_link') }}" class="form-control @error($social_site . '_link') is-invalid @enderror">
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
