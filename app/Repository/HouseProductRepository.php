<?php


namespace App\Repository;


use App\models\HouseProduct;
use App\Models\DetailUser;
use App\Models\LoyalCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class HouseProductRepository extends BaseRepository
{
    public function getModel()
    {
       return HouseProduct::class;
    }



    public function get_all_house()
    {
        $get_all = $this->model->all()->toArray();

        return $get_all;
    }

    public function create_house($data)
    {
        $array = [
           HouseProduct::COLUMN_NAME => (!empty($data['name']) and  $data['name'] != '') ? $data['name'] : '',
           HouseProduct::COLUMN_ADDRESS => (!empty($data['address']) and  $data['address'] != '') ? $data['address'] : '',
           HouseProduct::COLUMN_NUMBER_BEDROOOMS => (!empty($data['number_bedrooms']) and  $data['number_bedrooms'] != '') ? $data['number_bedrooms'] : '',
           HouseProduct::COLUMN_COLUMN_NUMBER_BATHROOMS => (!empty($data['number_bathrooms']) and  $data['number_bathrooms'] != '') ? $data['number_bathrooms'] : '',
           HouseProduct::COLUMN_DESCRIPTION => (!empty($data['description']) and  $data['description'] != '') ? $data['description'] : '',
           HouseProduct::COLUMN_PRICE => (!empty($data['price']) and  $data['price'] != '') ? $data['price'] : '',
           HouseProduct::COLUMN_TYPE_HOUSE_ID => (!empty($data['type_house_id']) and  $data['type_house_id'] != '') ? $data['type_house_id'] : '',
        ];

        if($array != ''){
            $poructHouse = $this->model->create($array)->toArray();
        }

        $bool = true;

        if ($poructHouse != ''){
            $result['id'] = $poructHouse['id'];
            $result['item'] = $poructHouse;
            $bool = true;
            if ($bool == true){
                $result['bool'] = 1;
            }
        }else{
            if ($bool == false){
                $result['bool'] = 0;
            }
        }

        return $result;
    }

    public function edit_house($id)
    {
        $detailHouse = $this->model->find($id)->toArray();
        return $detailHouse;
    }


    public function update_house($data,$id)
    {
        $array = [
            HouseProduct::COLUMN_NAME => (!empty($data['name']) and  $data['name'] != '') ? $data['name'] : '',
            HouseProduct::COLUMN_ADDRESS => (!empty($data['address']) and  $data['address'] != '') ? $data['address'] : '',
            HouseProduct::COLUMN_NUMBER_BEDROOOMS => (!empty($data['number_bedrooms']) and  $data['number_bedrooms'] != '') ? $data['number_bedrooms'] : '',
            HouseProduct::COLUMN_COLUMN_NUMBER_BATHROOMS => (!empty($data['number_bathrooms']) and  $data['number_bathrooms'] != '') ? $data['number_bathrooms'] : '',
            HouseProduct::COLUMN_DESCRIPTION => (!empty($data['description']) and  $data['description'] != '') ? $data['description'] : '',
            HouseProduct::COLUMN_PRICE => (!empty($data['price']) and  $data['price'] != '') ? $data['price'] : '',
            HouseProduct::COLUMN_TYPE_HOUSE_ID => (!empty($data['type_house_id']) and  $data['type_house_id'] != '') ? $data['type_house_id'] : '',
        ];


        if($array != ''){
            $poructHouse = $this->model->where(HouseProduct::COLUMN_ID,'=',$id)->update($array);
        }
        return $poructHouse;
    }

    public function delete_house($id)
    {
        $result = $this->model->where(HouseProduct::COLUMN_ID,'=',$id)->delete();
        return $result;
    }



}
