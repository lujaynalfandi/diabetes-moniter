@extends('adminlte::page')
@section('title', 'Add Patients')
@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Add New Patient</h3>
     
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

      <form action="{{ route('Patients.store') }}" method="POST">
        @csrf
     

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"
           class="form-control"
           id="name"
           name="name"
           placeholder="Name"
           required
           value="{{ old('name')}}">
        </div>

        <div class="form-group">
          <label for="birth_date">Birth date</label>
          <input type="date"
           class="form-control"
           id="birth_date"
           name="birth_date"
           placeholder="Birth date"
           required
           value="{{ old('birth_date')}}">
        </div>


       

        
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control"
          id="gender"
          name="gender"
          required 
          placeholder="Gender"
          value="{{ old('gender')}}">
          <option value="male">male</option>
          <option value="female">female</option>
          </select>
        </div>
    
        <div class="form-group">
          <label for="injury_year">Injury Year</label>
          <input type="number"
              class="form-control"
              name="injury_year"
              required
              value="{{ old('injury_year') }}"
              id="injury_year"
              placeholder="Injury Year"
          >
        </div>

        <div class="form-group">
          <label for="diabetes_type">Diabetes Type</label>
          <select class="form-control"
          id="diabetes_type"
          name="diabetes_type"
          required 
          placeholder="Diabetes Type"
          value="{{ old('diabetes_type') }}">
          <option value='1'>type 1</option>
          <option value='2'>type 2</option>    
          </select>    
        </div>

      
         
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text"
              class="form-control"
              name="phone"
              required
              placeholder="phone number"
              value="{{ old('phone') }}"
              id="phone"
          >
      </div>


        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" 
          class="form-control" 
          id="email" 
          name="email"
          placeholder="Email"
          required 
          value="{{ old('email')}}">
        </div>

        <div class="form-group">
          <label for="state">State</label>
          <select class="form-control"
          id="state"
          name="state"
          placeholder="State"
          required 
          value="{{ old('state')}}">         
          <option value="active">active</option>
          <option value="unactive">unactive</option>         
          </select>
        </div>       
  </div>


 <div class="form-group">
          <label for="doctor_id">doctor id</label>
          <label for="doctor_id">{{ auth()->user()->id }}</label>

        
      <button type="submit" class="btn btn-primary">Submit</button>
      <a href="{{ route('Patients.index') }}" class="btn btn-default">
        Cancel
    </a>
      </form>

        </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@stop