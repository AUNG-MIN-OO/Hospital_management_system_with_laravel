<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function redirect(){
        if (Auth::id()){
            if (Auth::user()->usertype==0){
                $doctors = Doctor::all();
                return view('user.home',compact('doctors'));
            }else{
                return view('admin.home');
            }
        }else{
            return $this->redirect()->back();
        }
    }

    public function index(){
        $doctors = Doctor::all();
        return view('user.home',compact('doctors'));
    }

    public function appointment(Request  $request){
        $data = new Appointment();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->doctor = $request->doctor;
        $data->message = $request->message;
        $data->status = "Pending";
        if (Auth::id()){
            $data->user_id = Auth::user()->id;
            $data->phone = Auth::user()->phone;
        }
        $data->save();
        return redirect()->back()->with("message","Appointment is successful. We will contact you soon.");
    }

    public  function myAppointment(){
        if (Auth::id()){
            $appointments = Appointment::where('user_id',Auth::user()->id)->get();
            return view('user.my_appointment',compact('appointments'));
        }else{
            return redirect()->route('main');
        }
    }

    public function cancelAppointment(Request $request){
        $id = $request->id;
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with("message","Appointment has been cancelled");
    }
}
