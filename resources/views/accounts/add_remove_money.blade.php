@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6"> <!-- Adjust the column width as needed -->
            <div class="card">
                <div class="card-header">{{ __('Transfer Money') }}</div>

                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('add.remove.money.submit', ['id' => $account->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="amount">Amount:</label>                           <br>
                                                       <br>
                            <input type="number" name="amount" class="form-control" required>
                        </div>

                        <div class="form-group">
                           <br>
                            <input type="radio" name="action" value="add" checked> Add
                            <input type="radio" name="action" value="remove"> Remove
                        </div>
                           <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
