<?php
//Database connection by using PHP PDO
include "include/init.php";

if(isset($_POST['action'])) {
    //Load all data in the table
    if($_POST['action'] == "Load") {
        $result = $user->selectAll();
        $output = ''; // Set Empty Value for this Variable

        $output .= '<table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th colspan="3">Action</th>
                        </tr>
                    </thead>';

        if($user->checkRowCount($result)) {
            //Loop all the data
            foreach($result as $row) {
                $output .= '<tbody>
                    <tr>
                        <td>'.$row["name"].'</td>
                        <td>'.$row["username"].'</td>
                        <td>'.$row["email"].'</td>
                        <td><button type="button" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button></td>
                        <td><button type="button" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button></td>
                    </tr>';
                            
            }
        } else {
            $output .= '<tr>
                            <td>Data not found</td>
                            </tr> 
                        </tbody>';
        }
        //Echo table
        $output .= "</table>";           
        echo $output;
    }
}

//Submit data to the server
if($_POST['action'] == "Create Record") {
    $result = $user->createData($_POST['name'],$_POST['username'],password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['email']);

    if(!empty($result)) {
        echo "Data Inserted";
    }
}

//Select data in the modal
if($_POST['action'] == "Select") {
    $output = array();
    $result = $user->selectUserByID($_POST['id']);

    foreach($result as $row) {
        $output["name"] = $row["name"];
        $output["username"] = $row["username"];
        $output["password"] = $row["password"];
        $output["email"] = $row["email"];
    }
    echo json_encode($output);
}

//Update data in modal 
if($_POST['action'] == "Update") {
    $result = $user->updateData($_POST['name'],$_POST['username'],$_POST['password'],$_POST['email'],$_POST['user_id']);
    if(!empty($result)) {
        echo "Data Updated";
    }
}

if($_POST['action'] == "Delete") {
    $result = $user->deleteData($_POST['id']);

    if(!empty($result)) {
        echo "Data Deleted";
    }
}


?>