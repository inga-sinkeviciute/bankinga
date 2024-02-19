<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function createForm()
    {
        return view('accounts.create');
    }

    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'surname' => 'required|string',
            'personal_number' => 'required|numeric',
        ]);

        // Generate account number (example: LT12345678901234567890123456789012)
        $accountNumber = 'LT548910000' . mt_rand(1000000000000000, 9999999999999999);

        // Create a new account
        $account = new Account([
            'name' => $validatedData['name'],
            'surname' => $validatedData['surname'],
            'personal_number' => $validatedData['personal_number'],
            'account_number' => $accountNumber,
            'balance' => 0.00,  
        ]);

        // Save the account
        $account->save();

        return redirect()->route('add.account.create')->with('success', 'Account added successfully!');

    }

    public function deleteAccount($id)
{
    $account = Account::findOrFail($id);

    // Check if the balance is zero before deleting
    if ($account->balance == 0) {
        // Delete the account
        $account->delete();

        return redirect()->route('home')->with('success', 'Account deleted successfully!');
    } else {
        // Display an error message
        return redirect()->route('home')->with('error', 'Account balance must be zero to delete!');
    }
}


public function addRemoveMoneyForm($id)
    {
        // Retrieve the account by ID
        $account = Account::findOrFail($id);

        return view('accounts.add_remove_money', compact('account'));
    }

    public function addRemoveMoney(Request $request, $id)
    {
        // Validate form data and process the add/remove money action
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
        ]);

        // Retrieve the account by ID
        $account = Account::findOrFail($id);

        // Determine if the action is adding or removing money
        $action = $request->input('action'); // Assuming you have an input named 'action' in your form

        // Update the balance based on the action
        if ($action === 'add') {
            $account->balance += $validatedData['amount'];
        } elseif ($action === 'remove') {
            $account->balance -= $validatedData['amount'];
        }

        // Save the updated account
        $account->save();

        // Redirect back to the home page with a success message
        return redirect()->route('home')->with('success', 'Money added/removed successfully!');
    }
}