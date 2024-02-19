@extends('layouts.app')

@section('content')
 <style>
        .main-content {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 85vh;
            background-color: #fff; 
        }

        .left {
            text-align: center;
            padding: 50px 100px;
        }

        .right {
            padding: 50px 100px;
        }

        .button a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #00634b;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            margin-top: 15px;
        }

        .button a:hover {
            background-color: #5ec57e;
        }

        /* Mobile styles */
        @media (max-width: 767px) {
            .main-content {
                flex-direction: column;
                height: auto;
            }

            .left,
            .right {
                width: 100%;
                padding: 20px 0 0 0;
            }

            img{
            max-width: 500px;
            }
        }
    </style>
    <div class="main-content">
        <div class="left">
            <h1>Bank account alternative</h1>
            <p>Banks complicate things. We don't. All the necessary payment account functions reachable with a tap on
                your smartphone.</p>
            <div class="button">
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Get Started!</a>
                @endif
            </div>
        </div>

        <div class="right">
            <img src="{{ asset('img/cartoon.monstera.png') }}" alt="App Image">
        </div>
    </div>
@endsection
