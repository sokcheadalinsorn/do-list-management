  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Welcome to your Dashboard</h1>
    <p>Hello <strong>{{ Auth::user()->name }}</strong>, You are logged in!</p>
@endsection