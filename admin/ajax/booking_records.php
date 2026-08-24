<?php
require('../partials/db_config.php');
require('../partials/essentials.php');
adminLogin();



if (isset($_POST['get_bookings'])) {
    $frm_data = filteration($_POST);

    $limit = 10;
    $page = $frm_data['page'];
    $start = ($page - 1) * $limit;



    $query = "SELECT bo.*, bd.* FROM `booking_order` bo
    INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
     WHERE ((bo.booking_status='booked' AND bo.arrival=1) OR(bo.booking_status='cancelled' AND bo.refund=1) OR
     (bo.booking_status='payment failed')) AND (bo.order_id LIKE ? OR bd.phonenum LIKE ? OR bd.user_name LIKE ?) 
      ORDER BY bo.booking_id DESC";

    $res = select($query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%"], 'sss');

    $limit_query = $query . " LIMIT $start,$limit";
    $limit_res = select($limit_query, ["%$frm_data[search]%", "%$frm_data[search]%", "%$frm_data[search]%"], 'sss');



    $total_rows = mysqli_num_rows($res);

    if ($total_rows == 0) {
        $output = json_encode(['table_data' => "
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
            </div>", "pagination" => '']);
        echo $output;

        exit;
    }

    $i = $start + 1;
    $table_data = "";

    while ($data = mysqli_fetch_assoc($limit_res)) {
        $date = date("d-m-Y H:i:s", strtotime($data['datentime']));
        $checkin = date("d-m-Y H:i:s", strtotime($data['check_in']));
        $checkout = date("d-m-Y H:i:s", strtotime($data['check_out']));

        if ($data['booking_status'] == 'booked') {
            $status_bg = 'bg-success';
        } else if ($data['booking_status'] == 'cancelled') {
            $status_bg = 'bg-danger';
        } else {
            $status_bg = 'bg-warning text-dark';
        }

        $table_data .= "
        <tr>
        <td>$i</td>
        <td>
        <span class='badge bg-primary'>
        Order ID: $data[order_id]
        </span>
        <br>
        <b>Name :</b> $data[user_name]
        <br>
        <b>Phone No:</b> $data[phonenum]
        </td>
        <td>
        <b>Room:</b> $data[room_name]
        <br>
        <b>Price:</b>₹ $data[price]
        </td>
        <td>
        <b>Amount:</b>₹ $data[trans_amt]
        <br>
        <b>Date:</b> $date
        </td>
        <td>
        <span class='badge $status_bg'>$data[booking_status]</span>
        </td>
        <td>
        <button type='button' onclick='download($data[booking_id])' class='btn btn-danger btn-sm fw-bold  shadow-none'>
          <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-file-earmark-pdf' viewBox='0 0 16 16'>
            <path d='M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5z'/>
            <path d='M4.603 14.087a.8.8 0 0 1-.438-.42c-.195-.388-.13-.776.08-1.102.198-.307.526-.568.897-.787a7.7 7.7 0 0 1 1.482-.645 20 20 0 0 0 1.062-2.227 7.3 7.3 0 0 1-.43-1.295c-.086-.4-.119-.796-.046-1.136.075-.354.274-.672.65-.823.192-.077.4-.12.602-.077a.7.7 0 0 1 .477.365c.088.164.12.356.127.538.007.188-.012.396-.047.614-.084.51-.27 1.134-.52 1.794a11 11 0 0 0 .98 1.686 5.8 5.8 0 0 1 1.334.05c.364.066.734.195.96.465.12.144.193.32.2.518.007.192-.047.382-.138.563a1.04 1.04 0 0 1-.354.416.86.86 0 0 1-.51.138c-.331-.014-.654-.196-.933-.417a5.7 5.7 0 0 1-.911-.95 11.7 11.7 0 0 0-1.997.406 11.3 11.3 0 0 1-1.02 1.51c-.292.35-.609.656-.927.787a.8.8 0 0 1-.58.029m1.379-1.901q-.25.115-.459.238c-.328.194-.541.383-.647.547-.094.145-.096.25-.04.361q.016.032.026.044l.035-.012c.137-.056.355-.235.635-.572a8 8 0 0 0 .45-.606m1.64-1.33a13 13 0 0 1 1.01-.193 12 12 0 0 1-.51-.858 21 21 0 0 1-.5 1.05zm2.446.45q.226.245.435.41c.24.19.407.253.498.256a.1.1 0 0 0 .07-.015.3.3 0 0 0 .094-.125.44.44 0 0 0 .059-.2.1.1 0 0 0-.026-.063c-.052-.062-.2-.152-.518-.209a4 4 0 0 0-.612-.053zM8.078 7.8a7 7 0 0 0 .2-.828q.046-.282.038-.465a.6.6 0 0 0-.032-.198.5.5 0 0 0-.145.04c-.087.035-.158.106-.196.283-.04.192-.03.469.046.822q.036.167.09.346z'/>
            </svg>
        </button>
        </td
        </tr>


        ";
        $i++;
    }

    $pagination = "";



    $pagination = "";

    if ($total_rows > $limit) {
        $total_pages = ceil($total_rows / $limit);  // Total number of pages

        // First button
        if ($page != 1) {
            $pagination .= "<li class='page-item'>
                            <button onclick='change_page(1)' class='page-link shadow-none'>First</button>
                        </li>";
        }

        // Previous button
        $disabled_prev = ($page == 1) ? "disabled" : "";
        $prev = $page - 1;
        $pagination .= "<li class='page-item $disabled_prev'>
                        <button onclick='change_page($prev)' class='page-link shadow-none' " . ($disabled_prev ? "disabled" : "") . ">Previous</button>
                    </li>";

        // Page number buttons
        for ($i = 1; $i <= $total_pages; $i++) {
            $active = ($page == $i) ? "active" : "";
            $aria_current = ($page == $i) ? "aria-current='page'" : "";
            $pagination .= "<li class='page-item $active'>
                            <button onclick='change_page($i)' class='page-link shadow-none' $aria_current>$i</button>
                        </li>";
        }

        // Next button
        $disabled_next = ($page == $total_pages) ? "disabled" : "";
        $next = $page + 1;
        $pagination .= "<li class='page-item $disabled_next'>
                        <button onclick='change_page($next)' class='page-link shadow-none' " . ($disabled_next ? "disabled" : "") . ">Next</button>
                    </li>";

        // Last button
        if ($page != $total_pages) {
            $pagination .= "<li class='page-item'>
                            <button onclick='change_page($total_pages)' class='page-link shadow-none'>Last</button>
                        </li>";
        }
    }


    $output = json_encode(["table_data" => $table_data, "pagination" => $pagination]);

    echo $output;
}
