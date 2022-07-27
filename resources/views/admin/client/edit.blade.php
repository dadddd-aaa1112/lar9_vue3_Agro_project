@extends('admin.layouts.main')
@section('content')
    <a href="{{route('admin.client.index')}}">
        on main page
    </a>

    <form action="{{route('admin.client.update', $client->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label  class="form-label">title</label>
            <input type="text" class="form-control" placeholder="title" name="title" value="{{$client->title}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">date_order</label>
            <input type="date" class="form-control" placeholder="date_order" value="{{$client->date_order}}" name="date_order">
        </div>
        <div class="mb-3">
            <label  class="form-label">cost</label>
            <input type="number" step="0.01" class="form-control" value="{{$client->cost}}" placeholder="cost" name="cost">
        </div>
        <div class="mb-3">
            <label  class="form-label">region</label>
            <input type="text" class="form-control" placeholder="region" value="{{$client->region}}" name="region">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
