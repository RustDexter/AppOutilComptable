@extends('layouts.layout')
@section('content')
    <div class="row">
        <p>{{isset($data) ? $data : true}}</p>
    </div>
    <div class="flex justify-center">
        @livewire('utilisateurs')
    </div>
@endsection
