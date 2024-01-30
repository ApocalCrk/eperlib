<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public $validator_check = [
        'nama.required' => 'Nama tidak boleh kosong!',
        'email.required' => 'Email tidak boleh kosong!',
        'email.email' => 'Email tidak valid!',
        'fakultas.required' => 'Fakultas tidak boleh kosong!',
        'prodi.required' => 'Program Studi tidak boleh kosong!'
    ];

    public function index()
    {
        return view('admin.users.index');
    }

    public function getDataMember()
    {
        $member = Member::all();
        foreach ($member as $item) {
            $item->responsive_id = null;
            $item->foto = '<img src="' . asset('storage/'.$item->foto) . '" alt="Foto Profil" width="100px">';
        }
        $member = ["data" => $member];
        return $member;
    }

    public function edit($npm)
    {
        $member = Member::find($npm);
        return view('admin.users.editUser', compact('member'));
    }

    public function update(Request $request, $npm)
    {
        $validated = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|email',
            'fakultas' => 'required',
            'prodi' => 'required'
        ], $this->validator_check);

        if ($validated->fails()) {
            return response()->json([
                'status' => 'failed',
                'message' => $validated->errors()->first()
            ], 400);
        }else{
            try{
                $member = Member::find($npm)->update([
                    'nama' => $request->nama,
                    'email' => $request->email,
                    'fakultas' => $request->fakultas,
                    'program_studi' => $request->prodi
                ]);
                if ($member) {
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Data berhasil diubah'
                    ], 200);
                }else{
                    return response()->json([
                        'status' => 'failed',
                        'message' => 'Data gagal diubah'
                    ], 400);
                }
            }catch(\Exception $e){
                return response()->json([
                    'success' => false,
                    'message' => $e->getMessage()
                ], 500);
            }
        }
    }

    public function destroy($npm)
    {
        $member = Member::find($npm);
        if ($member) {
            $member->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data berhasil dihapus!'
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Data gagal dihapus!'
            ], 400);
        }
    }
}
