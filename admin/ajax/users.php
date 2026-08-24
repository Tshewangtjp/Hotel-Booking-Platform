<?php
require('../partials/db_config.php');
require('../partials/essentials.php');
adminLogin();


if(isset($_POST['get_users']))
{
    $res = selectAll('user_cred');
    
    $i=1;
    $path = USER_IMG_PATH;



    $data ="";

    while($row = mysqli_fetch_assoc($res))
    {
        $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm' data-bs-toggle='modal'>
                <i class='bi bi-trash'></i>
            </button>";

        if(!$row['status']){
            $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";
        }else{
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-success btn-sm shadow-none'>active</button>";
        }

        $date = date('d-m-Y H:i a',strtotime($row['datentime']));
        $data.="
        <tr>
        <td>$i</td>
        <td>
        <img src='$path$row[profile]' style='height: 65px; width: 55px;'>
        <br>
        $row[name]
        </td>
         <td>$row[email]</td>
          <td>$row[phonenum]</td>
           <td>$row[address] $row[pincode]</td>
            <td>$row[dob]</td>
            <td>$status</td>
            <td>$date</td>
            <td>$del_btn</td>
        </tr>


        ";
        $i++;
    }

    echo $data;
}



if(isset($_POST['toggle_status']))
{
    $frm_data = filteration($_POST);

    $q = "UPDATE `user_cred` SET `status`=? WHERE `id`=?";
    $v = [$frm_data['value'],$frm_data['toggle_status']];

    if(update($q,$v,'ii'))
    {
        echo 1;
    }else{
        echo 0;
    }
}



if(isset($_POST['remove_user']))
{
    $frm_data = filteration($_POST);
    $values = [$frm_data['remove_user']];

    $pre_q = "SELECT * FROM `user_cred` WHERE `id`=?";
    $res = select($pre_q, $values,'i');
    $img = mysqli_fetch_assoc($res);

    if(deleteImage($img['profile'], USER_FOLDER)){
        $q = "DELETE FROM `user_cred` WHERE `id`=?";
        $res = delete($q,$values,'i');
        echo $res;
    }
    else {
        echo 0;
    }

}


if(isset($_POST['search_user']))
{
    $frm_data = filteration($_POST);

    $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";
    $res = select($query,["%$frm_data[name]%"],'s');
    $i=1;
    $path = USER_IMG_PATH;

    if(mysqli_num_rows($res)==0){
        echo"
          <style>
            .no-result-icon {
                animation: bounce 1.2s infinite;
            }

            @keyframes bounce {
                0%, 100% {
                transform: translateY(0);
                }
                50% {
                transform: translateY(-8px);
                }
            }
            </style>

            <div class='text-center my-5 p-4 border rounded'>
            <i class='bi bi-emoji-frown fs-1 text-dark no-result-icon'></i>
            <p class='mt-3 fs-4 text-dark mb-0'><b>No Result Found!</b></p>
            </div>
        ";
        exit;
    }



    $data ="";

    while($row = mysqli_fetch_assoc($res))
    {
        $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sm' data-bs-toggle='modal'>
                <i class='bi bi-trash'></i>
            </button>";

        if(!$row['status']){
            $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>Inactive</button>";
        }else{
            $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-success btn-sm shadow-none'>active</button>";
        }

        $date = date('d-m-Y',strtotime($row['datentime']));
        $data.="
        <tr>
        <td>$i</td>
        <td>
        <img src='$path$row[profile]' style='height: 65px; width: 55px;'>
        <br>
        $row[name]
        </td>
         <td>$row[email]</td>
          <td>$row[phonenum]</td>
           <td>$row[address] $row[pincode]</td>
            <td>$row[dob]</td>
            <td>$status</td>
            <td>$date</td>
            <td>$del_btn</td>
        </tr>


        ";
        $i++;
    }

    echo $data;
}




?>