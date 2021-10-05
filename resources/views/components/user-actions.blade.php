<form method="POST" action="{{ route('users.destroy', $user) }}">
    <a role="button" class="btn btn-warning" href="{{ route('users.edit', $user) }}">Edit</a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form>
