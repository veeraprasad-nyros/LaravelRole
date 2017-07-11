@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Profile Details</div>

                <div class="panel-body">
                   <div class="col-sm-12"><h4>Primary Details</h4></div>
                    <div class="col-sm-6">Name</div>
                    <div class="col-sm-6">{{$user->name}}</div>
                    <div class="col-sm-6">Email</div>
                    <div class="col-sm-6">{{$user->email}}</div>
                    <div class="col-sm-12"><h4>Secondary Details</h4></div>
                    <div class="col-sm-6">User Type</div>
                    <div class="col-sm-6">{{$rolename}}</div>
                    <div class="col-sm-12" align="center">
                        <a href="/profile/edit" class="btn btn-primary">Edit Profile<a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
