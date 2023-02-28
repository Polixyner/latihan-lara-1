@extends('home')

@section('title','edit Student')

@section('content')

<form action="/student/{{$student->id}}" method="POST">
@csrf
@method('PUT')
  <div class="mb-3" >
    <label for="name" class="form-label">Nama</label>
    <input type="text" class="form-control" name="nama" id="name" value="{{$student->nama}}">
  </div>
  <div class="mb-3">
    <label for="nim" class="form-label">NIM</label>
    <input type="text" class="form-control" name="nim" id="NIM" value="{{$student->nim}}">
  </div>
  <div class="mb-3">
    <label for="name" class="form-label">Gender</label>
    <select class="form-select" name="gender" id="gender">
        <option value="{{$student->gender}}">{{$student->gender}}</option>
        @if ($student->gender == 'L')
            <option value="P">P</option>
        @else 
        <option value="L">L</option>
        @endif
    </select>
  </div>
  <div class="mb-3">
    <label for="class" class="form-label">Kelas</label>
    <select class="form-select" name="class">
        <option value="{{$student->class_id}}">{{$student->class['name']}}</option>
        @foreach ($class as $item)
         <option value="{{$item->id}}">{{$item->name}}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection