@extends('layout.head')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">DataTable Driver</h3>
                        </div>
                        <!-- /.card-header -->
                        @if (session('success'))
                            <span class="text-success">{{ session('success') }}</span>
                        @endif
                        <div class="card-body">
                            <a href="{{ route('driver.create') }}" class="btn btn-primary mb-2">Create</a>
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    ?>
                                    @foreach ($nama as $row)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $row->nik }}</td>
                                            <td>{{ $row->nama }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            <td>
                                                <a href="/update/{{$row->id}}" class="btn btn-success">Update</a>
                                                {{-- <a href="" class="btn btn-danger">Delete</a> --}}
                                                <form action="/delete/{{ $row->id }}" method="get">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Apakah kamu yakin ingin menghapus data ini?')">Delete</button>
                                                </form>
                                                <a href="/view/{{$row->id}}" class="btn btn-info">View</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
