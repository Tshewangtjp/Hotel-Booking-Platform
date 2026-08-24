<?php
require('../partials/db_config.php');
require('../partials/essentials.php');
adminLogin();

if(isset($_POST['add_activity']))
{
    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['picture'], ACTIVITY_FOLDER);

    if($img_r == 'inv_img'){
        echo $img_r;
    }
    else if($img_r == 'inv_size'){
        echo $img_r;
    }
    else if($img_r == 'upload_failed'){
        echo $img_r;
    }
    else{
        $q = "INSERT INTO `activities`(`name`, `picture`) VALUES (?,?)";
        $values = [$frm_data['name'], $img_r];
        $res = insert($q,$values,'ss');
        echo $res;

    }
}

if(isset($_POST['get_activity']))
{
    $res = selectAll('activities');
    $i=1;
    $path = ACTIVITY_IMG_PATH;

    while($row = mysqli_fetch_assoc($res))
    {
        echo <<<data
        <tr>
            <td>$i</td>
            <td><img src="$path$row[picture]" style="height:205px; width:205px;"></td>
            <td>$row[name]</td>
            <td>
            <button type="button" onclick="rem_activity($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
            <i class="bi bi-trash"></i> Delete
            </button>
            </td>
        </tr>
        data;
        $i++;
    }
}



if(isset($_POST['rem_activity']))
{
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_activity']];

    $pre_q = "SELECT * FROM `activities` WHERE `sr_no`=?";
    $res = select($pre_q, $values,'i');
    $img = mysqli_fetch_assoc($res);

    if(deleteImage($img['picture'], ACTIVITY_FOLDER)){
        $q = "DELETE FROM `activities` WHERE `sr_no`=?";
        $res = delete($q,$values,'i');
        echo $res;
    }
    else {
        echo 0;
    }
}
