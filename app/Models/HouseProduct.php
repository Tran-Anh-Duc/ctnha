<?php


namespace App\Models;


class HouseProduct extends BaseModel
{
    const COLUMN_NAME = 'name';
    const COLUMN_ADDRESS = 'address';
    const COLUMN_NUMBER_BEDROOOMS = 'number_bedrooms';
    const COLUMN_COLUMN_NUMBER_BATHROOMS = 'number_bathrooms';
    const COLUMN_DESCRIPTION = 'description';
    const COLUMN_PRICE = 'price';
    const COLUMN_TYPE_HOUSE_ID = 'type_house_id';




        //protected $table = 'detail_user';
        protected $table = 'house_product';

//    public function loyalCustomer()
//    {
//        return $this->belongsTo(LoyalCustomer::class);
//    }






}
