@extends('back.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms </span> role permissions</h4>

              <!-- Basic Layout -->
              <a href="{{ route('roles.index') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Back</a>
              <div class="row">

                <div class="col-xl">
                  <div class="card mb-4">

                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit role permissions</h5>
                      <small class="text-muted float-end">role permissions</small>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                    @csrf
                    @method("PUT")
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-fullname">Nama</label>
                          <div class="input-group input-group-merge">
                            <span id="basic-icon-default-fullname2" class="input-group-text"
                              ><i class="bx bx-user"></i
                            ></span>
                            <input
                              type="text"
                              class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $role->name }}"
                              placeholder="Nama" />
                              @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-icon-default-company">Permissions</label>
                          @forelse ($permissions as $permission)
                          <div class="form-check form-switch mb-2">

                        <input class="form-check-input @error('permissions') is-invalid @enderror" multiple aria-label="Permissions" id="permissions" name="permissions[]"  type="checkbox" value="{{ $permission->id }}" {{ in_array($permission->id, $rolePermissions ?? []) ? 'checked' : '' }}/>
                        <label class="form-check-label"  for="permissions"
                          >{{ $permission->name }}</label
                        >
                      </div>

                      @empty
                        @endforelse
                        @if ($errors->has('permissions'))
                                <span class="text-danger">{{ $errors->first('permissions') }}</span>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary" value="Update Role">Update</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection

