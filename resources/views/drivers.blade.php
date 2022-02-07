@extends("layouts.app")

@section("title", "Jazdci")

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
                <th>Tím</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->country}}</td>
                <td>{{$item->teamname}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @auth
    <div style="text-align: center">
        <a href="driversedit">Edit</a>
    </div>
    @endauth
</div>

@auth
    <form action="{{route('drivers.update')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="">Meno jazdca</label>
            <input name="name"/>
        </div>

        <div class="form-group">
            <label for="">Krajina jazdca</label>
            <input name="country"/>
        </div>

        <div class="form-group">
            <label for="">Tím jazdca</label>
            <input name="team"/>
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
