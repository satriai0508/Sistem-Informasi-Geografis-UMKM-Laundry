@extends('admin.layouts.main')

@section('content')
<div class="container-fluid">
  <form class="form-horizontal" method="post" action="/dashboard/transaksi/{{ $transaksis->id }}">
    @method('put')
    @csrf
    <div class="card-body mb-2">
      <h4 class="card-title d-flex justify-content-center pb-2">Edit Data</h4>
      <div class="form-group row mb-2">
        <input type="hidden" name="{{ old('nama_token') }}" name="nama_toko" id="nama_toko">
        <input type="hidden" name="token" id="token" value="{{ old('token',$transaksis->token) }}">
        <input type="hidden" name="oldToken" id="token" value="{{ old('token',$transaksis->token) }}">
        <label for="nama" class="col-sm-3 text-end control-label col-form-label">Nama</label>
        <div class="col-md-6">
          <input type="text" class="form-control @error('nama')
                  is-invalid
              @enderror" id="nama" name="nama" placeholder="Client Name" required value="{{ old('nama',$transaksis->nama) }}" />
        @error('nama')
        <div class="invalid-feedback">
          {{ $message }}
        </div>
        @enderror
        </div>
      </div>
      <div class="form-group row mb-2">
        <label for="berat" class="col-sm-3 text-end control-label col-form-label">Berat</label>
        <div class="col-md-6">
          <input type="number" min="1" max="10" step="1" class="form-control @error('berat')
                  is-invalid
              @enderror" id="berat" name="berat" placeholder="Berat (Kg)" required value="{{ old('berat', $transaksis->berat) }}" />
          @error('berat')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="form-group row mb-2">
        <label for="toko_id" class="col-sm-3 text-end control-label col-form-labe">Nama Usaha</label>
        <div class="col-md-6">
        <input type="text" class="form-control @error('nama_toko')
                  is-invalid
              @enderror" id="nama_toko" name="nama_toko" placeholder="Nama Usaha" required value="{{ auth()->user()->name }}" readonly />
          @error('toko_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
        </div>
      </div>
      <div class="form-group row mb-2">
        <label for="status_id" class="col-sm-3 text-end control-label col-form-labe">Status Pesanan</label>
        <div class="col-md-6">
          <select class="form-select" name="status_id">
            @foreach($statuses as $status)
                @if(old('status_id', $transaksis->status_id) == $status->id)
                <option value="{{ $status->id }}" selected>{{ $status->status }}</option>
                @else
                <option value="{{ $status->id }}">{{ $status->status }}</option>
                @endif
            @endforeach
          </select>
          @error('status_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
      <div class="form-group row mb-2">
        <label for="layanan_id" class="col-sm-3 text-end control-label col-form-labe">Jenis Pelayanan</label>
        <div class="col-md-6">
          <select class="form-select" name="layanan_id">
            @foreach($layanans as $layanan)
                @if(old('layanan_id', $transaksis->layanan_id) == $layanan->id)
                <option value="{{ $layanan->id }}" selected>{{ $layanan->jenis }}</option>
                @else
                <option value="{{ $layanan->id }}">{{ $layanan->jenis }}</option>
                @endif
            @endforeach
          </select>
          @error('layanan_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="card-body d-flex justify-content-center">
        <a href="{{ route('transaksi.index') }}" class="btn btn-info me-1"><i data-feather="arrow-left"></i></a>
        <button type="submit" class="btn btn-success">
          <i data-feather="file-plus"></i>
        </button>
      </div>
    </div>
  </form>
</div>
@endsection
