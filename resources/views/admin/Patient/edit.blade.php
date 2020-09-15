@extends('adminlte::page')
@section('title', 'edit Patients')
@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Edit</h3>
     
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

      <form action="{{ route('Patients.update',$Patient->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
          <label for="name">Name</label>
          <input type="text"
           class="form-control"
           id="name"
           name="name"
           required
           value="{{ old('name', $Patient->name)}}">
        </div>

        <div class="form-group">
          <label for="birth_date">Birth date</label>
          <input type="date"
           class="form-control"
           id="birth_date"
           name="birth_date"
           required
           value="{{ old('birth_date', $Patient->birth_date)}}">
        </div>


       

        
        <div class="form-group">
          <label for="gender">Gender</label>
          <select class="form-control"
          id="gender"
          name="gender"
          required 
          value="{{ old('gender', $Patient->gender)}}">
          
          @if ( $Patient->gender == 'male')
          <option value="male">male</option>
          <option value="female">female</option>
          @else
          @endif
          @if ( $Patient->gender == 'female')
            <option value="female">female</option>
            <option value="male">male</option>
            @endif
          </select>
        </div>
    
        <div class="form-group">
          <label for="injury_year">Injury Year</label>
          <input type="number"
              class="form-control"
              name="injury_year"
              required
              value="{{ old('injury_year', $Patient->injury_year) }}"
              id="injury_year"
          >
        </div>

        <div class="form-group">
          <label for="diabetes_type">Diabetes Type</label>
          <select class="form-control"
          id="diabetes_type"
          name="diabetes_type"
          required 
          value="{{ old('diabetes_type', $Patient->diabetes_type) }}">
          
          @if ( $Patient->diabetes_type == '2' )
          <option value='2'>type 2</option>
          <option value='1'>type 1</option>
          @else
          @endif
          @if ( $Patient->diabetes_type == '1')
          <option value='1'>type 1</option>
          <option value='2'>type 2</option>    
          @endif
          </select>    
        </div>

      
         
        <div class="form-group">
          <label for="phone">Phone</label>
          <input type="text"
              class="form-control"
              name="phone"
              required
              placeholder="Phone"
              value="{{ old('phone', $Patient->phone) }}"
              id="phone"
          >
      </div>


        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" 
          class="form-control" 
          id="email" 
          name="email"
          required 
          value="{{ old('email', $Patient->email)}}">
        </div>

        <div class="form-group">
          <label for="state">State</label>
          <select class="form-control"
          id="state"
          name="state"
          required 
          value="{{ old('state', $Patient->state)}}">
          
          @if ( $Patient->state == 'active')
          <option>active</option>
          <option>unactive</option>
          @else              
          @endif
          @if ( $Patient->state == 'unactive')
            <option>unactive</option>
            <option>active</option>         
            @endif  
          </select>
        </div>
       
        <div class="form-group">
          <label for="doctor_id">Doctor</label>
          <select class="form-control"
              name="doctor_id"
              required
              id="doctor_id"
          >
              @foreach ($doctors as $doctor)
                  <option value="{{ $doctor->id }}"
                      {{ old('doctor_id', $Patient->doctor_id) == $doctor->id ? 'selected' : '' }}
                  >
                      {{ $doctor->name }}
                  </option>
              @endforeach
          </select>
      </div>
  </div>


        
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