@extends('adminlte::page')
@section('title', 'My Patients')
@section('content')

<div class="container">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"> <h2 class=" text-center text-capitalize"> <i class="fas fa-id-card"></i> {{ $Patient->name  }}</h2></h3>
          </div>
          <!-- /.card-header -->
            <div class="card-body">
            <div class="text-gray-dark text-capitalize">             
                <p class="text-center ">birth Date :{{ $Patient->birth_date }}</p>
                <p class="text-center ">gender : {{ $Patient->gender }}</p>
                <p class="text-center ">Injury year :  {{ $Patient->injury_year }}</p>
                <p class="text-center ">Diabetes type : @if ($Patient->diabetes_type == 1)
                    type 1
                @else
                    type 2
                @endif</p>
                <p class="text-center ">State : {{ $Patient->state  }}</p>
                <p class="text-center ">Doctor : {{ $Patient->doctor['name']  }}</p>
            </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->   
      </div>

      <div class="col-md-4">
        <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title"> <h4 class=" text-center">Medical history </h4></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              
              <p class="text-center "><h5> Other Chronic Diseases : </h5>  {{ $Patient->chronic_diseases }}</p> 
                <p class="text-center "> <h5>Allergy medicine ? </h5>  {{$Patient->Allergy_medicine }}</p>
                <p class="text-center "> <h5> had surgery ? </h5> {{ $Patient->surgery }}</p> 

            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->        
      </div>
      
      <div class="col-md-4">
        <div class="card bg-info">
            <div class="card-header">
              <h3 class="card-title"><h4 class="text-center">Contact info</h4></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <p class="text-center "><i class="fas fa-phone-alt"></i> phone : {{ $Patient->phone }}</p> 
                <p class="text-center "><i class="fas fa-at"></i> Email : {{ $Patient->email  }}</p>
            </div>
            <!-- /.card-body -->
            
          </div>
          <!-- /.card -->
          
      </div>
    </div>
    
  

    
    <div class="row">
        <div class="col-md-6">
      <div class="card card-outline card-info">
        <div class="card-header">
         <h3 class="card-title text-capitalize">
              <h2 class=" text-center"><i class="fas fa-chart-line"></i> Analyses</h2>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table class="table text-capitalize">
                <thead>
                    <tr>
                      <td>Date</td>
                      <td>time</td>
                        <td>eating</td>
                        <td>Result</td>
                       
                    </tr>
                </thead>
                @isset($Analyses)
                    
             @foreach($Analyses as $Analysis)
             <tr>
              <td> {{ date("Y-m-d", strtotime($Analysis->created_at)) }} </td>  
                <td>{{ date("H:i", strtotime($Analysis->created_at))}}</td>
                <td>{{ $Analysis->eating}}</td>
                <td>{{ $Analysis->result }}</td>
              </tr>
             @endforeach  
          @endisset
                </table>    
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card --> 
    </div>

    <div class="col-md-6">
        <div class="card card-outline card-info">
          <div class="card-header">
           <h3 class="card-title text-capitalize">
                <h2 class=" text-center"> <i class="fas fa-file-signature"></i>Advices</h2>
            </h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <table class="table text-capitalize">
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
