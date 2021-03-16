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


    $sql = "SELECT id,code,name FROM product_frame WHERE status=1";
    // $sql = "SELECT pf.id as id, pf.code as code, pf.name as name, b.purchase_price as purchase_price, b.selling_price as selling_price, b.tax as tax, b.quantity as quantity FROM product_frame as pf LEFT JOIN $branch as b on pf.code = b.product_code WHERE pf.status = 1";

    $query = mysqli_query($conn, $sql) or die("Mysql1 Error in getting : get products");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  

    $sql = "SELECT id,code,name FROM product_frame WHERE status=1";

    if (!empty($requestData['search']['value'])) {  
        $sql .= " AND ( code LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR name LIKE '" . $requestData['search']['value'] . "%' )";
    }

    $query = mysqli_query($conn, $sql) or die("Mysql2  Error in getting : get products");
    $totalFiltered = mysqli_num_rows($query); 

    $sql .= " ORDER BY id DESC LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    $query = mysqli_query($conn, $sql) or die("Mysql3 Error in getting : get products");

    $data = array();
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {  
        $nestedData = array();
        $nestedData[] = $no;
        $nestedData[] = '<a data-toggle="modal" data-target="#frameDetailsModal" data-vendor='. $row['id'] .' class="waves-effect actionBtn proDetails">'.$row["code"].'</a>';
        $nestedData[] = ucwords($row["name"]);

        if($branch === ''){
            $nestedData[] = '<a data-toggle="modal" data-target="#framePriceDetailsBranchModal" data-vendor='. $row['code'] .' class="btn btn-primary waves-effect actionBtn proCodeBranch">SHOW</a>';
        } else {
            $nestedData[] = '<a data-toggle="modal" data-target="#framePriceDetailsModal" data-vendor='. $row['code'] .' class="btn btn-primary waves-effect actionBtn proCode">SHOW</a>';
        }
        

        // $nestedData[] = 'Name: '.$row["name"].'</br>Comapny: '.$row["company"].'</br>Quality: '.$row["quality"].'</br>Colour: '.$row["color"].'</br>Size: '.$row["size"].'</br>Type: '.$row["type"].'</br>Gender: '.$row["gender"].'</br>Shape: '.$row["shape"].'</br>Material: '.$row["material"];

        // $nestedData[] = $row["purchase_price"];
        // $nestedData[] = $row["selling_price"];
        // $nestedData[] = $row["tax"];
        // $nestedData[] = $row["quantity"];
        // $nestedData[] = 'NA';

        $nestedData[] = '<button type="button" data-toggle="modal" data-target="#frameUpModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn upModelBtn" title="Edit"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button onclick="delFrame('. $row['id'] .')" type="button" class="btn btn-danger waves-effect actionBtn" title="Delete"><i class="material-icons">delete</i></button>';

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