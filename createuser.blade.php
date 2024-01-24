<form action="/user" onsubmit="store_user()" method="POST">
    @csrf
    <div>
        <label for="">first_name</label>
        <input type="text" name="first_name" class="form-control">
    </div>
    <div>
        <label for="">email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div>
        <label for="">password</label>
        <input type="text" name="password" class="form-control">
    </div>
    <button>submit</button>
</form>
