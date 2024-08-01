@extends('back.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms </span> jenis-cutis</h4>

              <!-- Basic Layout -->
              <a href="{{ route('jenis-cuti.index') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Back</a>
              <div class="row">

                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Create jenis-cutis</h5>
                      <small class="text-muted float-end">jenis-cutis</small>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('jenis-cuti.store') }}" method="post">
                    @csrf
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text"
                              class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}"

                              placeholder="Nama" />
                              @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>
                 

                        <button type="submit" class="btn btn-primary" value="Add User">Submit</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection
