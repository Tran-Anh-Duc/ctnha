<?php


namespace App\Repository;



use App\Models\DetailUser;
use App\Models\LoyalCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class DetailUserRepository extends BaseRepository
{
    public function getModel()
    {
       return DetailUser::class;
    }



    public function get_detail_user()
    {
        $users = DB::table('loyal_customers')->get();
        return $users;
    }

    public function create_detail_user($data)
    {

    }

    public function edit_detail_user($id)
    {
        if (!empty($id) and $id != ''){
            $users = DB::table('loyal_customers')->where([
                ['id', '=', $id],
            ])->first();
        }
        return $users;
    }

    public function create_user($data,$id)
    {

    }

    public function view_detail_user($data)
    {

    }
}
