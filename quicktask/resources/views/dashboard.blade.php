@extends('layouts.layout')
  
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (Auth::user()->utype === 'ADM')
                @include('admin')
            @else
                @include('user')
            @endif
        </div>
    </div>
</div>
@endsection