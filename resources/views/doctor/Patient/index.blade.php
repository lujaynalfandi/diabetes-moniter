@extends('adminlte::page')
@section('title', 'My Patients')
@section('content')
<div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">My Patients</h3>
      <div class="box-tools pull-right">
        <!-- Buttons, labels, and many other things can be placed here! -->
        <!-- Here is a label for example -->
        <a href="{{ route('Patients.create')}}" class="btn btn-primary">Add Patient</a>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table class="table">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>birth Date</td>
                    <td>gender</td>
                    <td>Diabates type</td>
                    <td>injury year</td>
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
                    <td><a href="{{ route('Patients.show',$Patient->id) }}">{{ $Patient->name }}</a> </td>
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

            </table>    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@stop