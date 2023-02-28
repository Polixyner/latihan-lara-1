@extends('home')

@section('title','Tambah Student')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        @foreach ($errors->all() as $error)
           {{ $error }}
        @endforeach
    </div>
@endif

<form action="student" method="post">
@csrf
  <div class="mb-3" >
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="name">
  </div>
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" class="form-control" name="nim" id="NIM">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Gender</label>
    <select class="form-select" name="gender" id="gender">
        <option value="L">L</option>
        <option value="P">P</option>
    </select>
  </div>
  <div class="mb-3">
    <label for="class" class="form-label">Kelas</label>
    <select class="form-select" name="class">
    @foreach ($class as $item)
        <option value="{{$item -> id}}">{{$item -> name}}</option>
    @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary">kirim</button>
</form>
@endsection