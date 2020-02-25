<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use DB;

class HomeController extends Controller
{
    public function index()
    {
        $nowYear = 2020;
        $countNum = 12;
        $employees_num = [];
        for ($i = 0; $i < $countNum; $i++) {
            $employees_num[$i] = Employee::whereNotNull('join_date')
                 ->whereYear('join_date', '=', $nowYear - $i)
                 ->orderBy('join_date')
                 ->count();
        }
        return view('home', compact('employees_num'));
    }
}
