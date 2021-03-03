<?php

include '../comm/db.php';

$requestData = $_REQUEST;
$columns = array(
        0 => 'name',
        1 => 'address',
        2 => 'phone',
        3 => 'email',
        4 => 'company'
    );

    $sql = "SELECT * FROM supplier WHERE status=1";
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  

    $sql = "SELECT * FROM supplier WHERE status=1";
    if (!empty($requestData['search']['value'])) {  
        $sql .= " AND ( name LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR email LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR company LIKE '" . $requestData['search']['value'] . "%' )";
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
        $nestedData[] = $row["email"];
        $nestedData[] = $row["phone"];
        $nestedData[] = ucwords($row["company"]);
        $nestedData[] = ucwords($row["products"]);
        $nestedData[] = '<button type="button" data-toggle="modal" data-target="#supplierUpModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn upModelBtn" title="Edit"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button onclick="delSupplier('. $row['id'] .')" type="button" class="btn btn-danger waves-effect actionBtn" title="Delete"><i class="material-icons">delete</i></button>';

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

