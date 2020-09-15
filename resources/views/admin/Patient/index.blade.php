@extends('adminlte::page')
@section('title', 'All Patients')
@section('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-14">
  
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title text-xl text-center"> All Patients  </h3>
        </div>
        <!-- /.card-header -->


        <table class="table text-capitalize">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>birth Date</td>
                    <td>gender</td>
                    <td>Diabates type</td>
                    <td>Injury year</td>
                    <td>phone</td>
                    <td>Email</td>
                    <td>State</td>
                    <td>Doctor</td>
                    <td>Action</td>
                </tr>
            </thead>
            @if (count($Patients)>0)
            @foreach ($Patients as $Patient)
                <tr>
                    <td>{{ $Patient->id }}</td>
                    <td><p ><a href="{{ route('Patients.show',$Patient->id) }}"> {{  $Patient->name}}</a> </p> </td>
                    <td>{{ $Patient->birth_date }}</td>
                    <td>{{ $Patient->gender }}</td>
                    <td>
                      @if ($Patient->diabetes_type == '1')
                         <p>  type 1 </p>
                      @else
                         <p>  type 2 </p>
                      @endif
                  </td>
                    <td>{{ $Patient->injury_year }}</td>
                    <td>{{ $Patient->phone }}</td>
                    <td>{{ $Patient->email }}</td>
                    <td>{{ $Patient->state }}</td>
                    <td>{{ $Patient->doctor['name'] }}</td>
                    <td><a href="{{ route('Patients.edit',$Patient->id) }}" class="btn btn-primary">Edit</a></td>
                
                </tr>
                @endforeach
            @endif

            </table>    
            
    </div>
    
  </div>
</div>


@stop