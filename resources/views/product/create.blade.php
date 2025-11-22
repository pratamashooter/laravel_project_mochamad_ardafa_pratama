@extends('layouts.app')
@section('title', 'Tambah Produk')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- Breadcrumb dinamis --}}
        <x-breadcrumb :items="[
            'Produk' => route('product.index'),
            'Tambah Produk' => '',
        ]" />
        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <div class="mb-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary">
                    <i class="bx bx-arrow-back"></i> Kembali
                </a>
            </div>
            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-fullname">Foto</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <input type="file"
                                            class="form-control"
                                            name="foto"
                                            id="inputGroupFile04"
                                            aria-describedby="inputGroupFileAddon04"
                                            aria-label="Upload"
                                            style="@error('foto') border-color: red; @enderror" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-fullname">Kategori</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <select class="form-select" name="kategori_id" style="@error('kategori_id') border-color: red; @enderror">
                                            <option value="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ $category->id == old('kategori_id') ? 'selected' : '' }}>{{ $category->nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-fullname">Nama</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-fullname2" class="input-group-text" style="@error('nama') border-color: red; @enderror">
                                            <i class="bx bx-package"></i>
                                        </span>
                                        <input type="text"
                                            name="nama"
                                            class="form-control"
                                            id="basic-icon-default-fullname" placeholder="Silahkan isi nama produk"
                                            aria-label="Silahkan isi nama produk"
                                            aria-describedby="basic-icon-default-fullname2"
                                            style="@error('nama') border-color: red; @enderror"
                                            value="{{ old('nama', 'Burger') }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-message">Deskripsi</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-message2" class="input-group-text" style="@error('deskripsi') border-color: red; @enderror">
                                            <i class="bx bx-comment-detail"></i>
                                        </span>
                                        <textarea id="basic-icon-default-message"
                                            name="deskripsi"
                                            class="form-control"
                                            placeholder="Silahkan isi deskripsi produk"
                                            aria-label="Silahkan isi deskripsi produk"
                                            aria-describedby="basic-icon-default-message2"
                                            style="@error('deskripsi') border-color: red; @enderror">{{ old('deskripsi', 'Makanan') }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Harga</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text" style="@error('harga') border-color: red; @enderror">
                                            <i class="bx bx-dollar-circle"></i>
                                        </span>
                                        <input type="text"
                                            id="basic-icon-default-phone"
                                            name="harga"
                                            class="form-control phone-mask"
                                            placeholder="1,000,00" aria-label="1,000"
                                            aria-describedby="basic-icon-default-phone2"
                                            style="@error('harga') border-color: red; @enderror"
                                            value="{{ old('harga', 15000) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 form-label" for="basic-icon-default-phone">Stok</label>
                                <div class="col-sm-10">
                                    <div class="input-group input-group-merge">
                                        <span id="basic-icon-default-phone2" class="input-group-text" style="@error('stok') border-color: red; @enderror">
                                            <i class="bx bx-package"></i>
                                        </span>
                                        <input type="text"
                                            id="basic-icon-default-phone"
                                            name="stok"
                                            class="form-control phone-mask"
                                            placeholder="10"
                                            aria-label="10"
                                            aria-describedby="basic-icon-default-phone2"
                                            style="@error('stok') border-color: red; @enderror"
                                            value="{{ old('stok', 10) }}" />
                                    </div>
                                </div>
                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
