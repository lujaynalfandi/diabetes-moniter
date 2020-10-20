@extends('adminlte::page')
@section('title', 'All Patients')
@section('content')


<div class="container">
  <div class="row justify-content-center">
    <div class="row justify-content-center">
      <div class="input-container">
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search.."/>
        <i class="fas fa-search"></i>
      </div>
    </div>
    <div class="col-md-14">

      
      <br/>
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title text-xl text-center"> All Patients  </h3>
        </div>
        <!-- /.card-header -->


        <table class="table text-capitalize table-hover">
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
            <tbody id="myTable">      
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
                <div class="row">
                  <div class="col-12 d-flex justify-content-center pt-4">
                  {{ $Patients->links() }}
                 </div>
                </div>
            @endif
          </tbody>

            </table>    
            
    </div>
    
  </div>
</div>


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