<?php

namespace App\Http\Controllers;

use App\Models\Create;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\DB;


class CreateController extends Controller
{
public function create(){
    // for dd column filter
    $data = create::all();

    return view('create',compact('data'));

}

public function getcreate(Request $request)
    {
        if ($request->ajax()) {
            $data = create::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })

                //for highlight row
                ->setRowClass(function($col){
                    // return $col->id==4 ?'alert-success':' ';
                    // return $col->name== 'name'?'alert-success':' ';
                    if($col->id==2||$col->id==4||$col->id==1){
                        return'alert-danger';
                    }


                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

}

