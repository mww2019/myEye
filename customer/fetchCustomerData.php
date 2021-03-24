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
        $sqlquery = "SELECT * FROM customer WHERE status=1";
    } else {
        $sqlquery = "SELECT * FROM customer WHERE status=1 and branch='$branch'";
    }

    $sql = $sqlquery;
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  

    $sql = $sqlquery;
    if (!empty($requestData['search']['value'])) {  
        $sql .= " AND ( cust_id LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR name LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR phone LIKE '" . $requestData['search']['value'] . "%' )";
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
        $nestedData[] = $row["cust_id"];
        $nestedData[] = ucwords($row["shop"]);
        $nestedData[] = ucwords($row["name"]);
        $nestedData[] = $row["phone"];
        // $nestedData[] = $row["email"];
        $nestedData[] = ucwords($row["address"]);
        $nestedData[] = $row["age"];
        $nestedData[] = date('M, d Y', strtotime($row["dte_created"]));

        $nestedData[] = '<button type="button" data-toggle="modal" data-target="#customerUpModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn upModelBtn" title="Edit"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button onclick="delCustomer('. $row['id'] .')" type="button" class="btn btn-danger waves-effect actionBtn" title="Delete"><i class="material-icons">delete</i></button>';

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