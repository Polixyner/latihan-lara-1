@extends('home')

@section('content')
<h1>STUDENT</h1>
    <ol>
    @foreach ($studentList as $data)
        <li> {{$data->nama}} | {{$data->gender}} | {{$data->nim}} | {{$data->class_id}} </li>
    @endforeach
    </ol>
@endsection
