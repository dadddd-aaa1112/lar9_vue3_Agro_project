<form action="{{route('admin.user.destroy', $user->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">delete</button>
</form>