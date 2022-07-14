@extends('layout.main')

@section('content')

<div class="container">
  <h2><center>To do list</center></h2>
  
  <a href="/create"><button type="button" class="btn btn-primary right action_create">Create</button></a>
   
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Target</th>
        <th>Rank</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($targets as $target)
      <tr>
        <td>{{$target->target}}</td>
        <td>01{{$target->ranking}}</td>
        <td class="action_td">
            <a href="/edit/{{$target->id}}"><button type="button" class="btn btn-info">Edit</button></a>
            <a href="#"><button type="button" class="btn btn-danger">Delete</button></a>
        </td>
      </tr>
      @endforeach
  
    </tbody>
  </table>
  
  {{$targets->links()}}

@endsection