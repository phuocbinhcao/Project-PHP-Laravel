
<div class="grid-view">
    @if(!empty ($data))
        <table border= "1" width="600">
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td><a href="">edit</a></td>
                    <td><a href="">delete</a></td>
                    
                </tr>
            @endforeach
        </table>
    @endif
</div>