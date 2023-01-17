@extends('home')

@section('content')
<h1>Class</h1>
<table class="table" >
    <thead>
        <tr>
            <th>No. </th>
            <th>Nama </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($classList as $data)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$data->name}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection