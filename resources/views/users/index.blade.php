
@extends('layout.main')
@section('konten')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Insert Role Status</h1>
    </div>
      <form action="" method="GET" role="search">
       
        <div class="input-group mb-3">
          <input name="search" type="text" class="form-control" placeholder="Ketikkan pencarian"  >
          <button class="btn btn-info" type="submit" id="button-addon2">Search</button>
        </div>
      </form>
     
      <div class="table-responsive">
        <a href="{{ route('users.create') }} " class="btn btn-primary btn-sm">Tambah User+</a>
        <div class="container">
          <table class="table table-striped table-sm mt-3">
            <thead>
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                {{-- <th scope="col">Telephone</th> --}}
                <th scope="col">Role</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($users as $user)
                          <tr>
  
                              <td>{{ $user->id }}</td>
                              <td>{{ $user->name }}</td>
                              {{-- <td>{{ $user->phone->phone }}</td> --}}
                              <td>
                                  @foreach ($user->roles()->get() as $role)
                                  <button class="btn btn-sm btn-primary me-2">{{ $role->name }}</button>
                                  @endforeach
                              </td>
                              <td> <a class="btn btn-primary" href="# ">Detail</a>
                                  {{-- <a class="btn btn-primary" href=" {{ route('roles.show',$user->id) }} ">Insert Role</a> --}}
                                  <a class="btn btn-primary" href=" {{ route('roles.index') }} ">Insert Role</a>
                                  <a class="btn btn-primary" href=" {{ route('users.edit',$user->id) }} ">Edit User</a>
                                  
                                  
                                  <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{route('users.destroy',$user->id)  }} " method="POST">
                                      @csrf
                                      @method('DELETE')
                                  <input class="btn btn-danger" type="submit" value="Delete">
                                  </form> 
                              
                              </td>
                          </tr>
                          @endforeach
                          
            </tbody>
          </table>
          {{$users->links()}}
        </div>
        </div>   

      
    </main>
    @endsection