<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Mail\Adminresetpassword;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdminAuth extends Controller
{
    public function login()
    {
        return view('Admin/login');
    }

    public function dologin()
    {
        $rememberme = request('rememberme') == 1 ? true : false;
        if (auth()->guard('admin')->attempt(['email' => request('email'), 'password' => request('password')], $rememberme)) {
            return redirect('Admin');
        } else
            session()->flash('error', 'check your information');
        return redirect()->back();
    }
    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect('Admin/login');
    }
    public function forgetPassword()
    {
        return view('Admin/forgetPassword');
    }
    public function forgetPassword_Post()
    {
        $admin = Admin::where('email', request('email'))->first();
        if (!empty($admin)) {
            $token = app('auth.password.broker')->createToken($admin);
            $data = DB::table('password_resets')->insert([
                'email' => $admin->email,
                'token' => $token,
                'created_at' => Carbon::now(),
            ]);
            Mail::to($admin->email)->send(new AdminResetPassword(['data' => $admin, 'token' => $token]));
            session()->flash('success', 'email send');
            return back();
        }else{
            session()->flash('error', 'email not found');
            return back();
        }
    }
    public function reset_password($token)
    {
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>',
        Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            return view('Admin.reset_password', ['data' => $check_token]);
        } else {
            return redirect(url('Admin/forgetPassword'));
        }
    }
    public function reset_password_final($token)
    { 
        $this->validate(request(), [
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ], [], [
            'password' => 'Password',
            'password_confirmation' => 'password confirmation'
        ]);
        $check_token = DB::table('password_resets')->where('token', $token)->where('created_at', '>', 
        Carbon::now()->subHours(2))->first();
        if (!empty($check_token)) {
            $admin = Admin::where('email', $check_token->email)->update(
                ['email' => $check_token->email, 
                'password' => bcrypt(request('password'))]
            );
            DB::table('password_resets')->where('email',request('email'))->delete();
            auth()->guard('admin')->attempt(['email' => $check_token->email, 'password' => request('password')], true);
            return redirect(url('Admin'));
        }
        else{
            return redirect(url('Admin/forgetPassword'));
        }
    }
}
