@extends("layouts.app")

@section("title", "Kalendár")

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
                <th>Dátum</th>
                <th>Čas</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($tracks as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->trackname}}</td>
                    <td>{{$item->country}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->time}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @auth
    <div style="text-align: center">
        <a href="tracksedit">Edit</a>
    </div>
    @endauth

</div>

@auth
    <form action="{{route('tracks.update')}}" method="post">
        @csrf

        <div class="form-group">
            <label for="">Meno trate</label>
            <input name="trackname"/>
        </div>

        <div class="form-group">
            <label for="">Krajina trate</label>
            <input name="country"/>
        </div>

        <div class="form-group">
            <label for="">Dátum konania (YYYY-MM-DD)</label>
            <input name="date"/>
        </div>

        <div class="form-group">
            <label for="">Čas konania</label>
            <input name="time"/>
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

<!--</body>
</html>-->
