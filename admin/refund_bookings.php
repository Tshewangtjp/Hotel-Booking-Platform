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
    <title>Admin Refund Bookings</title>
    <?php require('partials/header.php'); ?>

    <?php require('partials/sidebar.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">Refund Bookings</h3>

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
                                        <th scope="col">Refund Amount</th>
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

  





    <script src="scripts/refund_bookings.js"></script>
    <?php require('partials/footer.php'); ?>