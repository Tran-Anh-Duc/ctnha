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
        $result = $this->model->all()->toArray();
        return $result;
    }

    public function create_house($data)
    {
        if (!empty($data) and $data != ''){
            foreach ($data as $key => $value){
                $array = [
                    TypeHouse::COLUMN_NAME => (!empty($value['field_a']) and $value['field_a'] != '') ? $value['field_a'] : '',
                    TypeHouse::COLUMN_NAME_SLUG => (!empty($value['field_a']) and $value['field_a'] != '') ? $value['field_a'] : '',
                    TypeHouse::COLUMN_DESCRIPTION => (!empty($value['field_b']) and $value['field_b'] != '') ? $value['field_b'] : '',
                ];
                $result = $this->model->create($array);
            }
        }

        return $result;
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
