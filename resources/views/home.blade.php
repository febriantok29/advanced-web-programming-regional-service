@extends('layouts.app')

@section('title', 'Home')

@section('page_title', 'Welcome to Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">Welcome</div>
        <div class="card-body">
            This is the content of the home page.
        </div>
    </div>
@endsection
