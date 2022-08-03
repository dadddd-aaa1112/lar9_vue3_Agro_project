@extends('admin.layouts.main')
@section('content')
    <h3>Удобрения</h3>
    <form action="{{route('admin.fertilizer.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <label  class="form-label">title</label>
            <input type="text" class="form-control" placeholder="title" name="title" value="{{old('title')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">norm_azot</label>
            <input type="number" step="0.01" class="form-control" value="{{old('norm_azot')}}" placeholder="norm_azot" name="norm_azot">
        </div>
        <div class="mb-3">
            <label  class="form-label">norm_fosfor</label>
            <input type="number" step="0.01" class="form-control" value="{{old('norm_fosfor')}}" placeholder="norm_fosfor" name="norm_fosfor">
        </div>
        <div class="mb-3">
            <label  class="form-label">norm_kalii</label>
            <input type="number" step="0.01" class="form-control" value="{{old('norm_kalii')}}" placeholder="norm_kalii" name="norm_kalii">
        </div>
        <div class="mb-3">
            <label  class="form-label">culture_id</label>
            <select class="form-select" name="culture_id">
               @foreach($cultures as $culture)
                <option value="{{$culture->id}}"
                        {{$culture->id == old('culture_id') ? 'selected' : ''}}

                >
                    {{$culture->title}}
                </option>
                @endforeach
            </select>
       </div>

        <div class="mb-3">
            <label  class="form-label">raion</label>
            <input type="text" class="form-control" placeholder="raion" name="raion" value="{{old('raion')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">cost</label>
            <input type="number" step="0.01" class="form-control" value="{{old('cost')}}" placeholder="cost" name="cost">
        </div>
        <div class="mb-3">
            <label  class="form-label">description</label>
            <input type="text" class="form-control" placeholder="description" name="description" value="{{old('description')}}">
        </div>
        <div class="mb-3">
            <label  class="form-label">target</label>
            <input type="text" class="form-control" placeholder="target" name="target" value="{{old('target')}}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
