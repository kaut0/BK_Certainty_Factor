<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\User;
use DB;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Mail;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisForm()
    {
        $all = User::all();
        return view('Admin.regis', compact('all'));
    }

    public function Regis(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|String',
            'level'=>'required|String',
            'email' => 'required|String|unique:users,email',
            'password' => 'required|String|min: 5',
        ]);

        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->back()->with('success', 'Berhasil Di Tambah');
    }

    public function delete($id){
        $hapus = User::find($id);
        $hapus->delete();

        return redirect()->back();
    }

    public function Login(Request $request)
    {
        if (!\Auth::attempt(['name' => $request->username, 'password' => $request->password])) {
            return redirect()->back();
        }
        return redirect('Admin');
    }

    public function LogOut(){
        \Auth::logout();
        return redirect('login');
    }

    public function lupaForm(){
        return view('LupaPassword');
    }

    public function cekEmail(Request $request){

        $email = User::where('email', $request->name)->first();
       
        if ($email < 1) {
            return redirect()->back()->with('pesan', 'maaf email anda tidak terdaftar');
        }
        
        $token = Str::random(64);

        DB::table('password_resets')->insert(
            [
                'email'=> $request->name,
                'token'=> $token,
                'created_at'=> Carbon::now()
            ]
        );
        Mail::send('resetPassword', ['token'=> $token], function ($message) use($request){
            $message->to($request->name);
            $message->subject('Notifikasi Reset Password');
        });

        return redirect()->back()->with('pesan', 'Telah mengirim link reset password');
    }

    public function getPassword($token){
        return view('updatePassword', ['token' => $token]);
    }
    public function resetPassword(){
    //     $request->validate([
    //         'email' => 'required|email|exists:users',
    //         'password' => 'required|string|min:6|confirmed',
    //         'password_confirmation' => 'required',
      
    //     ]);
      
    //     $updatePassword = DB::table('password_resets')
    //                         ->where(['email' => $request->email, 'token' => $request->token])
    //                         ->first();
      
    //     if(!$updatePassword)
    //         return back()->withInput()->with('error', 'Invalid token!');
      
    //       $user = User::where('email', $request->email)
    //                   ->update(['password' => Hash::make($request->password)]);
      
    //       DB::table('password_resets')->where(['email'=> $request->email])->delete();
      
    //       return redirect('/login')->with('message', 'Your password has been changed!');
    }

}
