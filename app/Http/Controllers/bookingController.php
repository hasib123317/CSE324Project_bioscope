<?php

namespace App\Http\Controllers;

use Auth;
use	Config;
use Session;

use App\User;
use App\Shows;
use App\Hall;
use App\Booking;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
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

class bookingController extends Controller
{
    private $_api_context;

    public function __construct()
    {
        // setup PayPal api context
        $paypal_conf = Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    
	public function startBookingProcess($movie, $date, $hallId)
	{
		if(Auth::check()){
			$hallprice = array();
			$hall = Hall::find($hallId)->first();
			$hallprice['premium'] = $hall->premium_ticket_price;
			$hallprice['regular'] = $hall->regular_ticket_price;
			
			return view('/booking', [ 'showTimes' => Shows::bookingData($movie, $date, $hallId), 'hallprice' => $hallprice , 'movie' => $movie , 'date' => $date , 'hall' => $hallId ] );
		}
		else{
			return redirect('/login');
		}
	}

	public function postPayment(Request $request)
	{
		$this->validate($request, [
    		'optradio' => 'required',
    	]);

		Session::put('show_id', Shows::getIdByDateTimeHall($request->get('date'), $request->get('hall'), $request->get('time'))[0]->id);
		Session::put('ticketPrice', $request->get('ticketPrice'));

		$payer = new Payer();
		$payer->setPaymentMethod('paypal');
		
		$item = new Item();
		$amount = new Amount();

		if($request->get('optradio') == 'premium'){
			$item->setName('Premium class ticket')
				->setCurrency('USD')
				->setQuantity(1)
				->setPrice($request->get('ticketPrice'));	
				
			$amount->setCurrency('USD')
		    	->setTotal($request->get('ticketPrice'));
		}
		else{
			$item->setName('Regular class ticket')
				->setCurrency('USD')
				->setQuantity(1)
				->setPrice($request->get('ticketPrice'));
			
			$amount->setCurrency('USD')
		    	->setTotal($request->get('ticketPrice'));
		}
		
		$item_list = new ItemList();
		$item_list->setItems(array($item));
		
		$transaction = new Transaction();
		$transaction->setAmount($amount)
		    ->setItemList($item_list)
		    ->setDescription('Your transaction description');

		$redirect_urls = new RedirectUrls();
		$redirect_urls->setReturnUrl(URL::route('payment.status'))
		    ->setCancelUrl(URL::route('payment.status'));

		$payment = new Payment();
		$payment->setIntent('Sale')
		    ->setPayer($payer)
		    ->setRedirectUrls($redirect_urls)
		    ->setTransactions(array($transaction));

		try {
		    $payment->create($this->_api_context);
		} catch (\PayPal\Exception\PPConnectionException $ex) {
		    if (\Config::get('app.debug')) {
		        echo "Exception: " . $ex->getMessage() . PHP_EOL;
		        $err_data = json_decode($ex->getData(), true);
		        exit;
		    } else {
		        die('Some error occur, sorry for inconvenient');
		    }
		}

		foreach($payment->getLinks() as $link) {
		    if($link->getRel() == 'approval_url') {
		        $redirect_url = $link->getHref();
		        break;
		    }
		}

		// add payment ID to session
		Session::put('paypal_payment_id', $payment->getId());

		if(isset($redirect_url)) {
		    // redirect to paypal
		    return Redirect::away($redirect_url);
		}

		return Redirect::route('/booking')->with('error', 'Unknown error occurred');
	}

	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = Session::get('paypal_payment_id');

		// clear the session payment ID
		Session::forget('paypal_payment_id');

		if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {
		    return redirect('/')
		        ->with('error', 'Payment failed');
		}

		$payment = Payment::get($payment_id, $this->_api_context);

		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(Input::get('PayerID'));
		
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);

		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		
		if ($result->getState() == 'approved') { // payment made
			$booking = new Booking();
			$booking->user_id =  Auth::user()->id;
			$booking->show_id = Session::get('show_id');
			$booking->booking_date = "'".date('Y-m-d h:i:s')."'";
			$booking->price = Session::get('ticketPrice');
			$booking->payment_id = "'".Input::get('paymentId')."'";
			$booking->payer_id = "'".Input::get('PayerID')."'";
			$booking->token = "'".Input::get('token')."'";
			$booking->save();

			$show = Shows::find($booking->show_id);
			$show->available_seat = $show->available_seat-1;
			$show->save(); 

			$user = User::find(Auth::user()->id)->first();
			$user->book_count = $user->book_count+1;
			$user->save();
		    return redirect(url('/week-schedule'))
		        ->with('success', 'Payment success');
		}
		return redirect('/')
		    ->with('error', 'Payment failed');
	}
}

