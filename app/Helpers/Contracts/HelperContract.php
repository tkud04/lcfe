<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmailSMTP($data,$view,$type="view");
        public function createUser($data);
        public function getStocks();
        public function getStockChunks();
		public function checkout($user, $data, $type);
        public function payWithKloudPay($user, $data);
        public function payWithPayStack($user, $payStackResponse);
}
 ?>