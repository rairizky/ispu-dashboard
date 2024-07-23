@extends('layouts.dashboard.dashboard')

@section('title', "Create Category")

@section('content')
{{-- breadcrumb --}}
<div class="page-header">
    <h2 class="header-title">Create Category</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a class="breadcrumb-item" href="{{ route('dashboard.category.index') }}">Data</a>
            <span class="breadcrumb-item active">Create</span>
        </nav>
    </div>
</div>

{{-- content --}}
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Create Category</h4>
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

        <form action="{{ route('dashboard.category.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Category Name">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" name="description" class="form-control" id="description" placeholder="Category Description">
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
      </div>
    </div>
</div>
@endsection
