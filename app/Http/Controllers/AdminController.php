<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }

    public function uploadDoctor(Request $request){
        $doctor = new Doctor();

        $image = $request->file('image');
        $imageName = uniqid()."_doctor.".$image->getClientOriginalExtension();
        $image->move('doctor_image',$imageName);
        $doctor->image = $imageName;


        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $doctor->save();
        return redirect()->route('add_doctor')->with('message','Doctor is added');

    }

    public function showAppointment(){
        $datas = Appointment::all();
        return view('admin.show_appointment',compact('datas'));
    }

    public function approveAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 'Approved';
        $appointment->save();
        return redirect()->back()->with("message","Appointment is approved");
    }

    public function cancelAppointment($id){
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();
        return redirect()->back()->with("message","Appointment is cancelled");
    }
}
