<form action="/user/{{$data->id}}" onsubmit="edit_user({{$data->id}})" method="POST">
    @csrf
    <div>
        <label for="">first_name</label>
        <input type="text" value="{{$data->first_name}}" name="first_name" class="form-control">
    </div>
    <div>
        <label for="">email</label>
        <input type="text" value="{{$data->email}}" name="email" class="form-control">
    </div>
    <button>submit</button>
</form>
