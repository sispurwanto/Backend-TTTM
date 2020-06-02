<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Staff;

class ControllerStaff extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Staff::get();

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
        }
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
        /*$level = $request->input('level');
        $this->validate($request, [
            'periode' => 'required',
            'domain' => 'required',
            'aspek' => 'required',
            'indikator' => 'required',
            'pertanyaan' => 'required',
        ]);

        $maxkode = Pertanyaan::max('kdpertanyaan');
        if ($maxkode == 0) {$kdty = '10000';} else {$kdty = $maxkode + 1;}
        $dtperiod = $request->input('periode');
        $dtkdty = $kdty;*/

        $sukses = Staff::create([
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
          return json_encode($response);

        /*$maxid = Pertanyaan::max('idpertanyaan');
        for ($i = 0; $i < count($level); $i++)
        {
            Pertanyaandetail::create([
                'periode' => $dtperiod,
                'idpertanyaan' => $maxid,
                'kdpertanyaan' => $dtkdty,
                'lvltanya' => $i,
                'jawab' => $level[$i]
            ]);
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Staff::findOrFail($id);

        /*if(count($data) > 0){ //mengecek apakah data kosong atau tidak
            $res['message'] = "Success!";
            $res['values'] = $data;
            //return response($res);
            return json_encode($res);
        }
        else{
            $res['message'] = "Empty!";
            //return response($res);
            return json_encode($res);
        }*/
        $res['values'] = $data;
        return json_encode($res);
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
        $data = Staff::findOrFail($id);

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
          return json_encode($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
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
    }
}
