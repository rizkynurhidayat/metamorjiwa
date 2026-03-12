@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
            @if (session('success'))
              <div class="alert alert-warning alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
            @endif
              <div class="card">
               <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="card-header">Testimoni Data</h5>
                    <a class="btn btn-primary" href="{{ route ('preview.create') }}" style="background-color: #F8BBD0 !important; border-color: #F8BBD0 !important; color: #FFFFFF !important; font-weight: 600 !important; border-radius: 8px !important; padding: 10px 20px;">
                      Add Testimoni</a>
                </div>
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Heading</th>
                        <th>Rating</th>
                        <th>Profile</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ( $testimonis as $testimoni )
                        <tr>
                          <td><strong>{{ $testimoni->name }}</strong></td>
                          <td>{{ $testimoni->heading }}</td>
                          <td>{{ $testimoni->rating }} ⭐</td>
                          <td>
                             @if ($testimoni->profile && Storage::disk('public')->exists($testimoni->profile))
                                <img src="{{ asset('storage/' . $testimoni->profile) }}" alt="profile" style="width: 50px; height: 50px; border-radius: 50%; object-fit: cover;" />
                              @else
                                <span class="text-muted">No image</span>
                              @endif
                          </td>
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('testimoni.edit', $testimoni) }}"
                                  ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                >
                                <form action="{{ route('testimoni.destroy', $testimoni) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                </form>
                              </div>
                            </div>
                          </td>
                        </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
</div>
@endsection
