<?php

namespace App\Http\Controllers;

use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function viewRegister()
    {
        return view('loginAndRegister.login');
    }

    public function viewLogin()
    {
        return view('loginAndRegister.login');
    }

    public function register(Request $request)
    {

        $validator = Validator::make($request->all(),
            [
                'email' => 'required|unique:loyal_customers|max:255',
                'password' => 'required|max:8',
            ],
            [
                'email.required' => 'Email là bắt buộc.',
                'email.unique' => 'Email đã tồn tại.',
                'email.max' => 'Email không được vượt quá 255 ký tự.',
                'password.required' => 'Mật khẩu là bắt buộc.',
                'password.max' => 'Mật khẩu không được vượt quá 8 ký tự.',
            ]
        );

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return Controller::sendResponse(self::HTTP_BAD_REQUEST,$errors);
        }
        $data = $request->all();
        $result = $this->userRepository->registerUser($data);

        if (!empty($result) and $result == 1){
            return Controller::sendResponse(self::HTTP_OK,'create success',$result);
        }else{
            return Controller::sendResponse(self::HTTP_BAD_REQUEST,'create error');
        }

    }

    public function loginUser(Request $request)
    {

        $data = $request->all();
        $result = $this->userRepository->loginUser($data);

        if (!empty($result) &&  $result[0] == 1 ){
                $result['login'] = session('LoyalCustomer',$result[1]);

                return Controller::sendResponse(self::HTTP_OK,'login success',$result);
        }else{
            return Controller::sendResponse(self::HTTP_BAD_REQUEST,'login error');
        }
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
//        return redirect()->route('list');
        return redirect()->route('bread.viewLogin');
    }


}
