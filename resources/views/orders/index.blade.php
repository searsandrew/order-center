@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Orders
                    @can('create-order')
                        <a class="pull-right btn btn-sm btn-primary" href="{{ route('create_order') }}">New</a>
                    @endcan
                </div>

                <div class="panel-body">
                    <div class="row">
                    @foreach($orders as $order)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                            <div class="caption">
                                <h3><a href="{{ route('edit_order', ['id' => $order->id]) }}">{{ $order->title }}</a></h3>
                                <p>{{ str_limit($order->body, 50) }}</p>
                                @can('update-order', $order)
                                <p>
                                    <a href="{{ route('edit_order', ['id' => $order->id]) }}" class="btn btn-sm btn-default" role="button">Edit</a> 
                                </p>
                                @endcan
                            </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection