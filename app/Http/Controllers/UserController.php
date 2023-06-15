<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }
    public function index(Request $request)
    {

        //Primeiro método para filtrar  usuários

        //->toSql() serve para ver a query que está sendo feita pelo eloquent ORM
        // $users = User::where('name', 'LIKE', "%{$request->search}%")->get();

        //Segundo método para filtrar usuários

        // $search = $request->search;

        // $users = $this->model->where(function($query) use ($search){
        //     if($search)
        //     {
        //         $query->where('email', $search);
        //         $query->orWhere('name', 'LIKE', "%{$search}%");
        //     }
        // })->get();

        $search = $request->search;
        $users = $this->model
                        ->getUsers(
                            search: $request->search
                        );


        return view('users.index', ['users' => $users]);
    }

    public function show($id)
    {
        if(!$user = $this->model->find($id))
        {
            return redirect()->route('users.index');
        }

        return view('users.show', ['user' => $user]);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        // $data = $request->all();
        // $data['password'] = bcrypt($request->password);

        // $this->model->create($data);

        $this->model->storeUsers($request);

        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if(!$user = $this->model->find($id))
        {
            return redirect()->route('users.index');
        }

        return view('users.edit', ['user' => $user]);
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        // if(!$user = $this->model->find($id))
        // {
        //     return redirect()->route('users.index');
        // }

        // $data = $request->only('name', 'email');
        // if($request->password)
        // {
        //     $data['password'] = bcrypt($request->password);
        // }

        // $user->update($data);

        // return redirect()->route('users.index');


        //Refatoração

        $user = $this->model->updateUsers($request, $id);

        if(!$user)
        {
            return redirect()->route('users.index');
        }

        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        if(!$user = $this->model->find($id))
        {
            return redirect()->route('users.index');
        }

        $user->delete();

        return redirect()->route('users.index');
    }
}

