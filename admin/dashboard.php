<?php
require 'partials/db_config.php';
require 'partials/essentials.php';
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ADMIN DASHBOARD</title>
    <?php require('partials/header.php'); 
    
    $is_shutdown = mysqli_fetch_assoc(mysqli_query($con,"SELECT `shutdown` FROM `settings`"));

    $current_bookings = mysqli_fetch_assoc(mysqli_query($con,"SELECT 
    COUNT(CASE WHEN booking_status='booked' AND arrival=0 THEN 1 END) AS `new_bookings`,
    COUNT(CASE WHEN booking_status='cancelled' AND refund=0 THEN 1 END) AS `refund_bookings`
    FROM `booking_order`"));

    $unread_queries = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS `count`
     FROM `user_queries` WHERE `seen`=0"));

    $unread_reviews = mysqli_fetch_assoc(mysqli_query($con,"SELECT COUNT(sr_no) AS `count`
     FROM `rating_review` WHERE `seen`=0"));

    $current_users = mysqli_fetch_assoc(mysqli_query($con,"SELECT 
    COUNT(id) AS `total`,
    COUNT(CASE WHEN `status`=1 THEN 1 END) AS `active`,
    COUNT(CASE WHEN `status`=0 THEN 1 END) AS `inactive`
    FROM `user_cred`"));

    ?>
  
    <style>
        .dashboard-card {
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card h1 {
            font-size: 2.2rem;
        }

        .section-title {
            font-weight: 600;
            font-size: 1.3rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <?php require('partials/sidebar.php'); ?>
    

    <div class="container-fluid" id="main-content">
        <div class="row">
            <div class="col-lg-10 ms-auto p-4 overflow-hidden">

                <!-- Page Title -->
                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h3 class="fw-bold">DASHBOARD</h3>
                    <?php
                    if($is_shutdown['shutdown']){
                        echo<<<data
                        <style>
                            .pulse-badge {
                                position: relative;
                                animation: pulse 1.5s infinite;
                            }

                            @keyframes pulse {
                                0% {
                                    box-shadow: 0 0 0 0 rgba(220, 53, 69, 0.7);
                                }
                                70% {
                                    box-shadow: 0 0 0 10px rgba(220, 53, 69, 0);
                                }
                                100% {
                                    box-shadow: 0 0 0 0 rgba(220, 53, 69, 0);
                                }
                            }
                        </style>

                        <div class="d-inline-flex align-items-center gap-2 bg-danger text-white py-2 px-3 rounded-pill shadow-sm pulse-badge">
                            <i class="bi bi-power fs-5"></i>
                            <span class="fw-semibold">Shutdown Mode Active</span>
                        </div>
                        data;
                    } 
                    
                    ?>

                    
                </div>

                <!-- Top Cards -->
                <div class="row g-4 mb-5">
                    <div class="col-md-3">
                        <a href="new_bookings.php" class="text-decoration-none text-success">
                            <div class="card text-center dashboard-card border-success p-3">
                                <i class="bi bi-calendar-check display-6"></i>
                                <h6 class="mt-2">New Bookings</h6>
                                <h1 class="mt-1"><?php echo $current_bookings['new_bookings'] ?></h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="refund_bookings.php" class="text-decoration-none text-danger">
                            <div class="card text-center dashboard-card border-danger p-3">
                                <i class="bi bi-arrow-repeat display-6"></i>
                                <h6 class="mt-2">Refund Bookings</h6>
                                <h1 class="mt-1"><?php echo $current_bookings['refund_bookings'] ?></h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="userqueries.php" class="text-decoration-none text-info">
                            <div class="card text-center dashboard-card border-info p-3">
                                <i class="bi bi-question-circle display-6"></i>
                                <h6 class="mt-2">User Queries</h6>
                                <h1 class="mt-1"><?php echo $unread_queries['count'] ?></h1>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3">
                        <a href="rate_review.php" class="text-decoration-none text-warning">
                            <div class="card text-center dashboard-card border-warning p-3">
                                <i class="bi bi-star-half display-6"></i>
                                <h6 class="mt-2">Rating & Review</h6>
                                <h1 class="mt-1"><?php echo $unread_reviews['count'] ?></h1>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Booking Analytics -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="section-title">Booking Analytics</h5>
                    <select class="form-select shadow-none w-auto" onchange="booking_analytics(this.value)">
                        <option selected>Past 30 Days</option>
                        <option value="2">Past 90 Days</option>
                        <option value="3">Past 1 Year</option>
                        <option value="4">All Time</option>
                    </select>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card text-center text-primary dashboard-card border-primary p-3">
                            <i class="bi bi-journal-check display-6"></i>
                            <h6>Total Bookings</h6>
                            <h1 id="total_bookings">>2</h1>
                            <h4 class="text-muted" id="total_amt">₹0</h4>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center text-success dashboard-card border-success p-3">
                            <i class="bi bi-check-circle display-6"></i>
                            <h6>Active Bookings</h6>
                            <h1 id="active_bookings">0</h1>
                            <h4 class="text-muted" id="active_amt">₹0</h4>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center text-danger dashboard-card border-danger p-3">
                            <i class="bi bi-x-circle display-6"></i>
                            <h6>Cancelled Bookings</h6>
                            <h1 id="cancelled_bookings">2</h1>
                            <h4 class="text-muted" id="cancelled_amt">₹0</h4>
                        </div>
                    </div>
                </div>

                <!-- User Analytics -->
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="section-title">User, Queries & Reviews Analytics</h5>
                    <select class="form-select shadow-none w-auto" onchange="user_analytics(this.value)">
                        <option selected>Past 30 Days</option>
                        <option value="2">Past 90 Days</option>
                        <option value="3">Past 1 Year</option>
                        <option value="4">All Time</option>
                    </select>
                </div>

                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card text-center text-primary dashboard-card border-primary p-3">
                            <i class="bi bi-person-plus display-6"></i>
                            <h6>New Registrations</h6>
                            <h1 id="total_new_reg">0</h1>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center text-success dashboard-card border-success p-3">
                            <i class="bi bi-chat-left-text display-6"></i>
                            <h6>User Queries</h6>
                            <h1 id="total_queries">0</h1>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center text-warning dashboard-card border-warning p-3">
                            <i class="bi bi-star-fill display-6"></i>
                            <h6>Reviews</h6>
                            <h1 id="total_reviews">0</h1>
                        </div>
                    </div>
                </div>

                <h3>Users</h3>
                <div class="row g-4 mb-5">
                    <div class="col-md-4">
                        <div class="card text-center text-primary dashboard-card border-primary p-3">
                            <i class="bi bi-people display-6"></i>
                            <h6>Total Users</h6>
                            <h1><?php echo $current_users['total'] ?></h1>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center text-success dashboard-card border-success p-3">
                            <i class="bi bi-person-check display-6"></i>
                            <h6>Active Users</h6>
                            <h1><?php echo $current_users['active'] ?></h1>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center text-warning dashboard-card border-warning p-3">
                            <i class="bi bi-person-x display-6"></i>
                            <h6>Inactive Users</h6>
                            <h1><?php echo $current_users['inactive'] ?></h1>
                        </div>
                    </div>
                </div>

                


            </div>
        </div>
    </div>

    <script>

function booking_analytics(period=1)
{
let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/dashboard.php",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        document.getElementById('total_bookings').textContent = data.total_bookings;
        document.getElementById('total_amt').textContent = '₹'+data.total_amt;

        document.getElementById('active_bookings').textContent = data.active_bookings;
        document.getElementById('active_amt').textContent = '₹'+data.active_amt;

        document.getElementById('cancelled_bookings').textContent = data.cancelled_bookings;
        document.getElementById('cancelled_amt').textContent = '₹'+data.cancelled_amt;
    }
    xhr.send('booking_analytics&period='+period);
}

function user_analytics(period=1)
{
let xhr = new XMLHttpRequest();
    xhr.open("POST","ajax/dashboard.php",true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');


    xhr.onload = function(){
        let data = JSON.parse(this.responseText);
        document.getElementById('total_new_reg').textContent = data.total_new_reg;
        document.getElementById('total_queries').textContent = data.total_queries;
        document.getElementById('total_reviews').textContent = data.total_reviews;
        
    }
    xhr.send('user_analytics&period='+period);
}



window.onload = function(){
booking_analytics();
user_analytics();
}

    </script>
    <?php require('partials/footer.php'); ?>
</body>

</html>