@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Edit/Updating Member details</div>

                <div class="panel-body">
                   <form class="form-horizontal" role="form" method="POST" action="{{ url('/company/update/member/'.$member->id)}}" >
                    {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">   
                        <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}"  >
                                <span>OldName: {{$member->name}}</span>
                                       @if ($errors->has('name'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  >
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                                     @endif
                            </div>
                        </div>

                    
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Update/Save
                            </button>
                            <a type="submit" class="btn btn-primary" href = "{{ url('/company')}}">
                            <i class="fa fa-chevron-circle-left" aria-hidden="true"></i> Back
                            </a>
                        </div>
                    </div>

                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection