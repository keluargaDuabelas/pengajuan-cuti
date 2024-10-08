@extends('back.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">My Profile /</span> Account</h4>

              <div class="row">
                <div class="col-md-12">
                  <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                      <a class="nav-link active" href="javascript:void(0);"><i class="bx bx-user me-1"></i> Account</a>

                    </li>

                  </ul>
                  <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                      <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img
                          src="{{asset('temp/assets/img/avatars/p.png')}}"
                          alt="user-avatar"
                          class="d-block rounded"
                          height="100"
                          width="100"
                          id="uploadedAvatar" />
                        <div class="button-wrapper">
                          <!-- <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                            <span class="d-none d-sm-block">Upload new photo</span>
                            <i class="bx bx-upload d-block d-sm-none"></i>
                            <input
                              type="file"
                              id="upload"
                              class="account-file-input"
                              hidden
                              accept="image/png, image/jpeg" />
                          </label>
                          <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                            <i class="bx bx-reset d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Reset</span>
                          </button>

                          <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p> -->
                        </div>
                      </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                     {{ session('status') }}
                    </div>
                      @endif
                      <form action="{{ route('profile.update') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row">
                          <div class="mb-3 col-md-6">
                            <label for="firstName" class="form-label">Name</label>
                            <input
                              class="form-control"
                              type="text"
                              id="name" name="name" value="{{ old('name', $user->name) }}" required
                              autofocus />
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="email" class="form-label">E-mail</label>
                            <input
                              class="form-control"
                              type="text"
                              id="email" name="email" value="{{ old('email', $user->email) }}" required/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" type="password" id="password" name="password" required/>
                          </div>
                          <div class="mb-3 col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" required/>
                          </div>

                        </div>
                        <div class="mt-2">
                          <button type="submit" class="btn btn-primary me-2">Save changes</button>
                          <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                      </form>

                    </div>
                    <!-- /Account -->

                  </div>

                </div>
              </div>
            </div>
@endsection

