<?php

namespace App\Http\Controllers;

use App\Repository\DetailUserRepository;
use App\Repository\HouseProductRepository;
use App\Repository\UserRepository;
//use Brian2694\Toastr\Toastr;
//use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Brian2694\Toastr\Facades\Toastr;

class HouseProductController extends Controller
{
    protected $userRepository;
    protected $detailUserRepository;
    protected $houseProductRepository;


    public function __construct(DetailUserRepository $detailUserRepository,
                                UserRepository $userRepository,
                                HouseProductRepository $houseProductRepository
    )
    {
        $this->detailUserRepository = $detailUserRepository;
        $this->userRepository = $userRepository;
        $this->houseProductRepository = $houseProductRepository;
    }

    public function view_all_house_product()
    {
        $getAll = $this->houseProductRepository->get_all_house();
        $result['items'] = $getAll;
        return view('backend.houseProduct.list', $result);

    }

    public function view_detail_house($id)
    {
        $detailHouse = $this->houseProductRepository->edit_house($id);
        $result['item'] = $detailHouse;
        return view('backend.houseProduct.edit', $result);
    }


    public function update_house_product(Request $request,$id)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|unique:house_product|max:255',
            'address' => 'required',
            'number_bedrooms' => 'required',
            'number_bathrooms' => 'required',
            'description' => 'required',
            'price' => 'required',
            'type_house_id' => 'required',
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'name.unique' => 'Tên đã tồn tại.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'address.required' => 'Tên là bắt buộc.',
            'number_bedrooms.required' => 'là bắt buộc.',
            'number_bathrooms.required' => 'là bắt buộc.',
            'description.required' => 'là bắt buộc.',
            'price.required' => 'là bắt buộc.',
            'type_house_id.required' => 'là bắt buộc.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $updateHouse = $this->houseProductRepository->update_house($data,$id);
        if (!empty($updateHouse) and $updateHouse == 1){
            Toastr::success('Update success','Update success');
        }else{
            Toastr::error('Update error','Update error');
        }
        return redirect()->route('ctn.detailHouseProduct', ['id' => $id])->with('success', 'Update success');

    }


    public function view_create_house_product()
    {
        return view('backend.houseProduct.create');
    }

    public function create_house_product(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'name' => 'required|unique:house_product|max:255',
            'address' => 'required',
            'number_bedrooms' => 'required',
            'number_bathrooms' => 'required',
            'description' => 'required',
            'price' => 'required',
            'type_house_id' => 'required',
        ], [
            'name.required' => 'Tên là bắt buộc.',
            'name.unique' => 'Tên đã tồn tại.',
            'name.max' => 'Tên không được vượt quá 255 ký tự.',
            'address.required' => 'Tên là bắt buộc.',
            'number_bedrooms.required' => 'là bắt buộc.',
            'number_bathrooms.required' => 'là bắt buộc.',
            'description.required' => 'là bắt buộc.',
            'price.required' => 'là bắt buộc.',
            'type_house_id.required' => 'là bắt buộc.',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors()->all();
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $create_house = $this->houseProductRepository->create_house($data);
        return redirect()->route('ctn.listHouseProduct');
    }

    public function delete_house_product($id)
    {
        $resultHouse = $this->houseProductRepository->delete_house($id);
        return redirect()->route('ctn.listHouseProduct');
    }



}
