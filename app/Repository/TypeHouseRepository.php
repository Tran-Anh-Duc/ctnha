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
        $bool = true;
        $getData = array();

        if (!empty($data) and $data != ''){
            foreach ($data as $key => $value){
                $array = [
                    TypeHouse::COLUMN_NAME => (!empty($value['field_a']) and $value['field_a'] != '') ? $value['field_a'] : '',
                    TypeHouse::COLUMN_NAME_SLUG => (!empty($value['field_a']) and $value['field_a'] != '') ? $value['field_a'] : '',
                    TypeHouse::COLUMN_DESCRIPTION => (!empty($value['field_b']) and $value['field_b'] != '') ? $value['field_b'] : '',
                ];
                if ($value['field_0'] == ''){
                    $result = $this->model->create($array)->toArray();
                    $getData[] = $result;
                }else{
                    $result = $this->model->where(TypeHouse::COLUMN_ID,'=',$value['field_0'])->update($array);
                    $getData[] = $result;
                }

            }
        }

       if (!empty($getData) and $getData != ''){
           $result = sizeof($getData);
           if ($result > 0){
               $bool = true;
           }else{
               $bool = false;
           }
       }
        return $bool;
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
