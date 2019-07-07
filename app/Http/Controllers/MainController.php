<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class MainController extends Controller {

	protected $helpers; //Helpers implementation
    
    public function __construct(HelperContract $h)
    {
    	$this->helpers = $h;                     
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
    {
       $user = null;
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$hd = $this->helpers->getHottestDeals();
		$na = $this->helpers->getNewArrivals();
		$bs = $this->helpers->getBestSellers();
		$hc = $this->helpers->getHotCategories();
		
    	return view('index',compact(['user','cart','c','signals','hd','na','bs','hc']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAbout()
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
    	return view('about',compact(['user','cart', 'c','signals']));
		//return redirect()->intended('/');
    }	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getBundle(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$bundleProducts = [];
		if(isset($req['q']))
		{
			$bundleProducts = $this->helpers->getDeals("bundle",$req['q']);
			$category = $this->helpers->categories[$req['q']];
		} 
        else
        {
        	$bundleProducts = $this->helpers->getDeals("bundle");
        }     
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$mainClass = "amado_product_area section-padding-100 clearfix";
		
    	return view('bundle',compact(['user','cart','bundleProducts','category','c','signals','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAuctions(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$auctions = [];
		if(isset($req['q']))
		{
			$auctions = $this->helpers->getAuctions($req['q']);
			$category = $this->helpers->categories[$req['q']];
		} 
        else
        {
        	$auctions = $this->helpers->getAuctions();
        }     
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('auctions',compact(['user','cart','auctions','category','c','signals','mainClass']));
    }
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAuction(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$auction = [];
		if(isset($req['xf']))
		{
			$auction = $this->helpers->getAuction($req['xf']);
			$category = $this->helpers->categories[$req['q']];
			
			$c = $this->helpers->categories;
		    $signals = $this->helpers->signals;
		    $mainClass = "amado_product_area section-padding-100 clearfix";
        	return view('auction',compact(['user','cart','auction','category','c','signals','mainClass']));
		} 
        else
        {
        	return redirect()->intended('auctions');
        }     
		
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTopDeals(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$topDeals = [];
		
		if(isset($req['q']))
		{
			$topDeals = $this->helpers->getDeals("deal",$req['q']);
			$category = $this->helpers->categories[$req['q']];
		} 
        else
        {
        	$topDeals = $this->helpers->getDeals("deal");
        }     
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('top-deals',compact(['user','cart','category','topDeals','c','signals','mainClass']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeals(Request $request)
    {
               $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$req = $request->all();
		$category = "";
		$deals = [];
		
		if(isset($req['q']))
		{
			$deals = $this->helpers->getDeals("deal",$req['q']);
			$category = $this->helpers->categories[$req['q']];
		} 
        else
        {
        	$deals = $this->helpers->getDeals("deal");
        }     
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$mainClass = "amado_product_area section-padding-100 clearfix";
    	return view('deals',compact(['user','cart','category','deals','c','signals','mainClass']));
    }	
	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCart()
    {
      $user = null;
	  $cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
			$cartTotals = $this->helpers->getCartTotals($cart);
		}
		else
        {    
        	return redirect()->intended('login?return=cart');
        }
        $signals = $this->helpers->signals;
		$mainClass = "cart-table-area section-padding-100";
        return view('cart',compact(['user','cart','cartTotals','signals','mainClass']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function getAddToCart(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'qty' => 'required|numeric',
                             'sku' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$req["user_id"] = $user->id; 
             $this->helpers->addToCart($req);
	        session()->flash("add-to-cart-status","ok");
			return redirect()->intended('cart');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postUpdateCart(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'quantity' => 'required|array|min:1',
                             'quantity.*' => 'required|numeric'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$quantities = $req["quantity"]; 
             $this->helpers->updateCart($cart, $quantities);
	        session()->flash("update-cart-status","ok");
			return redirect()->intended('cart');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function getRemoveFromCart(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'asf' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$asf = $req["asf"]; 
             $this->helpers->removeFromCart($user, $asf);
	        $request->session()->flash("remove-cart-status","ok");
			return redirect()->intended('cart');
         }        
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCheckout()
    {
		       $user = null;
		       $cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
			$sd = $this->helpers->getShippingDetails($user);
			$cartTotals = $this->helpers->getCartTotals($cart);
			$orderNumber = $this->helpers->generateOrderNumber("checkout");
			$states = $this->helpers->states;
		}
		else
        {
        	return redirect()->intended('login?return=checkout');
        }
        
        $signals = $this->helpers->signals;
		$mainClass = "cart-table-area section-padding-100";
        return view('checkout',compact(['user','cart','signals','cartTotals','sd','orderNumber','states','mainClass']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postCheckout(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'fname' => 'required|filled',
                             'lname' => 'required|filled',
                             'email' => 'required|email|filled',
                             'address' => 'required|filled',
                             'city' => 'required|filled',
                             'state' => 'required|not_in:none',
                             'zip' => 'required|filled',
                             'phone' => 'required|filled',
                             'terms' => 'required|accepted',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
            $stt = $this->helpers->checkout($user,$req,"kloudpay");
	        $request->session()->flash("pay-kloudpay-status",$stt);
	       
            $location = 'orders'; 
	        if($stt == 'error') $location = 'checkout'; 
	        
			return redirect()->intended($location);
         }        
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeal(Request $request)
    {
		       $user = null;
		       $deal = [];
		       $req = $request->all();
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$validator = Validator::make($req, [
                             'sku' => 'required',
         ]);
         
         if($validator->fails())
         {
             #$messages = $validator->messages();
             return redirect()->intended('deals');
         }
         
         else
         {
         	$deal = $this->helpers->getDeal($req['sku']);
             $rating = $this->helpers->getUserRating($deal,$user);
             $overallRating = $this->helpers->getRating($deal);
             $comments = $this->helpers->getComments($deal);
             $category = $this->helpers->categories[$deal['category']];
             $signals = $this->helpers->signals;
		     $mainClass = "single-product-area section-padding-100 clearfix";
             return view('deal',compact(['user','cart','category','signals','deal','rating','overallRating','comments', 'mainClass']));
         }        
		
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postRateDeal(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
                             'rating' => 'required|numeric',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
             $ret = $this->helpers->rateDeal($user, $req);
	        session()->flash("rate-deal-status",$ret);
			return redirect()->intended('deals');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postComment(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
                             'comment' => 'required',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
             $ret = $this->helpers->commentDeal($user, $req);
	        session()->flash("comment-deal-status",$ret);
			return redirect()->intended('deals');
         }        
    }
    

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAirtime()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
        return view('airtime',compact(['user','cart']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getHotels()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
        return view('hotels',compact(['user','cart']));
    }	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTravelStart()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
        return view('travelstart',compact(['user','cart']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getKloudPay()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		$signals = $this->helpers->signals;
        return view('kloudpay',compact(['user','cart','signals']));
    }
    
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getWallet()
    {
		       $user = null;
		       $wallet = [];
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
			$wallet = $this->helpers->getWallet($user);
			$transactions = $this->helpers->getTransactions($user);
			$signals = $this->helpers->signals;
		}
		
		else
        {
        	return redirect()->intended('login?return=wallet');
        }
        return view('wallet',compact(['user','cart','wallet','signals','transactions']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getKloudPayDeposit()
    {
		       $user = null;
		       $wallet = [];
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
			$wallet = $this->helpers->getWallet($user);
		}
		else
        {
        	return redirect()->intended('login?return=deposit');
        }
        return view('kloudpay-deposit',compact(['user','cart','wallet']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getKloudPayTransfer()
    {
		       $user = null;
		       $wallet = [];
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
			$wallet = $this->helpers->getWallet($user);
		}
		else
        {
        	return redirect()->intended('login?return=deposit');
        }
        return view('kloudpay-transfer',compact(['user','cart','wallet']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postKloudPayTransfer(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'phone' => 'required',
                             'amount' => 'required'                          
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
             $ret = $this->helpers->transferFunds($user, $req);
	        session()->flash("kloudpay-transfer-status",$ret);
			return redirect()->intended('kloudpay');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getKloudPayWithdraw()
    {
		       $user = null;
		       $wallet = [];
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
			$wallet = $this->helpers->getWallet($user);
			$fee = $this->helpers->getWithdrawalFee();
		}
		else
        {
        	return redirect()->intended('login?return=deposit');
        }
        return view('kloudpay-withdraw',compact(['user','cart','wallet','fee']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postKloudPayWithdraw(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'amount' => 'required'                          
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
             $ret = $this->helpers->withdrawFunds($user, $req);
	        session()->flash("kloudpay-withdraw-status",$ret);
			return redirect()->intended('kloudpay');
         }        
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOrders()
    {
		       $user = null;
		       $orders = [];
		       $cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$orders = $this->helpers->getOrders($user);
			$cart = $this->helpers->getCart($user);
			$signals = $this->helpers->signals;
		}
		else
        {
        	return redirect()->intended('login?return=orders');
        }
        return view('orders',compact(['user','cart','orders','signals']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getInvoice(Request $request)
    {
		       $user = null;
		       $invoice = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$req = $request->all();
			$validator = Validator::make($req, [
                             'on' => 'required',
             ]);
         
            if($validator->fails())
             {
                #$messages = $validator->messages();
                return redirect()->intended('orders');
            }
            else
            {
                $invoice = $this->helpers->getUserInvoice($user,$req['on']);
                $alertClass = "success";
                $sd = $this->helpers->getShippingDetails($user);
                $alert = false; 
                $alertText = "";
                  
                if($invoice == []):
                  $alert = true; 
                  $alertClass = "warning";
                  $alertText = "Invalid order number. Please check the number and try again.";
                endif; 
                return view('invoice',compact(['user','invoice','sd', 'alert', 'alertClass','alertText']));
            }         
		}
		else
        {
        	return redirect()->intended('login?return=orders');
        }
        
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getEnterprise()
    {
		       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
		}
		$mainClass = "cart-table-area section-padding-100";
        return view('enterprise',compact(['user','mainClass']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getFAQ()
    {
		       $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
        return view('faq',compact(['user','cart']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDashboard()
    {
		       $user = null;
		       $dashboard = [];
		       $cart = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			//$dashboard = $this->helpers->getDashboard($user);
			$transactions = $this->helpers->getTransactions($user);
			$cart = $this->helpers->getCart($user);
			$signals = $this->helpers->signals;
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
		
		
        return view('dashboard',compact(['user','cart','transactions','signals']));
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTransactions()
    {
		       $user = null;
		       $transactions = [];
		       $cart = [];
		
		if(Auth::check())
		{
			$user = Auth::user();
			$transactions = $this->helpers->getTransactions($user);
			$cart = $this->helpers->getCart($user);
		}
		else
        {
        	return redirect()->intended('login?return=transactions');
        }
		
        return view('transactions',compact(['user','cart','transactions']));
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postAddAccount(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
		}
		else
        {
        	return redirect()->intended('/');
        }
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'initial_balance' => 'required',
                             'account_number' => 'required',
                             'last_deposit_name' => 'required',
                             'last_deposit' => 'required',
                             'balance' => 'required',
                             'address' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$req["user_id"] = $user->id; 
             $this->helpers->createBankAccount($req);
	        session()->flash("add-account-status","ok");
			return redirect()->intended('dashboard');
         }        
    }
	
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getZoho()
    {
        $ret = "1535561942737";
    	return $ret;
    }


}
