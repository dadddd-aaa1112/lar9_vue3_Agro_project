<?php

namespace App\Http\Controllers\Admin\Client;

use App\Filters\ClientFilter;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(Request $request, ClientFilter $filter)
    {
        $clients = Client::filter($filter)->sortable()->paginate(10);
        $regions = Client::all('id', 'region');
        $costMin = DB::table('clients')->min('cost');
        $costMax = DB::table('clients')->max('cost');
        $dateMin = DB::table('clients')->min('date_order');
        $dateMax = DB::table('clients')->max('date_order');

        if ($request->has('view_deleted')) {
            $clients = Client::onlyTrashed()->get();
        }

        return view('admin.client.index', compact(
            'clients',
                'regions',
                'costMin',
                'costMax',
                'dateMin',
                'dateMax'

            )
        );
    }
}
