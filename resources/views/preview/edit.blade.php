@extends('layouts.app')
@section('content')
<!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
             

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h5 class="mb-0">Edit Preview</h5>
                    </div>
                    <div class="card-body">
                      <form action="{{ route('preview.update', $preview) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="tagline">Tagline</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="tagline" name="tagline" value="{{ $preview->tagline }}" placeholder="Input Tagline"/>
                          </div>
                        </div>
                        
                              

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="image">Image</label>
                            <div class="col-sm-10">
                                @if (Storage::disk('public')->exists($preview->image))
                                <div class="col-md-6 col-lg-4 mb-3">
                                    <div class="card h-100">
                                        <img id="img-preview" class="card-img-top" src="{{ asset('storage/' .$preview->image) }}" alt="Card image cap" />
                                        <div class="card-body">
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="form-text">You didnt have a picture yet.</div>
                                @endif
                                <input class="form-control" type="file" id="image" name="image" onChange="previewImage()"/>
                            </div>
                        </div>
                    
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <a class="btn btn-secondary" href="{{ route('preview.index') }}">Back</a>
                            <button type="submit" class="btn btn-primary">Send</button>
                          </div>
                        </div>



                        </div>
                    </div>
                </form>
                </div>
              </div>
            </div>
            <!-- / Content -->
                        <script>
                            function previewImage(){
                                const image = document.querySelector('#image');
                                const imgPreview = document.querySelector('#img-preview');

                                if(image.files && image.files[0]) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        imgPreview.src = e.target.result;
                                        imgPreview.style.display = 'block';
                                    }
                                    reader.readAsDataURL(image.files[0]);   
                                }
                                imgPreview.style.display = 'block';

                                const oFReader = new FileReader();
                                oFReader.readAsDataURL(image.files[0]);

                                oFReader.onload = function(oFREvent){
                                    imgPreview.src = oFREvent.target.result;
                                }
                            }
                        </script>
@endsection