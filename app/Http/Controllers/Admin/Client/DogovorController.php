<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\TemplateProcessor;

class DogovorController extends Controller
{
    public function __invoke($id) {
        $client = Client::findOrFail($id);
        $date = Carbon::now()->format('d.m Y');
        $filePath = public_path('document/' . 'dogovor.docx');
        $template = new TemplateProcessor($filePath);
        $template->setValue('date', $date);
        $template->setValue('title', $client->title);
        $template->setValue('date_order', $client->date_order);
        $template->setValue('price', $client->cost);
        $fileName = 'Contract.docx';
        $template->saveAs($fileName);
        return response()
            ->download($fileName)
            ->deleteFileAfterSend(true);
    }
}
