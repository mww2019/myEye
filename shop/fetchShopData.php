<?php

session_start();
include '../comm/db.php';

$branch = $_SESSION['branch'];

$requestData = $_REQUEST;
$columns = array(
        0 => 'name',
        1 => 'address',
        2 => 'phone'
    );

    $sql = "SELECT * FROM shop WHERE branch='$branch' and status=1";
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  

    $sql = "SELECT * FROM shop WHERE branch='$branch' and status=1";
    if (!empty($requestData['search']['value'])) {  
        $sql .= " AND ( name LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR phone LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR address LIKE '" . $requestData['search']['value'] . "%' )";
    }

    $query = mysqli_query($conn, $sql) or die("Mysql  Error in getting : get products");
    $totalFiltered = mysqli_num_rows($query); 

    $sql .= " ORDER BY id DESC LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");

    $data = array();
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {  
        $nestedData = array();
        $nestedData[] = $no;
        $nestedData[] = ucwords($row["name"]);
        $nestedData[] = $row["phone"];
        $nestedData[] = ucwords($row["address"]);
        $nestedData[] = '<button type="button" data-toggle="modal" data-target="#shopUpModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn upModelBtn" title="Edit"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button onclick="delShop('. $row['id'] .')" type="button" class="btn btn-danger waves-effect actionBtn" title="Delete"><i class="material-icons">delete</i></button>';

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