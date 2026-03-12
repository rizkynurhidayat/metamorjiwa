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
                      <h5 class="mb-0">Edit Sosial Media</h5>
                    </div>
                    <div class="card-body">

                      @if(session('success'))
                        <div class="alert alert-success alert-dismissible" role="alert">
                          {{ session('success') }}
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                      @endif

                      <form action="{{ route('sosialmedia.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="instagram">Instagram</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bxl-instagram"></i></span>
                              <input
                                type="text"
                                id="instagram"
                                name="instagram"
                                value="{{ $socialMedia->instagram ?? '' }}"
                                class="form-control"
                                placeholder="https://instagram.com/username"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="twitter">Twitter</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bxl-twitter"></i></span>
                              <input
                                type="text"
                                id="twitter"
                                name="twitter"
                                value="{{ $socialMedia->twitter ?? '' }}"
                                class="form-control"
                                placeholder="https://twitter.com/username"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="facebook">Facebook</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <span class="input-group-text"><i class="bx bxl-facebook"></i></span>
                              <input
                                type="text"
                                id="facebook"
                                name="facebook"
                                value="{{ $socialMedia->facebook ?? '' }}"
                                class="form-control"
                                placeholder="https://facebook.com/username"
                              />
                            </div>
                          </div>
                        </div>

                        <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" style="background-color: #ff88b2 !important; border-color: #F8BBD0 !important; color: #FFFFFF !important; font-weight: 600 !important; border-radius: 8px !important; padding: 10px 20px;">
                                Simpan
                            </button>
                          </div>
                        </div>

                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->
                       
@endsection
