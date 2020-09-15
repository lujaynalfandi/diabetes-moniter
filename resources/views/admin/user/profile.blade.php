@extends('adminlte::page')
@section('title', 'My Patients')
@section('content')

<div class="container text-capitalize">
<div class="row justify-content-center">
  <div class="col-md-6">
    <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title">
              <h4 class=" text-center">
                 @if ($User->type == 'admin')
                <i class="fas fa-id-card-alt"></i> {{ $User->name  }}
              @else
                <i class="fas fa-user-md"></i> {{ $User->name  }}  
              @endif </h4>
          </h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <h4 class="text-center">{{ $User->type }}</h4>        
            <h4 class=" text-center">Email : {{ $User->email  }}</h4>
            <h4 class=" text-center">State : {{ $User->state  }} </h4>          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>

    @if($User->type == 'doctor')
    <div class="col-md-2">
      <div class="card card-info">
        <div class="card-header">
          <h3 class="card-title"> <h5 class=" text-center"><i class="far fa-flag"></i> Patients</h4></h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <span class="info-box-text"></span> 
        <h5> All : {{$Ps_count}}</h5>
        <h5> Active : {{$Ps_active}}</h5>
        <h5> UnActive : {{$Ps_count-$Ps_active }}</h5>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->  
    </div>

  </div>

      
      
<div class="row justify-content-center">
  <div class="col-md-8">

@isset($Patients)
<div class="card card-outline card-info">
    <div class="card-header">
      <h3 class="card-title text-xl">Patients</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body"> 
      
      <table class="table gray-dark">
        <thead class="thead-light">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Email</td>
              </tr>
            </thead>
        @foreach ($Patients as $Patient)
        <tr>
          <td>
            {{ $Patient->id }}
          </td>
          <td>
            <p><a href="{{ route('Patients.show',$Patient->id) }}"> {{  $Patient->name}}</a> </p> 
          </td>
          <td>
           {{ $Patient->email }}
          </td>
        </tr>  
        @endforeach
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
  @endisset
</div>
</div>
@endif


</div>


@stop