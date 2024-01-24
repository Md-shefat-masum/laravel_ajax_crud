<table>
    <tr>
        <td>name</td>
        <td>{{$data->first_name}}</td>
    </tr>
    <tr>
        <td>email</td>
        <td>{{$data->email}}</td>
    </tr>
    <tr>
        <td>photo</td>
        <td>
            <img src="{{asset($data->photo)}}" alt="">
        </td>
    </tr>
</table>
