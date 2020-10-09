@extends('adminlte::page')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Profile Settings</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                    
                
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text"
                           class="form-control"
                           id="name"
                           name="name"
                           placeholder="Name"
                           required
                           value="{{ Auth::user()->name}}">
                        </div>
                
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" 
                            class="form-control" 
                            id="email" 
                            name="email"
                            placeholder="Email"
                            required 
                            value="{{ Auth::user()->email}}">
                          </div>
                  
                          <div class="form-group">
                            <label for="state">State</label>
                            <select class="form-control"
                            id="state"
                            name="state"
                            placeholder="State"
                            required 
                            value="{{Auth::user()->state}}">         
                            @if ( Auth::user()->state == 'active')
                               <option>active</option>
                               <option>unactive</option>
                                     @else
                                      @endif
                                     <option>unactive</option>
                                     <option>active</option>        
                                         </select>
                                          </div> 
                          
                          <div class="form-group">
                            <input class="form-control"
                            type="submit"
                            value="Submit"
                            >
                          </div> 
                          
                    <a href="{{ route('profile.index') }}" class="btn btn-default">
                        Cancel
                    </a>
                   
                    <a href="{{ route('changepass') }}" class="btn btn-default">
                        change password
                    </a>
                        </form>                           
                </div>
            </div>
        </div>
    </div>    
</div>
  
  
@endsection
