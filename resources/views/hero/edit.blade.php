@extends('layouts.app')

@section('content')

 <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Landing Page /</span> Hero Section</h4>

              @if(session('success'))
              <div class="alert alert-success alert-dismissible" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Hero Section</h5>
                      <small class="text-muted float-end">Ubah konten hero section landing page</small>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('hero.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
        
                       

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="heading">Heading</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="heading" name="heading" placeholder="Contoh: It's Nice To Meet You" value="{{ old('heading', $hero->heading ?? '') }}"/>
                            @error('heading')
                              <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>
                         <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="deskripsi">Deskripsi</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="deskripsi" name="deskripsi" placeholder="Contoh: Berani mengekspresikan pikiran dan perasaanmu..." value="{{ old('deskripsi', $hero->deskripsi ?? '') }}"/>
                            @error('deskripsi')
                              <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="button_text">Button Text</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="button_text" name="button_text" placeholder="Contoh: Tell Me More" value="{{ old('button_text', $hero->button_text ?? '') }}"/>
                            @error('button_text')
                              <div class="text-danger mt-1">{{ $message }}</div>
                            @enderror
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label for="image" class="col-sm-2 col-form-label">Image</label>
                          <div class="col-sm-10">
                            @if ($hero->image && Storage::disk('public')->exists($hero->image))
                              <div class="mb-3">
                                <img id="imagePreview" class="img-fluid rounded" src="{{ asset('storage/' . $hero->image) }}" alt="Hero background" style="max-height: 200px;" />
                              </div>
                            @else
                              <div class="mb-3">
                                <img id="imagePreview" class="img-fluid rounded d-none" src="" alt="Hero image" style="max-height: 200px;" />
                                <div id="noImageText" class="form-text">Belum ada image</div>
                              </div>
                            @endif
                            <input class="form-control" type="file" id="image" name="image" accept="image/*"/>
                            <div class="form-text">Format: JPG, JPEG, PNG, WEBP. Maksimal 2MB.</div>
                            @error('image')
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

            <script>
              document.getElementById('image').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                  const reader = new FileReader();
                  reader.onload = function(e) {
                    const imgPreview = document.getElementById('imagePreview');
                    imgPreview.src = e.target.result;
                    imgPreview.classList.remove('d-none');
                    const noImageText = document.getElementById('noImageText');
                    if (noImageText) noImageText.classList.add('d-none');
                  };
                  reader.readAsDataURL(file);
                }
              });
            </script>

@endsection