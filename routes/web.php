<?php

use App\Http\Controllers\Auth\UserController as AuthUserController;
use App\Http\Controllers\UserController;
use App\Jobs\SendMail;
use App\Models\User;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',


 function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/users',function (Request $request){
    

    return Inertia::render('Users/Index',[
        
        'users' => User::query()
        ->when($request->input('search'), function($query,$search){
             $query->where('nombre','like','%'.$search.'%')
             ->orWhere('email','like','%'.$search.'%')
             ->orWhere('cedula','like','%'.$search.'%')
             ->orWhere('numerodecelular','like','%'.$search.'%');
        })
        ->paginate(10),
        

    ]);
})->name('users');

Route::get('/users/create',function(){
    return Inertia::render('Users/Create');
});

Route::post('/users/create',function(Request $request){
    //Validate request
    $attributes = $request->validate([
        'nombre'=>'required|string' ,
        'email'=>'required|email|unique:users',
        'password'=>'required' ,
        'cedula'=>'required',
        'numerodecelular'=>'required',
        'fechaDeNacimiento'=>'required',
    ]);
    //Create user
    print($request);
    User::create($attributes);
    dump(User::create($attributes));
    //Redirect
    return redirect('users');
});

Route::delete('Users/Index',function(Request $request){
    
    $user=User::find($request->input('id'));
    $user->delete();


    return Inertia::render('Users',[
        
        'users' => User::query()
        ->when($request->input('search'), function($query,$search){
             $query->where('nombre','like','%'.$search.'%')
             ->orWhere('email','like','%'.$search.'%')
             ->orWhere('cedula','like','%'.$search.'%')
             ->orWhere('numerodecelular','like','%'.$search.'%');
        })
        ->paginate(10),
    ]);
})->name('users');

Route::put('/users',function(Request $request){
    
    /* $user=User::find($request->input('id'));
    $user;


    return Inertia::render('Users',[
        
        'users' => User::query()
        ->when($request->input('search'), function($query,$search){
             $query->where('nombre','like','%'.$search.'%')
             ->orWhere('email','like','%'.$search.'%')
             ->orWhere('cedula','like','%'.$search.'%')
             ->orWhere('numerodecelular','like','%'.$search.'%');
        })
        ->paginate(10),
    ]) */;
})->name('users');


Route::post('/dashboard',function(Request $request){
    dump($request);
    
    SendMail::dispatch($request->input('asunto'),$request->input('destinatario',),$request->input('cuerpo'),$request->input('email'));
    Inertia::render('Email',$request->mail);
})->name('dashboard');

require __DIR__.'/auth.php';
