@extends('back.app')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Data Roles</h4>


              @can('create-role')
                    <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Role</a>
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
                        <th>No</th>
                        <th>Nama</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    @forelse ($roles as $role)
                      <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $role->name }}</td>
                    <td>
                        <form action="{{ route('roles.destroy', $role->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('roles.show', $role->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @if ($role->name!='Super Admin')
                                @can('edit-role')
                                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                                @endcan

                                @can('delete-role')
                                    @if ($role->name!=Auth::user()->hasRole($role->name))
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this role?');"><i class="bi bi-trash"></i> Delete</button>
                                    @endif
                                @endcan
                            @endif

                        </form>
                    </td>

                      </tr>
                @endforeach


                    </tbody>
                  </table>
                </div>
              </div>
              <!-- Bootstrap Table with Caption -->
              <hr class="my-5" />
              <!--/ Responsive Table -->
            </div>






@endsection
