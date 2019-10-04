<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\ForgotRequest;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\ChangePassRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Mail\ForgotPasswordMail;
use App\Models\User;
use App\Models\PasswordResets;
use DateTime;
class AuthController extends Controller
{
    /**
     * @var ViewPath
     */
    private $view = 'admin.modules.auth.';

    /**
     * @var RouteName
     */
    private $route = 'auth.';

    /**
     * @var Message
     */
    private $message = 'message.auth.';

    public function login () 
    {
        return view($this->view.'login');
    }

    public function post_login (LoginRequest $request)
    {
        $login = array(
            'email'    => $request->email,
            'password' => $request->password,
            'status'   => 'on'
        );
        
        if (Auth::attempt($login)) {
            return redirect()->route('admin.user.index');
        } else {

            return redirect()->route($this->route.'get.login')->with('warning',__($this->message.'login_fail'));
        }
    }

    public function logout (Request $request) 
    {
        Auth::logout();
        return redirect()->route($this->route.'get.login')->with('success',__($this->message.'logout_success')); 
    }

    public function forgot ()
    {
        return view($this->view.'forgot');
    }

    public function post_forgot (ForgotRequest $request)
    {
        $email = $request->email;
        $user  = User::where('email', $email)->firstOrFail();
        $passwordReset = PasswordResets::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60)
        ]);

        $content['content'] = 'Mật khẩu cho Tài khoản Sum SMS <a href="tomail:'.$email.'">'.$email.'</a> của bạn được yêu cầu thay đổi. Nếu không thực hiện sự thay đổi này thì bạn có thể bỏ qua email này và không cần làm thêm bất kì thao tác nào.';
        $content['token'] = $passwordReset->token;
        $content['footer'] = 'Email này là để thông báo cho bạn biết về những thay đổi quan trọng đối với Tài khoản Sum SMS và dịch vụ của bạn.';
        Mail::to($email)->send(new ForgotPasswordMail($content));
        $data['content'] = __($this->message.'sent_success');
        return view($this->view.'report',$data);
    }

    public function reset_password ($token) 
    {
        $passwordReset = PasswordResets::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->created_at)->addMinutes(15)->isPast()) {
            $passwordReset->delete();
            $data['content'] = __($this->message.'token_invalid');
            return redirect()->route($this->route.'get.report',$data);
        } else {
            return redirect()->route($this->route.'get.change_password',['token' => $token]);
        }
    }

    public function get_change_password ($token) 
    {
        $passwordReset = PasswordResets::where('token', $token)->firstOrFail();
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        if (Carbon::parse($passwordReset->created_at)->addMinutes(15)->isPast()) {
            return redirect()->route($this->route.'get.login');
        } else {
            $data['token'] = $token;
            return view($this->view.'change-password',$data);
        }
    }

    public function post_change_password (ChangePassRequest $request,$token) 
    {
        $passwordReset = PasswordResets::where('token', $token)->firstOrFail();
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(15)->isPast()) {
            $data['content'] = __($this->message.'token_invalid');
            return view($this->view.'report',$data);
        } else {
            $updatePasswordUser = $user->update($request->only('password'));
            $passwordReset->delete();
            return redirect()->route($this->route.'get.login')->with('success',__($this->message.'change_password_success'));
        }   
    }
}
