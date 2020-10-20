@extends('adminlte::page')
@section('title', 'My Advices')
@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"> <h2 class=" text-center text-capitalize">My Advices </h2></h3>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
                <table class="table text-capitalize  table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>Date</td>
                            <td>time</td>
                            <td>prescription</td>
                            <td>Doctor</td>
                           
                        </tr>
                    </thead>
                    @isset($Advices)
                 @foreach ($Advices as $Advice)          
              <tr>
              <td> {{ date("Y-m-d", strtotime($Advice->created_at)) }} </td>  
                <td>{{ date("H:i", strtotime($Advice->created_at))}}</td>
                  <td>{{ $Advice->prescription }}</td>
                  <td>{{ $Advice->doctor->name }}</td>
                  <td><a href="{{ route('advice.edit',$Advice->id) }}" class="btn btn-warning">Edit</a></td>               

              </tr>
              @endforeach       
              @endisset
                    </table>    
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
        </div>
    </div>
</div>

         
          @stop
