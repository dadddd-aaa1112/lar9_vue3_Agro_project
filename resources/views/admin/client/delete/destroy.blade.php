<form action="{{route('admin.client.destroy', $client->id)}}" method="post">
    @csrf
    @method('delete')
    <button class="btn btn-outline-none text-danger" type="submit">Удалить</button>
</form>
