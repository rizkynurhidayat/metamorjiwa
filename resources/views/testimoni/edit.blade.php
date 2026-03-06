@extends('layouts.app')
@section('content')
<!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Layout -->
              <div class="row">
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Testimoni</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('testimoni.update', $testimoni) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title">Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $testimoni->title }}" placeholder="Contoh: Direkomendasikan"/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="heading">Heading</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="heading" name="heading" value="{{ $testimoni->heading }}" placeholder="Contoh: Sangat Membantu"/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="sub_heading">Sub Heading</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="sub_heading" name="sub_heading" value="{{ $testimoni->sub_heading }}" placeholder="Contoh: Menulis jurnal membantuku memahami perasaan..."/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $testimoni->name }}" placeholder="Contoh: Robert Dalves"/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="rating">Rating</label>
                          <div class="col-sm-10">
                            <input type="number" class="form-control" id="rating" name="rating" value="{{ $testimoni->rating }}" min="1" max="5" placeholder="1-5"/>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="profile">Profile Image</label>
                          <div class="col-sm-10">
                            @if ($testimoni->profile && Storage::disk('public')->exists($testimoni->profile))
                              <div class="mb-2">
                                <img src="{{ asset('storage/' . $testimoni->profile) }}" alt="profile" style="width: 80px; height: 80px; border-radius: 50%; object-fit: cover;" />
                              </div>
                            @endif

                            <div class="col-md-6 col-lg-4 mb-3 img-preview-profile">
                                <div class="card h-100">
                                    <img id="img-preview-profile" class="card-img-top" src="" alt="Preview" />
                                    <div class="card-body"></div>
                                </div>
                            </div>

                            <input class="form-control" type="file" id="profile" name="profile" onChange="previewProfile()"/>
                            <div class="form-text">Kosongkan jika tidak ingin mengganti</div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="image">Background Image</label>
                          <div class="col-sm-10">
                            @if ($testimoni->image && Storage::disk('public')->exists($testimoni->image))
                              <div class="mb-2">
                                <img src="{{ asset('storage/' . $testimoni->image) }}" alt="image" style="max-height: 100px;" />
                              </div>
                            @endif

                            <div class="col-md-6 col-lg-4 mb-3 img-preview-image">
                                <div class="card h-100">
                                    <img id="img-preview-image" class="card-img-top" src="" alt="Preview" />
                                    <div class="card-body"></div>
                                </div>
                            </div>

                            <input class="form-control" type="file" id="image" name="image" onChange="previewBgImage()"/>
                            <div class="form-text">Kosongkan jika tidak ingin mengganti</div>
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <a class="btn btn-secondary" href="{{ route('testimoni.index') }}">Back</a>
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<script>
  const profileInput = document.querySelector('#profile');
  const profilePreview = document.querySelector('#img-preview-profile');
  const profileCard = document.querySelector('.img-preview-profile');
  profileCard.style.display = 'none';

  function previewProfile() {
    if (profileInput.files && profileInput.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        profilePreview.src = e.target.result;
        profilePreview.style.display = 'block';
        profileCard.style.display = 'block';
      }
      reader.readAsDataURL(profileInput.files[0]);
    }
  }

  const imageInput = document.querySelector('#image');
  const imagePreview = document.querySelector('#img-preview-image');
  const imageCard = document.querySelector('.img-preview-image');
  imageCard.style.display = 'none';

  function previewBgImage() {
    if (imageInput.files && imageInput.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        imagePreview.src = e.target.result;
        imagePreview.style.display = 'block';
        imageCard.style.display = 'block';
      }
      reader.readAsDataURL(imageInput.files[0]);
    }
  }
</script>
@endsection

