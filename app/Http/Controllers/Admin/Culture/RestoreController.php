<?php

namespace App\Http\Controllers\Admin\Culture;

use App\Http\Controllers\Controller;
use App\Models\Culture;
use Illuminate\Http\Request;

class RestoreController extends Controller
{
    public function restoreData(int $culture) {
        Culture::onlyTrashed()->find($culture)->restore();
        return redirect()->route('admin.culture.index');
    }

    public function restoreAll() {
        Culture::onlyTrashed()->restore();
        return redirect()->route('admin.culture.index');
    }

    public function forceDelete(int $culture) {
        Culture::onlyTrashed()->find($culture)->forceDelete();
        return redirect()->route('admin.culture.index');
    }
}
