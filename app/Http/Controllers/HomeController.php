<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $accounts = Account::all(); // Fetch all accounts from the database

        return view('home', compact('accounts'));
    }
}