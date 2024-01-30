<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Mail\MailVerification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Exception;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index() {
        if(Auth::guard('users')->check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login_user');
    }

    public function login(Request $request) {
        $this->validate($request, [
            'npm' => 'required',
            'password' => 'required'
        ]);
        $user = Member::where('npm', $request->npm)->first();
        if(!$user) {
            $url = "https://api-bimbingan.uajy.ac.id/login";
            $login_data = array(
                'username' => $request->npm,
                'password' => $request->password
            );
            $options = array(
                'http' => array(
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($login_data)
                )
            );
            try{
                $context = stream_context_create($options);
                $response = file_get_contents($url, false, $context);
                $response = json_decode($response, true);
                Member::create([
                    'npm' => $request->npm,
                    'nama' => $response['user']['name'],
                    'password' => 'null',
                    'email' => $response['user']['detail']['email'],
                    'fakultas' => $response['user']['faculty_code'],
                    'program_studi' => $response['user']['study_program']
                ]);
                return response()->json([
                    'status' => 'success',
                    'type' => 'unregistered',
                ]);
            } catch (Exception $e) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'NPM atau password salah!'
                ]);
            }
        }else{
            if($user->password == 'null') {
                return response()->json([
                    'status' => 'error',
                    'type' => 'password',
                    'message' => 'Anda belum membuat password!'
                ]);
            }
            if($user->verifikasi == 'belum verifikasi') {
                return response()->json([
                    'status' => 'error',
                    'type' => 'verifikasi',
                    'message' => 'Email anda belum diverifikasi!'
                ]);
            }
            if(Hash::check($request->password, $user->password)) {
                Auth::guard('users')->login($user);
                return response()->json([
                    'status' => 'success',
                    'type' => 'registered',
                    'message' => 'Berhasil login'
                ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'message' => 'NPM atau password salah!'
                ]);
            }
        }
    }

    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'npm' => 'required',
            'password' => 'required',
        ],
        [
            'npm.required' => 'NPM tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ]);
        if($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()->first()
            ], 422);
        }
        $user = Member::where('npm', $request->npm)->first();
        if($user) {
            $user->password = Hash::make($request->password);
            $user->token = Str::random(40);
            $user->save();

            Mail::to($user->email)->send(new MailVerification($user));

            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil membuat password! Silahkan cek ' . $user->email . ' untuk verifikasi email!'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'NPM tidak ditemukan!'
            ]);
        }
    }

    public function kirim_ulang_email(Request $request) {
        $user = Member::where('npm', $request->npm)->where('verifikasi', 'belum verifikasi')->first();
        if($user) {
            Mail::to($user->email)->send(new MailVerification($user));
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengirim ulang email verifikasi! Silahkan cek ' . $user->email . ' untuk verifikasi email!'
            ]);
        }else{
            return response()->json([
                'status' => 'error',
                'message' => 'NPM tidak ditemukan atau email sudah diverifikasi!'
            ]);
        }
    }

    public function verify($token) {
        $user = Member::where('token', $token)->first();
        if($user) {
            $user->verifikasi = "sudah verifikasi";
            $user->save();
            return redirect()->route('login_user')->with('success', 'Email berhasil diverifikasi!');
        }else{
            return redirect()->route('login_user')->with('error', 'Email gagal diverifikasi!');
        }
    }

    public function logout() {
        Auth::guard('users')->logout();
        return redirect()->route('login_user');
    }
}
