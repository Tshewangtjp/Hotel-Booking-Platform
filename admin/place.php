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
<title>Admin PlaceToVisit</title>
<?php require('partials/header.php'); ?>
 
<?php require('partials/sidebar.php'); ?>
       
<div class="container-fluid" id="main-content">
<div class="row">
<div class="col-lg-10 ms-auto p-4 overflow-hidden">
         <h3 class="mb-4">PLACE TO VISIT</h3>
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
            <h5 class="card-title m-0">PLACE TO VISIT</h5>
            <button type="button" class="btn btn-dark shadow-none btn-sm" data-bs-toggle="modal" data-bs-target="#place-s">
                <i class="bi bi-plus-square"></i> Add
            </button>
        </div>
        <div class="table-responsive" style="height: 450px; overflow-y: scroll;">
        <table class="table table-hover border">
            <thead class="table-dark">
            <tr class="bg-dark text-light">
                <th scope="col">#</th>
                <th scope="col">Picture</th>
                <th scope="col" width="10%">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody id="place-data">
            </tbody>
            </table>
        </div>
    </div>
</div>

     
 <!---Facilities Modal---->
 <div class="modal fade" id="place-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="place_s_form">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Place</h5>
                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="place_name"   class="form-control shadow-none" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Picture</label>
                    <input type="file" name="place_picture" accept=".jpg, .jpeg, .png, .webp" class="form-control shadow-none" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-bold">Description</label>
                    <textarea name="place_desc" rows="2"  class="form-control shadow-none" required></textarea>
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


<script src="scripts/place.js"></script>
<?php require('partials/footer.php'); ?>