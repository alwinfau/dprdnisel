<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Symfony\Component\Console\Input\Input;

use function PHPUnit\Framework\isNull;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Silahkan Masukan Email',
            'password.required' => 'Silahkan Masukan Password'
        ]);

        // $email_verifkasi = DB::table('users')->select('email_verified_at')->where('email', Request('email'))->first();        // dd($email_verifkasi);
        // if ($email_verifkasi) {
        //     return 'Verifikasi';
        // } else {
        //     return 'Tidak  Verifikasi';
        // }


        // if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
        //     DB::table('users')->where('email', $input['email'])->update(['statuslogin' => 'On', 'waktulogin' => date('Y-m-d H:i:s')]);
        //     if ($email_verifkasi == null) {
        //         return redirect()->route('login')
        //             ->with('error', 'Pemberitahuan..!!!,, Verifikasi email anda Terlebih dahulu...!!');
        //     } else {
        //         if (auth()->user()->is_admin == 1) {
        //             return redirect()->route('admin.home');
        //         } elseif (auth()->user()->is_admin == 2) {
        //             return redirect()->route('frontend');
        //         } else {
        //             return redirect()->route('frontend');
        //         }
        //     }
        // } else {
        //     return redirect()->route('login')
        //         ->with('error', 'Pemberitahuan..!!!,, Mohon Maaf Username dan Password yang diinputkan tidak diketahui..!!! Harap Periksa Kembali, Terima kasih');
        // }


        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
            DB::table('users')->where('email', $input['email'])->update(['statuslogin' => 'On', 'waktulogin' => date('Y-m-d H:i:s')]);
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.home');
            } elseif (auth()->user()->is_admin == 2) {
                return redirect()->route('admin.home');
            } elseif (auth()->user()->is_admin == 3) {
                return redirect()->route('admin.home');
            } elseif (auth()->user()->is_admin == 4) {
                return redirect()->route('admin.home');
            } elseif (auth()->user()->is_admin == 5) {
                return redirect()->route('admin.home');
            }
            // else {
            //     return redirect()->route('admin.home');
            // }
        } else {
            return redirect()->route('login')
                ->with('error', 'Pemberitahuan..!!!,, Mohon Maaf Username dan Password yang diinputkan tidak diketahui..!!! Harap Periksa Kembali, Terima kasih');
        }
    }
}
