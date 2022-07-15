<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Models\Student;
use App\Models\Developer;
use App\Models\Office;

class RegistrationController extends Controller
{
    public function index(){
        session()->forget('name');
        $title = "Register Student...";
        $url = url('/registration');
        $CTA = "Register";
        $data = compact('title', 'url', 'CTA');
        return view('form')->with($data);
    }

    public function registration(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        $student = new Student;
        $student->name =  $req['name'];
        $student->email =  $req['email'];
        $student->role =  $req['role'];
        $student->password =  md5($req['password']);
        $db_response = $student->save();
        if($db_response == 1){
            $req->session()->flash('success', 'Student Registered Successfully!');
            return redirect('/all_students');
        }
    }

    public function all_students(Request $req){
        $search = $req['search'] ?? "";
        if(!empty($search)){
            $students = Student::where('name', 'LIKE', "%$search%")->orwhere('email', 'LIKE', "%$search%")->paginate(10);
        }else {
            $students = Student::paginate(10);
        }
        $data = compact('students', 'search');
        return view('all_students')->with($data);
    }

    public function multi_language($lang = null){
        App::setLocale($lang);
        return view('multi_lang');
    }

    public function trash(){

        $students = Student::onlyTrashed()->get();
        $data = compact('students');
        return view('trash')->with($data);
    }

    public function delete_student($id){
        $student= Student::find($id);
        if(!is_null($student)){
            $db_response = $student->delete();
            if($db_response == 1){
                return redirect('/all_students');
            }
        }
    }

    public function permanently_delete_student($id){
        $student= Student::withTrashed()->find($id);
        if(!is_null($student)){
            $student->forceDelete();
            return redirect('/students/trash');
        }
    }

    public function collective(){
        return view('collective');
    }

    public function collective_form_processing(Request $req){
        $file_extension = $req->file('image')->getClientOriginalExtension();
        $custom_name = time()."-VISTA.".$file_extension;
        $req->file('image')->storeAs('uploads', $custom_name);
    }

    public function update_student($id){
        $student = Student::find($id);
        session()->put('name', $student['name']);
        if(!is_null($student)){
            $title = "Update Student...";
            $url = url('/update_process')."/".$id;
            $CTA = "Update";
            $data = compact('title', 'url', 'CTA', 'student');
            return view('form')->with($data);
        }
    }

    public function restore_student($id){
        $student = Student::withTrashed()->find($id);
        if(!is_null($student)){
            $student->restore();
            return redirect('/students/trash');
        }
    }

    public function update_process($id, Request $req){
        $student = Student::find($id);
        if(!is_null($student)){
            $req->validate([
                'name' => 'required',
                'email' => 'required|email',
                'role' => 'required',
            ]);
            $student->name =  $req['name'];
            $student->email =  $req['email'];
            $student->role =  $req['role'];
            $db_response = $student->save();
            if($db_response == 1){
                return redirect('/all_students');
            }
        }
    }

    public function one_to_one(){
        $developer = Developer::find(1)->getDeveloper;
        $office = Office::find(1)->getOffice;
        print_r($office);
    }
}
