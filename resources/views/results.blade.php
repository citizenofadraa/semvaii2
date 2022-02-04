@extends("layouts.app")

@section("title", "Výsledky jazdcov")

@section("content")

<div class="custom-select" style="width:500px">
    <select>
        @foreach ($results as $item)
        <option>{{$item->name}}</option>
        @endforeach
    </select>
</div>

<div class = footer>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

@endsection
