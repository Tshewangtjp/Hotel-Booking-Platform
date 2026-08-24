<?php
require 'partials/essentials.php';
require 'partials/db_config.php';
adminLogin();

if (isset($_GET['gen_pdf']) && isset($_GET['id'])) {
    $frm_data = filteration($_GET);

    $contact_q = "SELECT * FROM `contact_details` WHERE `sr_no`=?";
    $setting_q = "SELECT * FROM `settings` WHERE `sr_no`=?";
    $values = [1];

    $contact_r = mysqli_fetch_assoc(select($contact_q, $values, 'i'));
    $setting_r = mysqli_fetch_assoc(select($setting_q, $values, 'i'));

    $query = "SELECT bo.*, bd.* FROM `booking_order` bo
        INNER JOIN `booking_details` bd ON bo.booking_id = bd.booking_id
        WHERE ((bo.booking_status='booked' AND bo.arrival=1) 
        OR (bo.booking_status='cancelled' AND bo.refund=1)
        OR (bo.booking_status='payment_failed')) 
        AND bo.booking_id = ?";

    $res = select($query, [$frm_data['id']], 's');

    if (mysqli_num_rows($res) == 0) {
        header('location: dashboard.php');
        exit;
    }

    $data = mysqli_fetch_assoc($res);

    $date = date("d-m-Y h:i:s", strtotime($data['datentime']));
    $checkin = date("d-m-Y h:i:s", strtotime($data['check_in']));
    $checkout = date("d-m-Y h:i:s", strtotime($data['check_out']));

    $checkin_date = new DateTime($data['check_in']);
    $checkout_date = new DateTime($data['check_out']);
    $interval = $checkin_date->diff($checkout_date);
    $total_nights = $interval->days;

    $room_price = $data['price'];
    $total_price = $room_price * $total_nights;

    ob_start();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
  <meta charset='UTF-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1.0'>
  <title>Hotel Booking Invoice</title>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js' defer></script>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css'/>
</head>
<body style='margin:0;padding:0;background:#f5f7fa;font-family:"Segoe UI", sans-serif;'>

<div id='invoice-content' style='max-width:800px;margin:40px auto;background:#fff;border-radius:10px;box-shadow:0 8px 20px rgba(0,0,0,0.1);'>

  <!-- Header -->
  <div style='background:#2d3436;color:#fff;padding:30px;text-align:center;border-top-left-radius:10px;border-top-right-radius:10px;'>
    <h1 style='margin:0;font-size:32px;'><?= $setting_r['site_title'] ?></h1>
    <p style='margin:5px 0 0;font-size:16px;'>Booking Invoice</p>
  </div>

  <!-- Guest Info -->
  <div style='padding:25px 30px;border-bottom:1px solid #ddd;'>
    <h2 style='font-size:20px;color:#34495e;margin-bottom:15px;'><i class='fas fa-user-circle' style='color:#0984e3;margin-right:10px;'></i>Guest Information</h2>
    <p><strong>Name:</strong> <?= $data['user_name'] ?></p>
    <p><strong>Email:</strong> <?= $data['email'] ?></p>
    <p><strong>Phone:</strong> <?= $data['phonenum'] ?></p>
    <p><strong>Address:</strong> <?= $data['address'] ?></p>
  </div>

  <!-- Booking Info -->
  <div style='padding:25px 30px;border-bottom:1px solid #ddd;'>
    <h2 style='font-size:20px;color:#34495e;margin-bottom:15px;'><i class='fas fa-calendar-alt' style='color:#0984e3;margin-right:10px;'></i>Booking Details</h2>
    <table style='width:100%;font-size:15px;'>
      <tr><td><strong>Booking ID:</strong></td><td style='text-align:right;'><?= $data['booking_id'] ?></td></tr>
      <tr><td><strong>Order ID:</strong></td><td style='text-align:right;'><?= $data['order_id'] ?></td></tr>
      <tr><td><strong>Booking Date:</strong></td><td style='text-align:right;'><?= $date ?></td></tr>
      <tr><td><strong>Check-in:</strong></td><td style='text-align:right;'><?= $checkin ?></td></tr>
      <tr><td><strong>Check-out:</strong></td><td style='text-align:right;'><?= $checkout ?></td></tr>
      <tr><td><strong>Room Type:</strong></td><td style='text-align:right;'><?= $data['room_name'] ?></td></tr>
      <tr><td><strong>Guests:</strong></td><td style='text-align:right;'><?= $data['adult'] ?> Adults, <?= $data['children'] ?> Children</td></tr>
      <tr><td><strong>Status:</strong></td><td style='text-align:right;'><?= ucfirst($data['booking_status']) ?></td></tr>
    </table>
  </div>

  <!-- Payment Summary -->
  <div style='padding:25px 30px;border-bottom:1px solid #ddd;'>
    <h2 style='font-size:20px;color:#34495e;margin-bottom:15px;'><i class='fas fa-file-invoice-dollar' style='color:#0984e3;margin-right:10px;'></i>Payment Summary</h2>
    <table style='width:100%;font-size:15px;'>
      <?php
        if ($data['booking_status'] == 'cancelled') {
            $refund = $data['refund'] ? "₹ {$data['trans_amt']} (Refunded)" : "Not Yet Refunded";
            echo "<tr><td>Amount Paid:</td><td style='text-align:right;'>₹ {$data['trans_amt']}</td></tr>
                  <tr><td>Refund Status:</td><td style='text-align:right;'>$refund</td></tr>";
        } elseif ($data['booking_status'] == 'payment_failed') {
            echo "<tr><td>Transaction Amount:</td><td style='text-align:right;'>₹ {$data['trans_amt']}</td></tr>
                  <tr><td>Failure Response:</td><td style='text-align:right;'>{$data['trans_resp_msg']}</td></tr>";
        } else {
            echo "<tr><td>Room Number:</td><td style='text-align:right;'>{$data['room_no']}</td></tr>
                  <tr><td>Amount Paid:</td><td style='text-align:right;'>₹ {$data['trans_amt']}</td></tr>
                  ";
        }
        
      ?>
      <tr><td>Room Price Per Night:</td><td style='text-align:right;'>₹ <?= $room_price ?></td></tr>
      <tr><td>Number of Nights:</td><td style='text-align:right;'><?= $total_nights ?></td></tr>
      <tr style='font-weight:bold;font-size:16px;border-top:1px solid #ccc;'>
        <td>Total:</td><td style='text-align:right;'>₹ <?= $total_price ?></td>
      </tr>
    </table>
  </div>

  <!-- Footer Buttons -->
  <div style='text-align:center;padding:25px 20px;background:#f9f9f9;'>
    <button onclick='window.print()' style='background:#27ae60;color:#fff;padding:12px 25px;border:none;border-radius:5px;margin:5px;cursor:pointer;'>
      <i class='fas fa-print'></i> Print Invoice
    </button>
    <button onclick='downloadPDF()' style='background:#2d3436;color:#fff;padding:12px 25px;border:none;border-radius:5px;margin:5px;cursor:pointer;'>
      <i class='fas fa-file-pdf'></i> Download PDF
    </button>
  </div>

  <!-- Footer -->
  <div style='background:#ecf0f1;text-align:center;padding:15px;font-size:13px;color:#555;border-bottom-left-radius:10px;border-bottom-right-radius:10px;'>
    <p>Thank you for choosing <?= $setting_r['site_title'] ?>!</p>
    <p>Contact us: <a href='mailto:<?= $contact_r['email'] ?>' style='color:#00796b;'><?= $contact_r['email'] ?></a></p>
  </div>

</div>

<script>
  function downloadPDF() {
    const element = document.getElementById('invoice-content');

    const opt = {
      margin:       [0.5, 0.5, 0.5, 0.5], // top, left, bottom, right (in inches)
      filename:     'Hotel-Booking-Invoice.pdf',
      image:        { type: 'jpeg', quality: 1 },
      html2canvas:  { scale: 3, useCORS: true },
      jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' },
      pagebreak:    { mode: ['avoid-all', 'css', 'legacy'] }
    };

    html2pdf().set(opt).from(element).save();
  }
</script>

</body>
</html>

<?php
    echo ob_get_clean();
} else {
    header('location: dashboard.php');
    exit;
}
?>
