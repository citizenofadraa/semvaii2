@extends("layouts.app")

@section("title", "Tímy")

@section("content")

    <div class = row>
        <div class="tabulka" style="overflow-x:auto;">
            @csrf
            <table id="editable" class="table table-bordered table-striped">
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
    </div>

    <script>

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token' : $("input[name=_token]").val()
                }
            });

            $('#editable').Tabledit({
                url:'{{ route('teams.action') }}',
                dataType:"json",
                columns:{
                    identifier:[0, 'id'],
                    editable:[[1, 'teamname'], [2, 'country']]
                },
                restoreButton:false,
                onSuccess:function(data, textStatus, jqXHR)
                {
                    if(data.action == 'delete')
                    {
                        $('#'+data.id).remove();
                    }
                }
            });
        });
    </script>

    <div class = footer>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
    </div>

@endsection
