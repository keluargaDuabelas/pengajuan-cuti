@extends('back.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Pengajuan</h4>


    @can('create-pengajuan')
          <a href="{{ route('pengajuan.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Pengajuan</a>
          @endcan


    <!-- Bootstrap Table with Caption -->
    <div class="card">
      <h5 class="card-header">Data rules</h5>

      <div class="table-responsive text-nowrap">

        <table class="table">
          <caption class="ms-4">
            List of roles
          </caption>
          <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis-cuti</th>
                <th scope="col">Mulai</th>
                <th scope="col">Sampai</th>
                <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($pengajuan as $pengajuan)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>
                    {{ $pengajuan->jenisCuti->name }}
                </td>
                <td>{{ $pengajuan->formatted_start_date }}</td>
                <td>{{ $pengajuan->formatted_end_date }}</td>

                <td>
                    <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="post">
                        @csrf
                        @method('DELETE')

                            <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-pengajuan')
                                <a href="{{ route('pengajuan.edit', $pengajuan->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-pengajuan')

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this Pengajuan?');"><i class="bi bi-trash"></i> Delete</button>

                            @endcan


                    </form>
                </td>
            </tr>
            @empty
                <td colspan="5">
                    <span class="text-danger">
                        <strong>No Pengajuan Found!</strong>
                    </span>
                </td>
            @endforelse


          </tbody>
        </table>
      </div>
    </div>
    <!-- Bootstrap Table with Caption -->
    <hr class="my-5" />
    <!--/ Responsive Table -->
  </div>
@endsection
