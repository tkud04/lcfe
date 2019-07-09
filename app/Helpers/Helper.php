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
use GuzzleHttp\Client;

class Helper implements HelperContract
{
	   public $transferLimit = 201000;
	
   	 public $leadership = ['ezeagu' => 'ezeagu.jpg',
              'katsit1' => 'katsit1.jpg',
			  'yusuf' => 'ALH-RASHEED-YUSSUFF-1.jpg',
			  'emeka' => 'emeka.jpg',
			  'onukwe' => 'onukwe.jpg',
			  'akeredolu' => 'akeredolu.jpg',
			  'allwell1' => 'allwell1.jpg',
			  'ifedayo' => 'ifedayo.jpg',
			  'omowale' => 'omowale.jpg'];
			  
public $bios = [['id' => 'ezeagu','title' => "Patrick Ezeagu - Director", "desc" => "<p>Mr. Ezeagu is an Alumnus of University of Lagos and University of Nigeria, Nsukka where he obtained a Master and Bachelor of Business Administration Degrees respectively.</p><br>"],
            ['id' => 'katsit1','title' => "Daniel Katsit - Director", "desc" => "<p>Daniel Michael Katsit is the Chief Executive Officer of KAPITAL CARE TRUST & SECURITIES LTD. He qualified as an Associate Chartered Stockbroker (ACS) in 1998. He worked with the Nigerian Postal Service Department (NIPOST) (1990) and the Federal Ministry of Works and Housing (1992) as an Audit Officer and a Finance Officer respectively.
</p><br><p>His Stock broking career started with Afrique Securities Ltd later to DBL Securities Ltd (a subdiary of Diamond Bank Plc) and AAA Stockbrokers Ltd. He holds a B.sc degree and Masters of Business Administration (MBA) from Ahmadu Bello University, Zaria and Lagos State University, Ojo-Lagos respectively.</p><br><p>He is a Fellow of the Chartered Institute of Stockbrokers of Nigeria. He has over 20 years experience in the Capital Market and is an active dealing clerk on the trading floors of the Nigerian Stock Exchange. He is currently a member of Port-Harcourt Onitsha branch council of Nigeria Stock Exchange.
</p><br><p>Daniel Michael Katsit was actively involved in the various transactions (share transfers) of the Bureau for Public Enterprise (BPE) in the privatization exercise of 2000 -2002 by the Federal Government. Mr. Daniel is a member of the Board of Directors of Olive Microfinance Bank Limited and Currency Direct Express Limited (BDC).  He is widely travelled.</p>
"],
            ['id' => 'yusuf','title' => "Y.O Yussuff - Director", "desc" => "<p>He is the Vice Chairman of the Board of Directors. He is a professional Banker, Chartered Stockbroker, a fellow of the Chartered Institute of Stockbrokers. He has over Twenty Five (25) Years Capital Market experience which include being the:<ul><li>Principal Dealing Clerk ICON Limited/ICON stockbrokers from 1976 to 1986</li><li>Senior Manager (Corporate Finance) ICON Limited (Merchant Bankers)
</li><li>General Manager (Corporate Banking) Eko international Bank plc to 1994
</li><li>Managing Director of Ibile Holdings Limited (the Investment Company of Lagos State) which is one of the largest portfolio managing companies in the industry.
</li></ul></p><br><p>He brings to the Board his wealth of experience in Stockbroking, Capital Market Operations, Investment Management, Banking & other Financial Services.
</p><br>"],
            ['id' => 'emeka','title' => "Emeka Madubuike - Director", "desc" => "<p>A chartered Accountant, Chartered Tax Practitioner and Chartered Stockbroker, Emeka has been in the finance industry for over 37 years during which he has been involved in both the money and capitals markets at management levels.</p><br>"],
            ['id' => 'onukwe','title' => "Sam Onukwe - Director", "desc" => "<p>Sam Onukwe is an astute banker with vast exposure. He has extensive banking and capital market experience gained over 28 years with the Central Bank of Nigeria, Merchant and Commercial Banks and Multinational Financial Institutions. He serves on the Board of many companies as well as professional bodies/trade groups. He is the founder and pioneer CEO of Mega Equities Ltd (Members of the Nigerian Stock Exchange) which he has successfully piloted since its inception in 2002.</p><br>"],
            ['id' => 'akeredolu','title' => "Akin Akeredolu-Ale - Managing Director", "desc" => "<p>An astute market analyst and operator, Akinsola has worked in various capacities since he became an authorized dealer in 1994 and a chartered stockbroker in 1995 and a fellow of the Chartered Institute of Stockbrokers in 2008. His first degree was earned from the University of Lagos. He has a Masters degree in Corporate Governance from the Leeds Metropolitan University, UK and is an Associate of the Nigerian Institute of Management.</p><br><p>He has over 23 years of experience in wealth management- both in capital and money markets. His career began as a Manager in Fidelity Finance Company in 1992. Akin has managed large portfolios since then. In 1997, he was the pioneer General Manager and Chief Executive of BFCL Assets & Securities Limited (A Subsidiary of Oceanic International Bank Plc), in 1997 he was Managing Director and Chief Executive of State Street Global Acquisitions Limited, a position he held until he joined Fountain Securities Limited in the capacity of an executive director in 2002. He then moved to Arian Capital Management in 2006 to 2008 as the Chief Operating Officer before joining DSU Brokerage as The Managing Director. He is currently the Group CEO of Gem Assets Management Ltd. He has served on various Committees at the Federal Government level including Vision 2020 Corporate Governance Thematic group and the Coordinator Financing Mechanism for National Integrated Infrastructure Master Plan.</p><br><p>He is a Fellow of The Chartered Institute of Stock Brokers. He is currently the General Secretary of Association of Stockbroking Houses of Nigeria (ASHON).</p>"],
            ['id' => 'allwell1','title' => "Allwell Umunnaehila - Management", "desc" => "<p>Dr Allwell Umunnaehila is the Head, Research/ Strategy and Business Development of the Lagos Commodities and Futures Exchange. He is a Chartered Stockbroker with a dealership license of the Nigerian Stock Exchange and Securities and Exchange Commission. He is also an Associate Member of the Chartered Institute of Stockbrokers. </p><br><p>He is a prize winner having made Distinction in Financial Futures and Options course in the CIS 2008 professional examination. He holds a Ph.D in Business Administration with specialization in Strategic Management from Babcock University, Ilishan. He also holds a Masters in Business Administration with specialization in Finance and Banking from the University of Nigeria, Nsukka. He has a Post Graduate Diploma in Finance and Banking from the University of Nigeria, Nsukka. </p><br><p>His career has a blend of both civil service and private sector experience having worked with the Federal Civil Service as a Civil Engineer for about 18 years before joining the private sector.</p><br><p>He worked in Mega Equities Ltd and ECL Asset Management Ltd, stock broking companies which are members of the Nigerian Stock Exchange. At ECL Asset Management, he rose through the ranks to reach the enviable position of the Managing Director and Chief Executive of the firm. </p><br><p>He has been an Assessor and an Examiner in Derivatives with the Chartered Institute of Stockbrokers professional exams for the past six years. He is a member of the Education Committee as well as the curricular sub-committee of the Chartered Institute of Stockbrokers.</p><br> <p>He represented CIS in the Critique and Editorial National workshop on Introduction of Capital Market Studies into Basic and Senior Secondary Schools Curriculum organized by SEC in collaboration with Nigerian Education Research and Development Council (NERDC). He is a research specialist with two published books and other published articles in peer reviewed academic journals.</p><br><p> He is a Financial, Risk, Investment, Strategy and human development specialist with vast experience in corporate leadership training and SMEs management. He is a multidisciplinary professional with background in Civil Engineering, Banking and Finance, Business Administration and the capital market. A consummate financial, investment and business manager with about 10 years experience working with companies listed in the Nigerian capital market.
</p>"],
            ['id' => 'ifedayo','title' => "Ifedayo Ige - Management", "desc" => ""],
            ['id' => 'omowale','title' => "R.S Omowale - Management", "desc" => ""]
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
           * @param String $data
           * @param String $view
           * @param String $type (default = "view")
           **/

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
		   
		   function getStocks()
		   {
			     //Send request to stocks api
			      $url = "http://nigerianelite.com/api/stocks";
			   
			
			     $client = new Client([
                 // Base URI is used with relative requests
                 'base_uri' => 'http://httpbin.org',
                 // You can set any number of default request options.
                 //'timeout'  => 2.0,
                 ]);
			     $res = $client->request('GET', $url,['headers' => ['Accept' => 'application/json']]);
			  
                 $ret = $res->getBody()->getContents(); 
			 
			     $rett = json_decode($ret);
				 dd($rett);
				 return $ret;
		   }

}
?>