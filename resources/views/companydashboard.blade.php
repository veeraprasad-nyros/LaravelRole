@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <h3>Teams and Members Details</h3>

                    <div class="col-md-12" >
                        @if($errors->has('name'))
                            <div class="alert alert-warning">
                                <a href="#" class="close" data-dismiss="alert">&times;</a>
                                <strong>Warning!</strong> {{ $errors->first('name') }}.
                            </div>
                        @endif
                        <div>
                            <label for = "showform">Create New Team</label>
                            <input type="button" class="btn btn-primary" value="Click" id="showform" name="showform" />
                        </div>
                        <form class="form-horizontal" role="form" method="POST" action="{{ url('/company') }}" id ="memberform">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control " name="name" required x-moz-errormessage="Error! Name field doesn't empty." title = "Error! Name field doesn't empty." />
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <h3>Teams list <sup class="text text-info">({{$teamtotal}} teams available)</sup></h3>
                    <div class="col-md-12" >
                        @if(count($teamlist) == 0)
                        <div><h4>No Teams Found</h4></div>

                        @endif
                        @if(count($teamlist) > 0)
                            @foreach($teamlist as $team)
                                <div class="col-md-12 ">
                                    <div class="row bg-info">
                                        <div class="col-md-4 ">
                                            <span class="text text-danger">{{$team->name}}</span>
                                           
                                            <span class="text text-info"> 
                                                <sup>({{$team->member_total}} members)</sup>
                                            </span>
                                           
                                            <button type ="button" class="btn btn-link btnform" id = "{{$team->id}}" >edit</button>
                                            <a type="button" class="btn btn-link" href="{{ url('company/add/'.$team->id) }}">Add Member</add>
                                            <a class="btn btn-link hide" id= "delete{{$team->id}}" href="#" title= {{ url('company/delete/'.$team->id) }}" >delete</a>

                                        </div>
                                        <div class="col-md-8">
                                            <div class="row">
                                                <form class="form-horizontal formhide" role="form" method="POST" action="{{ url('company/edit/'.$team->id) }}" id ="teamform{{$team->id}}">
                                                {{ csrf_field() }}
                                            
                                                <div class="form-group">
                                                    <label for="name" class="col-md-2 control-label">Team Name</label>
                                                    <div class="col-md-6">
                                                        <input id="name" type="text" class="form-control " name="name" required x-moz-errormessage="Error! Name field doesn't empty." title = "Error! Name field doesn't empty." />
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-btn fa-user"></i>Update
                                                        </button>
                                                    </div>
                                                </div>
                                                </form>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12" ><span class="text text-success">Members</span></div>
                                        @foreach($memberslist as $member)
                                            @if($member->team_name ==  $team->name)
                                                <div class="col-md-12 " >
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                         <span class="text text-warning"> {{$member->name}} </span>
                                                        </div>
                                                        <div class="col-md-2">
                                                        <label>email:
                                                            <span class= "text text-warning"> {{$member->email}}
                                                            </span>
                                                        </label>
                                                        </div>
                                                        <div class="col-md-1">
                                                        <a class="btn btn-link" href="{{url('company/edit/member/'.$member->id)}}" >Edit</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
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

