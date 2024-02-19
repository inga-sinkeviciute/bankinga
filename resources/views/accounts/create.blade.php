@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="mt-4">Add Account</h2>

                @if(session('success'))
                    <div class="alert alert-success mt-3">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('add.account.store') }}" method="post" class="mt-3">
                    @csrf

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="surname" class="form-label">Surname:</label>
                        <input type="text" name="surname" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="personal_number" class="form-label">Personal Number:</label>
                        <input type="number" name="personal_number" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Add Account</button>
                </form>
            </div>
        </div>
    </div>
@endsection
