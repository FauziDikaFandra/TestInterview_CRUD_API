@extends('Layout/main')

@section('container')
<div class="container">
<div class="card login-card">
<h2 class="ml-3 mt-3">Dashboard</h2> 
<div class="table-responsive mt-3  shadow p-3 bg-white rounded">
<div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
  <div class="btn-group" role="group" aria-label="First group">
  <a class="btn btn-primary btn-sm mb-2" href="{{url('/create')}}"><span class="mr-2" data-feather="plus"></span>Add New</a>
  </div>
  <div class="input-group">
  <a class="btn btn-secondary btn-sm mb-2" href="{{url('/logout')}}"><span class="mr-2" data-feather="plus"></span>Sign Out</a>
  </div>
</div>

<table class="table caption-top">
  <caption>List of users</caption>
  <thead>
    <tr>
     <th>User Id</th>
                <th>Status</th>
                <th>Position</th>  
                <th></th>  
    </tr>
  </thead>
  <tbody>
       @if (count($dashboard) > 0)
          @foreach ($dashboard as $ut)
    <tr>
      <td>{{$ut->user_id}}</td>
      <td>{{$ut->status}}</td>
      <td>{{$ut->position}}</td>
      <td>
      <div class="dropdown">
  <button class="btn btn-outline-success dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  Action
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
    <a class="dropdown-item" href="/edit/{{$ut->user_id}}"><span class="mr-2" data-feather="edit"></span>Edit</a>
    <a id="delete" class="dropdown-item" href="/delete/{{$ut->user_id}}"><span class="mr-2" data-feather="delete"></span>Delete</a>
  </div>
</div>
</td>
    </tr>
          @endforeach
       @else
    <tr>
        <td colspan="7" class="text-center font-italic"><span style="color: black;">No record found !!!'</span></td>
    </tr>
       @endif
  </tbody>
</table>
{{-- Pagination --}}
</div>
{{$dashboard->links()}}
</div>
</div>
@endsection