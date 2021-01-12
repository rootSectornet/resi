@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row px-4 mx-4">
                <div class="col-md-12">
                <h2>Data jabatan</h2>
                    <div class="card">
                        <div class="d-flex my-4 px-4 justify-content-between align-item-center">
                            <button type="button" class="btn btn-success">Tambah</button>
                            <input type="text" class="form-control col-md-2" placeholder="search">
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jabatan as $key => $p)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $p->name }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm" href="#" role="button">Edit</a>
                                        <a class="btn btn-danger btn-sm" href="#" role="button">Hapus</a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex my-4 justify-content-end align-item-center">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item disabled">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
