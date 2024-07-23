@extends('layouts.dashboard.dashboard')

@section('title', "Location")

@section('content')
{{-- breadcrumb --}}
<div class="page-header">
    <h2 class="header-title">Location</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <span class="breadcrumb-item active">Data</span>
        </nav>
    </div>
</div>

{{-- content --}}
<div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-center">
            <h4>Location Data</h4>
            <a href="{{ route('dashboard.location.create') }}">
                <button class="btn btn-primary">Add Data</button>
            </a>
        </div>
      <div class="m-t-25">
        {{-- alert success --}}
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table id="data-table" class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th style="width: 200px !important;">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($locations as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->lat }}</td>
                    <td>{{ $data->lng }}</td>
                    <td>
                        <div class="d-flex justify-content-center" style="gap: 5px">
                            <a href="{{ route('dashboard.location.edit', $data->id) }}">
                                <button class="btn btn-icon btn-warning btn-rounded">
                                    <i class="anticon anticon-edit"></i>
                                </button>
                            </a>
                            <button class="btn btn-icon btn-danger btn-rounded" data-toggle="modal" data-target="#modalDelete{{ $data->id }}">
                                <i class="anticon anticon-delete"></i>
                            </button>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="modalDelete{{ $data->id }}">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <i class="anticon anticon-close"></i>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure want to delete this data?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
                                        <form action="{{ route('dashboard.location.delete', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-default">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
      </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#data-table').DataTable();
</script>
@endsection
