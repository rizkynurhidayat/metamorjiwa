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
                      <h5 class="mb-0">Edit Portofolio</h5>
                    </div>
                    <div class="card-body">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="name">Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="name" name="name" value="{{ $message->name }}" placeholder="Input Name" readonly/>
                            
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="email">Email</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="email"
                                name="email"
                                value="{{ $message->email }}"
                                class="form-control"
                                placeholder="Input Email"
                                readonly
                              />
                            </div>
                        </div>
                    </div>                       
                                               
                                         

                       
                    
                    <form action="{{ route('message.destroy', $message) }}" method="POST">
                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <a class="btn btn-secondary" href="{{ route('message.index') }}">Back</a>
                                  @csrf
                                  @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </div>
                        </form>
                        </div>



                        </div>
                    </div>
                
                </div>
              </div>
            </div>
            <!-- / Content -->
                        {{-- <script>
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
                        </script> --}}
@endsection