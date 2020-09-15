<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
// use Illuminate\Support\Facades\Session;
use Validator;
use URL;
// use Session;
use Redirect;
// use Input
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PHPUnit\Util\TestDox\ResultPrinter;

// use PHPUnit\TextUI\ResultPrinter;

class PaymentController extends Controller
{

    public function __construct()
    {

        /** PayPal api context **/
        $paypal_conf = [
            'client_id' => env('PAYPAL_CLIENT_ID', 'AUbgQ6vIdYxZP98HACS1TFXRrh81-HE4hQ9qAVGwJDVCO2MiEKDyGI8O30hW_aIi5aCZ0qgj54gXQKfF'),
            'secret' => env('PAYPAL_SECRET', 'EDoT1mZ5NUrwGxCmO8aZZMrIgDwFNMLzR4zFmbKQze8ZCJS46qdWiF31MQ4PSMU9Tf-lCgQ2Uif_yJXV'),
            'settings' => array(
                'mode' => env('PAYPAL_MODE', 'sandbox'),
                'http.ConnectionTimeOut' => 30,
                'log.LogEnabled' => true,
                'log.FileName' => storage_path() . '/logs/paypal.log',
                'log.LogLevel' => 'ERROR'
            ),
        ];

        $this->_api_context = new ApiContext(
            new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret']
            )
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }

    public function index()
    {

        return view('pages.payment');
    }

    public function payWithpaypal(Request $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        $item_1 = new Item();
        $item_1->setName('Item 1')
            /** item name **/

            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount'));
        /** unit price **/
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('status'))
            /** Specify return URL **/
            ->setCancelUrl(URL::route('status'));
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {
            $payment->create($this->_api_context);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if (\Config::get('app.debug')) {
                session()->put('error', 'Connection timeout');
                return Redirect::route('paywithpaypal');
            } else {
                session()->put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::route('paywithpaypal');
            }
        }
        foreach ($payment->getLinks() as $link) {
            if ($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
        /** add payment ID to session **/
        session()->put('paypal_payment_id', $payment->getId());
        if (isset($redirect_url)) {
            /** redirect to paypal **/
            return Redirect::away($redirect_url);
        }
        session()->put('error', 'Unknown error occurred');
        return Redirect::route('paywithpaypal');
    }
    public function status()
    {

        /** Get the payment ID before session clear **/
        $payment_id = session()->get('paypal_payment_id');

        /** clear the session payment ID **/
        session()->forget('paypal_payment_id');
        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
            dd("payment failed..please try again!!");
            // return Redirect::route('/');
        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));
        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);
        if ($result->getState() == 'approved') {

            auth()->user()->depositFloat($result->transactions[0]->amount->total, ['description' => 'payment from paypal']);
            return Redirect::route('trial');
        }
        dd('payment failed bottom');
        // return Redirect::route('/');
    }


    public function payout()
    {

        // Create a new instance of Payout object
        $payouts = new \PayPal\Api\Payout();

        // This is how our body should look like:
        /*
 * {
            "sender_batch_header":{
                "sender_batch_id":"2014021801",
                "email_subject":"You have a Payout!"
            },
            "items":[
                {
                    "recipient_type":"EMAIL",
                    "amount":{
                        "value":"1.0",
                        "currency":"USD"
                    },
                    "note":"Thanks for your patronage!",
                    "sender_item_id":"2014031400023",
                    "receiver":"shirt-supplier-one@mail.com"
                }
            ]
        }
 */

        $senderBatchHeader = new \PayPal\Api\PayoutSenderBatchHeader();
        // ### NOTE:
        // You can prevent duplicate batches from being processed. If you specify a `sender_batch_id` that was used in the last 30 days, the batch will not be processed. For items, you can specify a `sender_item_id`. If the value for the `sender_item_id` is a duplicate of a payout item that was processed in the last 30 days, the item will not be processed.

        // #### Batch Header Instance
        $senderBatchHeader->setSenderBatchId(uniqid())
            ->setEmailSubject("You have a Payout!");

        // #### Sender Item
        // Please note that if you are using single payout with sync mode, you can only pass one Item in the request
        $senderItem = new \PayPal\Api\PayoutItem();
        $senderItem->setRecipientType('Email')
            ->setNote('Thanks for your patronage!')
            ->setReceiver('cherlow@hustlance.com')
            ->setSenderItemId("2014031400023")
            ->setAmount(new \PayPal\Api\Currency('{
                        "value":"1.0",
                        "currency":"USD"
                    }'));

        $payouts->setSenderBatchHeader($senderBatchHeader)
            ->addItem($senderItem);


        // For Sample Purposes Only.
        $request = clone $payouts;

        // ### Create Payout
        try {
            $output = $payouts->create(null,$this->_api_context);
        } catch (Exception $ex) {
            
            // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
   dump($ex);
            // ResultPrinter::printError("Created Single Synchronous Payout", "Payout", null, $request, $ex);
            exit(1);
        }

        // NOTE: PLEASE DO NOT USE RESULTPRINTER CLASS IN YOUR ORIGINAL CODE. FOR SAMPLE ONLY
        // ResultPrinter::printResult("Created Single Synchronous Payout", "Payout", $output->getBatchHeader()->getPayoutBatchId(), $request, $output);

        return $output;
    }
}
