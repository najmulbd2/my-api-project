<?php

namespace App\Http\Controllers;

use App\Models\group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CircleController extends Controller
{
    public function index()
    {
        $data['groups'] = Group::where('added_by',Auth::id())->where('type',2)->get();
        return view('backend.circle.index',$data);
    }

    public function addCircle()
    {
        return view('backend.circle.add-circle');
    }

    public function saveCircle(Request $request)
    {
        $name = $request->name;

        // duplicate checking
        $count = Group::where('name',$name)->count();
        if($count > 0){
            return 'duplicate';
        }

        $object = new Group();
        $object->name = $name;
        $object->type = 2;
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

    public function editCircle($id)
    {
        $data['group'] = Group::find($id);
        return view('backend.circle.edit-circle',$data);
    }

    public function updateCircle(Request $request, $id)
    {
        $name = $request->name;

        // duplicate checking
        $count = Group::where('name',$name)->count();
        if($count > 0){
            return 'duplicate';
        }

        $object = Group::find($id);
        $object->name = $name;
        $object->type = 2;
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

    public function deleteCircle(Request $request)
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
