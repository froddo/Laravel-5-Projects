<?php

namespace App\Http\Controllers;

use App\Facade\PayPal;
use App\Mail\SendMailPurchase;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

class ShopController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('shop.index', compact('products'));
    }

    public function singleProduct($id){
        $product = Product::findOrFail($id);
        return view('shop.singleProduct', compact('product'));
    }

    public function orderProduct($id){

        $product = Product::findOrFail($id);

        $apiContext = PayPal::apiContext();

        $payer = new Payer();
        $payer->setPaymentMethod("paypal");


        $item1 = new Item();
        $item1->setName($product->title)
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku($product->id) // Similar to `item_number` in Classic API
            ->setPrice($product->price);



        $itemList = new ItemList();
        $itemList->setItems(array($item1));


        $details = new Details();
        $details->setShipping(2)
            ->setTax(2)
            ->setSubtotal($product->price);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($product->price + 4)
            ->setDetails($details);


        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid());



        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('shop.executeOrder', $id))
            ->setCancelUrl(route('shop.index'));


        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


        $request = clone $payment;


        try {
            $payment->create($apiContext);
        } catch (\Exception $ex) {

            print("Created Payment Using PayPal. Please visit the URL to Approve.". $request);
            exit(1);
        }

        $approvalUrl = $payment->getApprovalLink();




        return redirect($approvalUrl);
    }

    public function executeOrder($id){

            $product = Product::findOrFail($id);

            $apiContext = PayPal::apiContext();



            // Get the payment Object by passing paymentId
            // payment id was previously stored in session in
            // CreatePaymentUsingPayPal.php
            $paymentId = $_GET['paymentId'];
            $payment = Payment::get($paymentId, $apiContext);

            // ### Payment Execute
            // PaymentExecution object includes information necessary
            // to execute a PayPal account payment.
            // The payer_id is added to the request query parameters
            // when the user is redirected from paypal back to your site
            $execution = new PaymentExecution();
            $execution->setPayerId($_GET['PayerID']);

            // ### Optional Changes to Amount
            // If you wish to update the amount that you wish to charge the customer,
            // based on the shipping address or any other reason, you could
            // do that by passing the transaction object with just `amount` field in it.
            // Here is the example on how we changed the shipping to $1 more than before.
            $transaction = new Transaction();
            $amount = new Amount();
            $details = new Details();

            $details->setShipping(2)
                ->setTax(2)
                ->setSubtotal($product->price);

            $amount->setCurrency('USD');
            $amount->setTotal($product->price + 4);
            $amount->setDetails($details);
            $transaction->setAmount($amount);

            // Add the above transaction object inside our Execution object.
            $execution->addTransaction($transaction);

            try {
                // Execute the payment
                // (See bootstrap.php for more on `ApiContext`)
                $result = $payment->execute($execution, $apiContext);

                // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
                print("Executed Payment 1". $payment->getId(). "Results: ". $result);

                try {
                    $payment = Payment::get($paymentId, $apiContext);

                    $paymentInfo = json_decode($payment);
                    Mail::to($paymentInfo->payer->payer_info->email)->bcc('webshop-admin@personal-blog.test')->send(new SendMailPurchase($paymentInfo));
                } catch (\Exception $ex) {
                   return redirect(route('shop.index'));
                }
            } catch (\Exception $ex) {
                return redirect(route('shop.index'));
            }

        return redirect(route('shop.index'));

    }
}
