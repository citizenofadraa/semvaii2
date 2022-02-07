@extends("layouts.app")

@section("title", "Výsledky jazdcov")

@section("content")

<form action="{{route('table')}}" method="post">
    @csrf
    <div class="form-group">
        <div class="custom-select">
            <select class="form-group" name="name" style="margin-left:40%; margin-right:40%; width:20%">
                @foreach ($results as $item)
                    <option value={{$item->id}}>{{$item->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group">
        <button type="submit">Vyber</button>
    </div>
</form>

<div class = footer>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

@endsection
