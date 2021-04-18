<?php

session_start();
include '../comm/db.php';
$branch = $_SESSION['branch'];

$cust_id = $_POST['id'];

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

    $sqlquery = "SELECT * FROM sales WHERE status=1 and cust_id='$cust_id'";

    $sql = $sqlquery;
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  

    $sql = $sqlquery;
    if (!empty($requestData['search']['value'])) {  
        $sql .= " AND ( cust_id LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR shop LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR cust_phone LIKE '" . $requestData['search']['value'] . "%' )";
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
        // $nestedData[] = $row["cust_id"];
        $nestedData[] = ucwords($row["shop"]);
        $nestedData[] = $row["total_amt"];
        $nestedData[] = $row["discount"];
        $nestedData[] = $row["amt_paid"];
        $nestedData[] = $row["amt_bal"];
        $nestedData[] = $row["notes"];
        $nestedData[] = date('M, d Y', strtotime($row["dte_created"]));

        if($no == 1) {
            if($row["amt_bal"] == 0){
                $nestedData[] = '<button type="button" data-toggle="modal" data-target="#descriptionModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn desModelBtn" title="Description"><i class="material-icons">description</i></button>';
            } else {
                $nestedData[] = '<div class="icon-button-demo"><button type="button" data-toggle="modal" data-target="#balPaymentModal" data-vendor='. $row['id'] .' class="btn bg-light-green waves-effect actionBtn balModelBtn" title="Pay Balance Amount"><i class="material-icons">payment</i></button><button type="button" data-toggle="modal" data-target="#descriptionModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn desModelBtn" title="Description"><i class="material-icons">description</i></button></div>';
            }
        } else {
            if($row["amt_bal"] == 0){
                $nestedData[] = '<button type="button" data-toggle="modal" data-target="#descriptionModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn desModelBtn" title="Description"><i class="material-icons">description</i></button>';
            } else {
                $nestedData[] = '<div class="icon-button-demo"><button type="button" data-toggle="modal" data-target="#balPaymentModal" data-vendor='. $row['id'] .' class="btn bg-light-green waves-effect actionBtn balModelBtn" title="Pay Balance Amount" disabled><i class="material-icons">payment</i></button><button type="button" data-toggle="modal" data-target="#descriptionModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn desModelBtn" title="Description" disabled><i class="material-icons">description</i></button></div>';
            }
        }
        

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