Route::view('/t','test2');

Route::get('/user',function(){
    $data = \App\Models\User::latest()->limit(10)->get();
    return view('alluser',compact('data'));
});

Route::get('/user/{id}',function($id){
    $data = \App\Models\User::find($id);
    return view('showuser',compact('data'));
});
Route::view('/create-user','createuser');
Route::get('/edit-user/{id}',function($id){
    $data = \App\Models\User::find($id);
    return view('edituser',compact('data'));
});
Route::post('/user',function(){
    $data = \App\Models\User::create(request()->all());
    return $data;
});
Route::post('/user/{id}',function($id){
    $data = \App\Models\User::find($id);
    $data->fill(request()->all());
    $data->save();
    return $data;
});

Route::post('/user/{id}/delete',function($id){
    $data = \App\Models\User::find($id);
    $data->delete();
    return response()->json('ok');
});
