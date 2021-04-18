<?php

session_start();
include '../comm/db.php';
$branch = $_SESSION['branch'];

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

    if($branch === '') {
        $sqlquery = "SELECT * FROM sales WHERE status=1";
    } else {
        $sqlquery = "SELECT * FROM sales WHERE status=1 and branch='$branch'";
    }

    $sql = $sqlquery;
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  

    $sql = $sqlquery;
    if (!empty($requestData['search']['value'])) {  
        $sql .= " AND ( cust_id LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR cust_phone LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR shop LIKE '" . $requestData['search']['value'] . "%' )";
    }

    $query = mysqli_query($conn, $sql) or die("Mysql Error in getting : get products");
    $totalFiltered = mysqli_num_rows($query); 

    $sql .= " ORDER BY id DESC LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");

    $data = array();
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {  
        $nestedData = array();
        $nestedData[] = $no;
        if($branch === ''){
            $nestedData[] = ucwords($row["branch"]);
        }
        $nestedData[] = '<a href="custAllData.php?id='.$row["cust_id"].'">'.$row["cust_id"].'</a>';
        $nestedData[] = ucwords($row["shop"]);
        $nestedData[] = $row["total_amt"];
        $nestedData[] = $row["discount"];
        $nestedData[] = $row["amt_paid"];
        $nestedData[] = $row["amt_bal"];
        $nestedData[] = $row["notes"];
        $nestedData[] = date('M, d Y', strtotime($row["dte_created"]));
        $nestedData[] = '<a href="receipt.php?id='.$row["id"].'" target="_blank"><i class="material-icons" title="Print Receipt">print</i></a>';

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