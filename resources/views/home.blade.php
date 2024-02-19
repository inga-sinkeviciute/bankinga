@extends('layouts.app')

@section('content')
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <!-- Display success message -->
    <div class="col-md-12 mt-3">
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Your Accounts') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if($accounts->isEmpty())
                        <p>No accounts yet.</p>
                    @else
                        @foreach($accounts as $account)
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <strong>Name:</strong> {{ $account->name }}<br>
                                    <strong>Surname:</strong> {{ $account->surname }}<br>
                                    <strong>Personal Number:</strong> {{ $account->personal_number }}<br>
                                    <strong>Account Number:</strong> {{ $account->account_number }}<br>
                                    <strong>Balance:</strong> {{ $account->balance }} Euro
                                </div>

                                <div class="col-md-12 mt-3">
                                    <!-- Delete Account Button -->
                                    <form action="{{ route('delete.account', ['id' => $account->id]) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger mr-2">Delete</button>
                                    </form>

                                    <!-- Add/Remove Money Button -->
                                    <a href="{{ route('add.remove.money.form', ['id' => $account->id]) }}" class="btn btn-success mr-2">Transfer</a>
                                </div>
                            </div>
                            <hr> <!-- Optional: Add a horizontal line between accounts -->
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
