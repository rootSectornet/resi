@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row px-4 mx-4">
                <div class="col-md-12">
                <h2>Data Pegawai</h2>
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
                                    <th scope="col">Nama</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Alamat</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $key => $p)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $p->name }}</td>
                                        <td>{{ $p->email }}</td>
                                        <td>{{ $p->alamat }}</td>
                                        <td>{{ $p->no_hp }}</td>
                                        <td>{{ $p->jabatan->name }}</td>
                                    <td>
                                        <a class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#editModal-{{$key+1}}" role="button">Edit</a>
                                        <div class="modal fade" id="editModal-{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <form method="POST" action="/pegawai/edit/{{$p->id}}">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Pegawai</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="Name">Jabatan : </label>
                                                                <select name="jabatan_id" id="jabatan" class="form-control" >
                                                                    @foreach ($jabatan as $jab)
                                                                        <option value="{{$jab->id}}" selected="{{$p->jabatan->id == $jab->id}}">{{$jab->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Name">Nama : </label>
                                                                <input type="text" class="form-control" name="name" placeholder="Nama Pegawai" value="{{$p->name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Email">Email : </label>
                                                                <input type="email" class="form-control" name="email" placeholder="Email Pegawai" value="{{$p->email}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="hp">No HP : </label>
                                                                <input type="text" class="form-control" name="no_hp" placeholder="No Hp Pegawai" value="{{$p->no_hp}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="alamat">Alamat : </label>
                                                                <textarea name="alamat" id="alamat" class="form-control" rows="5">{{$p->alamat}}</textarea>
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
                                        <a class="btn btn-danger btn-sm" href="/pegawai/hapus/{{$p->id}}" role="button">Hapus</a>
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
                        <form method="POST" action="/pegawai/create">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Pegawai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Name">Jabatan : </label>
                                    <select name="jabatan_id" id="jabatan" class="form-control" >
                                        @foreach ($jabatan as $jab)
                                            <option value="{{$jab->id}}">{{$jab->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="Name">Nama : </label>
                                    <input type="text" class="form-control" name="name" placeholder="Nama Pegawai">
                                </div>
                                <div class="form-group">
                                    <label for="Email">Email : </label>
                                    <input type="email" class="form-control" name="email" placeholder="Email Pegawai">
                                </div>
                                <div class="form-group">
                                    <label for="hp">No HP : </label>
                                    <input type="text" class="form-control" name="no_hp" placeholder="No Hp Pegawai">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password : </label>
                                    <input type="password" class="form-control" name="password" placeholder="Password Pegawai">
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat : </label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="5"></textarea>
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
