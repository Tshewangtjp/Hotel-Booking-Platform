<?php
require 'partials/db_config.php';
require 'partials/essentials.php';
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Admin Activity</title>
<?php require('partials/header.php'); ?>
 
<?php require('partials/sidebar.php'); ?>
       
<div class="container-fluid" id="main-content">
<div class="row">
<div class="col-lg-10 ms-auto p-4 overflow-hidden">
         <h3 class="mb-4">ACTIVITIES</h3>
  <style>
    .custom-alert {
    position: fixed;
    top: 110px;
    right: 25px;
}
  </style>       
<div class="card border-0 shadow-sm mb-4">
    <div class="card-body">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <h5 class="card-title m-0">Activity</h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#activity-s">
                <i class="bi bi-plus-square"></i> Add
            </button>
        </div>
        <div class="table-responsive-md" style="height: 450px; overflow-y: scroll;">
        <table class="table table-hover border">
            <thead class="table-dark">
            <tr class="bg-dark text-light">
                <th scope="col">#</th>
                <th scope="col">Picture</th>
                <th scope="col" width="30%">Name</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="activity-data">
            </tbody>
            
            </table>
        </div>
    </div>
</div>

     
 <!---Facilities Modal---->
 <div class="modal fade" id="activity-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="activity_s_form">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Activity</h5>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="activity_name"   class="form-control shadow-none" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Picture</label>
                    <input type="file" name="activity_picture" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn text-white shadow-none btn-danger" data-bs-dismiss="modal">CANCEl</button>
                    <button type="submit" class="btn btn-success shadow-none">SAVE</button>
                </div>
                </div>
                </form>
            </div>
        </div>
        


</div>     
  
</div>
</div>


<script src="scripts/activity.js"></script>
<?php require('partials/footer.php'); ?>