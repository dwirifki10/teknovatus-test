<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    // used to show the chart
    public function showChart()
    {
        try {
            // we can use DB builder insted of the Eloquent (without model)
            $query = DB::table("cluster")
                    ->leftJoin('cloud_capacity', 'cluster.id', '=', 'cloud_capacity.cluster_id')
                    ->select('cluster_id', 'cluster_name', DB::raw('SUM(mem) as total_mem'), DB::raw('SUM(cpu) as total_cpu'))
                    ->groupBy('cluster_id', 'cluster_name');
            // if we want to know the query of sql above
            // $query->toSql();
            $capacity = $query->get();
            return view("dashboard", ["capacity" => $capacity]);
        } catch (QueryException $err) {
            // show an error only for development process
            dd($err->getMessage());
        }
    }

}
