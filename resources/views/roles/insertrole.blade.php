
@extends('layout.main')
@section('konten')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Insert Role Status</h1>
      </div>
      <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
       
      <div class="mb-3">
        <label for="user_id" class="form-label">User ID</label>
        <input name="user_id" type="text" class="form-control" id="user_id" value="24" >
        @error('user_id')
        <div class="alert alert-danger mt-2">
        {{ $message }}
        </div>
        @enderror

        
      <div class="mb-3">
        <label for="role_id" class="form-label">role_id</label>
        {{-- <input name="role_id" type="text" class="form-control" id="role_id" placeholder="Ketikkan role id" value="  " > --}}
        <select multiple class="form-control" name="role_id" id="role_id">
          @foreach ($role as $rl )
              <option value=" {{ $rl->id }}">{{ $rl->id }} - {{ $rl->name }}</option>
          @endforeach
        </select>
        @error('role_id')
        <div class="alert alert-danger mt-2">
        {{ $message }}
        </div>
        @enderror


        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
      

      
    </main>
    @endsection