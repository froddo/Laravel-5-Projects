<?php

namespace App\Http\Controllers;

use App\Market;
use App\Payment;
use Illuminate\Http\Request;

class PaymentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function payment($id){

        $photo = Market::find($id);
        return view('layouts.payment')->with('photo', $photo);
    }

    public function submitPayment($id){


        // Set your secret key: remember to change this to your live secret key in production
// See your keys here: https://dashboard.stripe.com/account/apikeys
        \Stripe\Stripe::setApiKey("sk_test_l6qXLNilyMCYAlaCw6NZ1nn1");

// Token is created using Checkout or Elements!
// Get the payment token ID submitted by the form:
        $token = $_POST['stripeToken'];

// Charge the user's card:
        $charge = \Stripe\Charge::create(array(
            "amount" => 100,
            "currency" => "usd",
            "description" => "Example charge",
            "source" => $token,
        ));
        $photoId = Market::find($id);

        $payment = new Payment();
        $payment->user_id = auth()->user()->id;
        $payment->title= $photoId->title;
        $payment->photo = $photoId->photo;
        $payment->description = $photoId->description;
        $payment->save();

        return  redirect('/payment/' . $id)->with('success', 'Success Payment');
        //dd('Success Payment');
    }

    public function destroy(Request $request,$id){

        $payment = Payment::find($id);

        if (auth()->user()->id != $payment->user_id){
            $request->session()->flash('error','Unauthorised Page!');
            return;
        }


        $payment->delete();
        $request->session()->flash('success','Photo Deleted');
        return;
    }
}
