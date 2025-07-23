<?php

namespace App\Http\Controllers\Authenticated\Calendar\General;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Calendars\General\CalendarView;
use App\Models\Calendars\ReserveSettings;
use App\Models\Calendars\Calendar;
use App\Models\USers\User;
use Auth;
use DB;

class CalendarController extends Controller
{
    public function show(){
        $calendar = new CalendarView(time());
        return view('authenticated.calendar.general.calendar', compact('calendar'));
    }

    public function reserve(Request $request){
        DB::beginTransaction();
        try{
            $getPart = $request->getPart;
            $getDate = $request->getData;
            $reserveDays = array_filter(array_combine($getDate, $getPart));
            foreach($reserveDays as $key => $value){
                $reserve_settings = ReserveSettings::where('setting_reserve', $key)->where('setting_part', $value)->first();
                $reserve_settings->decrement('limit_users');
                $reserve_settings->users()->attach(Auth::id());
            }
            DB::commit();
        }catch(\Exception $e){
            DB::rollback();
        }
        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

    public function delete(Request $request){

        $reserveDate=$request->reserveDate;
        $reserveTime=$request->reserveTime;
        $user_id=Auth::id();
        try{
        $reserve_setting=ReserveSettings::where('setting_reserve',$reserveDate)->where('setting_part',$reserveTime)->whereHas('users',function ($query) use ($user_id){$query->where('users.id',$user_id);});

            // 中間テーブルによる関連付けを削除
        $user=User::find($user_id);
        $user->reserveSettings()->detach($reserve_setting->pluck('id'));

            //ReserveSettingsの1枠増やす。
        $reserve_setting=new ReserveSettings;
        $reserve_setting->where('setting_reserve',$reserveDate)->where('setting_part',$reserveTime)->increment('limit_users');
        }catch(\Exception $e){
            DB::rollback();
        }

        return redirect()->route('calendar.general.show', ['user_id' => Auth::id()]);
    }

}
