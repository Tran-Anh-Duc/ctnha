<?php


namespace App\Models;


class DetailUser extends BaseModel
{
    const COLUMN_EMAIL = 'email';
    const COLUMN_EMAIL_VERIFIED_AT = 'email_verified_at';
    const COLUMN_NAME = 'name';
    const COLUMN_ADDRESS = 'address';
    const COLUMN_GENDER = 'gender';
    const COLUMN_PASSPORT = 'passport';
    const COLUMN_NICKNAME = 'nickname';
    const COLUMN_AGE = 'age';
    const COLUMN_BIRTHDAY = 'birthday';
    const COLUMN_STATUS = 'status';
    const COLUMN_ROLE = 'role';
    const COLUMN_IMAGE = 'image';
    const COLUMN_LOYAL_CUSTOMERS_ID = 'loyal_customers_id';

    const COLUMN_STATUS_ACTIVE = 2;
    const COLUMN_STATUS_BLOCK = 1;


    protected $table = 'detail_user';

    public function loyalCustomer()
    {
        return $this->belongsTo(LoyalCustomer::class);
    }

//    public function stores()
//    {
//         return $this->belongsToMany(Store::class);
//    }
//
//    public function bills()
//    {
//        return $this->belongsToMany(bill::class)->withTimestamps();
//    }





}
