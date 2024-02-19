<h1>Create User</h1>

<form action="{{ route('users.store') }}" method="post">
    @csrf
    <label for="name">Name:</label>
    <input type="text" name="name" required>
    <br>
    <label for="email">Email:</label>
    <input type="email" name="email" required>
    <br>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <br>
    <button type="submit">Submit</button>
</form>

<a href="{{ route('users.index') }}">Back to User List</a>
