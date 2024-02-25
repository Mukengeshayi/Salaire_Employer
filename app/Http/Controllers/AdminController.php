<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\ResetCodePassword;
use App\Models\User;
use App\Notifications\SendMailToAdminAfterRegistration;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
// use Illuminate\Support\Facades\Notification as FacadesNotification;
use PhpParser\Node\Stmt\TryCatch;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAdminRequest $request)
    {
        $user= new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make('default');
        $user->save();

        if ($user) {
             ResetCodePassword::where('email', $user->email)->delete();
             $code = rand(1000,4000);

             $data=[
                'code'=>$code,
                'email'=>$user->email,
             ];
             ResetCodePassword::create($data);
             //Generer une  notification
            Notification::route('email',$user->email)->notify(new SendMailToAdminAfterRegistration($code,$user->email));
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdminRequest $request, User $user)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
