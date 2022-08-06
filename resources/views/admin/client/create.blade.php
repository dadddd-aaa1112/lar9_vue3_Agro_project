@extends('admin.layouts.main')
@section('content')
<h3>Клиенты</h3>
    <form action="{{route('admin.client.store')}}" method="post">
       @csrf
        <div class="mb-3">
            <label  class="form-label">title</label>
            <input type="text" class="form-control" placeholder="title" name="title" value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">date_order</label>
            <input type="date" class="form-control" placeholder="date_order" value="{{old('date_order')}}" name="date_order">
        </div>
        <div class="mb-3">
            <label  class="form-label">cost</label>
            <input type="number" step="any" class="form-control" value="{{old('cost')}}" placeholder="cost" name="cost">
        </div>
        <div class="mb-3">
            <label  class="form-label">region</label>
            <input type="text" class="form-control" placeholder="region" value="{{old('region')}}" name="region">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
