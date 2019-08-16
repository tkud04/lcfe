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
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
    	return view('index',compact(['user','cart','signals','stockChunks']));
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

		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
		$bios = $this->helpers->bios;
		$leadership = $this->helpers->leadership;
    	return view('about',compact(['user','cart','signals','stockChunks','bios','leadership']));
		//return redirect()->intended('/');
    }	

	
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getGallery()
    {
         $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
		
    	return view('gallery',compact(['user','cart','signals','stockChunks']));
    }	

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getPaid()
    {
         $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
		
    	return view('paid',compact(['user','cart','signals','stockChunks']));
    }	


	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getServices()
    {
         $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
		
    	return view('services',compact(['user','cart','signals','stockChunks']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getMission()
    {
         $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
		
    	return view('mission',compact(['user','cart','signals','stockChunks']));
    }

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getContact()
    {
         $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
		
    	return view('contact',compact(['user','cart','signals','stockChunks']));
    }
		/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
    public function postContact(Request $request)
    {
		$user = null;
		
    	if(Auth::check())
		{
			$user = Auth::user();
		}

        $req = $request->all();
        #dd($req);
        
        $validator = Validator::make($req, [
                             'name' => 'required',
                             'email' => 'required|email',
                             'message' => 'required'
         ]);
         
         if($validator->fails())
         {
             $messages = $validator->messages();
             return redirect()->back()->withInput()->with('errors',$messages);
             //dd($messages);
         }
         
         else
         {
            $this->helpers->sendMessage($req);
	        session()->flash("contact-status","ok");
			return redirect()->intended('contact');
         }        
    }
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getStocks()
    {
         $user = null;
		
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$stocks = $this->helpers->getStocks();
		//dd($stocks);
    	return view('contact',compact(['user','cart','signals']));
    }

	
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDownload()
    {
		$fullPath = 'account.pdf';
		
        if($fullPath) {
            $fsize = filesize($fullPath);
            $path_parts = pathinfo($fullPath);
            $ext = strtolower($path_parts["extension"]);
            switch ($ext) {
                case "pdf":
                header("Content-Disposition: attachment; filename=\"".$path_parts["basename"]."\""); // use 'attachment' to force a download
                header("Content-type: application/pdf"); // add here more headers for diff. extensions
                break;
                default;
                header("Content-type: application/octet-stream");
                header("Content-Disposition: filename=\"".$path_parts["basename"]."\"");
            }
            if($fsize) {//checking if file size exist
              header("Content-length: $fsize");
            }
			
			readfile($fullPath);
		}  
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getResourceCenter()
    {
       $user = null;
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
    	return view('rc',compact(['user','cart','signals','stockChunks']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getResource()
    {
       $user = null;
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
    	return view('rc-single',compact(['user','cart','signals','stockChunks']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getLibrary()
    {
       $user = null;
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
    	return view('library',compact(['user','cart','signals','stockChunks']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getLibraryItem()
    {
       $user = null;
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
    	return view('library-single',compact(['user','cart','signals','stockChunks']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getDashboard()
    {
       $user = null;
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
    	return view('dashboard',compact(['user','cart','signals','stockChunks']));
    }
    
    /**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getProfile()
    {
       $user = null;
		$cart = [];
		if(Auth::check())
		{
			$user = Auth::user();
			$cart = $this->helpers->getCart($user);
		}
		
		$signals = $this->helpers->signals;
		$stockChunks = $this->helpers->getStockChunks();
    	return view('profile',compact(['user','cart','signals','stockChunks']));
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