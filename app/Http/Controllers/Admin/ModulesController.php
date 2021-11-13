<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Itstructure\GridView\DataProviders\EloquentDataProvider;
use App\Models\User;

class ModulesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
        parent::__construct();
    }

    public function index()
    {
        // global $user;
        $dataProvider = new EloquentDataProvider(User::query());

        return view('admin.modules.index',[
            'dataProvider' => $dataProvider
        ]);
    }

    public function create()
    {
        $model = new User();
        return view('admin.modules.create', ['model' => $model]);
    }

    public function store(StoreUsersRequest $request)
    {
        // return view('admin.modules.create', ['model' => $model]);
    }

    public function edit($id)
    {
        $model = User::find($id);
        return view('admin.modules.update', ['model' => $model]);
    }

    public function update(UpdateUsersRequest $request, User $user)
    {
        //return view('admin.modules.update', ['model' => $model]);
    }

    public function view()
    {
        return view('admin.modules.view');
    }

    public function delete()
    {

    }

    public function statusupdate()
    {

    }

    public function apply()
    {

    }
}
