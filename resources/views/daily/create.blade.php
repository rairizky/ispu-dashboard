@extends('layouts.dashboard.dashboard')

@section('title', "Create Daily Data")

@section('content')
{{-- breadcrumb --}}
<div class="page-header">
    <h2 class="header-title">Create Daily</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a class="breadcrumb-item" href="{{ route('dashboard.daily.index') }}">Data</a>
            <span class="breadcrumb-item active">Create</span>
        </nav>
    </div>
</div>

{{-- content --}}
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Create Daily Data</h4>
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

        <form action="{{ route('dashboard.daily.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="location">Location</label>
                <div>
                    <select class="select2" name="location">
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="date">Date</label>
                    <input type="text" name="date" class="form-control datepicker-input" placeholder="Pick a date">
                </div>
                <div class="form-group col-md-6">
                    <label for="time">Time</label>
                    <input type="time" name="time" class="form-control" id="time" placeholder="Pick a time">
                </div>
            </div>
            <div class="form-group">
                <label for="pm10">PM10</label>
                <input type="number" name="pm10" class="form-control" id="pm10" placeholder="PM10">
            </div>
            <div class="form-group">
                <label for="pm25">PM25</label>
                <input type="number" name="pm25" class="form-control" id="pm25" placeholder="PM25">
            </div>
            <div class="form-group">
                <label for="so2">SO2</label>
                <input type="number" name="so2" class="form-control" id="so2" placeholder="SO2">
            </div>
            <div class="form-group">
                <label for="co">CO</label>
                <input type="number" name="co" class="form-control" id="co" placeholder="CO">
            </div>
            <div class="form-group">
                <label for="o3">O3</label>
                <input type="number" name="o3" class="form-control" id="o3" placeholder="O3">
            </div>
            <div class="form-group">
                <label for="no2">NO2</label>
                <input type="number" name="no2" class="form-control" id="no2" placeholder="NO2">
            </div>
            <div class="form-group">
                <label for="category">Category</label>
                <div>
                    <select class="select2" name="category">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('.select2').select2();
    $('.datepicker-input').datepicker();
</script>
@endsection
