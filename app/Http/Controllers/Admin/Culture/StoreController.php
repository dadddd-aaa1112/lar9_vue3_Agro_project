<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Culture\StoreRequest;
use App\Models\Culture;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Culture::firstOrCreate([
            'title' => $data['title']
        ], $data);
        return redirect()->route('admin.culture.index');
    }
}
