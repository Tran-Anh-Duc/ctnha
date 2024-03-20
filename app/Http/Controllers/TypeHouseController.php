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
        echo("<pre>");
        print_r($data);
        echo("<pre>");
        die();
        $result = $this->typeHouseRepository->create_house($data);

        return $result;
    }

    public function delete_house_product($id)
    {

    }



}
