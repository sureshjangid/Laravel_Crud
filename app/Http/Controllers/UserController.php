<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud; // Models page 

class UserController extends Controller
{


    // View all data 
    function getData(){
        // $data = crud::all();
        $data = crud::paginate(3);
        
        return view('allUser',['data'=>$data]);
    }

    // New your Insert
    function userData(Request $req){ // Request for inserting data and $req is variable 
        
        // Validation if user not insert any value
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phone'=>'required'
        ]);
        $data = new crud; // Table name
        $data->name=$req->name; // field name
        $data->email=$req->email;
        $data->password=$req->password;
        $data->phone=$req->phone;
        $data->save();
        $req->session()->flash('status','New user added'); // session for display success message
        return redirect('allUser'); // after inserting data then redirect page
    }
    
    // Select Data from URL ID
    function getUpdate($id){
        $data = crud::find($id);
        return view('/update',["data"=>$data]);
    }
    
    // Update data where id is this
    function updateWithID(Request $req){
        $data = crud::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->phone=$req->phone;
        $data->save();

        $req->session()->flash('update','User Data Update');
        return redirect('allUser');
    }

    // Delete user where URL ID
    function deleteUser($id){
        $data = crud::find($id);
        $data->delete();
        $succ  = session()->flash('deleteUser','User Delete Successfull');
        return redirect('/allUser');
    }

}
