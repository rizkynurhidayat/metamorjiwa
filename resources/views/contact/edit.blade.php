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
                      <h5 class="mb-0">Edit Contact Data</h5>
                      
                    </div>
                    <div class="card-body">
                      <form action="{{ route('contact.update', $contacts) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title">Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="{{ $contacts->title }}" placeholder="Input title"/>
                          </div>
                        </div>
                        
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="tagline">Tagline</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="tagline"
                                name="tagline"
                                value="{{ $contacts->tagline }}"
                                class="form-control"
                                placeholder="Input Tagline"
                              />
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                    </div>            
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="contact">Link Contact</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                id="contact"
                                name="contact"
                                value="{{ $contacts->contact }}"
                                class="form-control"
                                placeholder="Input Contact"
                              />
                            </div>
                            <div class="form-text">You can use letters, numbers & periods</div>
                        </div>
                    </div>            
                               
                    

                      
                    
                       <div class="row justify-content-end">
                          <div class="col-sm-10">
                            <a class="btn btn-secondary" href="{{ route('contact.index') }}">Back</a>
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
                       
@endsection