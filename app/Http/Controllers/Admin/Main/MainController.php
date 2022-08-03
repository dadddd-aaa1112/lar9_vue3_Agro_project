<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Culture;
use App\Models\Fertilizer;
use App\Models\User;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __invoke() {
        $fertilizers = Fertilizer::all()->count();
        $cultures = Culture::all()->count();
        $clients = Client::all()->count();
        $users = User::all()->count();
        return view('admin.main.index',
        compact(
            'fertilizers',
            'cultures',
            'clients',
            'users',
        ));
    }
}
