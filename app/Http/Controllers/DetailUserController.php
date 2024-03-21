<?php

namespace App\Http\Controllers;

use App\Repository\DetailUserRepository;
use App\Repository\UserRepository;
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
        $user = $this->detailUserRepository->create_user($data,$id,$request);
        return redirect()->route('ctn.editUserDetail', ['id' => $id]);
    }



}
