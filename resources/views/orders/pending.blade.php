@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Pending Orders <a class="btn btn-sm btn-default pull-right" href="{{ route('list_orders') }}">Return</a>
                </div>

                <div class="panel-body">
                    <div class="row">
                    @foreach($orders as $order)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                            <div class="caption">
                                <h3><a href="{{ route('show_order', ['id' => $order->id]) }}">{{ $order->title }}</a></h3>
                                <p>{{ str_limit($order->body, 50) }}</p>
                                <p>
                                @can('complete-order')
                                    <a href="{{ route('complete_order', ['id' => $order->id]) }}" class="btn btn-sm btn-default" role="button">Complete</a> 
                                @endcan
                                    <a href="{{ route('edit_order', ['id' => $order->id]) }}" class="btn btn-default" role="button">Edit</a> 
                                </p>
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