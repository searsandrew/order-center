@extends('layouts.app')

@section('content')
<h1>Pending Orders <a class="btn btn-sm btn-default pull-right" href="{{ route('list_orders') }}">Return</a></h1>
<div class="row">
    @foreach($orders as $order)
        <div class="col-lg-4 col-md-6 col-sm-12"> 
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><a href="{{ route('show_order', ['id' => $order->id]) }}">{{ $order->title }}</a></h3>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $order->user->name }}</h6>
                    <p class="card-text">{{ str_limit($order->body, 50) }}</p>
                    @can('complete-order')
                        <a href="{{ route('complete_order', ['id' => $order->id]) }}" class="card-link btn btn-outline-success">Complete</a> 
                    @endcan
                    <a href="{{ route('show_order', ['id' => $order->id]) }}" class="card-link">View</a>
                    <a href="{{ route('edit_order', ['id' => $order->id]) }}" class="card-link">Edit</a> 
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection