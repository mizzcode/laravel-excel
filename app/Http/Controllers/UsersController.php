<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UsersController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function import(Request $request)
    {
        $file = $request->file('excel');
        $fileName = $file->getClientOriginalName();
        $file->move('DataUser', $fileName);

        Excel::import(new UsersImport, public_path('DataUser/' . $fileName));

        return redirect('/')->with('success', 'All good!');
    }
}
