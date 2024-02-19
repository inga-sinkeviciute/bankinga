<h1>User List</h1>

<ul>
    @foreach ($users as $user)
        <li>{{ $user->name }} - <a href="{{ route('users.destroy', $user->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $user->id }}').submit();">Delete</a></li>
        <form id="delete-form-{{ $user->id }}" action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
</ul>

<a href="{{ route('users.create') }}">Create User</a>
