<?php
namespace App\Helpers;

use App\Helpers\Contracts\HelperContract; 
use Crypt;
use Carbon\Carbon; 
use Mail;
use Auth;
use \Swift_Mailer;
use \Swift_SmtpTransport;
use App\User;
use App\Carts;
use App\ShippingDetails;
use App\BankAccounts;
use App\Wallet;
use App\Transactions;
use App\Deals;
use App\DealData;
use App\DealImages;
use App\Auctions;
use App\Bids;
use App\Ratings;
use App\Comments;
use App\Coupons;
use App\Orders;
use App\OrderDetails;
use App\Settings;
use App\Withdrawals;

class Helper implements HelperContract
{
	   public $transferLimit = 201000;
	
   	public $categories= [
			                       "phones-tablets" => "Phones & Tablets",
			                       "tv-electronics" => "TV & Electronics",
								   "fashion" => "Fashion",
								   "computers" => "Computers",
								   "groceries" => "Groceries",
								   "unique-bundles" => "Unique Bundles",
								   "health-beauty" => "Health & Beauty",
								   "home-office" => "Home & Office",
								   "babies-kids-toys" => "Babies, Kids & Toys",
								   "games-consoles" => "Games & Consoles",
								   "watches-sunglasses" => "Watches & Sunglasses",
								   "others" => "Other Categories"
			];  
			
			public $states = [
			                       'abia' => 'Abia',
			                       'adamawa' => 'Adamawa',
			                       'akwa-ibom' => 'Akwa Ibom',
			                       'anambra' => 'Anambra',
			                       'bauchi' => 'Bauchi',
			                       'bayelsa' => 'Bayelsa',
			                       'benue' => 'Benue',
			                       'borno' => 'Borno',
			                       'cross-river' => 'Cross River',
			                       'delta' => 'Delta',
			                       'ebonyi' => 'Ebonyi',
			                       'enugu' => 'Enugu',
			                       'edo' => 'Edo',
			                       'ekiti' => 'Ekiti',
			                       'gombe' => 'Gombe',
			                       'imo' => 'Imo',
			                       'jigawa' => 'Jigawa',
			                       'kaduna' => 'Kaduna',
			                       'kano' => 'Kano',
			                       'katsina' => 'Katsina',
			                       'kebbi' => 'Kebbi',
			                       'kogi' => 'Kogi',
			                       'kwara' => 'Kwara',
			                       'lagos' => 'Lagos',
			                       'nasarawa' => 'Nasarawa',
			                       'niger' => 'Niger',
			                       'ogun' => 'Ogun',
			                       'ondo' => 'Ondo',
			                       'osun' => 'Osun',
			                       'oyo' => 'Oyo',
			                       'plateau' => 'Plateau',
			                       'rivers' => 'Rivers',
			                       'sokoto' => 'Sokoto',
			                       'taraba' => 'Taraba',
			                       'yobe' => 'Yobe',
			                       'zamfara' => 'Zamfara',
			                       'fct' => 'FCT'  
			];         

            public $emailConfig = [
                           'ss' => 'smtp.gmail.com',
                           'se' => 'mails4davidslogan@gmail.com',
                           'sp' => '587',
                           'su' => 'mails4davidslogan@gmail.com',
                           'spp' => 'disenado12345',
                           'sa' => 'yes',
                           'sec' => 'tls'
                       ];     
                        
             public $signals = ['okays'=> ["login-status" => "Sign in successful",
                     "cobra-deal-status" => "Deal updated.",
                     "cobra-user-status" => "User info updated.",
                     "cobra-comment-status" => "Comment updated.",
                     "cobra-coupon-status" => "Coupon updated.",
                     "cobra-approve-rating-status" => "User rating updated.",
                     "forgot-password-status" => "A link to reset your password has been sent to your email.",
                     "cobra-forgot-password-status" => "A link to reset your password has been sent to your email.",
                     "reset-status" => "Password updated! You can now login.",
                     "add-deal-status" => "Deal added!",
                     "add-coupon-status" => "Coupon added!",
                     "rate-deal-status" => "Thank you for your input!",
                     "comment-deal-status" => "Thank you, your comment has been sent. ",
                     "remove-cart-status" => "Deal removed from cart.",
                     "kloudpay-withdraw-status" => "Withdrawal request has been submitted and is pending review",
                     "kloudpay-transfer-status" => "Transfer successful!",
                     "cobra-approve-withdrawal-status" => "Withdrawal request approved. Go to PayStack Dashboard to make the transfer",
                     "cobra-auction-status" => "New auction created!",
                     "cobra-end-auction-status" => "Auction ended! Deal has been added to the highest bidder's cart",
                     ],
                     'errors'=> ["login-status-error" => "There was a problem signing in, please contact support.",
                     "cobra-user-status-error" => "There was an error updating info for this user. Please try again.",
                     "cobra-deal-status-error" => "There was an error updating this deal. Please try again.",
                     "kloudpay-withdraw-status-error" => "Insufficient funds in KloudPay wallet",
                     "comment-deal-status-error" => "There was an error submitting your comment. Please try again. ",
                     "rate-deal-status-error" => "There was an error submitting your rating. Please try again. ",
                     "cobra-auction-status-error" => "There was an error creating the auction. Please try again.",
                     "cobra-end-auction-status-error" => "There were no bidders for this auction.",
                     "kloudpay-transfer-status-error" => "Transfer request denied. This could be because you have insufficient funds or the transfer amount has exceeded our limit of &#8358;200,000.00"]
                   ];
          /**
           * Sends an email(blade view or text) to the recipient
           * @param String $to
           * @param String $subject
           * @param String $data
           * @param String $view
           * @param String $image
           * @param String $type (default = "view")
           **/
           function sendEmail($to,$subject,$data,$view,$type="view")
           {
                   if($type == "view")
                   {
                     Mail::send($view,$data,function($message) use($to,$subject){
                           $message->from('info@worldlotteryusa.com',"Admin");
                           $message->to($to);
                           $message->subject($subject);
                          if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
						  $message->getSwiftMessage()
						  ->getHeaders()
						  ->addTextHeader('x-mailgun-native-send', 'true');
                     });
                   }

                   elseif($type == "raw")
                   {
                     Mail::raw($view,$data,function($message) use($to,$subject){
                           $message->from('info@worldlotteryusa.com',"Admin");
                           $message->to($to);
                           $message->subject($subject);
                           if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
                     });
                   }
           }    

          function sendEmailSMTP($data,$view,$type="view")
           {
           	    // Setup a new SmtpTransport instance for new SMTP
                $transport = "";
if($data['sec'] != "none") $transport = new Swift_SmtpTransport($data['ss'], $data['sp'], $data['sec']);

else $transport = new Swift_SmtpTransport($data['ss'], $data['sp']);

   if($data['sa'] != "no"){
                  $transport->setUsername($data['su']);
                  $transport->setPassword($data['spp']);
     }
// Assign a new SmtpTransport to SwiftMailer
$smtp = new Swift_Mailer($transport);

// Assign it to the Laravel Mailer
Mail::setSwiftMailer($smtp);

$se = $data['se'];
$sn = $data['sn'];
$to = $data['em'];
$subject = $data['subject'];
                   if($type == "view")
                   {
                     Mail::send($view,$data,function($message) use($to,$subject,$se,$sn){
                           $message->from($se,$sn);
                           $message->to($to);
                           $message->subject($subject);
                          if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
						  $message->getSwiftMessage()
						  ->getHeaders()
						  ->addTextHeader('x-mailgun-native-send', 'true');
                     });
                   }

                   elseif($type == "raw")
                   {
                     Mail::raw($view,$data,function($message) use($to,$subject,$se,$sn){
                            $message->from($se,$sn);
                           $message->to($to);
                           $message->subject($subject);
                           if(isset($data["has_attachments"]) && $data["has_attachments"] == "yes")
                          {
                          	foreach($data["attachments"] as $a) $message->attach($a);
                          } 
                     });
                   }
           }    

           function createUser($data)
           {
           	$ret = User::create(['fname' => $data['fname'], 
                                                      'lname' => $data['lname'], 
                                                      'email' => $data['email'], 
                                                      'phone' => $data['phone'], 
                                                      'role' => $data['role'], 
                                                      'status' => $data['status'], 
                                                      'password' => bcrypt($data['pass']), 
                                                      ]);
                                                      
                return $ret;
           }
           function createShippingDetails($data)
           {
           	$ret = ShippingDetails::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'company' => "", 
                                                      'zipcode' => "",                                                      
                                                      'address' => "", 
                                                      'city' => "", 
                                                      'state' => "", 
                                                      ]);
                                                      
                return $ret;
           }
           
           function createBankAccount($data)
           {
           	$ret = BankAccounts::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'bank' => $data['bank'],
                                                      'acname' => $data['acname'],                                                     
                                                      'acnum' => $data['acnum']
                                                      ]);
                                                      
                return $ret;
           }
           
           function addToCart($data)
           {
           	$ret = Carts::create(['user_id' => $data['user_id'],
                                          'sku' => $data['sku'],  
                                          'qty' => $data['qty'],                                                                          
                                         ]);
                                                      
                return $ret;
           }
           
           function createWallet($data)
           {
           	$ret = Wallet::create(['user_id' => $data['user_id'], 
                                                      'balance' => "0",                                                                                                            
                                                      ]);                                                     
                return $ret;
           }		
           function createDeal($data)
           {
           	$sku = $this->generateSKU();
               $type = isset($data['type']) ? $data['type'] : "deal";
               
           	$ret = Deals::create(['name' => $data['name'],                                                                                                          
                                                      'sku' => $sku, 
                                                      'type' => $type,  
                                                      'category' => $data['category'], 
                                                      'status' => "active", 
                                                      'rating' => "0", 
                                                      'deadline' => "", 
                                                      ]);
                                                      
                 $data['sku'] = $ret->sku;                         
                $dealData = $this->createDealData($data);
                $images = explode(",",$data['images']); 
                foreach($images as $i) $this->createDealImage(['sku' => $data['sku'], 'url' => $i]);
                return $ret;
           }
           function createDealData($data)
           {
           	$ret = DealData::create(['sku' => $data['sku'],                                                                                                          
                                                      'description' => $data['description'], 
                                                      'amount' => $data['amount'],                                                      
                                                      'in_stock' => "yes", 
                                                      'min_bid' => isset($data['min_bid']) ? $data['min_bid'] : "0"                                                  
                                                      ]);
                                                      
                return $ret;
           }
         
           function createDealImage($data)
           {
           	$ret = DealImages::create(['sku' => $data['sku'],                                                                                                          
                                                      'url' => $data['url'], 
                                                      ]);
                                                      
                return $ret;
           }
           function createAuction($data)
           {
           	$ret = Auctions::create(['deal_id' => $data['deal_id'],                                                                                                          
                                                      'days' => $data['days'], 
                                                      'hours' => $data['hours'],                                                    
                                                      'minutes' => $data['minutes'], 
                                                      'status' => "live", 
                                                      'bids' => "0", 
                                                      ]);
                                                      
                return $ret;
           }
           function createBid($data)
           {
           	$ret = Bids::create(['deal_id' => $data['deal_id'],                                                                                                          
                                                      'user_id' => $data['user_id'], 
                                                      'amount' => $data['amount'],                                                    
                                                      ]);
                                                      
                return $ret;
           }
           function createTransaction($data)
           {
           	$ret = Transactions::create(['description' => $data['description'],                                                                                                          
                                                      'type' => $data['type'], 
                                                      'user_id' => $data['user_id'],
                                                      'amount' => $data['amount'],
                                                      ]);
                                                      
                return $ret;
           }
           
           function createOrder($data)
           {
           	$ref = (isset($data['reference'])) ? $data['reference'] : "none"; 
               $ref = (isset($data['comment'])) ? $data['comment'] : ""; 
           	$ret = Orders::create(['number' => $this->generateOrderNumber($data['type']),                                                                                                          
                                                      'user_id' => $data['user_id'], 
                                                      'total' => $data['total'],
                                                      'reference' => $ref,
                                                      'comment' => $data['comment'],
                                                      'status' => 'active'
                                                      ]);
                                                      
                return $ret;
           }
           
           function createOrderDetails($data)
           {
           	$ret = OrderDetails::create(['order_id' => $data['order_id'],                                                                                                          
                                                      'deal_id' => $data['deal_id'], 
                                                      'qty' => $data['qty']
                                                      ]);
                                                      
                return $ret;
           }
           
           function createRating($data)
           {
           	$ret = Ratings::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'deal_id' => $data['deal_id'], 
                                                      'stars' => $data['stars'],
                                                      'status' => $data['status'],
                                                      ]);
                                                      
                return $ret;
           }
           
           function createComment($data)
           {
           	$ret = Comments::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'deal_id' => $data['deal_id'], 
                                                      'comment' => $data['comment'],
                                                      'status' => $data['status'],
                                                      ]);
                                                      
                return $ret;
           }
           
           function createCoupon($data)
           {
           	$ret = Coupons::create(['code' => $data['code'],                                                                                                          
                                                      'discount' => $data['discount'], 
                                                      'status' => "pending"
                                                      ]);
                                                      
                return $ret;
           }  
           
           function addSettings($data)
           {
           	$ret = Settings::create(['item' => $data['item'],                                                                                                          
                                                      'value' => $data['value'], 
                                                      ]);
                                                      
                return $ret;
           }
           
           function createWithdrawal($data)
           {
           	$ret = Withdrawals::create(['user_id' => $data['user_id'],                                                                                                          
                                                      'amount' => $data['amount'], 
                                                      'status' => 'pending',
                                                      ]);
                                                      
                return $ret;
           }

           function generateSKU()
           {
           	$ret = "KTK".rand(999,99999)."LD".rand(999,9999);
                                                      
                return $ret;
           }
           
           function generateOrderNumber($type)
           {
           	$tt = '';
               if($tt == 'checkout') $tt = 'CKT'; 
               else if($tt == 'deposit') $tt = 'DPT'; 
           	$ret = $tt.rand(1,999)."KLD".rand(29,4999).rand(date("md"),99999);
                                                      
                return $ret;
           }               
           
           function getDeadline($baseTimeStamp,$offset)
           {
           	$ret = null; 
               if(count($offset) > 0){$ret = baseTimeStamp; }
               
               if($ret != null){
               	
               if(isset($offset['days']) && $offset['days'] > 0)
               {
                    $ret->addDays($offset['days']);
               }
               if(isset($offset['hours']) && $offset['hours'] > 0)
               {
                    $ret->addHours($offset['hours']);
               }
               if(isset($offset['minutes']) && $offset['minutes'] > 0)
               {
                    $ret->addMinutes($offset['minutes']);
               }
               
               }
                return $ret;
           }
             
           function getDeals($category,$q="")
           {
           	$ret = [];
               $deals = null; 
           	if($q == "") $deals = Deals::where('type',$category)->get();
               else $deals = Deals::where('type',$category)->where('category',$q)->get();
 
              if($deals != null)
               {
               	foreach($deals as $d)
                   {
                   	$temp = [];
                   	$temp['id'] = $d->id; 
                       $temp['images'] = $this->getDealImages($d->sku);    
                       $temp['data'] = $this->getDealData($d->sku);
                   	$temp['name'] = $d->name; 
                   	$temp['sku'] = $d->sku; 
                   	$temp['type'] = $d->type; 
                   	$temp['category'] = $d->category; 
                   	$temp['status'] = $d->status; 
                   	$temp['rating'] = $d->rating;
                       if($temp['type'] == "auction")
                       {
                       	$a = $this->getAuction($d->id);
                           if(count($a) > 0)
                           {                         	
                       	   $offset = ['hours' => $a['hours'],
                                             'minutes' => $a['minutes'], 
                                             'days' => $a['days']
                                            ];
                       	   $did = $this->getDeadline($d->created_at,$offset);
                              $temp['deadline'] = ($did == null) ? "" : $did->format("js F, Y h:i A");                          
                           }
                      }
                       
                       array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }		   
           
           function getDealData($sku)
           {
           	$ret = [];
               $dealData = DealData::where('sku',$sku)->first();
 
              if($dealData != null)
               {
               	$ret['id'] = $dealData->id; 
                   $ret['description'] = $dealData->description; 
                   $ret['amount'] = $dealData->amount; 
                   $ret['in_stock'] = $dealData->in_stock; 
                   $ret['min_bid'] = $dealData->min_bid; 
               }                                 
                                                      
                return $ret;
           }		   
           
           function getDealImages($sku)
           {
           	$ret = [];
               $img = DealImages::where('sku',$sku)->get();
 
              if($img != null)
               {
               	foreach($img as $i)
                   {
                   	$temp = [];
                   	$temp['id'] = $i->id; 
                   	$temp['url'] = $i->url; 
                       array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }	
         
           function getCart($user)
           {
           	$ret = [];
               $cart = Carts::where('user_id',$user->id)->get();
 
              if($cart != null)
               {
               	foreach($cart as $c) 
                    {
                    	$temp = [];
               	     $temp['id'] = $c->id; 
                        $temp['deal'] = $this->getDeal($c->sku);
                        $temp['qty'] = $c->qty; 
                        array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }		
          function getCartTotals($cart)
           {
           	$ret = ["subtotal" => 0, "delivery" => 0, "total" => 0, "md" => []];
               $md = ['order-id' => $this->generateOrderNumber("checkout"),
                         ];
               $mmd = '';
               
              if($cart != null && count($cart) > 0)
               {           	
               	foreach($cart as $c) 
                    {
                    	$deal = $c['deal'];
                       $amount = $deal['data']['amount'];
               	     $qty = $c['qty']; 
                        $mmd .= $deal['name']." x".$qty."<br>";
               
                        $ret['subtotal'] += ($amount * $qty);
                   }
                   
                   $md["items"] = $mmd;
                   $ret["md"] = $md;
                   $ret['delivery'] = 5000;
                   $ret['total'] = $ret['subtotal'] + $ret['delivery'];
               }                                 
                                                      
                return $ret;
           }	
	       function updateCart($cart, $quantities)
           {
           	#$ret = ["subtotal" => 0, "delivery" => 0, "total" => 0];
              
              if($cart != null && count($cart) > 0)
               {
               	for($c = 0; $c < count($quantities); $c++) 
                    {
                    	$ccc = $cart[$c];
                    	$cc = Carts::where('id', $ccc['id'])->first();
                   
                        if($cc != null)
                        {
                        	$cc->update(['qty' => $quantities[$c] ]);
                        }
                   }
                   
                   return "ok";
               }                                 
                                                      
                return $ret;
           }	
           function removeFromCart($user, $asf)
           {
           	#$ret = ["subtotal" => 0, "delivery" => 0, "total" => 0];
              
              if($user != null)
               {
                    	$cc = Carts::where('user_id', $user->id)
                                       ->where('sku', $asf)->first();
                   
                        if($cc != null)
                        {
                        	$cc->delete();
                        }
                   
                   return "ok";
               }                                 
                                                      
                return $ret;
           }	
           function getDeal($sku)
           {
           	$ret = [];
               $d = Deals::where('sku',$sku)
                             ->orWhere('id',$sku)->first();
 
              if($d != null)
               {
               	$dealData = DealData::where('sku',$d->sku)->first();
               	$ret['id'] = $d->id; 
               	$ret['images'] = $this->getDealImages($d->sku);               
                   $ret['data'] = $this->getDealData($d->sku);               
               	$ret['name'] = $d->name; 
               	$ret['sku'] = $d->sku; 
               	$ret['type'] = $d->type; 
               	$ret['category'] = $d->category; 
               	$ret['status'] = $d->status; 
               	$ret['rating'] = $d->rating;
               }                                 
                                                      
                return $ret;
           }	
           function updateDeal($data)
           {  
              $ret = 'error'; 
         
              if(isset($data['sku']))
               {
               	$d = Deals::where('sku', $data['sku'])->first();
                   
                        if($d != null)
                        {
                        	$dd = DealData::where('sku', $d->sku)->first();
                        
                        	$d->update(['name' => $data['name'],
                                              'category' => $data['category'],
                                              'status' => $data['status'],
                                           ]);
                                           
                            $dd->update(['description' => $data['description'],
                                              'amount' => $data['amount'],
                                              'in_stock' => $data['in_stock'],
                                           ]);
                                           
                                           $ret = "ok";
                        }                                    
               }                                 
                  return $ret;                               
           }	
           
           function updateCoupon($data)
           {  
              $ret = 'error'; 
         
              if(isset($data['xf']))
               {
               	$c = Coupons::where('id', $data['xf'])->first();
                   
                        if($c != null)
                        {                       
                        	$c->update(['code' => $data['code'],
                                              'discount' => $data['discount'],
                                              'status' => $data['status'],
                                           ]);
                                           
                                           $ret = "ok";
                        }                                    
               }                                 
                  return $ret;                               
           }	
           
           function updateComment($data)
           {  
              $ret = 'error'; 
         
              if(isset($data['xf']))
               {
               	$c = Comments::where('id', $data['xf'])->first();
                   
                        if($c != null)
                        {                       
                        	$c->update(['comment' => $data['comment'],
                                              'status' => $data['status'],
                                           ]);
                                           
                                           $ret = "ok";
                        }                                    
               }                                 
                  return $ret;                               
           }	
           
           function getUser($email)
           {
           	$ret = [];
               $u = User::where('email',$email)
			            ->orWhere('email',$id)->first();
 
              if($u != null)
               {
                   	$temp['fname'] = $u->fname; 
                       $temp['lname'] = $u->lname; 
                       $temp['wallet'] = $this->getWallet($u);
                       $temp['phone'] = $u->phone; 
                       $temp['email'] = $u->email; 
                       $temp['role'] = $u->role; 
                       $temp['status'] = $u->status; 
                       $temp['id'] = $u->id; 
                       $temp['date'] = $u->created_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	  
           function updateUser($data)
           {  
              $ret = 'error'; 
         
              if(isset($data['phone']))
               {
               	$u = User::where('phone', $data['phone'])->first();
                   
                        if($u != null)
                        {
                        	$u->update(['fname' => $data['fname'],
                                              'lname' => $data['lname'],
                                              'email' => $data['email'],
                                              'phone' => $data['phone'],
                                              'role' => $data['role'],
                                              'status' => $data['status'],
                                           ]);
                                           
                                           $ret = "ok";
                        }                                    
               }                                 
                  return $ret;                               
           }	
           function getShippingDetails($user)
           {
           	$ret = [];
               $sd = ShippingDetails::where('user_id',$user->id)->first();
 
              if($sd != null)
               {
                   	$temp['company'] = $sd->company; 
                       $temp['address'] = $sd->address; 
                       $temp['city'] = $sd->city;
                       $temp['state'] = $sd->state; 
                       $temp['zipcode'] = $sd->zipcode; 
                       $temp['id'] = $sd->id; 
                       $temp['date'] = $sd->created_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	  
           
           function getBankAccount($user)
           {
           	$ret = [];
               $b = BankAccounts::where('user_id',$user->id)->first();
 
              if($b != null)
               {
                   	$temp['bank'] = $b->bank; 
                       $temp['acname'] = $b->acname; 
                       $temp['acnum'] = $b->acnum;
                       $temp['date'] = $b->created_at->format("jS F, Y"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	  
           
           function updateShippingDetails($user, $data)
           {
           	$sd = ShippingDetails::where('user_id',$user->id)->first();
 
              if($sd != null)
               {
               	   $sd->update(['company' => $data['company'],
                                          'address' => $data['address'],
                                          'city' => $data['city'],
                                          'state' => $data['state'],
                                          'zipcode' => $data['zip']
                      ]);               
               }
           }	
           function getWallet($user)
           {
           	$ret = [];
               $wallet = Wallet::where('user_id',$user->id)->first();
 
              if($wallet != null)
               {
               	$ret['id'] = $wallet->id; 
                   $ret['balance'] = $wallet->balance;                  
               }                                 
                                                      
                return $ret;
           }		  
           function getDashboard($user)
           {
           	$ret = [];
               $dealData = DealData::where('sku',$sku)->first();
 
              if($dealData != null)
               {
               	$ret['id'] = $dealData->id; 
                   $ret['description'] = $dealData->description; 
                   $ret['amount'] = $dealData->amount; 
                   $ret['in_stock'] = $dealData->in_stock; 
                   $ret['min_bid'] = $dealData->min_bid; 
               }                                 
                                                      
                return $ret;
           }		  
           function getTransactions($user)
           {
           	$ret = [];
               $transactions = Transactions::where('user_id',$user->id)
			                               ->orderBy('created_at', 'desc')->get();;
 
              if($transactions != null)
               {
               	foreach($transactions as $t)
                   {
                   	$temp = [];
                   	$temp['id'] = $t->id; 
                       $temp['amount'] = $t->amount; 
                       $temp['type'] = $t->type; 
                       $temp['date'] = $t->created_at->format("jS F, Y"); 
                       
                       switch($temp['type'])
                       {
                       	case 'paid':
                             $desc = explode(',',$t->description);   
                             $iu = url('invoice').'?on='.$desc[0]; #invoice url
                             $pm = ($desc[1] == 'wallet') ? 'KloudPay Wallet' : 'Credit/debit card'; #payment method 
                             $temp['description'] = 'Paid for order <a href="'.$iu.'" target="_blank">'.$desc[0].'</a> via '.$pm; 
                             $temp['badgeClass'] = 'badge-success'; 
                           break; 
                           
                           case 'refund':
                             $desc = explode(',',$t->description);   
                             $iu = url('invoice').'?on='.$desc[0]; #invoice url
                             $pm = ($desc[1] == 'wallet') ? 'KloudPay Wallet' : 'Credit/debit card'; #payment method 
                             $temp['description'] = 'Refund for order <a href="'.$iu.'" target="_blank">'.$desc[0].'</a> to '.$pm; 
                             $temp['badgeClass'] = 'badge-danger'; 
                           break; 
                           
                           case 'transfer':
                             $u = User::where('id',$t->description)->first();
                             $un = ($u != null) ? $u->fname.' '.$u->lname : 'Unknown'; #recipient username
                             $temp['description'] = "Transferred to ".$un."'s KloudPay Wallet"; 
                             $temp['badgeClass'] = 'badge-primary'; 
                           break; 
                           
                           case 'receive-transfer':
                             $u = User::where('id',$t->description)->first();
                             $un = ($u != null) ? $u->fname.' '.$u->lname : 'Unknown'; #sender username
                             $temp['description'] = "Transferred from ".$un."'s KloudPay Wallet"; 
                             $temp['badgeClass'] = 'badge-success'; 
                           break; 
                           
                           case 'deposit':
                             $temp['description'] = 'Deposited to KloudPay Wallet'; 
                             $temp['badgeClass'] = 'badge-info'; 
                           break; 
                           
                           case 'withdraw':
                             $temp['description'] = 'Withdrew from KloudPay Wallet'; 
                             $temp['badgeClass'] = 'badge-info'; 
                           break; 
                       }
                       
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }		
           
           function adminGetTransactions()
           {
           	$ret = [];
               $transactions = Transactions::orderBy('created_at', 'desc')->get();
 
              if($transactions != null)
               {
               	foreach($transactions as $t)
                   {
                   	$temp = [];
                   	$temp['id'] = $t->id; 
                       $u = User::where('id',$t->user_id)->first();
                       $temp['email'] = ($u != null) ? $u->email: 'Unknown'; 
                       $temp['amount'] = $t->amount; 
                       $temp['type'] = $t->type; 
                       $temp['date'] = $t->created_at->format("jS F, Y"); 
                       
                      switch($temp['type'])
                       {
                       	case 'paid':
                             $desc = explode(',',$t->description);   
                             $iu = url('invoice').'?on='.$desc[0]; #invoice url
                             $pm = ($desc[1] == 'wallet') ? 'KloudPay Wallet' : 'Credit/debit card'; #payment method 
                             $temp['description'] = 'Paid for order <a href="'.$iu.'" target="_blank">'.$desc[0].'</a> via '.$pm; 
                             $temp['badgeClass'] = 'badge-success'; 
                           break; 
                           
                           case 'refund':
                             $desc = explode(',',$t->description);   
                             $iu = url('invoice').'?on='.$desc[0]; #invoice url
                             $pm = ($desc[1] == 'wallet') ? 'KloudPay Wallet' : 'Credit/debit card'; #payment method 
                             $temp['description'] = 'Refund for order <a href="'.$iu.'" target="_blank">'.$desc[0].'</a> to '.$pm; 
                             $temp['badgeClass'] = 'badge-danger'; 
                           break; 
                           
                           case 'transfer':
                             $u = User::where('id',$t->description)->first();
                             $un = ($u != null) ? $u->fname.' '.$u->lname: 'Unknown'; #recipient username
                             $temp['description'] = "Transferred to ".$un."'s KloudPay Wallet"; 
                             $temp['badgeClass'] = 'badge-primary'; 
                           break; 
                           
                           case 'receive-transfer':
                             $u = User::where('id',$t->description)->first();
                             $un = ($u != null) ? $u->fname.' '.$u->lname : 'Unknown'; #sender username
                             $temp['description'] = "Transferred from ".$un."'s KloudPay Wallet"; 
                             $temp['badgeClass'] = 'badge-success'; 
                           break; 
                           
                           case 'deposit':
                             $temp['description'] = 'Deposited to KloudPay Wallet'; 
                             $temp['badgeClass'] = 'badge-info'; 
                           break; 
                           
                           case 'withdraw':
                             $temp['description'] = 'Withdrew from KloudPay Wallet'; 
                             $temp['badgeClass'] = 'badge-info'; 
                           break; 
                       }
                       
                       array_push($ret, $temp); 
                   }
               }                          
                                                     
                return $ret;
           }		

           function getAuctions($category="")
           {
           	$ret = [];
               $auctions = null; 
           	if($category == ""){
				$auctions = Auctions::orderBy('created_at', 'desc')->get();
			}
            else{
				$auctions = Auctions::where('category',$category)
									->orderBy('created_at', 'desc')->get();
			}         
               
              if($auctions != null)
               {
               	foreach($auctions as $a)
                   {
                   	$temp = [];
                   	$temp['id'] = $a->id; 
                       $temp['bids'] = $this->getBids($a->id);
                   	$temp['deal'] = $this->adminGetDeal($a->deal_id);
                       $temp['category'] = $a->category; 
                       $temp['days'] = $a->days; 
                       $temp['hours'] = $a->hours; 
                       $temp['minutes'] = $a->minutes; 
                       $temp['status'] = $a->status; 
                       $temp['date'] = $a->created_at->format("jS F, Y h:i A"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }	

          function getAuction($dealID)
           {
           	$ret = [];
               $a = Auctions::where('id', $dealID)->first();
               
              if($a != null)
               {
                   	$temp = [];
                   	$temp['id'] = $a->id; 
                       $temp['bids'] = $this->getBids($a->id);
                   	$temp['deal'] = $this->adminGetDeal($a->deal_id);
                       $temp['category'] = $a->category; 
                       $temp['days'] = $a->days; 
                       $temp['hours'] = $a->hours; 
                       $temp['minutes'] = $a->minutes; 
                       $temp['status'] = $a->status; 
                       $temp['date'] = $a->created_at->format("jS F, Y h:i A"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	
		   
		   function getBid($id)
           {
           	$ret = [];
               $b = Bids::where('id',$id)->first();
 
              if($b != null)
               {
               	$ret['id'] = $b->id; 
                   $ret['auction'] = $this->adminGetAuction($b->auction_id); 
                   $ret['user'] = $this->getUser($b->user_id); 
                   $ret['amount'] = $b->amount; 
                   $ret['date'] = $b->created_at->format("jS F, Y h:i A"); 
               }                                 
                                                      
                return $ret;
           }	
		   
		   function getBids($id)
           {
           	$ret = [];
               $bids = Bids::where('auction_id',$id)->get();
 
              if($bids != null)
               {
				#$ret['auction'] = $this->adminGetAuction($id); 
				#$ret['bids'] = []; 
				
               	foreach($bids as $b)
                   {
                   	$temp = [];
                   	$temp['user'] = $this->getUser($b->user_id); 
                    $temp['amount'] = $b->amount; 
                    $temp['date'] = $b->created_at->format("jS F, Y h:i A"); 
                    array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }
		   
		   function getHighestBidder($id)
           {
			 $ret = null;
			 
           	$hb = Bids::where('auction_id',$id)->max('amount');
            $ret = Bids::where('auction_id',$id)
			           ->where('amount',$hb)->first();
			                         
                                                      
                return $ret;
           }
		   
		   function getUserBids($user)
           {
           	$ret = [];
               $bids = Bids::where('user_id',$user->id)->get();
 
              if($bids != null)
               {
				
				#$ret['bids'] = []; 
				
               	foreach($bids as $b)
                   {
                   	$temp = [];
					$temp['auction'] = $this->adminGetAuction($b->auction_id); 
                   	$temp['amount'] = $b->amount; 
                    $temp['date'] = $b->created_at->format("jS F, Y h:i A"); 
                    array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }

          function adminGetUsers()
           {
           	$ret = [];
               $users = User::orderBy('created_at', 'desc')->get();
 
              if($users != null)
               {
               	foreach($users as $u)
                   {
                   	$temp = [];
                   	$temp['fname'] = $u->fname; 
                       $temp['lname'] = $u->lname; 
                       $wallet = Wallet::where('user_id',$u->id)->first();
                   	$temp['balance'] = ($wallet == null) ? "NA" : $wallet->balance; 
                       $temp['phone'] = $u->phone; 
                       $temp['email'] = $u->email; 
                       $temp['role'] = $u->role; 
                       $temp['status'] = $u->status; 
                       $temp['id'] = $u->id; 
                       $temp['date'] = $u->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }

          function adminGetDeals()
           {
           	$ret = [];
           	$deals = Deals::orderBy('created_at', 'desc')->get();
 
              if($deals != null)
               {
               	foreach($deals as $d)
                   {
                   	$temp = [];
                   	$temp['id'] = $d->id; 
                   	$temp['name'] = $d->name; 
                   	$temp['sku'] = $d->sku; 
                   	$temp['type'] = $d->type; 
                       $temp['category'] = $d->category; 
                       $temp['status'] = $d->status; 
                   	$temp['data'] = $this->getDealData($d->sku); 
                   	$temp['images'] = $this->getDealImages($d->sku);
                       $temp['rating'] = $this->getRating($d);
                       array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }
           
          function adminGetDeal($sku)
           {
           	$ret = [];
           	$d = Deals::where('sku',$sku)
                             ->orWhere('id',$sku)->first();
 
              if($d != null)
               {
                   	$temp = [];
                   	$temp['id'] = $d->id; 
                   	$temp['name'] = $d->name; 
                   	$temp['sku'] = $d->sku; 
                   	$temp['type'] = $d->type; 
                       $temp['category'] = $d->category; 
                       $temp['status'] = $d->status; 
                   	$temp['data'] = $this->getDealData($d->sku); 
                   	$temp['images'] = $this->getDealImages($d->sku);
                       $temp['rating'] = $this->getRating($d);
                       $ret = $temp;                   
               }                                 
                     
                return $ret;
           }           
           
           function adminGetOrders()
           {
           	$ret = [];
           	$orders = Orders::orderBy('created_at', 'desc')->get();
 
              if($orders != null)
               {
               	foreach($orders as $o)
                   {
                   	$temp = [];
                   	$temp['id'] = $o->id; 
                   	$temp['number'] = $o->number; 
                       $u = User::where('id',$o->user_id)->first();
                   	$temp['email'] = ($u != null) ? $u->email : "Uknown"; 
                   	$temp['total'] = $o->total; 
                   	$temp['status'] = $o->status; 
                   	$temp['date'] = $o->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                                 
                                                      
                return $ret;
           }

function adminGetOrder($number)
           {
           	$ret = [];
           	$order = Orders::where('number',$number)->first();
 
              if($order != null)
               {
                   	$temp = [];
                   	$temp['id'] = $order->id; 
                   	$temp['number'] = $order->number; 
                       $u = User::where('id',$order->user_id)->first();
                   	$temp['email'] = ($u != null) ? $u->email : "Uknown"; 
                   	$temp['total'] = $order->total; 
                   	$temp['status'] = $order->status; 
					$temp['date'] = $order->created_at->format("jS F, Y"); 
                       $ret = $temp; 
                   
               }                                 
                                                      
                return $ret;
           }

           function adminGetAuctions()
           {
           	$ret = [];
               $auctions = Auctions::orderBy('created_at', 'desc')->get();
               
              if($auctions != null)
               {
               	foreach($auctions as $a)
                   {
                   	$temp = [];
                   	$temp['id'] = $a->id; 
                       $temp['bids'] = $this->getBids($a->id);
                   	$temp['deal'] = $this->adminGetDeal($a->deal_id);
                       $temp['category'] = $a->category; 
                       $temp['days'] = $a->days; 
                       $temp['hours'] = $a->hours; 
                       $temp['minutes'] = $a->minutes; 
                       $temp['status'] = $a->status; 
                       $temp['date'] = $a->created_at->format("jS F, Y h:i A"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }	
           
           function adminGetAuction($id)
           {
           	$ret = [];
               $a = Auctions::where('id', $id)->first();
               
              if($a != null)
               {
                   	$temp = [];
                   	$temp['id'] = $a->id; 
                       $temp['bids'] = $this->getBids($a->id);
                   	$temp['deal'] = $this->adminGetDeal($a->deal_id);
                       $temp['category'] = $a->category; 
                       $temp['days'] = $a->days; 
                       $temp['hours'] = $a->hours; 
                       $temp['minutes'] = $a->minutes; 
                       $temp['status'] = $a->status; 
                       $temp['date'] = $a->created_at->format("jS F, Y h:i A"); 
                       $ret = $temp; 
               }                          
                                                      
                return $ret;
           }	
           
           function adminEndAuction($id)
           {
           	$ret = "error";
               $a = Auctions::where('id', $id)->first();
               
              if($a != null)
               {
               	if($a->status == "live")
                    {
                    	#update bid status
                       $bids = $this->getBids($a->id);
                   	   $a->update(['status' => 'ended','bids' => count($bids)]);
                    
                       #delete bids
                       Bids::where('auction_id',$id)->delete();
                       
                       #get highest bidder
                     	$hb = $this->getHighestBidder($a->id);
                    	$d = $this->adminGetDeal($a->deal_id);
                       
                       if($hb != null) 
                       {
                         #add to highest bidder cart
                         $dt = ['user_id' => $hb->id,'sku' => $d->sku,'qty' => "1"];
					     $this->addToCart($dt);
                         $ret = "ok"; 
                       }
                    }  
                       
               }                          
                                                      
                return $ret;
           }	

           function adminGetRatings()
           {
           	$ret = [];
               $ratings = Ratings::orderBy('created_at', 'desc')->get();
 
              if($ratings != null)
               {
               	foreach($ratings as $r)
                   {
                   	$temp = [];
                   	$temp['id'] = $r->id; 
                       $deal = Deals::where('id',$r->deal_id)->first();
                   	$temp['deal'] = ($deal == null) ? "Unknown" : $deal->name; 
					$u = User::where('id',$r->user_id)->first();
                   	$temp['user'] = ($u != null) ? $u->email : "Unknown"; 
                       $temp['rating'] = $r->stars; 
                       $temp['status'] = $r->status; 
                       $temp['date'] = $r->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }	

           function adminGetComments()
           {
           	$ret = [];
               $comments = Comments::orderBy('created_at', 'desc')->get();
 
              if($comments != null)
               {
               	foreach($comments as $c)
                   {
                   	$temp = [];
                   	$temp['id'] = $c->id; 
                       $deal = Deals::where('id',$c->deal_id)->first();
                   	$temp['deal'] = ($deal == null) ? "Unknown" : $deal->name; 
					$u = User::where('id',$c->user_id)->first();
                   	$temp['user'] = ($u != null) ? $u->email : "Unknown"; 
                       $temp['comment'] = $c->comment; 
                       $temp['status'] = $c->status; 
                       $temp['date'] = $c->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }		
           
           function adminGetComment($id)
           {
           	$ret = [];
               $c= Comments::where('id', $id)->first();
 
              if($c != null)
               {
                   	$temp = [];
                   	$temp['id'] = $c->id; 
                       $deal = Deals::where('id',$c->deal_id)->first();
                   	$temp['deal'] = ($deal == null) ? "Unknown" : $deal->name; 
					$u = User::where('id',$c->user_id)->first();
                   	$temp['user'] = ($u != null) ? $u->email : "Unknown"; 
                       $temp['comment'] = $c->comment; 
                       $temp['status'] = $c->status; 
                       $temp['date'] = $c->created_at->format("jS F, Y"); 
                        $ret = $temp;   
               }                          
                                                      
                return $ret;
           }		
           
           function adminGetCoupons()
           {
           	$ret = [];
               $coupons = Coupons::orderBy('created_at', 'desc')->get();
 
              if($coupons != null)
               {
               	foreach($coupons as $c)
                   {
                   	$temp = [];
                   	$temp['id'] = $c->id; 
                       $temp['code'] = $c->code; 
                       $temp['discount'] = $c->discount; 
                       $temp['status'] = $c->status; 
                       $temp['date'] = $c->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }		
           
           function adminGetCoupon($id)
           {
           	$ret = [];
               $c = Coupons::where('id', $id)->first();
 
              if($c != null)
               {               	
                   	$temp = [];
                   	$temp['id'] = $c->id; 
                       $temp['code'] = $c->code; 
                       $temp['discount'] = $c->discount; 
                       $temp['status'] = $c->status; 
                       $temp['date'] = $c->created_at->format("jS F, Y"); 
                       $ret = $temp;                   
               }                          
                                                      
                return $ret;
           }		

        function adminGetStats()
           {
           	$ret = ['totalUsers' => User::all()->count(),
                         'totalSales' => Orders::all()->sum('total'),
                         'totalDeals' => Deals::all()->count(),
                         'totalOrders' => Orders::all()->count(),
                         'totalUsersActive' => User::where('status','ok')->count(),
                         'totalOrdersPending' => Deals::where('status','pending')->count(),
                         'totalWithdrawals' => Withdrawals::where('status','pending')->count(),
                        ];      
                                                                                       
                return $ret;
           }			  

           function getHottestDeals()
           {
           	$ret = $this->getDeals("deal");                                                                                 
                return $ret;
           }		
           function getNewArrivals()
           {
           	$ret = $this->getDeals("deal");                                                                                 
                return $ret;
           }		
           function getBestSellers()
           {
           	$ret = $this->getDeals("deal");                                                                                  
                return $ret;
           }		
           function getHotCategories()
           {
           	$ret = $this->getDeals("deal");                                                                                  
                return $ret;
           }

           function getRating($deal)
           {
           	$ret = 0;
           	$ratings = Ratings::where('deal_id',$deal['id'])
                              ->where('status',"approved")
			                  ->orderBy('created_at', 'desc')->get();
               
                if($ratings !== null) 
                {
                	$rc = $ratings->count();
                    $sum = 0;
                    
                    foreach($ratings as $r)
                    {
                    	$sum += $r->stars;
                    }
                    
                	if($rc > 0) $ret = $sum / $rc; 
                }       
                return $ret;
           }	
           
           function getUserRating($deal,$user)
           {
           	$ret = 0;
               if($user !== null)
                {
           	   $rating = Ratings::where('deal_id',$deal['id'])
                                      ->where('user_id',$user->id)->first();   
               
                   if($rating !== null) 
                   {
                   	$ret = $rating->stars; 
                   }     
                }
                return $ret;
           }	
           
           function getComments($deal)
           {
           	$ret = [];
           	$comments = Comments::where('deal_id',$deal['id'])
                                 ->where('status',"active")
			                    ->orderBy('created_at', 'desc')->get(); 
               
                if($comments !== null) 
                {
                   foreach($comments as $c)
                   {
                   	if($c->status =="active")
                       {
                   	   $temp = [];
                      	$temp['id'] = $c->id; 
                          $user = User::where('id',$c->user_id)->first();
                      	$temp['user'] = ($user == null) ? "Anonymous" : $user->fname." ".$user->lname; 
                          $temp['comment'] = $c->comment; 
                          $temp['date'] = $c->created_at->format("jS F, Y h:i A"); 
                          array_push($ret, $temp); 
                       }
                   }
                }       
                return $ret;
           }	

           function getOrders($user)
           {
           	$ret = [];
           	$orders = Orders::where('user_id',$user->id)
			                ->orderBy('created_at', 'desc')->get();
               
                if($orders != null)
               {
               	foreach($orders as $o)
                   {
                   	$temp = [];
                   	$temp['id'] = $o->id; 
                   	$temp['number'] = $o->number; 
                       $temp['status'] = $o->status; 
                       $temp['amount'] = $o->total; 
					   $temp['date'] = $o->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }       
                return $ret;
           }
           
           function addOrder($user,$data)
           {
           	$cart = $this->getCart($user);
               
               if($data['transaction-type'] == 'paid') 
                {
           	$order = $this->createOrder($data);
               
               #create order details
               foreach($cart as $c)
               {
               	$dt = [];
                   $dt['order_id'] = $order->id; 
                   $dt['deal_id'] = $c['deal']['id']; 
                   $dt['qty'] = $c['qty'];
                   
                   $od = $this->createOrderDetails($dt);
                                     
               }
               }
               #add transaction 
                   $tdt = [];
                   $tdt['type'] = $data['transaction-type'];
                   $tdt['description'] = ($tdt['type']  == 'paid' || $tdt['type'] == 'refund') ? $order->number.','.$data['transaction-description'] : $data['transaction-description'];                   
                   $tdt['user_id'] = $user->id;
                   $tdt['amount'] = $data['total'];
                   $this->createTransaction($tdt); 
               
           }

           function getInvoice($on)
           {
           	$ret = [];
           	$order = Orders::where('id',$on)
                                    ->orWhere('number',$on)->first();   
               $orderDetails = OrderDetails::where('order_id',$order->id)->get();   
               
                if($order != null && $orderDetails != null)
               {
               	$ret['id'] = $order->id; 
                   	$ret['number'] = $order->number; 
                       $ret['status'] = $order->status; 
                       $ret['amount'] = $order->total;                        
                       $ret['date'] = $order->created_at->format("jS F, Y"); 
                       $ret['order-details'] = [];
                       
               	foreach($orderDetails as $od)
                   {
                   	$temp = [];
                   	$temp['id'] = $od->id; 
                   	$temp['deal'] = $this->getDeal($od->deal_id);
                        $temp['qty'] = $od->qty; 
                       array_push($ret['order-details'], $temp); 
                   }
               }      
                $ret['totals'] = $this->getCartTotals($ret['order-details']);
                return $ret;
           }

           function getUserInvoice($user, $on)
           {
           	$ret = [];
           	$order = Orders::where('number',$on)
                                   ->where('user_id',$user->id)->first();   
               
                if($order != null)
               {
               	$ret = $this->getInvoice($on); 
               }       
                return $ret;
           }		  			  	   
           
           function fundWallet($data)
           {
           	$account = User::where('email',$data['email'])->first();
               
               if($account != null)
               {
               	$wallet = Wallet::where('user_id',$account->id)->first();
                   $formerBalance = $wallet->balance; 
                   $newBalance = 0;
                   
                   switch($data['type'])
                   {
                   	case "add":
                         $newBalance = $formerBalance + $data['amount'];
                       break; 
                       
                       case "remove":
                         $newBalance = $formerBalance - $data['amount'];
                       break; 
                       
                       default:
                         $newBalance = $formerBalance;
                       break; 
                  }
                  
                  $wallet->update(['balance' => $newBalance]);
              }
          
                return "ok";
           }		
           
           function transferFunds($user, $data)
           {
           	$ret = "error";
           	$receiver = User::where('phone',$data['phone'])
                                     ->orWhere('email',$data['phone'])->first();
               
               if($receiver != null)
               {
               	//check if account balance is enough
                   $wallet = $this->getWallet($user);
                   
                   if($wallet['balance'] > $data['amount'] && $data['amount'] < $this->transferLimit)
                   {
               	  //debit the giver
                 	$userData = ['email' => $user->email,
                                     'type' => 'remove',
                                     'amount' => $data['amount']
                                    ];
                                    
                     //credit the receiver
                     $receiverData = ['email' => $receiver->email,
                                     'type' => 'add',
                                     'amount' => $data['amount']
                                    ];
                                    
               	$this->fundWallet($userData);
                   $this->fundWallet($receiverData);
				   
				   #add transaction for sender
                   $tdt = [];
                   $tdt['type'] = "transfer";
                   $tdt['description'] = $receiver->id;                   
                   $tdt['user_id'] = $user->id;
                   $tdt['amount'] = $data['amount'];
                   $this->createTransaction($tdt); 
                   
                   #add transaction for receiver 
                   $tdt = [];
                   $tdt['type'] = "receive-transfer";
                   $tdt['description'] = $user->id;                   
                   $tdt['user_id'] = $receiver->id; 
                   $tdt['amount'] = $data['amount'];
                   $this->createTransaction($tdt); 
                   
                   $ret = "ok";
                 }
              }            
               return $ret;
           }		
           
           
           function withdrawFunds($user, $data)
           {
           	$ret = 'error'; 
               $wallet = $this->getWallet($user);
               $fee = $this->getWithdrawalFee();
               
               if($wallet['balance'] > ($data['amount'] + $fee))
               {
               	//create request
               	$this->createWithdrawal(['user_id' => $user->id,
                                     'amount' => $data['amount']
                                    ]);
                                    
                   $ret = 'ok'; 
              }
          
                return $ret;
           }		
           
           function checkout($user, $data, $type)
           {
               switch($type){
               	case "kloudpay":
                 	$ret = $this->payWithKloudPay($user, $data);
                   break; 
                   
                   case "paystack":
                 	$ret = $this->payWithPayStack($user, $data);
                   break; 
              }           
             
                return $ret;
           }

 		  function payWithKloudPay($user, $data)
           {                     
              if(isset($data['ssa']) && $data['ssa'] == "on"){
               	$this->updateShippingDetails($user, $data);
              }
              
             # dd($data);
           	$wallet = $this->getWallet($user); 
               $amount = $data['amount'] / 100;
               
               if($wallet['balance'] >= $amount)
               {
               	#deduct funds from wallet, create order
                   //debit the user
                   $userData = ['email' => $user->email,
                                     'type' => 'remove',
                                     'amount' => $amount
                                    ];
                   $this->fundWallet($userData);
                   
                   #create order
                   $data['type'] = 'checkout';
                   $data['total'] = $amount;
                   $data['user_id'] = $user->id;
                   $data['transaction-type'] = "paid";
                   $data['transaction-description'] = "wallet";
                   $this->addOrder($user,$data);
                   return "ok";
               }
               else
               {
               	return "error";
               }                                      	                         
           }
           
           function payWithPayStack($user, $payStackResponse)
           { 
              $md = $payStackResponse['metadata'];
              $amount = $payStackResponse['amount'] / 100;
              $ref = $payStackResponse['reference'];
              $type = $md['type'];
              $ssa = (isset($md['ssa'])) ? $md['ssa'] : 'off';
              
              if($ssa == "on") $this->updateShippingDetails($user, $md);
              $dt = [];
              
              if($type == "checkout"){
               	$dt['comment'] = $md['comment'];
                   $dt['reference'] = $ref;
                   $dt['transaction-type'] = "paid";
                   $dt['transaction-description'] = "card";
              }
              else if($type == "kloudpay"){
               	//credit the user
                   $userData = ['email' => $user->email,
                                     'type' => 'add',
                                     'amount' => $amount
                                    ];
                   $this->fundWallet($userData);
                   $dt['transaction-type'] = "deposit";
                   $dt['transaction-description'] = "";
              }
              
              $dt['user_id'] = $user->id;
              $dt['total'] = $amount;
              $dt['type'] = "checkout";
              
              #dd($payStackResponse);
              #create order

              $this->addOrder($user,$dt);
                return "ok";
           }
           
           function getPasswordResetCode($user)
           {
           	$u = $user; 
               
               if($u != null)
               {
               	//We have the user, create the code
                   $code = bcrypt(rand(125,999999)."rst".$u->id);
               	$u->update(['reset_code' => $code]);
               }
               
               return $code; 
           }
           
           function verifyPasswordResetCode($code)
           {
           	$u = User::where('reset_code',$code)->first();
               
               if($u != null)
               {
               	//We have the user, delete the code
               	$u->update(['reset_code' => '']);
               }
               
               return $u; 
           }
           
           function getWithdrawalFee()
           {
           	$ret = 100;
           
           	//should pull value from Settings model
              /**
           	$settings = Settings::where('item','withdrawal_fee')->first();
               
               if($settings != null)
               {
               	//get the current withdrawal fee
               	$ret = $settings->value;
               }
               **/
               return $ret; 
           }
           
           function getWithdrawals()
           {
           	$ret = [];
               $withdrawals = Withdrawals::orderBy('created_at', 'desc')->get();     
 
              if($withdrawals != null)
               {
               	foreach($withdrawals as $w)
                   {
                   	$temp = [];
                   	$temp['id'] = $w->id; 
                       $user = User::where('id',$w->user_id)->first();
                       $temp['user'] = ($user == null) ? "Anonymous" : $user->fname." ".$user->lname; 
                       $temp['amount'] = $w->amount;                        
                       $temp['status'] = $w->status; 
                       $temp['date'] = $w->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }	
           
           function getPendingWithdrawals($user)
           {
           	$ret = [];
               $withdrawals = Withdrawals::where('user_id',$user->id)
			                             ->where('status','pending')
										 ->orderBy('created_at', 'desc')->get();          
 
              if($withdrawals != null)
               {
               	foreach($withdrawals as $w)
                   {
                   	$temp = [];
                   	$temp['id'] = $w->id; 
                       $temp['amount'] = $w->amount;                        
                       $temp['status'] = $w->status; 
                       $temp['date'] = $w->created_at->format("jS F, Y"); 
                       array_push($ret, $temp); 
                   }
               }                          
                                                      
                return $ret;
           }	
           
           function approveWithdrawal($data)
           {
           	$ret = "error";
               $w = Withdrawals::where('id',$data['ff'])->first();            
 
              if($w != null)
               {
               	$w->update(['status' => 'approved']);
                   $ret = 'ok'; 
               }                          
                                                      
                return $ret;
           }	
           
           function approveRating($data)
           {
           	$ret = "error";
               $r = Ratings::where('id',$data['id'])->first();            
 
              if($r != null)
               {
               	$status = "pending";
                   if($data['ax'] == "jl") $status = "approved";
                   else if($data['ax'] == "lj") $status = "rejected";
               	$r->update(['status' => $status]);
                   $ret = 'ok'; 
               }                          
                                                      
                return $ret;
           }	
           
           function isAdmin($user)
           {
           	$ret = false; 
               if($user->role === "admin" || $user->role === "su") $ret = true; 
           	return $ret;
           }

           function rateDeal($user,$data)
           {
           	$ret = "error";
               $d = Deals::where('id',$data['xf'])->first();            
 
              if($d != null)
               {
               	$data['status'] = "pending";
                   $data['user_id'] = $user->id;
                   $data['deal_id'] = $data['xf'];
                   $data['stars'] = $data['rating'];
                   $this->createRating($data); 
                   $ret = 'ok'; 
               }                          
                                                      
                return $ret;
           }	
           
           function commentDeal($user,$data)
           {
           	$ret = "error";
               $d = Deals::where('id',$data['xf'])->first();            
 
              if($d != null)
               {
               	$data['status'] = "pending";
                   $data['user_id'] = $user->id;
                   $data['deal_id'] = $data['xf'];
                   $this->createComment($data); 
                   $ret = 'ok'; 
               }                          
                                                      
                return $ret;
           }	
}
?>