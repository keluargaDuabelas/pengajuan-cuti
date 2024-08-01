
@extends('back.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Data Report</h4>



<!-- Basic Layout -->
<a href="" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Back</a>
              <div class="row">

                <div class="col-xl">
                  <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                      <h5 class="mb-0">Report Pengajuan cuti</h5>
                      <small class="text-muted float-end">Report Pengajuan cuti</small>
                    </div>
                    <div class="card-body">
                    <form  action="{{ route('filter.index') }}" method="GET">
                    @csrf
                    <div class="mb-3">
                          <label class="form-label" for="start_date">Mulai</label>
                          <div class="input-group input-group-merge">
                          <input type="date" name="start_date" id="start_date" class="form-control" required>
                          </div>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="end_date">Sampai</label>
                          <div class="input-group input-group-merge">
                          <input type="date" name="end_date" id="end_date" class="form-control" required>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-primary" value="Add User">Filter</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

              @if(isset($data))

              <div class="card">
      <h5 class="card-header">Data rules</h5>

      <div class="table-responsive text-nowrap">
              <table class="table">
                    <caption class="ms-4">
                      List of jenis-cuti
                    </caption>
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Jenis cuti</th>
                        <th>Mulai</th>
                        <th>Sampai</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($data as $role)
                      <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $role->user->name }}</td>
                    <td>{{ $role->jenisCuti->name }}</td>
                    <td>{{ $role->start_date }}</td>
                    <td>{{ $role->end_date }}</td>
                      </tr>
                @endforeach


                    </tbody>

                  </table>


      </div>
              </div>
              <!-- Bootstrap Table with Caption -->

              <!-- Bootstrap Table with Caption -->
              <hr class="my-5" />

@endif
            </div>








@endsection
