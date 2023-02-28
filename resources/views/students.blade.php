@extends('home')

@section('title', 'Daftar Student')

@section('content')
<h1>STUDENT</h1>
<div class="my-5"> <a href="students-add" class="btn btn-primary">Tambah data</a></div>

@if (Session::has('status')) 
<div class="alert alert-success" role="alert">
  {{Session::get('message')}}
</div>
@endif
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">Nim</th>
      <th scope="col">Kelas</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $count = 1 ?>
  @foreach ($studentList as $data)
    <tr>
      <th scope="row">{{$count++}}</th>
      <td>{{$data->nama}}</td>
      <td>{{$data->gender}}</td>
      <td>{{$data->nim}}</td>
      <td>{{$data->class['name']}}</td>
      <td><a href="/students-edit/{{$data->id}}" class="btn btn-success">Edit</a> | 
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus">
          Hapus
        </button>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>


<!-- Modal -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapus" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Apakah anda yakin ingin
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="/students-destroy/{{$data->id}}" style="display: inline-block" method="post">
          @csrf
          @method('delete')
          <button class="btn btn-danger">Ya</button>
      </form>
      </div>
    </div>
  </div>
</div>
@endsection
