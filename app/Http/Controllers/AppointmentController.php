<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AppointmentController extends Controller
{
    public function createAppointment(Request $request){

    }

    public function store(Request $request){
        $input=$request->all();

        $rules=[
            'title'=>'required',
            'description'=>'required',
        ];

        $messages=[
            'title.required'=>'The title field is empty.',
            'description.required'=>'The description field is empty.',
        ];

        $validator = Validator::make($input,$rules,$messages);

        if ($validator->fails()) {
            return response()->json([$validator->errors()],400);
        }else{
            $appointment=Appointment::create($input);
            return $appointment;
        } 
    }
}
