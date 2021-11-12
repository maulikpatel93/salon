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
}
