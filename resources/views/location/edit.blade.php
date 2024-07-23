@extends('layouts.dashboard.dashboard')

@section('title', "Edit Location")

@section('content')
{{-- breadcrumb --}}
<div class="page-header">
    <h2 class="header-title">Edit Location</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a class="breadcrumb-item" href="{{ route('dashboard.location.index') }}">Data</a>
            <span class="breadcrumb-item active">Edit</span>
        </nav>
    </div>
</div>

{{-- content --}}
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Edit Location</h4>
        </div>
      <div class="m-t-25">
        {{-- alert success --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

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

        <form action="{{ route('dashboard.location.update', $location->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="{{ $location->name }}">
            </div>
            <div class="form-group">
                <label for="lat">Latitude</label>
                <input type="string" name="lat" class="form-control" id="lat" placeholder="Latitude" value={{ $location->lat }}>
            </div>
            <div class="form-group">
                <label for="lng">Longitude</label>
                <input type="string" name="lng" class="form-control" id="lng" placeholder="Longitude" value={{ $location->lng }}>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
      </div>
    </div>
</div>
@endsection
