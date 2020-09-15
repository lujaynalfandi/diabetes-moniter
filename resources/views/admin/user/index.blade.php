@extends('adminlte::page')
@section('title', 'All Users')

@if (Auth::user()->type === 'admin')
@section('content')

<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
  
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title text-xl text-center"> All Users  </h3>
        </div>
        <!-- /.card-header -->

      <table class="table">
          <thead>
              <tr>
                  <td>ID</td>
                  <td>Name</td>
                  <td>Email</td>
                  <td>State</td>
                  <td>type</td>
                  <td>Action</td>

              </tr>
          </thead>
          @if (count($users)>0)
          @foreach ($users as $user)
              <tr class="text-capitalize">
                  <td>{{ $user->id }}</td>
                  <td><a href="{{ route('users.show',$user->id) }}">{{ $user->name }}</a></td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->state }}</td>
                  <td>{{ $user->type }}</td>
                  <td><a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary">Edit</a></td>
              </tr>
              @endforeach
          @endif
          </table>   


    </div>
  </div>
</div>

@stop
@else
@section('content')
<p> not Authorized </p>
@stop

@endif
