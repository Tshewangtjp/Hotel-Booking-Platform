<?php
require('../partials/db_config.php');
require('../partials/essentials.php');
adminLogin();

if(isset($_POST['add_place']))
{
    $frm_data = filteration($_POST);

    $img_r = uploadImage($_FILES['picture'], PLACE_FOLDER);

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
        $q = "INSERT INTO `place`(`name`, `picture`,`desc`) VALUES (?,?,?)";
        $values = [$frm_data['name'], $img_r,$frm_data['desc']];
        $res = insert($q,$values,'sss');
        echo $res;

    }
}

if(isset($_POST['get_place']))
{
    $res = selectAll('place');
    $i=1;
    $path = PLACE_IMG_PATH;

    while($row = mysqli_fetch_assoc($res))
    {
        echo <<<data
        <tr>
            <td>$i</td>
            <td><img src="$path$row[picture]" style="height:205px; width:205px;"></td>
            <td>$row[name]</td>
            <td style="white-space: normal; word-wrap: break-word; max-width: 300px;">$row[desc]</td>
            <td>
            <button type="button" onclick="rem_place($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
            <i class="bi bi-trash"></i> Delete
            </button>
            </td>
        </tr>
        data;
        $i++;
    }
}



if(isset($_POST['rem_place']))
{
    $frm_data = filteration($_POST);
    $values = [$frm_data['rem_place']];

    $pre_q = "SELECT * FROM `place` WHERE `sr_no`=?";
    $res = select($pre_q, $values,'i');
    $img = mysqli_fetch_assoc($res);

    if(deleteImage($img['picture'], PLACE_FOLDER)){
        $q = "DELETE FROM `place` WHERE `sr_no`=?";
        $res = delete($q,$values,'i');
        echo $res;
    }
    else {
        echo 0;
    }
}
