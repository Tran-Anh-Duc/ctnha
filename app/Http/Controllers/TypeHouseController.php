<?php

namespace App\Http\Controllers;

use App\Repository\TypeHouseRepository;
use App\Repository\DetailUserRepository;
use App\Repository\HouseProductRepository;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;

class TypeHouseController extends Controller
{
    protected $userRepository;
    protected $detailUserRepository;
    protected $houseProductRepository;
    protected $typeHouseRepository;


    public function __construct(DetailUserRepository $detailUserRepository,
                                UserRepository $userRepository,
                                HouseProductRepository $houseProductRepository,
                                TypeHouseRepository $typeHouseRepository
    )
    {
        $this->detailUserRepository = $detailUserRepository;
        $this->userRepository = $userRepository;
        $this->houseProductRepository = $houseProductRepository;
        $this->typeHouseRepository = $typeHouseRepository;
    }

    public function list_type_house(Request $request )
    {
        $result = $this->typeHouseRepository->get_all_house();
        $resultAll['view'] = $result;
        return view(('backend.typeHouse.list'),$resultAll);
    }

    public function view_detail_house($id)
    {

    }

    public function update_house_product(Request $request,$id)
    {


    }


    public function view_create_house_product()
    {

    }

    public function create_house_product(Request $request)
    {
        $data = $request->all();
        $result = $this->typeHouseRepository->create_house($data);

        if ($result == 1){
            Toastr::success('Update success','Update success');
            return Controller::sendResponse(self::HTTP_OK,'create success',$result);
        }else{
            Toastr::error('Update error','Update error');
            return Controller::sendResponse(self::HTTP_BAD_REQUEST,'create error');
        }

    }

    public function delete_house_product($id)
    {

    }



}
