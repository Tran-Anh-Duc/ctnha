<?php


namespace App\Repository;



use App\Models\DetailUser;
use App\Models\LoyalCustomer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


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
        //detail_user
        if (!empty($id) and $id != ''){

            $users = DB::table('detail_user')
                ->rightJoin('loyal_customers', 'loyal_customers.id', '=', 'detail_user.loyal_customers_id')
                ->where('loyal_customers.id','=',$id)
                ->select(
                    'loyal_customers.*',
                    'detail_user.address',
                    'detail_user.gender',
                    'detail_user.passport',
                    'detail_user.nickname',
                    'detail_user.age',
                    'detail_user.birthday',
                    'detail_user.role',
                    'detail_user.image',
                    'detail_user.status'
                )
                ->first();

        }

        return $users;
    }

    public function create_user($data,$id,$request)
    {


        $student = new DetailUser;
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $filename = time().'.'.$file->getClientOriginalName();
            $path = public_path('images');
            $file->move($path, $filename);
            $student->image = $filename;
        }

        $date = (strtotime($data['birthday']));

        $array = [
            DetailUser::COLUMN_NAME => $data['name'] ?? null,
            DetailUser::COLUMN_EMAIL => $data['email'] ?? null,
            DetailUser::COLUMN_ADDRESS => $data['address'] ?? null,
            DetailUser::COLUMN_GENDER => $data['gender'] ?? null,
            DetailUser::COLUMN_PASSPORT => $data['passport'] ?? null,
            DetailUser::COLUMN_NICKNAME => $data['nickname'] ?? null,
            DetailUser::COLUMN_AGE => $data['age'] ?? null,
            DetailUser::COLUMN_BIRTHDAY => !empty($date) ? $date :null,
            DetailUser::COLUMN_STATUS => $data['status'] ?? null,
            DetailUser::COLUMN_ROLE => $data['role'] ?? null,
            DetailUser::COLUMN_IMAGE => $student['image'] ?? null,
            DetailUser::COLUMN_LOYAL_CUSTOMERS_ID => !empty($id) ? $id : null,
        ];

        //$get_one_user_detail = $this->model->find($id);

        $get_one_user_detail = $this->model->where([DetailUser::COLUMN_LOYAL_CUSTOMERS_ID => $id])->first();

        if (!empty($get_one_user_detail) and $get_one_user_detail != ''){

            $result = $this->model->where([DetailUser::COLUMN_LOYAL_CUSTOMERS_ID => $id])->update($array);
        }else{

            $result = $this->model->create($array);
        }
        return $result;

    }

    public function view_detail_user($data)
    {

    }



}
