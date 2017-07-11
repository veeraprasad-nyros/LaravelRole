@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Currently logged {{Auth::User()->name}}!</div>

                <div class="panel-body">
                  @for($i = 0; $i < count($list); $i++)
                    <div class = "col-xs-4 col-sm-4 col-md-4 col-lg-3">
                      <a href = "#" class = "thumbnail customthumb">
                         <img src = "{{url('assets/images/'.$list[$i])}}" alt = "Generic placeholder thumbnail" >
                      </a>
                   </div>
                  @endfor
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
