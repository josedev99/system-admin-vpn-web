<?php
namespace App\Http\Controllers;

use App\account;
use App\saldo;
use App\sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/** Paypal Details classes **/
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;
use PayPal\Exception\PayPalConnectionException;
class PaymentController extends Controller
{
    private $api_context;
    
/** 
    ** We declare the Api context as above and initialize it in the contructor
    **/
    public function __construct()
    {
        $this->api_context = new ApiContext(
            new OAuthTokenCredential(config('paypal.client_id'), config('paypal.secret'))
        );
        $this->api_context->setConfig(config('paypal.settings'));
    }
/**
    ** This method sets up the paypal payment.
    **/
    public function createPayment(Request $request)
    {
        // Amount received as request is validated here.
        $request->validate(['amount' => 'required|numeric']);
        $pay_amount = $request->amount;
        //Validation request
        if(is_numeric($pay_amount)){
            if($pay_amount < 0){
                return redirect()->back()->with('error','Error, no es un valor valido.');
            }
        }else{
            return redirect()->back()->with('error','Error, no es un valor valido.');
        }
        session([
            'pay_amount' => $pay_amount
        ]);
        // We create the payer and set payment method, could be any of "credit_card", "bank", "paypal", "pay_upon_invoice", "carrier", "alternate_payment". 
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');
        // Create and setup items being paid for.. Could multiple items like: 'item1, item2 etc'.
        $item = new Item();
        $item->setName('Paypal Payment')->setCurrency('USD')->setQuantity(1)->setPrice($pay_amount);
        // Create item list and set array of items for the item list.
        $itemList = new ItemList();
        $itemList->setItems(array($item));
        // Create and setup the total amount.
        $amount = new Amount();
        $amount->setCurrency('USD')->setTotal($pay_amount);
        // Create a transaction and amount and description.
        $transaction = new Transaction();
        $transaction->setAmount($amount)->setItemList($itemList)
        ->setDescription('Recarga de saldo a hive-vpn.tk');
        //You can set custom data with '->setCustom($data)' or put it in a session.
        // Create a redirect urls, cancel url brings us back to current page, return url takes us to confirm payment.
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(route('confirm-payment'))
        ->setCancelUrl(url()->current());
        // We set up the payment with the payer, urls and transactions.
        // Note: you can have different itemLists, then different transactions for it.
        $payment = new Payment();
        $payment->setIntent('Sale')->setPayer($payer)->setRedirectUrls($redirect_urls)
        ->setTransactions(array($transaction));
        // Put the payment creation in try and catch in case of exceptions.
        try {
            $payment->create($this->api_context);
        } catch (PayPalConnectionException $ex){
            return back()->withError('Some error occur, sorry for inconvenient');
        } catch (Exception $ex) {
            return back()->withError('Some error occur, sorry for inconvenient');
        }
        // We get 'approval_url' a paypal url to go to for payments.
        foreach($payment->getLinks() as $link) {
            if($link->getRel() == 'approval_url') {
                $redirect_url = $link->getHref();
                break;
            }
        }
// You can set a custom data in a session
        // $request->session()->put('key', 'value');;
// We redirect to paypal tp make payment
        if(isset($redirect_url)) {
            return redirect($redirect_url);
        }
// If we don't have redirect url, we have unknown error.
        return redirect()->back()->withError('status','Ha ocurrido un error inesperado!');
    }
/**
    ** This method confirms if payment with paypal was processed successful and then execute the payment, 
    ** we have 'paymentId, PayerID and token' in query string.
    **/
    public function confirmPayment(Request $request)
    {
        // If query data not available... no payments was made.
        if (empty($request->query('paymentId')) || empty($request->query('PayerID')) || empty($request->query('token')))
            return redirect()->route('ssh-create',session('server_id'))->withError('El pago no fue exitoso.');
// We retrieve the payment from the paymentId.
        $payment = Payment::get($request->query('paymentId'), $this->api_context);
// We create a payment execution with the PayerId
        $execution = new PaymentExecution();
        $execution->setPayerId($request->query('PayerID'));
// Then we execute the payment.
        $result = $payment->execute($execution, $this->api_context);
// Get value store in array and verified data integrity
        // $value = $request->session()->pull('key', 'default');
// Check if payment is approved
        if ($result->getState() != 'approved'){
                return redirect()->back()->withError('El pago no fue exitoso.');
        }
        //Proccess a recarga
        saldo::create([
            'saldo' => session('pay_amount'),
            'user_id' => auth()->user()->id
        ]);
        //Obtiene el saldo final de su cuenta
        $getSaldo = saldo::where('user_id',auth()->user()->id)->get()->sum('saldo');
        session(['saldoDisponible' => $getSaldo]);
            
        return redirect()->back()->with('success','!!Se ha aplicado la recarga a tu cuenta!!');
            
    }
}