<form action="{{route('admin.culture.destroy', $culture->id)}}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-outline-none text-danger" type="submit">Удалить</button>
</form>
