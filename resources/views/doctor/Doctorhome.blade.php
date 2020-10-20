@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h3>Welcom Doctor {{ Auth::user()->name }} </h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
               
                    <a type="button" class="btn btn-info btn-lg" href="{{ route("advice.index") }}"> My Advices </a>
                 

                </div>
            </div>
        </div>
    </div>    
</div>

<div class="container">
  <div class="row justify-content-center">
      <div class="col-md-10">
       

        @if (count($data)>0)
          @foreach ($data as $item)
          @isset($item['id'])             
        <div class="card" id="card{{$item['id']}}">
            <!-- Main node for this component -->
<div class="timeline">
  <!-- Timeline time label -->
  <div class="time-label">
    <span class="bg-green">{{ date("Y-m-d", strtotime($item["Lst_Advice"]["created_at"])) }}  
    </span>
  </div>
<div>
  <!-- Before each timeline item corresponds to one icon on the left scale -->
    <i class="fas fa-envelope bg-blue"></i>
    <!-- Timeline item -->
    <div class="timeline-item">
    <!-- Time -->
      <span class="time"><i class="fas fa-clock"></i>{{ date("H:i", strtotime($item["Lst_Advice"]["created_at"]))}}</span>
      <!-- Header. Optional -->
      <h2 class="timeline-header"> Patient Name : <a href="{{ route('Patients.show',$item['id']) }}"> {{ $item['name']}}</a> 
      &nbsp;&nbsp;
     
      </h2>
  
      <!-- Body -->
      <div class="timeline-body">
        Age : {{ $item["birth_date"] }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        Gender : {{ $item["gender"] }}  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         Diabetes type : 
        <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header "><h4>Last Prescription </h4></div>
                  <div class="card-body">
<h5>{{ $item["Lst_Advice"]["prescription"]  }} </h5>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalLong{{ $item['id'] }}">
  View Analysis
</button>
<!-- Modal -->
</div>
</div>

<div class="modal fade" id="ModalLong{{ $item['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Table Analysis</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card card-body">
          <table class="table text-capitalize table table-bordered table table-sm">
            <thead>
                <tr>
                  <td>Result</td>
                  <td>eating</td>
                  <td>time</td>
                  <td>Date</td>
                   
                </tr>
            </thead>
            @isset($item["Lst_Analyses"])
                
          @foreach($item["Lst_Analyses"] as $Analysis)
          <tr>
            <td>{{ $Analysis['result'] }}</td>
            <td>{{ $Analysis['eating']}}</td>
            <td>{{ date("H:i", strtotime($Analysis['created_at']))}}</td>
            <td> {{ date("Y-m-d", strtotime($Analysis['created_at'])) }} </td>  
          </tr>
          @endforeach  
          @endisset
            </table>    
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

      </div>
      <!-- Placement of additional controls. Optional -->
      <div class="timeline-footer">
       
        <form action="{{ route('advice.store')}}" method="POST">
          @csrf  
        <div class="form-group">
          <label for="Prescription">New Prescription:</label>
          <textarea class="form-control" cols="50" rows="3" name="prescription" id="prescription"></textarea>
        </div> 
        <div class="form-group">
        <label for="Review_Date">Review Date : </label>
        <input type="date" id="review_Date" name="review_Date">
      </div> 
     
        <button type="submit" class="btn btn-primary" 
        onclick="Remove('card'+{{$item['id']}})" > Send </button>
      </form>

      </div>
     
    </div>
  </div>
  <!-- The last icon means the story is complete -->
  <div>
   
  </div>
</div>
</div>
</div>
</div>
@endisset
@endforeach

@endif

</div>
</div>
</div>

<script type="text/javascript">  
  function Remove(id) {
    var x = document.getElementById(id);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  }
  </script>


@endsection
