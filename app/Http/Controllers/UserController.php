<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;


class UserController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        
        return view('welcome', compact([
            'users'
        ]));
    }

    public function exports()
    {
        return Excel::download(new UsersExport,'users.xlsx');
    }
    public function selectWin()
    {
        $users = User::all();
        
        if(count($users)>=5)
        {
            $win = rand(0,count($users));
            $winner =  $users[$win];
            return view('users.winner', compact([
                'winner'
            ]));
        }else{
            return view('users.winner');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        
        $city = str_replace("-", " ", $request['inputCity']);
        $departament = str_replace("-", " ", $request['inputCountry']);
        try {
            $user = $this->user::create([
                'name'      => $request['name'],
                'last_name' => $request['last_name'],
                'dni'       => $request["cc"],
                'phone'     => $request['phone'],
                'email'     => $request['email'],
                'habeas'    => $request['habeas'],
                'dpto'      => $departament,
                'city'      => $city,
                'habeas'    => $request['habeas']
            ]);
            return redirect('/')->with('success','Usuario registrado correctamente');
        } catch (\Throwable $th) {
            return Redirect::back()->withErrors(['msg' => 'Error al registrar al usuario']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with('success', 'Usuario eliminado correctamente');
    }
}
