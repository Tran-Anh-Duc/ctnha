<?php


namespace App\Repository;


use App\models\TypeHouse;
use App\models\HouseProduct;
use App\Models\DetailUser;
use App\Models\LoyalCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class TypeHouseRepository extends BaseRepository
{
    public function getModel()
    {
       return TypeHouse::class;
    }



    public function get_all_house()
    {

    }

    public function create_house($data)
    {

    }

    public function edit_house($id)
    {

    }


    public function update_house($data,$id)
    {

    }

    public function delete_house($id)
    {

    }



}
