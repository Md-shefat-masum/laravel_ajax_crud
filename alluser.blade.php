<table class="table table-striped table-bordered">
    <thead>
        <th>name</th>
        <th>email</th>
        <th>photo</th>
        <th>action</th>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->first_name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    <img src="/{{$item->photo}}" alt="" height="40">
                </td>
                <td>
                    <a href="#" onclick="show_data({{$item->id}})">show</a>
                    <a href="#" onclick="show_edit_form({{$item->id}})">edit</a>
                    <a href="#" onclick="return confirm('delete') && delete_data({{$item->id}})">delete</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
