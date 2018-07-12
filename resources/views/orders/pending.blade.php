@extends('layouts.app')

@section('content')
    <h1>Pending Orders <a class="btn btn-sm btn-default pull-right" href="{{ route('list_orders') }}">Return</a></h1>
    <order-cards path="/api/pending"></order-cards>
@endsection