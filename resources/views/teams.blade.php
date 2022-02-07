@extends("layouts.app")

@section("title", "Tímy")

@section("content")

<div class = row>
    <div class="tabulka" style="overflow-x:auto;">
        @csrf
        <table>
            <thead>
            <tr>
                <th>ID</th>
                <th>Meno</th>
                <th>Krajina</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($teams as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->teamname}}</td>
                <td>{{$item->country}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @auth
    <div style="text-align: center">
        <a href="teamsedit">Edit</a>
    </div>
    @endauth
</div>

@auth
<form action="{{route('teams.update')}}" method="post">
    @csrf

    <div class="form-group">
        <label for="">Meno tímu</label>
        <input name="teamname"/>
    </div>

    <div class="form-group">
        <label for="">Krajina tímu</label>
        <input name="country"/>
    </div>

    <div class="form-group" style="margin-bottom: 60px">
        <button type="submit">Update</button>
    </div>
</form>

@endauth

<div class = footer>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

@endsection
