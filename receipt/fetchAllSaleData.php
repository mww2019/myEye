<?php

session_start();
error_reporting(0);
include '../comm/db.php';
$branch = $_SESSION['branch'];
$shop   = $_POST['shop'];

$getDate        = explode(' - ',$_POST['date']);
$date1          = explode(' ',$getDate[0]);
$monthNo1       = date('m', strtotime($date1[0]));
$removeComma1   = explode(',',$date1[1]);
$from           = $date1[2].'-'.$monthNo1.'-'.$removeComma1[0];
$date2          = $getDate[1];
if($date2 == ''){
    $to = $date1[2].'-'.$monthNo1.'-'.$removeComma1[0];
} else{
    $date21         = explode(' ',$getDate[1]);
    $monthNo2       = date('m', strtotime($date21[0]));
    $removeComma2   = explode(',',$date21[1]);
    $to             = $date21[2].'-'.$monthNo2.'-'.$removeComma2[0];
}

// echo $from.' - '.$to;
// die;

$requestData = $_REQUEST;
$columns = array(
        0 => 'name',
        1 => 'address',
        2 => 'phone',
        3 => 'name',
        4 => 'quality',
        5 => 'quantity',
        6 => 'pur_price',
        7 => 'sell_price',
        8 => 'tax'
    );

    if($shop === ''){
        if($branch === '') {
            $sqlquery = "SELECT s.id as sid, s.cust_id as cust_id, c.name as name, c.phone as phone, c.address as address, s.shop as shop, s.total_amt as amt, s.notes as notes, s.dte_created as sDate FROM sales as s LEFT JOIN customer as c on s.cust_id = c.cust_id WHERE s.sale_status='paid' AND s.status=1 AND (DATE(s.dte_created) BETWEEN '$from' AND '$to')";
        } else {
            $sqlquery = "SELECT s.id as sid, s.cust_id as cust_id, c.name as name, c.phone as phone, c.address as address, s.shop as shop, s.total_amt as amt, s.notes as notes, s.dte_created as sDate FROM sales as s LEFT JOIN customer as c on s.cust_id = c.cust_id WHERE s.sale_status='paid' AND s.status=1 AND s.branch='$branch' AND (DATE(s.dte_created) BETWEEN '$from' AND '$to')";
        }

    } else {
        if($branch === '') {
            $sqlquery = "SELECT s.id as sid, s.cust_id as cust_id, c.name as name, c.phone as phone, c.address as address, s.shop as shop, s.total_amt as amt, s.notes as notes, s.dte_created as sDate FROM sales as s LEFT JOIN customer as c on s.cust_id = c.cust_id WHERE s.sale_status='paid' AND s.status=1 AND s.shop='$shop' AND (DATE(s.dte_created) BETWEEN '$from' AND '$to')";
        } else {
            $sqlquery = "SELECT s.id as sid, s.cust_id as cust_id, c.name as name, c.phone as phone, c.address as address, s.shop as shop, s.total_amt as amt, s.notes as notes, s.dte_created as sDate FROM sales as s LEFT JOIN customer as c on s.cust_id = c.cust_id WHERE s.sale_status='paid' AND s.status=1 AND s.shop='$shop' AND s.branch='$branch' AND (DATE(s.dte_created) BETWEEN '$from' AND '$to')";
        }
    }

    $sql = $sqlquery;
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  

    $sql = $sqlquery;
    if (!empty($requestData['search']['value'])) {  
        $sql .= " AND ( s.cust_id LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR c.phone LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR s.shop LIKE '" . $requestData['search']['value'] . "%' )";
    }

    $query = mysqli_query($conn, $sql) or die("Mysql Error in getting : get products");
    $totalFiltered = mysqli_num_rows($query); 

    $sql .= " ORDER BY s.id DESC LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");

    $data = array();
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {  
        $nestedData = array();
        $nestedData[] = $no;
        if($branch === ''){
            $nestedData[] = ucwords($row["branch"]);
        }
        $nestedData[] = '<a href="custAllData.php?id='.$row["cust_id"].'">'.ucwords($row["name"]).'</a>';
        $nestedData[] = $row["phone"];
        $nestedData[] = $row["address"];
        $nestedData[] = $row["shop"];
        $nestedData[] = $row["amt"];
        $nestedData[] = $row["notes"];
        $nestedData[] = date('M, d Y', strtotime($row["sDate"]));
        $nestedData[] = '<a href="receipt.php?id='.$row["sid"].'&fr=finalSale" target="_blank"><i class="material-icons" title="Print Receipt">print</i></a>';
        // $nestedData[] = '<a href="custAllData.php?id='.$row["cust_id"].'">'.$row["cust_id"].'</a>';
        // $nestedData[] = ucwords($row["shop"]);
        // $nestedData[] = $row["total_amt"];
        // $nestedData[] = $row["discount"];
        // $nestedData[] = $row["amt_paid"];
        // $nestedData[] = $row["amt_bal"];
        // $nestedData[] = $row["notes"];
        // $nestedData[] = date('M, d Y', strtotime($row["dte_created"]));

        $data[] = $nestedData;
        $no++;
    }
    $json_data = array(
        "draw" => intval($requestData['draw']),   
        "recordsTotal" => intval($totalData),  
        "recordsFiltered" => intval($totalFiltered), 
        "data" => $data  
    );
    echo json_encode($json_data);  

?>