<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Listing;

class DashboardController extends Controller
{
    public function adminIndex()
    {

        $get_list = Listing::all();
        $countA = count($get_list);

        $get_complete = Listing::where('status', 'Completed')->get();
        $countB = count($get_complete);

        $get_pending = Listing::where('status', 'Pending')->get();
        $countC = count($get_pending);

        if($countA > 0){
            $total_all = $countA;
        }
        else{
            $total_all = 0;
        }
        
        if($countB > 0){
            $total_complete = $countB;
        }
        else{
            $total_complete = 0;
        }
        
        if($countC > 0){
            $total_pending = $countC;
        }
        else{
            $total_pending = 0;
        }

        return view('admin.dashboard')->with('message', 'You are now logged in as an admin')
                                                ->with('total_all', $total_all)
                                                ->with('total_complete', $total_complete)
                                                ->with('total_pending', $total_pending);

    }
}
