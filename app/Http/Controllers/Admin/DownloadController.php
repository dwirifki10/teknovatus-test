<?php

namespace App\Http\Controllers\Admin;

use App\Exports\CloudExport;
use App\Http\Controllers\Controller;
use App\Mail\TeknovoMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;


class DownloadController extends Controller
{
    // used to send an email to riyan.setiawan@teknovatus.com
    public function sendNotification()
    {
        $data = [
            'title' => 'Report Data Cloud Capacity',
            'content' => 'Berikut terlampir file excel yang dibutuhkan. From Dwi Rifki Novianto',
        ];

        Mail::to("riyan.setiawan@teknovatus.com")->send(new TeknovoMail($data));
    }

    // used to download excel doc
    public function downloadClientFile()
    {
        try {
            $filename = 'report.xlsx';
            Excel::store(new CloudExport(), "public/docs/" . $filename);
            $this->sendNotification();
            return redirect()->back()->with("success", "File berhasil dikirimkan ke alamat");
        } catch (Exception $err) {
            // Show an error only for development process
            dd($err->getMessage());
        }
    }

}
