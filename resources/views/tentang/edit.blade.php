@extends('layouts.app')

@section('content')

 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Landing Page /</span> Tentang Section</h4>

              @if(session('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Tentang Section</h5>
                      <small class="text-muted float-end">Ubah konten tentang section landing page</small>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('tentang.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="heading">Heading</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="heading" name="heading" placeholder="Contoh: Ruang Aman Untuk Menulis" value="{{ old('heading', $tentang->heading ?? '') }}"/>
                            @error('heading')
                              <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="sub_heading">Sub Heading</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sub_heading" name="sub_heading" placeholder="Contoh: Tempat untuk berhenti sejenak dan menulis dengan jujur..." value="{{ old('sub_heading', $tentang->sub_heading ?? '') }}"/>
                            @error('sub_heading')
                              <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Contoh: Setiap halaman hadir bukan untuk mengarahkan, tapi menemani...">{{ old('deskripsi', $tentang->deskripsi ?? '') }}</textarea>
                            @error('deskripsi')
                              <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" style="background-color: #F8BBD0 !important; border-color: #F8BBD0 !important; color: #FFFFFF !important; font-weight: 600 !important; border-radius: 8px !important; padding: 10px 20px;">
                                Simpan Perubahan
                            </button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>

@endsection
