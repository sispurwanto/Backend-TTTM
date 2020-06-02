<?php

namespace App\Http\Controllers\Api\v01;

use App\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\StaffCollection;
use App\Http\Resources\StaffItem;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new StaffCollection(Staff::get());
        /*$data = Staff::get();

        if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            //return response($res);
            //return json_encode($res);
            return response()->json($res);
        }
        else{
            $res['message'] = "Empty!";
            //return response($res);
            //return json_encode($res);
            return response()->json($res);
        }*/
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        /*$sukses = Staff::create([
                'staff_name' => $request->input('nama'),
                'staff_hp' => $request->input('hp'),
                'staff_alamat' => $request->input('alamat'),
                ]);

        if ($sukses) {
            $response['pesan'] = 'insert berhasil';
            $response['status'] = 200;
          } else {
            $response['pesan'] = 'insert error';
            $response['status'] = 404;
          }
          return json_encode($response);*/

          $this->validate($request, Staff::rules(false));

        if (!Staff::create($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 200,
            ];
        }
        return new StaffCollection(Staff::get());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Staff $staff)
    {
        /*$data = Staff::findOrFail($id);
        $res['values'] = $data;
        return json_encode($res);*/
        return new StaffItem($staff);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Staff $staff)
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
    public function update(Request $request, Staff $staff)
    {
        /*$data = Staff::findOrFail($id);

            $data->staff_name   = $request->input('nama');
            $data->staff_hp     = $request->input('hp');
            $data->staff_alamat      = $request->input('alamat');

            $data->update();

        if ($data) {
            $response['pesan'] = 'edit berhasil';
            $response['status'] = 200;
          } else {
            $response['pesan'] = 'edit error';
            $response['status'] = 404;
          }
          return json_encode($response);*/
          $this->validate($request, Staff::rules(true, $staff->id));

        if (!$staff->update($request->all())) {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        } else {
            return [
                'message' => 'OK',
                'code' => 201,
            ];
        }
        return new StaffCollection(Staff::get());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Staff $staff)
    {
        /*
        $data = Staff::findOrFail($id);
        $data->delete();

        if ($data) {
            $response['pesan'] = 'hapus berhasil';
            $response['status'] = 200;
          } else {
            $response['pesan'] = 'hapus error';
            $response['status'] = 404;
          }
          return json_encode($response);
          */
        if ($staff->delete()) {
            return [
                'message' => 'OK',
                'code' => 204,
            ];
        } else {
            return [
                'message' => 'Bad Request',
                'code' => 400,
            ];
        }
    }
}
