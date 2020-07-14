<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DataTables\MemberDataTable;

class MemberController extends Controller
{
    public function index(MemberDataTable $dataTable)
    {
        return $dataTable->render('backend.users.index');
    }
}
