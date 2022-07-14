@extends('layout.main')

@section('content')

<div class="container">
  <h2><center>To do list</center></h2>

  <div class="container">

    <form action="/edit/{{$target->id}}" method="POST">
      @method('PUT')
      {{ csrf_field() }}
      
      <button type="submit" class="btn btn-primary right action_submit">update</button>

      <div class="clearfix"></div>
      
      <div class="form-group">
        <label for="usr">Target:</label>
        <input type="text" class="form-control" id="usr" name="target" value="{{ $target->target }}">
      </div>
      <div class="form-group">
        <label for="pwd">Ranking:</label>
        <input type="number" class="form-control" id="pwd" name="ranking" value="{{ $target->ranking }}">
      </div>
      
    </form>
  </div>
             
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

