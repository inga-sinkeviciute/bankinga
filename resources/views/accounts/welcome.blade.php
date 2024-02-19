<!-- resources/views/welcome.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Welcome!</h1>
    <a href="{{ route('add.account.form') }}">Add Account</a>
@endsection
