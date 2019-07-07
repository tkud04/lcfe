@extends("layout")

@section('title',"Frequently Asked Questions")

@section('content')
@include('ad-space')   
<div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2 class="section-heading">Frequently asked questions</h2>
            <hr class="my-4">
            <div id="accordion">
                 <div class="card">
					 <div class="card-header" id="heading-1">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">How does KloudTransact work?</button>
                         </h5>
					 </div>

					 <div id="collapse-1" class="collapse" aria-labelledby="heading-1" data-parent="#accordion">
					     <div class="card-body">
							 Customers can shop on kloudtransact for items such as general groceries, fresh produce, beauty products, medicines, office supplies, books & magazines, tools & hardware and everything else you?ll find. When customers add items to their order basket, they have the choice of selecting their preferred delivery window from multiple options. The website is user-friendly and the service is interactive; we keep customers updated at every stage of the processing of their order.
						 </div>
					 </div>
				 </div>                 
				 <div class="card">
					 <div class="card-header" id="heading-2">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2">Will You Deliver To My Area?</button>
                         </h5>
					 </div>

					 <div id="collapse-2" class="collapse" aria-labelledby="heading-2" data-parent="#accordion">
					     <div class="card-body">
							With our partnership with a top notch logistics company, we are able to cover deliveries in a huge part of the country. If your preferred delivery address is not within our current coverage area, you may provide an alternative delivery address that is centrally located (perhaps your office or the home of a relative or friend that you visit frequently).
						 </div>
					 </div>
				 </div>                 
				 <div class="card">
					 <div class="card-header" id="heading-3">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-3" aria-expanded="true" aria-controls="collapse-3">When Will I Receive My Order?</button>
                         </h5>
					 </div>

					 <div id="collapse-3" class="collapse" aria-labelledby="heading-3" data-parent="#accordion">
					     <div class="card-body">
							At checkout, you are able to select a preferred time when you will like your order delivered. We deliver 7 days a week from 12pm to 9pm and can be at your door in as early as 3 hours after you order. See our <a asp-controller="Home" asp-method="privacy">Terms</a> for more details on our delivery service.
						 </div>
					 </div>
				 </div>				 
				 <div class="card">
					 <div class="card-header" id="heading-4">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-4" aria-expanded="true" aria-controls="collapse-4">How Do I Pay For My Order?</button>
                         </h5>
					 </div>

					 <div id="collapse-4" class="collapse" aria-labelledby="heading-4" data-parent="#accordion">
					     <div class="card-body">
							 We accept payment through the KloudPay wallet.
						 </div>
					 </div>
				 </div>				 
				 <div class="card">
					 <div class="card-header" id="heading-5">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-5" aria-expanded="true" aria-controls="collapse-5">Do Item Images Reflect Exactly What I Will<br>Receive?</button>
                         </h5>
					 </div>

					 <div id="collapse-5" class="collapse" aria-labelledby="heading-5" data-parent="#accordion">
					     <div class="card-body">
						     While most items show actual images of what will be delivered, some images may differ slightly from what is displayed on the website. This may occur for a variety of reasons including but not limited to a new/temporary packaging design by the manufacturer, promotional items, same content but different version of an item (e.g. different editions of books or varied book cover design depending on country of print). Some images may also be for illustration purposes only and may not exactly reflect the colour, size and shape of actual item; this is particularly relevant for fruits, vegetables and other fresh produce.
						 </div>
					 </div>
				 </div>				 
				 <div class="card">
					 <div class="card-header" id="heading-6">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-6" aria-expanded="true" aria-controls="collapse-6">How Are Weighed Items Priced?</button>
                         </h5>
					 </div>

					 <div id="collapse-6" class="collapse" aria-labelledby="heading-6" data-parent="#accordion">
					     <div class="card-body">
							 Prices of items that need to be weighed (e.g. fruits, vegetables, deli/cold cuts, meat) may be guide prices or approximated to enable you make a buying decision. However, you will only be billed for the actual weight purchased; any difference in guide to actual price will be credited/debited to your KloudPay wallet. Actual price of weighed items will be clearly stated on your invoice.
						 </div>
					 </div>
				 </div>				 
				 <div class="card">
					 <div class="card-header" id="heading-7">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-7" aria-expanded="true" aria-controls="collapse-7">What If An Item Is Unavailable?</button>
                         </h5>
					 </div>

					 <div id="collapse-7" class="collapse" aria-labelledby="heading-7" data-parent="#accordion">
					     <div class="card-body" align="left">
							 We go to great lengths to ensure we always find all items in your order. This often necessitates us checking as many as 6 retail outlets before concluding your order. If after checking multiple retailers, the item is still unavailable; our well-trained Personal Shoppers will contact you to offer suitable replacements. You are not obliged to accept the replacements and we will only purchase them after receiving a go-ahead from you.
						 </div>
					 </div>
				 </div>				 
				 <div class="card">
					 <div class="card-header" id="heading-8">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-8" aria-expanded="true" aria-controls="collapse-8">What Do You Consider A<br>'Suitable Replacement'?</button>
                         </h5>
					 </div>

					 <div id="collapse-8" class="collapse" aria-labelledby="heading-8" data-parent="#accordion">
					     <div class="card-body">
							 Replacements will typically be a different flavour to what you selected (e.g. apple juice instead of pineapple juice) OR a different brand of a similar quality item OR items with similar function to what you ordered (e.g. mint chewing gum instead of mint sweets).
						 </div>
					 </div>
				 </div>				 
				 <div class="card">
					 <div class="card-header" id="heading-9">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-9" aria-expanded="true" aria-controls="collapse-9">Do I Pay For Delivery If Items Are<br>Unavailable?</button>
                         </h5>
					 </div>

					 <div id="collapse-9" class="collapse" aria-labelledby="heading-9" data-parent="#accordion">
					     <div class="card-body">
							 While we make every effort to display an accurate list of items that are in stock at the stores we partner with, these stores are ultimately responsible for maintaining their invetory levels. In the normal course of a business day, the stores may occasionally run out of some items. You will not be obliged to pay for any unavailable item. If you are not satisfied with the replacement suggested to you by the Personal Shopper, We will refund the monetary value of the item to your KloudPay wallet.
						 </div>
					 </div>
				 </div>
				<div class="card">
					 <div class="card-header" id="heading-10">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-10" aria-expanded="true" aria-controls="collapse-9">What is KloudPay?</button>
                         </h5>
					 </div>

					 <div id="collapse-10" class="collapse" aria-labelledby="heading-10" data-parent="#accordion">
					     <div class="card-body">
							 KloudPay is your online wallet where you have monetary value to spend on any product on the kloudtransact platform. We may debit or credit your KloudPay wallet for various reasons including: refunding you for an unavailable item, reconciling the difference between guide and actual price for a weighed item, promotional offers, discounts and rebates.
						 </div>
					 </div>
				 </div>
				<div class="card">
					 <div class="card-header" id="heading-11">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-11" aria-expanded="true" aria-controls="collapse-11">What About Refunds?</button>
                         </h5>
					 </div>

					 <div id="collapse-11" class="collapse" aria-labelledby="heading-11" data-parent="#accordion">
					     <div class="card-body">
							 If an item you ordered is unavailable, we will continue to check for the item until it is back in stock. If, after our checks, the item remains out of stock, any credit due to you will br added to your KloudPay wallet. We do not process refunds to bank accounts.
                             In instances where your address is not within our delivery coverage locations or we later receive a payment which did not reflect in our account at the time you made it, we may process a refund to your account after deducting relevant bank charges.
						 </div>
					 </div>
				 </div>
				<div class="card">
					 <div class="card-header" id="heading-12">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-12" aria-expanded="true" aria-controls="collapse-12">Can I Return Items?</button>
                         </h5>
					 </div>

					 <div id="collapse-12" class="collapse" aria-labelledby="heading-12" data-parent="#accordion">
					     <div class="card-body">
							 If we deliver an incorrect or damaged item (damage that has been caused by us), we will happily replace the item at no additional cost to you. For us to replace such items, customers will need to notify the delivery driver of their observation at the point of delivery. Once customers have taken delivery of their order and signed confirming this, they take ownership of the items and kloudtransact will be unable to accept any returns.
						 </div>
					 </div>
				 </div>
				<div class="card">
					 <div class="card-header" id="heading-13">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-13" aria-expanded="true" aria-controls="collapse-13">Can I Cancel My Order?</button>
                         </h5>
					 </div>

					 <div id="collapse-13" class="collapse" aria-labelledby="heading-13" data-parent="#accordion">
					     <div class="card-body">
							 When we receive customer orders, we begin processing them immediately. And because we do not hold our own inventory and we only purchase from supermarkets and retail outlets when customers place orders, as soon as customers pay for their orders, we start purchasing their selected products. The retailers we buy from have a no-return policy so, we in turn, are unable to return any items customers purchase from us to the retailers. Thus, once an order has been placed and paid for, kloudtransact is unable to accept a cancellation of the order.
						 </div>
					 </div>
				 </div>
				<div class="card">
					 <div class="card-header" id="heading-14">
					     <h5 class="mb-0">
						     <button class="btn btn-link" data-toggle="collapse" data-target="#collapse-14" aria-expanded="true" aria-controls="collapse-14">How Can I Contact You?</button>
                         </h5>
					 </div>

					 <div id="collapse-14" class="collapse" aria-labelledby="heading-14" data-parent="#accordion">
					     <div class="card-body">
							 We are always happy to hear from you. If your question has not been covered in our FAQ page, please contact us at support@kloudtransact.com and we will respond immediately.
						 </div>
					 </div>
				 </div>
				 
			</div>
          </div>
        </div>

@stop