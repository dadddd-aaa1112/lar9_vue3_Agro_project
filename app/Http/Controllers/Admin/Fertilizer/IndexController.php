<?php

namespace App\Http\Controllers\Admin\Fertilizer;

use App\Filters\FertilizerFilter;
use App\Http\Controllers\Controller;
use App\Models\Culture;
use App\Models\Fertilizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function __invoke(Request $request, FertilizerFilter $filter )
    {
        $fertilizers = Fertilizer::with('cultures')
            ->filter($filter)
            ->sortable()
            ->paginate(10);

        $normAzotMin = DB::table('fertilizers')->min('norm_azot');
        $normAzotMax = DB::table('fertilizers')->max('norm_azot');
        $normFosforMin = DB::table('fertilizers')->min('norm_fosfor');
        $normFosforMax = DB::table('fertilizers')->max('norm_fosfor');
        $normKaliiMin = DB::table('fertilizers')->min('norm_kalii');
        $normKaliiMax = DB::table('fertilizers')->max('norm_kalii');
        $costMin = DB::table('fertilizers')->min('cost');
        $costMax = DB::table('fertilizers')->max('cost');
        $cultures = Culture::all();
        $raions = Fertilizer::all('id', 'raion');



        if ($request->has('view_deleted')) {
            $fertilizers = Fertilizer::onlyTrashed()->get();
        }

        return view('admin.fertilizer.index', compact(
            'fertilizers',
            'cultures',
                'normAzotMin',
                'normAzotMax',
                'normFosforMin',
                'normFosforMax',
                'normKaliiMin',
                'normKaliiMax',
                'costMin',
                'costMax',
                'raions'

            )
        );
    }
}
