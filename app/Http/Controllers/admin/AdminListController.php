<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminListController extends Controller
{
    public $validator_check = [
        'nama.required' => 'Nama tidak boleh kosong!',
        'email.required' => 'Email tidak boleh kosong!',
        'email.unique' => 'Email sudah terdaftar!',
        'email.email' => 'Email tidak valid!',
        'username.required' => 'Username tidak boleh kosong!',
        'username.unique' => 'Username sudah terdaftar!',
        'password.required' => 'Password tidak boleh kosong!',
        'no_hp.required' => 'No HP tidak boleh kosong!'
    ];

    public function index() {
        return view('admin.admin-list.index');
    }

    public function getDataAdmin(){
        $admin = Admin::all();
        $data = [];
        foreach ($admin as $item) {
            $data[] = [
                'responsive_id' => null,
                'id_admin' => $item->id_admin,
                'nama' => $item->nama,
                'email' => $item->email,
                'username' => $item->username,
                'no_hp' => $item->no_hp
            ];
        }
        return response()->json(['data' => $data]);
    }

    public function create() {
        return view('admin.admin-list.addAdmin');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:admin',
            'username' => 'required|unique:admin',
            'password' => 'required',
            'no_hp' => 'required'
        ], $this->validator_check);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $admin = new Admin();
        $admin->nama = $request->nama;
        $admin->email = $request->email;
        $admin->username = $request->username;
        $admin->password = Hash::make($request->password);
        $admin->no_hp = $request->no_hp;
        $admin->guard = 'admin';
        $admin->save();

        return response()->json(['success' => 'Admin berhasil ditambahkan!']);
    }

    public function edit($id) {
        $admin = Admin::find($id);
        return view('admin.admin-list.editAdmin', compact('admin'));
    }

    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'required|unique:admin,email,'.$id.',id_admin',
            'username' => 'required|unique:admin,username,'.$id.',id_admin',
            'no_hp' => 'required'
        ], $this->validator_check);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $admin = Admin::find($id);
        $admin->nama = $request->nama;
        $admin->email = $request->email;
        $admin->username = $request->username;
        if ($request->password != null) {
            $admin->password = Hash::make($request->password);
        }
        $admin->no_hp = $request->no_hp;
        $admin->guard = 'admin';
        $admin->save();

        return response()->json(['success' => 'Admin berhasil diubah!']);
    }

    public function delete($id) {
        $admin = Admin::find($id);
        $admin->delete();
        return response()->json(['success' => 'Admin berhasil dihapus!']);
    }
}
