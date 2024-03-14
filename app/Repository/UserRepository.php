<?php


namespace App\Repository;


//use App\Models\User;
use App\Models\LoyalCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class UserRepository extends BaseRepository
{
    public function getModel()
    {
       return LoyalCustomer::class;
    }

    public function registerUser($data)
    {
        $bool = false;
        $data1 = [
           'name'  => $data['name'] ?? null,
           'email' => $data['email'] ?? null,
           'password' =>  !empty($data['password']) ? bcrypt($data['password']) : null
        ];

        $get_user = DB::table('loyal_customers')->where('email','=',$data['email'])->first();
        if (!empty($get_user) and $get_user != ''){
            $bool = false;
        }else{
            $user = $this->model->create($data1);
            $bool = true;
        }

        return $bool;
    }

    public function loginUser($data)
    {

        $checkLogin = [
            'email' => $data['email'],
            'password' => $data['password']
        ];

        $bool = false;
        if (!empty($data) and $data != ''){
            $get_user = DB::table('loyal_customers')->where('email','=',$data['email'])->first();
        }
        if (!empty($get_user) and $get_user != ''){
            $a = session()->put('loyal_customers', $get_user);

            $b = session()->get('loyal_customers'); // Sử dụng key là 'loyal_customers'

            $bool = true;
        }else{
            $bool = false;
        }

        return  [$bool,$a,$b];
    }
}
