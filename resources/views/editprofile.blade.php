@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile</div>

                <div class="panel-body">
                @if($msg['status'])
                    <div class="alert {{$msg['ccname']}}">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{$msg['msg']}}</strong>
                    </div>
                @endif
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/profile/edit') }}" >
                        {{ csrf_field() }}
                    <div class="col-sm-12"><h4>Primary Details</h4></div>


                     <div class="form-group">
                        <label for="name" class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            <input id="name" type="text" class="form-control " name="name" value="{{$user->name}}" required x-moz-errormessage="Error! Name field doesn't empty." title = "Error! Name field doesn't empty." />
                        </div>
                    </div>

                    <div class="col-sm-12"><h4>Secondary Details</h4></div>
                  
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-btn fa-user"></i> Update/Save
                            </button>
                            <a href="/profile" class="btn btn-primary">Return To Profile</a>
                        </div>
                    </div>
                </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection



