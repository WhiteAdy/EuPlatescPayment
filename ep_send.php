<?php
//mysqli_real_escape_string( )
	$mid="HIDDEN (for presentation only)";
	$key="HIDDEN (for presentation only)";
	
	$data = array(
		'amount'      => '10.00',
		'curr'        => 'EUR',
		'invoice_id'  => "55555",
		'order_desc'  => 'Ajutor Social',
		'merch_id'    => $mid,
		'timestamp'   => date("YmdHis"), 
		'nonce'       => md5(mt_rand().time()),
	); 

	$data['fp_hash'] = strtoupper(euplatesc_mac($data,$key));
	
	$data['fname']=test_input($_POST['euplatesc-fname']);
	$data['lname']=test_input($_POST['euplatesc-lname']);
	$data['email']=test_input($_POST['euplatesc-email']);
	
	$data['ExtraData[successurl]']="https://site.ro/success";
	
	//echo '<a href="https://secure.euplatesc.ro/tdsprocess/tranzactd.php?'.http_build_query($data).'">10 euro</a>';
	$zeceEuro = http_build_query($data);




	$data = array(
		'amount'      => '50.00',
		'curr'        => 'EUR',
		'invoice_id'  => "55555",
		'order_desc'  => 'Ajutor Social',
		'merch_id'    => $mid,
		'timestamp'   => date("YmdHis"), 
		'nonce'       => md5(mt_rand().time()),
	); 

	$data['fp_hash'] = strtoupper(euplatesc_mac($data,$key));
	
	$data['fname']=test_input($_POST['euplatesc-fname']);
	$data['lname']=test_input($_POST['euplatesc-lname']);
	$data['email']=test_input($_POST['euplatesc-email']);
	
	$data['ExtraData[successurl]']="https://site.ro/success";

	//echo '<a href="https://secure.euplatesc.ro/tdsprocess/tranzactd.php?'.http_build_query($data).'">50 euro</a>';
	$cinciZeciEuro = http_build_query($data);




	$data = array(
		'amount'      => '100.00',
		'curr'        => 'EUR',
		'invoice_id'  => "55555",
		'order_desc'  => 'Ajutor Social',
		'merch_id'    => $mid,
		'timestamp'   => date("YmdHis"), 
		'nonce'       => md5(mt_rand().time()),
	); 

	$data['fp_hash'] = strtoupper(euplatesc_mac($data,$key));
	
	$data['fname']=test_input($_POST['euplatesc-fname']);
	$data['lname']=test_input($_POST['euplatesc-lname']);
	$data['email']=test_input($_POST['euplatesc-email']);
	
	$data['ExtraData[successurl]']="https://site.ro/success";

	//echo '<a href="https://secure.euplatesc.ro/tdsprocess/tranzactd.php?'.http_build_query($data).'">100 euro</a>';
	$oSutaEuro = http_build_query($data);


	$data = array(
		'amount'      => '200.00',
		'curr'        => 'EUR',
		'invoice_id'  => "55555",
		'order_desc'  => 'Ajutor Social',
		'merch_id'    => $mid,
		'timestamp'   => date("YmdHis"), 
		'nonce'       => md5(mt_rand().time()),
	); 

	$data['fp_hash'] = strtoupper(euplatesc_mac($data,$key));
	
	$data['fname']=test_input($_POST['euplatesc-fname']);
	$data['lname']=test_input($_POST['euplatesc-lname']);
	$data['email']=test_input($_POST['euplatesc-email']);
	
	$data['ExtraData[successurl]']="https://site.ro/success";

	//echo '<a href="https://secure.euplatesc.ro/tdsprocess/tranzactd.php?'.http_build_query($data).'">200 euro</a>';
	$douaSuteEuro = http_build_query($data);

	



	$data = array(
		'amount'      => test_input($_POST['euplatesc-custom']),
		'curr'        => 'EUR',
		'invoice_id'  => "55555",
		'order_desc'  => 'Ajutor Social',
		'merch_id'    => $mid,
		'timestamp'   => date("YmdHis"), 
		'nonce'       => md5(mt_rand().time()),
	); 

	$data['fp_hash'] = strtoupper(euplatesc_mac($data,$key));
	
	$data['fname']=test_input($_POST['euplatesc-fname']);
	$data['lname']=test_input($_POST['euplatesc-lname']);
	$data['email']=test_input($_POST['euplatesc-email']);
	
	$data['ExtraData[successurl]']="https://site.ro/success";

	//echo '<a href="https://secure.euplatesc.ro/tdsprocess/tranzactd.php?'.http_build_query($data).'">200 euro</a>';
	$customEuro = http_build_query($data);








	
	function hmacmd5($key,$data) {
		$blocksize = 64;
		$hashfunc  = 'md5';
		if(strlen($key) > $blocksize){
			$key = pack('H*', $hashfunc($key));
		}
		$key  = str_pad($key, $blocksize, chr(0x00));
		$ipad = str_repeat(chr(0x36), $blocksize);
		$opad = str_repeat(chr(0x5c), $blocksize);
		$hmac = pack('H*', $hashfunc(($key ^ $opad) . pack('H*', $hashfunc(($key ^ $ipad) . $data))));
		return bin2hex($hmac);
	}

	function euplatesc_mac($data, $key){
		$str = NULL;
		foreach($data as $d){
			if($d === NULL || strlen($d) == 0){
				$str .= '-'; // valorile nule sunt inlocuite cu -
			}else{
				$str .= strlen($d) . $d;
			}
		}
		$key = pack('H*', $key); // convertim codul secret intr-un string binar
		return hmacmd5($key, $str);
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	  }


?>