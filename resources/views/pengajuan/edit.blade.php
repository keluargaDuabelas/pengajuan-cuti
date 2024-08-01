
@extends('back.app')

@section('content')


<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms </span> pengajuan</h4>

              <!-- Basic Layout -->
              <a href="{{ route('pengajuan.index') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Back</a>
              <div class="row">

                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Edit pengajuan</h5>
                      <small class="text-muted float-end">pengajuan</small>
                    </div>
                    <div class="card-body">
                    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
        @csrf
        @method('PUT')

                        <div class="mb-3">
                          <label class="form-label" for="jenis_cuti_id">Jenis cuti</label>
                          <div class="input-group input-group-merge">
                          <select class="form-select" name="jenis_cuti_id" id="jenis_cuti_id" aria-label="Default select example">
                          <option selected>silahkan pilih</option>
                          @foreach ($jenis_cuti as $type)
                            <option value="{{ $type->id }}" {{ $pengajuan->jenis_cuti_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                            @endforeach
                        </select>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="start_date">Mulai</label>
                          <div class="input-group input-group-merge">
                          <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $pengajuan->start_date }}">
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="end_date">Sampai</label>
                          <div class="input-group input-group-merge">
                          <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $pengajuan->end_date }}">
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                     </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
@endsection


