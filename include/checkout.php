<?php
	include('connection.php');
	include('functions.php');
	$functions = new functions;
	
	$token = $_POST['stripeToken'];
	$amount = $_POST['stripeAmt'];
	$final_amt = $amount/100;
	
	require_once('../stripe-php/init.php');
	
	 $stripe_api_key = 'sk_live_DQ5ZMg2Vh6QpZL89CWxnA1Lg';       
	//$stripe_api_key = 'sk_test_suVHil5M7pfrN2WfpJMAGv6C';       
	\Stripe\Stripe::setApiKey($stripe_api_key);
	$customer_email = $functions->get_email_id($_SESSION['student_login']);
	$customer = \Stripe\Customer::create(array(
		'email' => $customer_email, // customer email id
		'card'  => $token
	));
	
	$charge = \Stripe\Charge::create(array(
		'customer'  => $customer->id,
		'amount'    => ceil($amount),//*100
		'currency'  => 'USD'
	));
	
	$txn_id = $charge->id;
	$txn_status = $charge->status;
	
	if($charge->paid == true)
	{
		if(isset($charge->balance_transaction))
		{
			$tk = $charge->balance_transaction;
		}
		else
		{
			$tk = '';
		}
		
		$customer = (array) $customer;
		$charge = (array) $charge;
		
		$paymentDetail	=	"Customer Info: \n".json_encode($customer,true)."\n \n Charge Info: \n".json_encode($charge,true);
		
		$array_val = array("txn_id" => $txn_id, "student_id"=> $_SESSION['student_login'], "payment_detail"=> addslashes($paymentDetail), "paid_amount"=> $final_amt, "status"=> $txn_status, "created_date" => date('Y-m-d H:i:s'));
		$insert_info = insert_table_data($array_val, 'tbl_payments');
		$subscribtion_id = last_id();
		if($subscribtion_id!='')
		{
			$duration = $functions->get_package_duration($_POST['stripePID'], $_POST['stripeCID']);
			
			$last_expiry_date = $functions->get_expiry_date($_SESSION['student_login'], $_POST['stripeCID']);
			if($last_expiry_date == '')
			{
				$start_date = date('Y-m-d');
				$expire = date("Y-m-d", strtotime($duration));
			}
			else
			{
				$start_date = date('Y-m-d', strtotime($last_expiry_date. ' +1 days'));
				$expire = date('Y-m-d', strtotime($start_date. ' +'.$duration));
			}
			
			$array_val = array("student_id"=> $_SESSION['student_login'], "category_id"=> $_POST['stripeCID'], "package_id"=> $_POST['stripePID'], "subscription_date"=> $start_date, "expiry_date"=> $expire, "status"=> $txn_status, "txn_id"=> $txn_id, "payment_id"=> $subscribtion_id, "created_date" => date('Y-m-d H:i:s'));
			$insert_info = insert_table_data($array_val, 'tbl_subscribe_package');
		}
		header("Location: ../memberarea?cid=".$_POST['stripePID']."");
	}
	else
	{
		/* $this->session->set_flashdata('error'," Payment Failed");            
		redirect('checkout'); */
	}
?>	