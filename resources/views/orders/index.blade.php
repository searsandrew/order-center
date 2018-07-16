@extends('layouts.app')

@section('content')
    <h1>Completed orders
        @can('create-order')
            <a class="pull-right btn btn-sm btn-primary" href="{{ route('create_order') }}">New</a>
        @endcan
    </h1>
    <order-cards path="/api/completed"></order-cards>
@endsection