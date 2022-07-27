<form action="{{route('admin.culture.destroy', $culture->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">delete</button>
</form>
