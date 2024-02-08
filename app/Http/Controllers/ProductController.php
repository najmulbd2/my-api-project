<?php

namespace App\Http\Controllers;

use App\Models\MyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    //
    public function AddProduct(){
        return view('backend.product.add_product');
    }

    public function storeContact(){
        $object = file_get_contents('http://127.0.0.1:8000/api/get-contact');
        $get_contact = json_decode($object);

        $contacts = $get_contact->contacts;

        foreach ($contacts as $contact){

            $data = new MyContact();
            $data->name       = $contact->name;
            $data->job_title  = $contact->job_title;
            $data->company    = $contact->company;
            $data->email      = $contact->email;
            $data->mobile     = $contact->mobile;
            $data->dob        = $contact->dob;
            $data->address    = $contact->address;
            $data->note       = $contact->note;
            $data->added_by   = Auth::id();
            $query = $data->save();
        }

        if($query){
            return 'success';
        }else{
            return 'error';
        }



    }


}
