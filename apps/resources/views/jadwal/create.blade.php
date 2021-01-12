

<form method="POST" action="{{ url('jadwal') }}">
    @csrf
    <div class="row p-4  justify-content-center">
        <div class="col-md-6">
            <div class="px-4">
                <div class="form-group">
                    <label for="date" class="control-label">{{ __('Tanggal') }}</label>
                        <input id="date" type="date" placeholder="date" class="form-control @error('date') is-invalid @enderror" name="date" value="{{ old('date') }}" required autocomplete="date" autofocus>
                        @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="date" class="control-label">{{ __('Lokasi Tujuan') }}</label>
                        <textarea name="lokasi_tujuan" id="lokasi_tujuan" rows="5" class="form-control @error('lokasi_tujuan') is-invalid @enderror" required></textarea>
                        @error('lokasi_tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="px-4">
                <div class="form-group">
                    <label for="durasi" class="control-label">{{ __('Durasi') }}</label>
                        <input id="durasi" type="date" placeholder="durasi" class="form-control @error('durasi') is-invalid @enderror" name="durasi" value="{{ old('durasi') }}" required autocomplete="durasi" autofocus>
                        @error('durasi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
                <div class="form-group">
                    <label for="date" class="control-label">{{ __('Tujuan') }}</label>
                        <textarea name="tujuan" id="tujuan" rows="5" class="form-control @error('tujuan') is-invalid @enderror" required></textarea>
                        @error('tujuan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Simpan') }}
                </button>
        </div>
    </div>
</form>
