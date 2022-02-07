@extends("layouts.app")

@section("title", "Výsledky jazdca")

@section("content")

    <div class = row>
        <div class="tabulka" style="overflow-x:auto;">
            @csrf
            <table>
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Meno</th>
                    <th>Závod</th>
                    <th>Body</th>
                </tr>
                </thead>
                @foreach($resultsdriver as $data)
                <tbody>
                    <td>{{$data->id}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->trackname}}</td>
                    <td>{{$data->result}}</td>
                </tbody>
                @endforeach
            </table>
        </div>
        @auth
            <div style="text-align: center">
                <a href="resultsdriveredit">Edit</a>
            </div>
        @endauth
    </div>

    @auth
        <form action="{{route('results.update')}}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Meno jazdca</label>
                <input name="name"/>
            </div>

            <div class="form-group">
                <label for="">Meno závodu</label>
                <input name="trackname"/>
            </div>

            <div class="form-group">
                <label for="">Výsledok</label>
                <input name="result"/>
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
