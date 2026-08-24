<?php
require('../partials/db_config.php');
require('../partials/essentials.php');
adminLogin();

if(isset($_POST['add_facility']))
{
    $frm_data = filteration($_POST);

    $img_r = uploadSVGImage($_FILES['icon'], FACILITIES_FOLDER);

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
        $q = "INSERT INTO `facilities`(`icon`, `name`, `desc`) VALUES (?,?,?)";
        $values = [$img_r, $frm_data['name'], $frm_data['desc']];
        $res = insert($q,$values,'sss');
        echo $res;

    }
}

if(isset($_POST['get_facilities']))
{
    $res = selectAll('facilities');
    $i=1;
    $path = FACILITIES_IMG_PATH;

    while($row = mysqli_fetch_assoc($res))
    {
        echo <<<data
        <tr>
            <td>$i</td>
            <td><img src="$path$row[icon]" style="height:35px; width:35px; border-radius:100%;"></td>
            <td>$row[name]</td>
            <td>$row[desc]</td>
            <td>
            <button type="button" onclick="rem_facility($row[id])" class="btn btn-danger btn-sm shadow-none">
            <i class="bi bi-trash"></i> Delete
            </button>
        </tr>
        data;
        $i++;
    }
}

if(isset($_POST['rem_facility']))
{
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_facility']];
    $check_q = select('SELECT * FROM `room_facilities` WHERE `facilities_id`=?',[$frm_data['rem_facility']], 'i');

    if(mysqli_num_rows($check_q)==0){
        $pre_q = "SELECT * FROM `facilities` WHERE `id`=?";
        $res = select($pre_q, $values,'i');
        $img = mysqli_fetch_assoc($res);
    

    if(deleteImage($img['icon'], FACILITIES_FOLDER)){
        $q = "DELETE FROM `facilities` WHERE `id`=?";
        $res = delete($q,$values,'i');
        echo $res;
    }
    else{
        echo 0;
    }
}
else{
        echo 'room_added';
    }
}