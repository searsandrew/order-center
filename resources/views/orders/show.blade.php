@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $order->title }}</h5>
                    <p class="card-text">{{ $order->body }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection