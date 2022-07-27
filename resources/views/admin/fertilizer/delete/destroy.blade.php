<form action="{{route('admin.fertilizer.destroy', $fertilizer->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">delete</button>
</form>
