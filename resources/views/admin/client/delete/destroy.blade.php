<form action="{{route('admin.client.destroy', $client->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">delete</button>
</form>
