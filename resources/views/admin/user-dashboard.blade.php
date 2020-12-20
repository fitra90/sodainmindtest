@extends('admin.layout')
@section('title', 'User Dashboard')
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Registered User</h4>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Subsription</th>
                                <th>Join Date</th>
                                <th>Status</th>
                                <!-- <th class="text-right">Actions</th> -->
                            </tr>
                        </thead>
                        <tbody>
                           
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@stop