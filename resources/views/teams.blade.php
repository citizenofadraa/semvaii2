@extends("layouts.app")

@section("title", "Tímy")

@section("content")

<div class = row>
    <div class="tabulka" style="overflow-x:auto;">
        <table>
            <thead>
            <tr>
                <th>Meno</th>
                <th>Krajina</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($teams as $item)
            <tr>
                <td><a href="" class="update_record" data-name="teamname" data-type="text" data-pk="{{ $item->id }}" data-title="Enter Teams Name">{{$item->name}}</a></td>
                <td><a href="" class="update_record" data-name="teamcountry" data-type="text" data-pk="{{ $item->id }}" data-title="Enter Teams Country">{{$item->country}}</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
    $.fn.editable.defaults.mode = 'inline';

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': '{{csrf_token()}}'
        }
    });

    $('.update_record').editable({
        url: "{{ route('updateInLine') }}",
        type: 'text',
        name: 'teamname',
        pk: 1,
        title: 'Enter Field'
    });
</script>

<div class = footer>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>

@endsection
