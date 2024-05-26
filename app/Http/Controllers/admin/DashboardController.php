<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Workflows\TransactionWorkFlow;
use Illuminate\Http\Request;
use Workflow\WorkflowStub;

class DashboardController extends Controller
{
    public function index()
    {
        /**
         * App\Livewire\DashboardAdmin
         */
        return view("admin.index", [
            "title" => "Dashboard",
            "action" => "dashboard",
        ]);
    }
}
