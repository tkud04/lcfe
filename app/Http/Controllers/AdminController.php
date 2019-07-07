<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Helpers\Contracts\HelperContract; 
use Auth;
use Session; 
use Validator; 
use Carbon\Carbon; 

class AdminController extends Controller {

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
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('admin?return=cobra');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$transactions = $this->helpers->adminGetTransactions();
		$deals = $this->helpers->adminGetDeals();
		$auctions = $this->helpers->adminGetAuctions();
		$adminStats = $this->helpers->adminGetStats();
		$adminRecentOrders = $this->helpers->adminGetOrders();
		$adminRecentTransactions = $this->helpers->adminGetTransactions();
    	return view('admin.index',compact(['user','c','signals','transactions','deals','auctions','adminStats','adminRecentOrders','adminRecentTransactions']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getUsers()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$users = $this->helpers->adminGetUsers();
    	return view('admin.users',compact(['users','user','c','signals']));
    }	
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getUser(Request $request)
    {
       $user = null;
       $account = null; 
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
            $req = $request->all();
           //dd($req);
          $em = (isset($req['email'])) ? $req['email'] : null; 
           
         $c = $this->helpers->categories;
         $signals = $this->helpers->signals;
		$account = $this->helpers->getUser($em); 
    	return view('admin.user',compact(['account','user','c','signals']));
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
    }	
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postUser(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'fname' => 'required',
                             'lname' => 'required',
                             'email' => 'required',
                             'phone' => 'required',
                             'role' => 'required|not_in:none',
                             'status' => 'required|not_in:none',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $this->helpers->updateUser($req);
	        session()->flash("cobra-user-status","ok");
			return redirect()->intended('cobra-users');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeals()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$deals = $this->helpers->adminGetDeals();
    	return view('admin.deals',compact(['user','c','signals','deals']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDeal(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$req = $request->all();
           //dd($req);
        $sku = (isset($req['sku'])) ? $req['sku'] : null; 
        
        if($sku == null) 
        {
        	session()->flash("cobra-deal-status","error");
            return redirect()->intended('cobra-deals');
        }
        else
        {
        	$deal = $this->helpers->adminGetDeal($sku);
    	    return view('admin.deal',compact(['user','c','deal']));
        }
		
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAddDeal()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		#$deals = $this->helpers->adminGetDeals();
    	return view('admin.add-deal',compact(['user','c']));
    }
    
       /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postDeal(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'name' => 'required',
                             'sku' => 'required',
                            # 'type' => 'required',
                             'category' => 'required|not_in:none',
                             'description' => 'required',
                             'amount' => 'required|numeric',
                             'in_stock' => 'required|not_in:none',
                             'status' => 'required|not_in:none',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $this->helpers->updateDeal($req);
	        session()->flash("cobra-deal-status","ok");
			return redirect()->intended('cobra-deals');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postAddDeal(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'name' => 'required',
                             'type' => 'required',
                             'category' => 'required',
                             'description' => 'required',
                             'amount' => 'required|numeric',
                             'images' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $this->helpers->createDeal($req);
	        session()->flash("add-deal-status","ok");
			return redirect()->intended('cobra-deals');
         }        
    }
    
     /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getFundWallet(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');	

            $req = $request->all();
            $em = (isset($req['xf'])) ? $req['xf'] : ""; 
		    $c = $this->helpers->categories;
		   
       	return view('admin.fund-wallet',compact(['user','c','em']));	
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postFundWallet(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
                             'type' => 'required',
                             'amount' => 'required|numeric'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$req["email"] = $req["xf"]; 
             $this->helpers->fundWallet($req);
	        session()->flash("fund-wallet-status","ok");
			return redirect()->intended('cobra-users');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAuctions()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$auctions = $this->helpers->adminGetAuctions();
    	return view('admin.auctions',compact(['user','c','signals','auctions']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAuction(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back();
             //dd($messages);
         }
         
         else
         {
             $auction = $this->helpers->adminGetAuction($req['xf']);
             if($auction == [])
             {
             	return redirect()->back();
             }
             else
             {
             	return view('admin.auction',compact(['user','auction']));
             }        
         }        
    }
    
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAddAuction(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back();
             //dd($messages);
         }
         
         else
         {
             $deal = $this->helpers->getDeal($req['xf']);
             if($deal == [])
             {
             	return redirect()->back();
             }
             else
             {
             	return view('admin.add-auction',compact(['user','deal']));
             }        
         }           	
    }
    
        /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function postAddAuction(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
                             'days' => 'required',
                             'hours' => 'required',
                             'minutes' => 'required',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	$req['deal_id'] = $req['xf'];
             $ret = $this->helpers->createAuction($req);
	        session()->flash("create-auction-status",$ret);
			return redirect()->intended('cobra-auctions');
         }        	
    }
    
     /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getEndAuction(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back();
             //dd($messages);
         }
         
         else
         {
             #$req["uid"] = $user->id; 
             $ret = $this->helpers->adminEndAuction($req);
	        session()->flash("cobra-end-auction-status",$ret);
			return redirect()->intended('cobra-auctions');
         }           	
    }

/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getTransactions()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$transactions = $this->helpers->adminGetTransactions();
    	return view('admin.transactions',compact(['user','c','transactions']));
    }

    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getInvoice()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$invoice = null; 
    	return view('admin.invoice',compact(['user','c','invoice']));
    }


    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOrders()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$orders = $this->helpers->adminGetOrders(); 
    	return view('admin.orders',compact(['user','c','signals','orders']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getOrder(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
			$validator = Validator::make($req, [
                             'on' => 'required',
             ]);
         
            if($validator->fails())
             {
                #$messages = $validator->messages();
                return redirect()->intended('cobra-orders');
            }
		$c = $this->helpers->categories;
		$order = $this->helpers->adminGetOrder($req['on']); 
    	return view('admin.order',compact(['user','c','order']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postOrder(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'email' => 'required',
                             'type' => 'required',
                             'amount' => 'required|numeric'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $this->helpers->fundWallet($req);
	        session()->flash("fund-wallet-status","ok");
			return redirect()->intended('cobra-users');
         }        
    }
    

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getRC()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$ratings = $this->helpers->adminGetRatings();
		$comments = $this->helpers->adminGetComments();
    	return view('admin.rc',compact(['user','c','signals','ratings','comments']));
    }
	
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getAddCoupon()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
    	return view('admin.add-coupon',compact(['user','c']));
    }
    
    public function postAddCoupon(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'code' => 'required',
                             'discount' => 'required|numeric',
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $this->helpers->createCoupon($req);
	        session()->flash("add-coupon-status","ok");
			return redirect()->intended('cobra-coupons');
         }        
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCoupon(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
		$validator = Validator::make($req, [
                             'xf' => 'required|numeric'
         ]);
         
         if($validator->fails())
         {
             #$messages = $validator->messages();
             return redirect()->intended('cobra-coupons');
         }
         
         else
         {             
			 $c = $this->helpers->categories;
		     $coupon = $this->helpers->adminGetCoupon($req['xf']);
         	return view('admin.coupon',compact(['user','c','coupon']));
         }        
    }	
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postCoupon(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
                             'code' => 'required',
                             'discount' => 'required',
                             'status' => 'required|not_in:none'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $ret = $this->helpers->updateCoupon($req);
	        session()->flash("cobra-coupon-status",$ret);
			return redirect()->intended('cobra-coupons');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getCoupons()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$coupons = $this->helpers->adminGetCoupons();
    	return view('admin.coupons',compact(['user','coupons','c','signals']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getComments()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$signals = $this->helpers->signals;
		$comments = $this->helpers->adminGetComments();
    	return view('admin.comments',compact(['user','c','comments','signals']));
    }
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getComment(Request $request)
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
		$validator = Validator::make($req, [
                             'id' => 'required|numeric'
         ]);
         
         if($validator->fails())
         {
             #$messages = $validator->messages();
             return redirect()->intended('cobra-comments');
         }
         
         else
         {             
			 $c = $this->helpers->categories;
		     $comment = $this->helpers->adminGetComment($req['id']);
         	return view('admin.comment',compact(['user','c','comment']));
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
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'xf' => 'required',
                             'comment' => 'required',
                             'status' => 'required|not_in:none'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $ret = $this->helpers->updateComment($req);
	        session()->flash("cobra-comment-status",$ret);
			return redirect()->intended('cobra-comments');
         }        
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getWithdrawals()
    {
       $user = null;
		
		if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
		$c = $this->helpers->categories;
		$withdrawals = $this->helpers->getWithdrawals();
		$signals = $this->helpers->signals;
    	return view('admin.withdrawals',compact(['user','c','withdrawals','signals']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function getApproveWithdrawal(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'ff' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $ret = $this->helpers->approveWithdrawal($req);
	        session()->flash("cobra-approve-withdrawal-status",$ret);
			return redirect()->intended('cobra-withdrawals');
         }        
    }

    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function getApproveRating(Request $request)
    {
    	if(Auth::check())
		{
			$user = Auth::user();
            if(!$this->helpers->isAdmin($user)) return redirect()->intended('dashboard');		
		}
		else
        {
        	return redirect()->intended('login?return=dashboard');
        }
        
        $req = $request->all();
        //dd($req);
        
        $validator = Validator::make($req, [
                             'ax' => 'required',
							 'id' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
         	#$req["user_id"] = $user->id; 
             $ret = $this->helpers->approveRating($req);
	        session()->flash("cobra-approve-rating-status",$ret);
			return redirect()->intended('cobra-rc');
         }        
    }
    
    

}
