<?php

namespace App\Http\Controllers;

use App\AccomplishmentReport;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AccomplishmentReportController extends Controller
{
    public function submitAccomplishmentPlan(Request $request){
        $currentTime = Carbon::now();
        $validator = \Validator::make($request->all(), [
            'accomplishment_plan' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        } else {
            if($request->accomplishment_plan){
                $check = \DB::table('accomplishment_plans')
                    ->where('user_id', \Auth::user()->id)
                    ->whereDate('time','<=',$currentTime)
                    ->count();
                    // dd($check);
                if($check >= 1){
                    return response()->json('Already Submitted',500);
                }else{
                    \DB::table('accomplishment_plans')->insert([
                    'user_id' => \Auth::user()->id,
                    'accomplishment_plan' => $request->accomplishment_plan,
                    'time' => $currentTime->toDateTimeString(),
                    "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                    ]);
                }
            }
        }
    }

    public function submitAccomplishmentReport(Request $request){
        $currentTime = Carbon::now();
        $validator = \Validator::make($request->all(), [
            'accomplishment_report' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ],422);
        } else {
            if($request->accomplishment_report){
                $check = \DB::table('accomplishment_reports')
                    ->where('user_id', \Auth::user()->id)
                    ->whereDate('time','<=',$currentTime)
                    ->count();
                    // dd($check);
                if($check >= 1){
                    return response()->json('Already Submitted',500);
                }else{
                    \DB::table('accomplishment_reports')->insert([
                    'user_id' => \Auth::user()->id,
                    'accomplishment_report' => $request->accomplishment_report,
                    'time' => $currentTime->toDateTimeString(),
                    "created_at" =>  \Carbon\Carbon::now(), # new \Datetime()
                    "updated_at" => \Carbon\Carbon::now(),  # new \Datetime()
                    ]);
                }
            }
        }
    }
}
