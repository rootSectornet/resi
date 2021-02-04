@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container-fluid">
            <div class="row px-4 mx-4">
                <div class="col-md-12">
                <h2>Data Laporan</h2>
                    <div class="card">
                        <div class="d-flex my-4 px-4 justify-content-between align-item-center">
                            <button type="button" class="btn btn-success"  data-toggle="modal" data-target="#exampleModal">Filter</button>
                            <input type="text" class="form-control col-md-2" placeholder="search">
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Marketing</th>
                                        <th scope="col">Tujuan</th>
                                        <th scope="col">Lokasi Tujuan</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Kendaraan</th>
                                        <th scope="col">Driver</th>
                                        <th scope="col">Durasi</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($jadwal as $key => $p)
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{ $p->marketing }}</td>
                                        <td>{{ $p->tujuan }}</td>
                                        <td>{{ $p->lokasi_tujuan }}</td>
                                        <td>{{ $p->tanggal }}</td>
                                        <td>{{ $p->no_kendaraan }} | {{ $p->no_polisi }}</td>
                                        <td>{{ $p->driver }}</td>
                                        <td>{{ $p->durasi }}</td>
                                        <td>{{ $p->status == 0 ? 'Menunggu Aproval' : ($p->status == 1 ? 'Berlangsung' : 'Selesai') }}</td>
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
                        <form method="POST" action="/laporan/filter">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Filter Tanggal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="Name">Tanggal Awal : </label>
                                    <input type="date" class="form-control" name="tanggal_awal" placeholder="Tanggal Awal">
                                </div>
                                <div class="form-group">
                                    <label for="Name">Tanggal Akhir : </label>
                                    <input type="date" class="form-control" name="tanggal_akhir" placeholder="Tanggal Akhir">
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
