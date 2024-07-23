@extends('layouts.dashboard.dashboard')

@section('title', "Daily")

@section('content')
{{-- breadcrumb --}}
<div class="page-header">
    <h2 class="header-title">Daily</h2>
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
            <h4>Daily Data</h4>
            <a href="{{ route('dashboard.daily.create') }}">
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
                    <th>Datetime</th>
                    <th>Location</th>
                    <th>PM10</th>
                    <th>PM25</th>
                    <th>SO2</th>
                    <th>CO</th>
                    <th>O3</th>
                    <th>NO2</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dailies as $data)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($data->date)->format('d-m-Y') }}, {{ $data->time }}</td>
                    <td>{{ $data->location->name }}</td>
                    <td>{{ $data->pm10 }}</td>
                    <td>{{ $data->pm25 }}</td>
                    <td>{{ $data->so2 }}</td>
                    <td>{{ $data->co }}</td>
                    <td>{{ $data->o3 }}</td>
                    <td>{{ $data->no2 }}</td>
                    <td>{{ $data->category->name }}</td>
                    <td>
                        <div class="d-flex justify-content-center" style="gap: 5px">
                            <a href="{{ route('dashboard.daily.edit', $data->id) }}">
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
                                        <form action="{{ route('dashboard.daily.delete', $data->id) }}" method="POST">
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
