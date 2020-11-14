<?php

namespace App\Http\Controllers\Restrito;

use App\User;
use App\DataTables\UserDataTable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(UserDataTable $userDataTable)
    {
        return $userDataTable->render('restrito.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('restrito.users.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = UserService::store($request->all());

        if ($user) {
            return redirect()->route('restrito.users.index')
                        ->withSucesso('Salvo com sucesso');
        }

        return back()->withInput()
                    ->withFalha('Erro ao salvar');
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
    public function edit(User $user)
    {
        return view('restrito.users.form', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $user = UserService::update($request->all(), $user);

        if ($user) {
            return redirect()->route('restrito.users.index')
                        ->withSucesso('Atualizado com sucesso');
        }

        return back()->withInput()
                    ->withFalha('Erro ao atualizar');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deleteUser = UserService::destroy($user);

        if ($deleteUser) {
            return response('Apagado com sucesso', 200);
        }

        return response('Erro ao apagar', 400);
    }
    public function listaUsers(Request $request)
    {
        return UserService::listaUsers($request);
    }
}
