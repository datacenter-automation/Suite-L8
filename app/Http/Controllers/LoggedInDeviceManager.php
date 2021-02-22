<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Session;

class LoggedInDeviceManager extends Controller
{

    /**
     * Display a listing of the currently logged in devices.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $devices = DB::table('sessions')->where('user_id', Auth::user()->id)->get()->reverse();

        return view('logged-in-devices.list')->with('devices', $devices)->with('current_session_id', Session::getId());
    }

    /**
     * Logout a session based on session id.
     *
     * @param \Illuminate\Http\Request $request
     * @param                          $device_id
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logoutDevice(Request $request, $device_id)
    {
        DB::table('sessions')->where('id', $device_id)->delete();

        return redirect('/logged-in-devices');
    }

    /**
     * Logouts a user from all other devices except the current one.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logoutAllDevices(Request $request)
    {
        DB::table('sessions')->where('user_id', Auth::user()->id)->where('id', '!=', Session::getId())->delete();

        return redirect('/logged-in-devices');
    }

    /**
     * Logouts a user from all other devices except the current one.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logoutAllDevicesIncludingMyself(Request $request)
    {
        DB::table('sessions')->where('user_id', Auth::user()->id)->delete();

        return redirect('/login');
    }
}
