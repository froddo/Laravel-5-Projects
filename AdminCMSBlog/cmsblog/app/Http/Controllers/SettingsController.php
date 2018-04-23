<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $settings = Setting::first();
        return view('admin.settings.settings')->with('settings', $settings);
    }

    public function update(){

        $this->validate(request(),[
            'site_name' => 'required',
            'about' => 'required',
            'contact_number' => 'required',
            'number_info' => 'required',
            'contact_email' => 'required',
            'email_info' => 'required',
            'address' => 'required',
            'address_info' => 'required'
        ]);

        $settings = Setting::first();

        $settings->site_name = request()->site_name;
        $settings->about = request()->about;
        $settings->contact_number = request()->contact_number;
        $settings->number_info = request()->number_info;
        $settings->contact_email = request()->contact_email;
        $settings->email_info = request()->email_info;
        $settings->address = request()->address;
        $settings->address_info = request()->address_info;

        $settings->save();

        Session::flash('success', 'Settings updated.');

        return redirect()->back();
    }
}


















