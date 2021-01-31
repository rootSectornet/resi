@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row px-4 mx-4">
                <div class="col-md-12">
                <h2>Data Kendaraan</h2>
                    <div class="card">
                        <div class="d-flex my-4 px-4 justify-content-between align-item-center">
                            <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">Tambah</button>
                            <input type="text" class="form-control col-md-2" placeholder="search">
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">No Polisi</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kendaraan as $key => $p)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $p->no_polisi }}</td>
                                        <td>{{ $p->no_kendaraan }}</td>
                                        <td>{{ $p->status == 1 ? 'Digunakan' : 'Tersedia' }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#editModal-{{$key+1}}" role="button">Edit</a>
                                        <div class="modal fade" id="editModal-{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form method="POST" action="/kendaraan/edit/{{$p->id}}">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Kendaraan</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="Name">Nama Kendaraan : </label>
                                                                <input type="text" class="form-control" name="no_kendaraan" placeholder="Nama Kendaraan" value="{{$p->no_kendaraan}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Name">No Polisi : </label>
                                                                <input type="text" class="form-control" name="no_polisi" placeholder="No Polisi" value="{{$p->no_polisi}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Name">Status : </label>
                                                                <select name="status" id="status" class="form-control">
                                                                    <option value="1" selected="{{$p->status == 1}}">Digunakan</option>
                                                                    <option value="0" selected="{{$p->status == 0}}">Tersedia</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <a class="btn btn-danger btn-sm" href="/kendaraan/hapus/{{$p->id}}" role="button">Hapus</a>
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
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="/kendaraan/create">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Kendaraan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Name">Nama Kendaraan : </label>
                                    <input type="text" class="form-control" name="no_kendaraan" placeholder="Nama Kendaraan">
                                </div>
                                <div class="form-group">
                                    <label for="Name">No Polisi : </label>
                                    <input type="text" class="form-control" name="no_polisi" placeholder="No Polisi">
                                </div>
                                <div class="form-group">
                                    <label for="Name">Status : </label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1">Digunakan</option>
                                        <option value="0">Tersedia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
        </div>
    </div>


@endsection
