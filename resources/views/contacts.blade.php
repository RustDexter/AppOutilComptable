@extends('layouts.layout')
@section('content')
    <div class="flex justify-center">
        <div>
            <div class="row">
                <div class="col-md-12 my-4">
                    <div class="card">
                        <div class="card-header">
                            <h2 class="h4 mb-1">Les messages</h2>
                        </div>
                        <div class="card-body">
                            @if (count($errors) > 0 && 2 == $error_index)
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                                    <strong>Sorry!</strong> invalid input.<br><br>
                                    <ul style="list-style-type:none;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if(count($contacts)!=0)
                                <table class="table table-hover table-borderless border-v">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Nom</th>
                                        <th>Message</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $value)
                                        <tr>
                                            <td>{{ $value->name }}</td>
                                            <td>{{$value->message}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{$value->created_at}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                Il n'y a pas de messages
                            @endif

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
