<?php

namespace App\Http\Controllers;

use App\Repository\DetailUserRepository;
use App\Repository\UserRepository;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;


class DetailUserController extends Controller
{
    protected $userRepository;
    protected $detailUserRepository;


    public function __construct(DetailUserRepository $detailUserRepository,
                                UserRepository $userRepository
    )
    {
        $this->detailUserRepository = $detailUserRepository;
        $this->userRepository = $userRepository;
    }

    public function view_all_user()
    {
        $loyalCustomers = session()->get('loyal_customers');
        $allUser = $this->detailUserRepository->get_detail_user();
        $result['all_user'] = $allUser;

        return view('backend.detailAuth.list', $result);

    }


    public function view_edit_user($id)
    {
        $user = $this->detailUserRepository->edit_detail_user($id);

        $result['user'] = $user;
        return view('backend.detailAuth.edit', $result);
    }

    public function create_info_user(Request $request,$id)
    {
        $data = $request->all();
        $get_old_role = session()->get('loyal_customers');


        if (!isset($get_old_role) && $get_old_role != 'NULL') {
            Toastr::error('Bạn chưa đăng nhập, hãy đăng nhập để sử dụng tính năng', 'Bạn chưa đăng nhập, hãy đăng nhập để sử dụng tính năng');
            echo '<script>
            alert(\'Bạn chưa đăng nhập, hãy đăng nhập để sử dụng tính năng\');
            setTimeout(function() {
                window.location.href = "'.route('bread.viewLogin').'";
            },500);
            </script>';
            $this->userRepository->logout_user();
            return;
        }else{
            $role = $get_old_role->role;
        }


        $user = $this->detailUserRepository->create_user($data,$id,$request);
        $get_user = $this->userRepository->get_one_user($id);
        if (!empty($get_user) and $get_user !=''){
            $curent_role = $get_user[0]['role'];
        }

        if ($curent_role == $role){
            return redirect()->route('ctn.editUserDetail', ['id' => $id]);
        }else{
            $this->userRepository->logout_user();
            return redirect()->route('bread.viewLogin');
        }


    }




}
