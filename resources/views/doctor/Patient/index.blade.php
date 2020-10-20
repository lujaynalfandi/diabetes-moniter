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
        <div class="row justify-content-center">
          <br/>
          <div class="input-container">
            <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.."/>
             <i class="fas fa-search"></i>
          </div>
        </div>
      </div>
      <!-- /.box-tools -->
    </div>
    <!-- /.box-header -->
    <div class="box-body">

        <table class="table table-bordered table-sm table-hover" >
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
            <tbody id="myTable">
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
               <div class="row">
                 <div class="col-12 d-flex justify-content-center pt-4">
                 {{ $Patients->links() }}
                </div>
               </div>
            @endif
          </tbody>
            </table>    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@stop
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
  </script> 