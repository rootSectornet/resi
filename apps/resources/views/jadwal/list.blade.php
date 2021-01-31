<table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nama Marketing</th>
        <th scope="col">Tujuan</th>
        <th scope="col">Lokasi Tujuan</th>
        <th scope="col">Tanggal</th>
        <th scope="col">Durasi</th>
        <th scope="col">Status</th>
        <th scope="col">Action</th>
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
            <td>{{ $p->durasi }}</td>
            <td>{{ $p->status == 0 ? 'Menunggu Aproval' : ($p->status == 1 ? 'Berlangsung' : 'Selesai') }}</td>
        <td>
            @if ($p->status == 0 &&  Auth::user()->jabatan->name == 'ADMIN')
                <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#aproveModal-{{$key+1}}" role="button">Aprove</a>
                <div class="modal fade" id="aproveModal-{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form method="POST" action="/jadwal/aprove/{{$p->id}}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Silahkan Pilih Kendaraan dan Drive Jika Anda Aprove jadwal ini</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="Name">Kendaraan : </label>
                                        <select name="id_kendaraan" id="id_kendaraan" class="form-control" >
                                            @foreach ($kendaraan as $kend)
                                                <option value="{{$kend->id}}">{{$kend->no_kendaraan}} | {{$kend->no_polisi}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="Name">Driver : </label>
                                        <select name="id_driver" id="id_driver" class="form-control" >
                                            @foreach ($driver as $jab)
                                                <option value="{{$jab->id}}">{{$jab->name}}</option>
                                            @endforeach
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
            @else
                <a class="btn btn-info btn-sm"  data-toggle="modal" data-target="#detailModal-{{$key+1}}" role="button">Detail</a>
                <div class="modal fade" id="detailModal-{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Jadwal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                    <ul class="list-group">
                                        <li class="list-group-item active">Nama Marketing : {{ $p->marketing }}</li>
                                        <li class="list-group-item">Tanggal : {{ $p->tanggal }}</li>
                                        <li class="list-group-item">Durasi : {{ $p->durasi }}</li>
                                        <li class="list-group-item">Tujuan : {{ $p->tujuan }}</li>
                                        <li class="list-group-item">Lokasi Tujuan : {{ $p->lokasi_tujuan }}</li>
                                        <li class="list-group-item">Driver : {{ $p->driver }}</li>
                                        <li class="list-group-item">Kendaraan : {{ $p->no_kendaraan }} | {{ $p->no_polisi }}</li>
                                        <li class="list-group-item">Status : {{ $p->status == 0 ? 'Menunggu Aproval' : ($p->status == 1 ? 'Berlangsung' : 'Selesai') }}</li>
                                    </ul>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                <a type="button" href="/jadwal/selesai/{{$p->id}}" class="btn btn-primary">Selesai</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            {{-- <a class="btn btn-warning btn-sm"  data-toggle="modal" data-target="#editModal-{{$key+1}}" role="button">Edit</a> --}}
            <div class="modal fade" id="editModal-{{$key+1}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <form method="POST" action="/jadwal/edit/{{$p->id}}">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Jadwal</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="date" class="control-label">{{ __('Tanggal') }}</label>
                                        <input id="date" type="date" value="{{$p->tanggal}}" placeholder="date" class="form-control @error('date') is-invalid @enderror" name="tanggal" value="{{ old('date') }}" required autocomplete="date" autofocus>
                                        @error('date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="durasi" class="control-label">{{ __('Durasi') }}</label>
                                        <input id="durasi" type="date" placeholder="durasi" value="{{$p->durasi}}"  class="form-control @error('durasi') is-invalid @enderror" name="durasi" value="{{ old('durasi') }}" required autocomplete="durasi" autofocus>
                                        @error('durasi')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date" class="control-label">{{ __('Lokasi Tujuan') }}</label>
                                        <textarea name="lokasi_tujuan" id="lokasi_tujuan" rows="5" class="form-control @error('lokasi_tujuan') is-invalid @enderror" required>{{$p->lokasi_tujuan}}</textarea>
                                        @error('lokasi_tujuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="form-group">
                                    <label for="date" class="control-label">{{ __('Tujuan') }}</label>
                                        <textarea name="tujuan" id="tujuan" rows="5" class="form-control @error('tujuan') is-invalid @enderror" required>{{$p->tujuan}}</textarea>
                                        @error('tujuan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
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
            @if ($p->status == 0 && ( Auth::user()->jabatan->name == 'ADMIN' ||  Auth::user()->jabatan->name == 'MARKETING'))
                <a class="btn btn-danger btn-sm" href="/jadwal/hapus/{{$p->id}}" role="button">Hapus</a>
            @endif
        </td>
        </tr>
        @endforeach
    </tbody>
</table>
