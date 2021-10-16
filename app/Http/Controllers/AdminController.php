<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Notification;
use PhpParser\Comment\Doc;

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
        return redirect()->route('show-doctor')->with('message','Doctor is added');

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

    public function showDoctor(){
        $doctors = Doctor::all();
        return view('admin.show_doctor',compact('doctors'));
    }

    public function editDoctor($id){
        $doctor = Doctor::findOrFail($id);
        return view('admin.edit_doctor',compact('doctor'));
    }

    public function updateDoctor(Request $request){
        $id = $request->id;
        $doctor = Doctor::findOrFail($id);
        if ($request->file('image')){
            $dir = "doctor_image/";
            $newName = uniqid()."doctor.".$request->file('image')->getClientOriginalExtension();
            $request->file('image')->move($dir,$newName);
            File::delete(public_path($dir.$doctor->image));
            $doctor->image = $newName;
        }
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->update();

        return redirect()->route('show-doctor')->with('message','Doctor info has been updated');
    }

    public function deleteDoctor($id){
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect()->back()->with('message','Doctor list has been deleted');
    }

    public  function emailView($id){
        $data = Appointment::find($id);
        return view('admin.email_view',compact('data'));
    }

    public function sendEmail(Request $request,$id){
        $data = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_part' => $request->end_part,
        ];

        Notification::send($data,new SendEmailNotification($details));

        return redirect()->back()->with("message","Email has been sent.");
    }
}
