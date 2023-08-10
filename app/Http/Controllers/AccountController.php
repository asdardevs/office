<?php

namespace App\Http\Controllers;

use App\Models\Office;
use Illuminate\Http\Request;
use Inertia\Inertia;
// use Yajra\DataTables\DataTables;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $office = Office::with('fakultas', 'prodi')->orWhere('status', null)->orWhere('status', '2')->orderBy('id', 'DESC')->get();

        return Inertia::render('Admin/Permohonan', ['office' => $office]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $data = Office::with('fakultas','prodi')->orderBy('id', 'DESC')->get();
        // return DataTables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('action', function ($row) {

        //         $btn = '
        //         <div class="d-flex justify-content-center">
        //         <button type="button" class="btn btn-outline-primary edit-office" data-id="' . $row->id . '"  ><i
        //                 class="fas fa-pen" aria-hidden="true"></i></button>
        //         <button type="button" class="btn btn-outline-danger " onclick="hapus(\'' . $row->id . '\'); return false;"  ><i
        //                 class="fas fa-trash" aria-hidden="true"></i></button>
        //     </div>
        //         ';
        //         return $btn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



        $this->validate($request, [
            'status' => ['required'],
        ]);


        if ($request->status == 1) {
            $this->validate($request, [
                'username' => ['required'],
                'password' => ['required'],

            ]);
        } else {
            $this->validate($request, [
                'alasan_penolakan' => ['required'],
                'status' => ['required'],
            ]);
        }



        // return $request->id;

        Office::where('id', $request->id)
            ->update([
                'username' => $request->username,
                'password' => $request->password,
                'pesan' => $request->alasan_penolakan,
                'status' => $request->status,
            ]);


        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
