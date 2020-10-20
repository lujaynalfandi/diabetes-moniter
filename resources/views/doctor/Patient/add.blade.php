@extends('adminlte::page')
@section('title', 'Add Patients')
@section('content')
<div class="card card-info">
    <div class="card-header">
      <h3 class="card-title">Add New Patient</h3>
     
      <div class="card-tools">
        
      </div>

      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="card-body">
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

      <form action="{{ route('Patients.store') }}" method="POST">
        @csrf
     
        <div class="row">
          <div class="col-md-6">  
        <div class="card card-outline card-secondary">
          <div class="card-header">
    <h3 class="card-title">Personal information</h3>
  </div>  <div class="card-tools">
    <!-- Buttons, labels, and many other things can be placed here! -->
    <!-- Here is a label for example -->
    <br/>
  </div>
          <div class="form-group row ">
            <label for="name" class="col-md-3 col-form-label text-md-right">Name</label>
            <div class="col-md-8">
            <input type="text"
             class="form-control @error('name') is-invalid @enderror"
             id="name"
             name="name"
             required
             value="{{ old('name')}}"> </div>
          </div>

          <div class="form-group row">
            <label for="birth_date" class="col-md-3 col-form-label text-md-right">Birth date</label>
            <div class="col-md-8">
            <input type="date"
             class="form-control @error('birth_date') is-invalid @enderror"
             id="birth_date"
             name="birth_date"
             required
             value="{{ old('birth_date')}}"> </div>
          </div>
          <div class="form-group row">
            <label for="gender" class="col-md-3 col-form-label text-md-right">Gender</label>
            <div class="col-md-8">
            <select class="form-control @error('gender') is-invalid @enderror"
            id="gender"
            name="gender"
            required 
            value="{{ old('gender')}}">
            <option value="male">male</option>
            <option value="female">female</option>
            </select>
          </div>
          </div>

        </div>
      </div>

      <div class="col-md-6">  
        <div class="card card-outline card-secondary">
          <div class="card-header">
            <h3 class="card-title">Contact info</h3>
          </div>  <div class="card-tools">
    <!-- Buttons, labels, and many other things can be placed here! -->
    <!-- Here is a label for example -->  
    <br/>  
  </div>

  <div class="form-group row">
    <label for="phone" class="col-md-3 col-form-label text-md-right">Phone</label>
    <div class="col-md-8">
    <input type="text"
        class="form-control"
        name="phone"
        required
        placeholder="Phone"
        value="{{ old('phone') }}"
        id="phone" > </div>

</div>
       
<div class="form-group row">
  <label for="email" class="col-md-3 col-form-label text-md-right">Email</label>
  <div class="col-md-8">
  <input type="email" 
  class="form-control"
    id="email" 
  name="email"
  required 
  value="{{ old('email')}}">
</div>
</div>

<div class="form-group row">
  <label for="state" class="col-md-3 col-form-label text-md-right">State</label>
  <div class="col-md-8">
  <select class="form-control"
  id="state"
  name="state"
  required 
  value="{{ old('state')}}">
  <option>active</option>
  <option>unactive</option>
  </select> </div>
</div>

</div>
</div>       
        </div>

        <div class="row">
          <div class="col-md-6"> 
            <div class="card card-outline card-secondary">
              <div class="card-header">
                <h3 class="card-title"><h4 class="text-center">medical information</h4></h3>
              </div>  <div class="card-tools">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->  
        <br/>  
      </div>
    
        <div class="form-group row">
          <label for="injury_year" class="col-md-4 col-form-label text-md-right">Injury Year</label>
          <div class="col-md-6">
          <input type="number"
              class="form-control"
              name="injury_year"
              required
              value="{{ old('injury_year') }}"
              id="injury_year"
          ></div>
        </div>

        <div class="form-group row">
          <label for="diabetes_type" class="col-md-4 col-form-label text-md-right">Diabetes Type</label>
          <div class="col-md-6">
          <select class="form-control"
          id="diabetes_type"
          name="diabetes_type"
          required 
          value="{{ old('diabetes_type') }}">
          <option value='1'>type 1</option>
          <option value='2'>type 2</option>    
         
          </select>  </div>  
        </div>
</div>
</div>

  
<div class="col-md-6"> 
  <div class="card card-outline card-secondary">
    <div class="card-header">
      <h3 class="card-title"><h4 class="text-center">Medical history</h4></h3>
    </div>  <div class="card-tools">
<!-- Buttons, labels, and many other things can be placed here! -->
<!-- Here is a label for example -->  
<br/>  
</div>

<div class="form-group row">
  <label for="diabetes_type" class="col-md-5 col-form-label text-md-right"> other Chronic Diseases ?</label>
  <div class="col-md-6">
  <select class="form-control"
  id="chronic_diseases"
  name="chronic_diseases"
  required 
  value="{{ old('chronic_diseases') }}">
  <option value='hypertension'>hypertension</option>
  <option value='heart Disease'>heart Disease</option>    
  <option value='bone Diseases'>bone Diseases</option>    
  <option value='Autoimmune Disease'>Autoimmune Disease</option>    
  <option value='None of the above'>None of the above</option>    
  </select>  </div>  
</div>

<div class="form-group row">
  <label for="email" class="col-md-5 col-form-label text-md-right">Allergy medicine ?</label>
  <div class="col-md-6">
          <div class="col-md-18">
            <input type="text"
             class="form-control"
             id="Allergy_medicine"
             name="Allergy_medicine"
             placeholder="Yes or No and Details"
             value="{{ old('D_Allergy_medicine')}}"> </div>
</div>
</div>

<div class="form-group row">
  <label for="email" class="col-md-5 col-form-label text-md-right">had surgery?</label>
  <div class="col-md-6">
            <div class="col-md-18">
            <input type="text"
             class="form-control"
             id="surgery"
             name="surgery"
             placeholder="Yes or No and Details"
             value="{{ old('surgery')}}"> </div>
</div>
</div>

  </div>
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