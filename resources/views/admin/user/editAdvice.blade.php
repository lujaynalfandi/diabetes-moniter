@extends('adminlte::page')
@section('title', 'Edit Advice')
@section('content')

<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title"> <h2 class=" text-center text-capitalize">Edit Advice </h2></h3>
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
        </div>
          <!-- /.card-header -->
            <div class="card-body">

               <form action="{{ route('advice.update',$advice->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="Prescription">New Prescription:</label>
            <textarea class="form-control" cols="50" rows="3" 
            name="prescription" 
            id="prescription"
            value="{{ old('prescription', $advice->prescription)}}" >
        </textarea>
             
        </div> 
          <div class="form-group">
          <label for="Review_Date">Review Date : </label>
          <input type="date" id="review_Date" name="review_Date"
          value="{{ old('review_Date', $advice->review_Date)}}"
          >
        </div> 
       
          <button type="submit" class="btn btn-primary" 
         > Save </button>
      </form>
    </div> 
</div> 
</div> 
</div> 
</div> 
@stop