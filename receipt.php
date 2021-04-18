<?php 
    error_reporting(E_ALL);
    session_start();

    if($_SESSION['valid'] === true){
        // include_once('./emp/autoDta.php');
        $empName    = $_SESSION['uName'];
        $empType    = $_SESSION['empType'];
        $empMail    = $_SESSION['username'];
        $branch     = $_SESSION['branch'];
        // include_once('./comm/branchFetch.php');
        include './comm/db.php';
        $id = $_GET['id'];
        // echo $id;
        $rDFetch = "SELECT * FROM sales WHERE id='$id' "; 
		$rDFetchResult = $conn->query($rDFetch)->fetch_all(MYSQLI_ASSOC);

		$cust_id = $rDFetchResult[0]['cust_id'];
		$custFetch = "SELECT * FROM customer WHERE cust_id='$cust_id' ";
		$custFetchResult = $conn->query($custFetch)->fetch_all(MYSQLI_ASSOC);

		// $descp = explode('|',$rDFetchResult[0]['description']);
		// foreach($descp as $dd){
		// 	$inExplode = explode(',', $dd);
		// 	foreach ($inExplode as $value) {
		// 		echo $inExplode[0];
		// 	}
		// }
		// $brh = 	$rDFetchResult[0]['branch'];

		// echo "<pre>";
		// print_r($descp);
		// echo "</pre>";
		// die;



?>

<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
</head>
<body style="font-family: Verdana; font-size:11px;">
	<center>
		<table border="0" style="border: solid 1px #333;" width="800" cellpadding="7">
			<tr>
				<td>
					<table border="0" width="100%" cellpadding="3">
						<tr>
							<th align="left">MY EYE CARE OPTICAL</th>
							<th>INVOICE</th>
						</tr>
						<tr><td colspan="2">Mukhani Chowraha</td></tr>
						<tr><td colspan="2">Haldwani, Nainital, Uttarakhand</td></tr>
						<tr><td colspan="2">Phone: +91-9815865478</td></tr>
						<tr><td colspan="2">Email: myeyecare@gmail.com</td></tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table border="0" width="100%" cellpadding="10">
						<tr>
						   <td width="70%">
						   	<table border="0">
						   		<tr><th align="left">BILL TO</th></tr>
						   		<tr><td><?= ucwords($custFetchResult[0]['name']) ?></td></tr>
						   		<tr><td><?= ucwords($custFetchResult[0]['phone']) ?></td></tr>
						   		<tr><td><?= ucwords($custFetchResult[0]['address']) ?></td></tr>
						   	</table>
						   </td>
						   <td width="30%" style="text-align: right;" valign="top">
						   	<table width="100%" align="right" border="0">
						   		<tr><th>Invoice No.</th><td><?= $cust_id; ?></td></tr>
						   		<tr><th>Date</th><td><?= date('d F Y', strtotime($rDFetchResult[0]['dte_created'])) ?></td></tr>
						   		<!-- <tr><th>Due Date</th><td>12 April 2021</td></tr> -->
						   		<!-- <tr><th>Terms</th><td>rerer</td></tr> -->
						   	</table>	
						   </td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td>
					<table border="0" style="border:solid 1px #333; text-align:center;" cellspacing="0" width="100%">

						<tr>
							<th style="border-bottom:solid 1px #333;" width="50%">Description</th>
							<th style="border-bottom:solid 1px #333;" width="15%">Quantity</th>
							<th style="border-bottom:solid 1px #333;" width="20%">Unit Price</th>
							<th style="border-bottom:solid 1px #333;" width="25%">Amount</th>
						</tr>

						<?php 
							$descp = explode('|',$rDFetchResult[0]['description']);
							$bb = $rDFetchResult[0]['branch'];
							for($i=0;$i<count($descp);$i++){
								$inExplode = explode(',',$descp[$i]);  

								$pFetch = "SELECT * FROM $bb WHERE product_code='$inExplode[0]' "; 
								$pFetchResult = $conn->query($pFetch)->fetch_all(MYSQLI_ASSOC);

								// echo "<pre>";
								// print_r($pFetchResult);
								// echo "</pre>";
								// die;

								?>

								<tr>
									<td><?= ucwords($pFetchResult[0]['product_cat']).' - '.ucwords($pFetchResult[0]['product_name']).'['.$pFetchResult[0]['product_code'].']' ?></td>
									<td><?= $inExplode[1] ?></td>
									<td><?= $inExplode[2] ?></td>
									<td><?= $inExplode[3] ?></td>
								</tr>

						<?php } ?>
						
					</table>
					<table border="0" align="right" cellspacing="0" width="100%" style="text-align: center;">
						<tr>
							<td width="50%">&nbsp;</td><td width="15%"></td>
							<th style="border:solid 1px #333; border-top:0px; border-right: 0px;" width="20%">Total</th>
							<td style="border:solid 1px #333; border-top:0px;" width="25%"><?= $rDFetchResult[0]['total_amt'] ?></td>
						</tr>
						<tr>
							<td width="50%">&nbsp;</td><td width="15%"></td>
							<th style="border:solid 1px #333; border-top:0px; border-right: 0px;" width="20%">Discount</th>
							<td style="border:solid 1px #333; border-top:0px;" width="25%"><?= $rDFetchResult[0]['discount'] ?></td>
						</tr>
						<tr>
							<td width="50%">&nbsp;</td><td width="15%"></td>
							<th style="border-left:solid 1px #333;" width="20%">Paid Amt</th>
							<td style="border-left:solid 1px #333; border-right:solid 1px #333;" width="25%">
						<?php $paidAmt = ($rDFetchResult[0]['total_amt']-$rDFetchResult[0]['amt_bal'])-$rDFetchResult[0]['discount'];
								echo $paidAmt;
								 ?>
							</td>
						</tr>
						<tr>
							<td width="50%">&nbsp;</td>
							<td width="15%"></td>
							<th style="border:solid 1px #333; border-right:0px;" width="20%">Balance Amt</th>
							<td style="border:solid 1px #333;" width="25%"><?= $rDFetchResult[0]['amt_bal'] ?></td>
						</tr>
					</table>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>&nbsp;</td></tr>
			<tr><td>REMARKS: <?= $rDFetchResult[0]['notes'] ?></td></tr>
			<tr><td>&nbsp; </td></tr>
			<tr><td align="center">****This is a Computer Generated Invoice****</td></tr>
		</table>
		<button onclick="window.print();">Print</button>
		<!-- <a href="allReceipt.php"><button>Back</button></a> -->
	</center>
</body>
</html>

<?php }else{ header('Refresh: 2; URL = login.php'); } ?>    