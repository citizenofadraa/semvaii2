@extends("layouts.app")

@section("title", "Kalendár")

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
    </div>

    <script>

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token' : $("input[name=_token]").val()
                }
            });

            $('#editable').Tabledit({
                url:'{{ route('action') }}',
                dataType:"json",
                columns:{
                    identifier:[0, 'id'],
                    editable:[[1, 'trackname'], [2, 'country'], [3, 'date'], [4, 'time']]
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
