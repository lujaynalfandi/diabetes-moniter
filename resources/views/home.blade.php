@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (count($data)>0)
                    @foreach ($data as $item)
                    <div class="small-box bg-gradient-success">
                        <div class="inner">
                          <h3>{{ $item['u_all'] }}</h3>
                          <p>All admin uses system</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user"></i>
                          
                        </div>
                        <a class="small-box-footer" data-toggle="collapse" href="#collapseUser">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                      <div class="collapse" id="collapseUser">
                        <div class="card card-body card-outline card-success">
                         <p> Active Admin = {{ $item['u_active'] }} </p> 
                         <p>UnActive Admin = {{ $item['u_unactive'] }} </p> 
                        </div>
                      </div>
                 
            </div>

                <div class="col-md-4">                  
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3>{{ $item['d_all'] }}</h3>
                          <p>All doctors</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <a  class="small-box-footer"  data-toggle="collapse" href="#collapseDoctor">
                          More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                      </div>
                      <div class="collapse" id="collapseDoctor">
                        <div class="card card-body card-outline card-info">
                         <p> Active Doctor = {{ $item['d_active'] }} </p> 
                         <p>UnActive Doctor = {{ $item['d_unactive'] }} </p> 
                        </div>
                      </div>
            </div>

            <div class="col-md-4">
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{ $item['p_all'] }}</h3>
                      <p>All Patient</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-injured"></i>
                     
                    </div>
                    <a  class="small-box-footer" data-toggle="collapse" href="#collapsePatient">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                  <div class="collapse" id="collapsePatient">
                    <div class="card card-body card-outline card-warning">
                     <p> Active Patient = {{ $item['p_active'] }} </p> 
                     <p>UnActive Patient = {{ $item['p_unactive'] }} </p> 
                    </div>
                  </div>
        </div>
        @endforeach
@endif
        </div>
     

                </div>
            </div>
        </div>
    </div>    
</div>
  
  
@endsection
