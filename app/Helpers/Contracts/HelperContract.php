<?php
namespace App\Helpers\Contracts;

Interface HelperContract
{
        public function sendEmailSMTP($data,$view,$type="view");
        public function createUser($data);
}
 ?>