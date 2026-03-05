@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
<!-- Hoverable Table rows -->
            @if (session('success'))
              <div class="alert alert-warning alert-dismissible" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
            @endif
              <div class="card">
               {{-- <div class="card-header d-flex align-items-center justify-content-between">
                  <h5 class="card-header">Portofolios Data</h5>
                    <a class="btn btn-primary" href="{{ route ('message.create') }}">Add Portofolio</a>
                </div> --}}
                <div class="table-responsive text-nowrap">
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                    @foreach ( $messages as $message )
                        <tr class="{{ $message->read ? '' : 'table-warning' }}">
                          <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $message->name}}</strong></td>
                          <td>{{ $message->email}}</td>
                          
                          <td>
                            <div class="dropdown">
                              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ route('message.edit', $message) }}"
                                  ><i class="bx bx-info-circle me-1"></i> View</a>
                                <form action="{{ route('message.destroy', $message) }}" method="POST">
                                  @csrf
                                  @method('DELETE')
                                  <button type="submit" class="dropdown-item" href=""><i class="bx bx-trash me-1"></i> Delete</button>
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
<!--/ Hoverable Table rows -->
@endsection