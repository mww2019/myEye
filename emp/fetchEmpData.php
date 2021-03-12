<?php

session_start();

include '../comm/db.php';
$branch = $_SESSION['branch'];

$requestData = $_REQUEST;
$columns = array(
        0 => 'name',
        1 => 'address',
        2 => 'phone',
        3 => 'email',
        4 => 'assign',
        5 => 'type'
    );

    if($branch === ''){
        $sqlQuery = "SELECT u.id as id, u.name as name, u.email as email, u.phone as phone, u.emp_type as emp_type, u.address as address, u.branch as branch, s.name as assignShop FROM user as u LEFT JOIN shop as s on u.assign_shop = s.id WHERE u.status=1";
    } else {
        $sqlQuery = "SELECT u.id as id, u.name as name, u.email as email, u.phone as phone, u.emp_type as emp_type, u.address as address, s.name as assignShop FROM user as u LEFT JOIN shop as s on u.assign_shop = s.id WHERE u.branch='$branch' and u.status=1";
    }

    $sql = $sqlQuery;
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");
    $totalData = mysqli_num_rows($query);
    $totalFiltered = $totalData;  

    $sql = $sqlQuery;
    if (!empty($requestData['search']['value'])) {  
        $sql .= " AND ( u.name LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR u.phone LIKE '" . $requestData['search']['value'] . "%' ";
        $sql .= " OR u.address LIKE '" . $requestData['search']['value'] . "%' )";
    }

    $query = mysqli_query($conn, $sql) or die("Mysql  Error in getting : get products");
    $totalFiltered = mysqli_num_rows($query); 

    $sql .= " ORDER BY u.id DESC LIMIT " . $requestData['start'] . " ," . $requestData['length'] . "   ";
    $query = mysqli_query($conn, $sql) or die("Mysql Mysql Error in getting : get products");

    $data = array();
    $no = 1;
    while ($row = mysqli_fetch_array($query)) {  
        $nestedData = array();
        $nestedData[] = $no;
        $nestedData[] = ucwords($row["name"]);
        $nestedData[] = $row["email"];
        $nestedData[] = $row["phone"];
        if($branch === ''){
            $nestedData[] = $row["branch"]?ucwords($row["branch"]):'NULL';
        }
        $nestedData[] = $row["assignShop"]?ucwords($row["assignShop"]):'NULL';
        $nestedData[] = ucwords($row["emp_type"]);
        $nestedData[] = ucwords($row["address"]);
        if($row["email"] === $_SESSION['username']){
            $nestedData[] = '<button type="button" data-toggle="modal" data-target="#empUpModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn upModelBtn" title="Edit"><i class="material-icons">edit</i></button>';
        } else {
            $nestedData[] = '<button type="button" data-toggle="modal" data-target="#empUpModal" data-vendor='. $row['id'] .' class="btn btn-primary waves-effect actionBtn upModelBtn" title="Edit"><i class="material-icons">edit</i></button>&nbsp;&nbsp;<button onclick="delEmployee('. $row['id'] .')" type="button" class="btn btn-danger waves-effect actionBtn" title="Delete"><i class="material-icons">delete</i></button>';
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