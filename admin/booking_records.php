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
    <title>Admin Booking Records</title>
    <?php require('partials/header.php'); ?>

    <?php require('partials/sidebar.php'); ?>

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">
                <h3 class="mb-4">BOOKING RECORDS</h3>

                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <div class="text-end mb-4">
                            <div class="input-group w-25 ms-auto">
                                <span class="input-group-text bg-white border-end-0">
                                    <i class="bi bi-search"></i>
                                </span>
                                <input type="text" id="search_input"
                                    oninput="get_bookings(this.value)"
                                    class="form-control shadow-none border-start-0"
                                    placeholder="Type to search......">
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover border">
                                <thead class="table-dark">
                                    <tr class="bg-dark text-light">
                                        <th scope="col">#</th>
                                        <th scope="col">User Details</th>
                                        <th scope="col">Room Details</th>
                                        <th scope="col">Bookings Details</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="table-data">



                                </tbody>
                            </table>
                        </div>
                       
  <ul class="pagination mt-3" id="table-pagination">
    
  </ul>
</nav>

<style>
    .pagination {
  display: flex;
  list-style: none;
  padding-left: 0;
  border-radius: 0.25rem;
  justify-content: center;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

.page-item {
  margin: 0 4px;
}

.page-link {
  color: black;
  border: 1px solid #dee2e6;
  padding: 8px 14px;
  text-decoration: none;
  border-radius: 0.375rem;
  transition: background-color 0.3s, color 0.3s;
  cursor: pointer;
  user-select: none;
}

.page-link:hover {
  background-color: #00c476;
  color: white;
  text-decoration: none;
}

.page-item.active .page-link {
  background-color:#00c476;
  color: white;
  border-color: white;
  cursor: default;
}

.page-item.disabled .page-link {
  color: #6c757d;
  pointer-events: none;
  background-color: #fff;
  border-color: #dee2e6;
  cursor: not-allowed;
}

</style>
                       
                    </div>
                </div>



            </div>
        </div>
    </div>

    





    <script src="scripts/booking_records.js"></script>
    <?php require('partials/footer.php'); ?>