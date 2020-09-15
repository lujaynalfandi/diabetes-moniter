@extends('adminlte::page')
@section('title', 'Edit user')
@if (Auth::user()->type === 'admin')
@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">User</h3>
     
      <div class="box-tools pull-right">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Warning!</strong> Please check input field code<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

      </div>

      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

      <form action="{{ route('users.update',$user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"
           class="form-control"
           id="name"
           name="name"
           required
           value="{{ old('name', $user->name)}}">
        </div>
    
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" 
          class="form-control" 
          id="email" 
          name="email"
          required 
          value="{{ old('email', $user->email)}}">
        </div>

        <div class="form-group">
          <label for="state">State</label>
          <select class="form-control"
          id="state"
          name="state"
          required 
          value="{{ old('state', $user->state)}}">
          
          @if ( $user->state == 'active')
          <option>active</option>
          <option>unactive</option>
          @else
              
          @endif
            <option>unactive</option>
            <option>active</option>
          
 
           
          </select>
        </div>
        <input class="form-control" type="text" placeholder="{{ $user->type }}" readonly><br/>
        
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('users.index') }}" class="btn btn-default">
        Cancel
    </a>
      </form>

        </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@stop
@else
@section('content')
<p> not Authorized </p>
@stop

@endif