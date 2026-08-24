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
    <title>Admin New Bookings</title>
    <?php require('partials/header.php'); ?>

    <?php require('partials/sidebar.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">New Bookings</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <div class="input-group w-25 ms-auto">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text"
                                    oninput="get_bookings(this.value)"
                                    class="form-control shadow-none border-start-0"
                                    placeholder="Type to search......">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover border">
                                <thead class="table-dark">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">Sl/No</th>
                                        <th scope="col">User Details</th>
                                        <th scope="col">Room Details</th>
                                        <th scope="col">Bookings Details</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">



                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <!---Assign Room modal --->
    <div class="modal fade" id="assign_room" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="assign_room_form">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Assign Room Number</h5>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Room Number</label>
                            <input type="text" name="room_no" class="form-control shadow-none" required>
                        </div>
                        <span class="badge rounded-pill bg-light text-dark mb-3 text-wrap lh-base">
                            Note: Assign Room Number only when user has been arrived!
                        </span>
                        <input type="hidden" name="booking_id">
                    </div>
                    <div class="modal-footer">
                        <button type="reset" class="btn text-white shadow-none btn-danger" data-bs-dismiss="modal">CANCEl</button>
                        <button type="submit" class="btn btn-success text-white shadow-none">ASSIGN</button>
                    </div>
                </div>
            </form>
        </div>
    </div>





    <script src="scripts/new_bookings.js"></script>
    <?php require('partials/footer.php'); ?>