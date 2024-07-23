@extends('layouts.dashboard.dashboard')

@section('title', "Create Location")

@section('content')
{{-- breadcrumb --}}
<div class="page-header">
    <h2 class="header-title">Create Location</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a class="breadcrumb-item" href="{{ route('dashboard.location.index') }}">Data</a>
            <span class="breadcrumb-item active">Create</span>
        </nav>
    </div>
</div>

{{-- content --}}
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Create Location</h4>
        </div>
      <div class="m-t-25">
        {{-- errors alert --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul style="padding-left: 12px;">
                @foreach($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('dashboard.location.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value={{ old('name') }}>
            </div>
            <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="string" step="0.01" name="lat" class="form-control" id="lat" placeholder="Latitude" value={{ old('lat') }}>
            </div>
            <div class="form-group">
                <label for="lng">Longitude</label>
                <input type="string" step="0.01" name="lng" class="form-control" id="lng" placeholder="Longitude" value={{ old('lng') }}>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
</div>
@endsection
