@extends('back.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Forms </span> jenis cuti</h4>

              <!-- Basic Layout -->

              <div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Pengajuan Information
                </div>
                <div class="float-end">
                    <a href="{{ route('pengajuan.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Jenis cuti:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $pengajuan->jenisCuti->name }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Mulai:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $pengajuan->start_date }}
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Sampai:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $pengajuan->end_date }}
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
            </div>

@endsection



