<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FamilyController extends Controller
{
    public function index()
    {
        $data['groups'] = Group::where('added_by',Auth::id())->where('type',1)->get();
        return view('backend.family.index',$data);
    }

    public function addFamily()
    {
        return view('backend.family.add-family');
    }

    public function saveFamily(Request $request)
    {
        $name = $request->name;

        // duplicate checking
        $count = Group::where('name',$name)->count();
        if($count > 0){
            return 'duplicate';
        }

        $object = new Group();
        $object->name = $name;
        $object->type = 1;
        $object->added_by = Auth::id();
        $object->created_at = date('Y-m-d H:i:s');
        $object->updated_at = date('Y-m-d H:i:s');
        $query = $object->save();

        if($query){
            return 'success';
        }else{
            return 'error';
        }
    }

    public function editFamily($id)
    {
        $data['group'] = Group::find($id);
        return view('backend.family.edit-family',$data);
    }

    public function updateFamily(Request $request, $id)
    {
        $name = $request->name;

        // duplicate checking
        $count = Group::where('name',$name)->count();
        if($count > 0){
            return 'duplicate';
        }

        $object = Group::find($id);
        $object->name = $name;
        $object->type = 1;
        $object->added_by = Auth::id();
        $object->created_at = date('Y-m-d H:i:s');
        $object->updated_at = date('Y-m-d H:i:s');
        $query = $object->save();

        if($query){
            return 'success';
        }else{
            return 'error';
        }
    }

    public function deleteFamily(Request $request)
    {
        $group_id = $request->group_id;
        $query = Group::find($group_id)->delete();

        if($query){
            return 'success';
        }else{
            return 'error';
        }

    }

}
