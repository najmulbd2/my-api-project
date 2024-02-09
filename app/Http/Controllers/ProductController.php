<?php

namespace App\Http\Controllers;

use App\Models\MyContact;
use App\Models\StudentInfo;
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

    public function viewStudents(){

//        $data['student_count_database'] = StudentInfo::count();

        $student_info_query = StudentInfo::all(['id_no']);



        //dd($student_info_query);


        //dd($student_database_info);


        $getStudentObj = file_get_contents('http://127.0.0.1:8000/api/getStudentInfo');
        $getStudent = json_decode($getStudentObj);
        $student_api_info = $getStudent->students;

        $db_student_id = [];
        foreach (StudentInfo::all() as $std_id){
            $db_student_id[] = $std_id->id_no;
        }

        $data['student_info'] = collect($student_api_info)->whereNotIn('id_no', $db_student_id);

//        $api_student_id = [];
//        foreach ($student_api_info as $student_id_api){
//            $api_student_id[] = $student_id_api->id_no;
//        }
//
//        foreach ($db_student_id as $sid){
//                $data['student_info'] = collect($student_api_info)->whereNotIn('id_no', $db_student_id);
//            }
        return view('backend.product.view_student',$data);

    }

    public function storeStudentsInfo(Request $request){
        $student_count = StudentInfo::count();
        //dd($student_info);

        $getStudentObj = file_get_contents('http://127.0.0.1:8000/api/getStudentInfo');
        $getStudent = json_decode($getStudentObj);
        $student_api_info = $getStudent->students;

        $db_student_id = [];
        foreach (StudentInfo::all() as $std_id){
            $db_student_id[] = $std_id->id_no;
        }

        $students = collect($student_api_info)->whereNotIn('id_no', $db_student_id);


        $dataCount = count(collect($student_api_info));

        //check update data
        if ($student_count == $dataCount){
            $notification = array(
                'message'    => 'Exist! Already data stored!',
                'alert-type' => 'error'
            );
            return redirect()->route('view.student')->with($notification);
        }

        foreach ($students as $student){

            $data = new StudentInfo();
            $data->name = $student->name;
            $data->mobile = $student->mobile;
            $data->address = $student->address;
            $data->gender = $student->gender;
            $data->image = $student->image;
            $data->fname = $student->fname;
            $data->mname = $student->mname;
            $data->religion = $student->religion;
            $data->id_no = $student->id_no;
            $data->dob = $student->dob;
            $data->code = $student->code;
            $data->status = 1;
            $query = $data->save();

        }

        if ($query){
            $notification = array(
                'message'    => 'Data Stored Successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('view.student')->with($notification);
        }else{
            $notification = array(
                'message'    => 'Ops! failed to data stored',
                'alert-type' => 'error'
            );
            return redirect()->route('view.student')->with($notification);
        }





    }





}
