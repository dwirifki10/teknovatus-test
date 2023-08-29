<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class CloudExport implements FromQuery, WithHeadings
{
    public function headings(): array
    {
        return [
            'cluster_id',
            'mem',
            'cpu',
            'is_active',
            'created_at',
            'updated_at'
        ];
    }

    public function query()
    {
        return DB::table('cloud_capacity')->get();
    }
}
