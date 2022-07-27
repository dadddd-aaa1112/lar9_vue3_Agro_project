@extends('admin.layouts.main')
@section('content')
    <a href="{{route('admin.fertilizer.index')}}">
        on main page
    </a>


    <form action="{{route('admin.fertilizer.update', $fertilizer->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label  class="form-label">title</label>
            <input type="text" class="form-control" placeholder="title" name="title" value="{{$fertilizer->title}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">norm_azot</label>
            <input type="number" step="0.01" class="form-control" value="{{$fertilizer->norm_azot}}" placeholder="norm_azot" name="norm_azot">
        </div>
        <div class="mb-3">
            <label  class="form-label">norm_fosfor</label>
            <input type="number" step="0.01" class="form-control" value="{{$fertilizer->norm_fosfor}}" placeholder="norm_fosfor" name="norm_fosfor">
        </div>
        <div class="mb-3">
            <label  class="form-label">norm_kalii</label>
            <input type="number" step="0.01" class="form-control" value="{{$fertilizer->norm_kalii}}" placeholder="norm_kalii" name="norm_kalii">
        </div>
        <div class="mb-3">
            <label  class="form-label">culture_id</label>
            <select class="form-select" name="culture_id">
                @foreach($cultures as $culture)
                    <option value="{{$culture->id}}"
                        {{$culture->id == $fertilizer->culture_id ? 'selected' : ''}}

                    >
                        {{$culture->title}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label  class="form-label">raion</label>
            <input type="text" class="form-control" placeholder="raion" name="raion" value="{{$fertilizer->raion}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">cost</label>
            <input type="number" step="0.01" class="form-control" value="{{$fertilizer->cost}}" placeholder="cost" name="cost">
        </div>
        <div class="mb-3">
            <label  class="form-label">description</label>
            <input type="text" class="form-control" placeholder="description" name="description" value="{{$fertilizer->description}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">target</label>
            <input type="text" class="form-control" placeholder="target" name="target" value="{{$fertilizer->target}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
