@extends("layouts.app")

@section("title", "Kalendár")

@section("content")

<div class = row>
    <div class="tabulka" style="overflow-x:auto;">
        <table>
            <thead>
            <tr>
                <th>Meno</th>
                <th>Krajina</th>
                <th>Dátum</th>
                <th>Čas</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($trate as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->country}}</td>
                    <td>{{$item->date}}</td>
                    <td>{{$item->time}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class = footer>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

@endsection

<!--</body>
</html>-->
