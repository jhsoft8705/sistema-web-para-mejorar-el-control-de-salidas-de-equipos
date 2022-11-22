<?php

namespace App\Exports;

use App\Models\Site;
//use Maatwebsite\Excel\Concerns\FromCollection; //por default
use Maatwebsite\Excel\Concerns\ShouldAutoSize;//impotacion manual

//from FromView import
use App\Invoice;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
//end FromView import



class SiteExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        return view('site.excel',[
            'sites'=>Site::all()
        ]);
    }
}
