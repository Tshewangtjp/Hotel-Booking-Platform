<!DOCTYPE html>
<html lang="en" data-bs-theme="" id="htmlPage">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
     <?php require('partials/links.php'); ?>
    <title>Contact Us | <?php echo $setting_r['site_title']; ?> - Get in Touch for Homestay Bookings in Sikkim</title>
  <meta name="title" content="Contact Us | <?php echo $setting_r['site_title']; ?> - Get in Touch for Homestay Bookings in Sikkim">
  <meta name="description" content="Contact <?php echo $setting_r['site_title']; ?> for homestay bookings, inquiries, and assistance. We're here to help you plan your ideal stay in Sikkim.">
  <meta name="keywords" content="contact <?php echo $setting_r['site_title']; ?>, homestay in Sikkim, hotel support, booking help, address, phone, email, Sikkim travel stay">
  <meta name="author" content="<?php echo $setting_r['site_title']; ?>">

  <!-- Canonical URL -->
  <link rel="canonical" href="https://www.tamudheehomestay.com/contactus.php" />

  <!-- Open Graph / Facebook -->
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://www.tamudheehomestay.com/contactus.php" />
  <meta property="og:title" content="Contact Us | <?php echo $setting_r['site_title']; ?>" />
  <meta property="og:description" content="Reach out to <?php echo $setting_r['site_title']; ?> for bookings and inquiries. We're happy to assist you!" />
  <meta property="og:image" content="https://www.tamudheehomestay.com/assets/images/og-image.jpg" />

  <!-- Twitter -->
  <meta name="twitter:card" content="summary_large_image" />
  <meta name="twitter:url" content="https://www.tamudheehomestaycom/contactus.php" />
  <meta name="twitter:title" content="Contact Us | <?php echo $setting_r['site_title']; ?>" />
  <meta name="twitter:description" content="Have a question about staying at <?php echo $setting_r['site_title']; ?>? Contact us today." />
  <meta name="twitter:image" content="https://www.tamudheehomestay.com/assets/images/favicon" />

  <!-- Schema.org Structured Data -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "LodgingBusiness",
    "name": "<?php echo $setting_r['site_title']; ?>",
    "url": "https://www.tamudheehomestay.com/contactus.php",
    "logo": "https://www.tamudheehomestay.com/assets/images/favicon.jpg",
    "image": "https://www.tamudheehomestay.com/assets/images/favicon.jpg",
    "telephone": "+91<?php echo $contact_r['pn1']; ?>",
    "email": "<?php echo $contact_r['email']; ?>",
    "address": {
      "@type": "PostalAddress",
      "streetAddress": "<?php echo $contact_r['address']; ?>",
      "addressCountry": "IN"
    }
  }
  </script>

    <!-- Required partials -->
   
   

   

    <style>
        .custom-alert {
            position: fixed;
            top: 110px;
            right: 10px;
            min-width: 280px;
            z-index: 1050;
            transition: opacity 0.6s ease;
            border-radius: 0.375rem;
            font-weight: 500;
            pointer-events: auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.5rem 1rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,0.1);
        }
        .custom-alert button.btn-close {
            background: none;
            border: none;
            font-size: 1.2rem;
            cursor: pointer;
            color: #155724; /* matches bootstrap success */
            line-height: 1;
            padding: 0;
            margin-left: 0.5rem;
        }

    
    </style>

 <?php require('partials/header.php'); ?>

    <!-- Success alert (hidden by default) -->
    <div id="successAlert" class="custom-alert alert alert-success shadow-sm" role="alert" style="display:none; opacity:0;">
        Message sent successfully! Thank you for contacting us.
        <button type="button" class="btn-close" aria-label="Close" onclick="document.getElementById('successAlert').style.display='none';"></button>
    </div>

    <div class="my-5 px-4" data-aos="fade-down" data-aos-duration="800">
        <h2 class="fw-bold h-font text-center">CONTACT US</h2>
        
    </div>

    <div class="container" data-aos="fade-up" data-aos-duration="800" data-aos-delay="200">

        <div class="row">
            <div class="col-lg-6 col-md-6 mb-5 px-4" data-aos="fade-right" data-aos-duration="800" data-aos-delay="400">
                <div class="rounded shadow p-4">
                    <iframe class="w-100 rounded mb-4" height="320px" src="<?php echo $contact_r['iframe']?>" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    <h5>Address</h5>
                    <a href="<?php echo $contact_r['gmap']?>" target="_blank" class="d-inline-block link text-decoration-none mb-2">
                        <i class="bi bi-geo-alt-fill geo" style="color:red;"></i> 
                        <?php echo $contact_r['address']?>
                    </a>
                    <h5 class="mt-4">Call Us</h5>
                    <a href="tel:+91<?php echo $contact_r['pn1']?>" class="d-inline-block link mb-2 text-decoration-none">
                        <i class="bi bi-telephone-fill" style="color: green;"></i> <?php echo $contact_r['pn1']?>
                    </a>
                    <br />
                    <?php if ($contact_r['pn2'] != ''): ?>
                        <a href="tel:+91<?php echo $contact_r['pn2']?>" class="d-inline-block link mb-2 text-decoration-none">
                            <i class="bi bi-telephone-fill" style="color: green;"></i> <?php echo $contact_r['pn2']?>
                        </a>
                    <?php endif; ?>
                    <h5 class="mt-4">Email Us</h5>
                    <a href="mailto:<?php echo $contact_r['email']?>" class="d-inline-block link mb-2 text-decoration-none">
                        <i class="bi bi-envelope" style="color: red;"></i> <?php echo $contact_r['email']?>
                    </a>
                    <h5 class="mt-4">Follow Us</h5>
                    <a href="<?php echo $contact_r['fb']?>" class="d-inline-block fs-5 me-2">
                        <i class="bi bi-facebook facebook me-1" style="color:#1877F2;"></i>
                    </a>
                    <?php if ($contact_r['whatsapp'] != ''): ?>
                        <a href="<?php echo $contact_r['whatsapp']?>" class="d-inline-block fs-5 me-2">
                            <i class="bi bi-whatsapp me-1" style="color: green;"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($contact_r['tw'] != ''): ?>
                        <a href="<?php echo $contact_r['tw']?>" class="d-inline-block fs-5 me-2">
                            <i class="bi bi-telegram me-1" style="color: #229ED9;"></i>
                        </a>
                    <?php endif; ?>
                    <?php if ($contact_r['insta'] != ''): ?>
                        <a href="<?php echo $contact_r['insta']?>" class="d-inline-block fs-5 me-2">
                            <i class="bi bi-instagram me-1" style="color: red;"></i>
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 px-4" data-aos="fade-left" data-aos-duration="800" data-aos-delay="400">
                <div class="rounded shadow p-4">
                    <form method="post" id="contactForm">
                        <h5>Send Us a Message for services.</h5>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Name</label>
                            <input name="name" type="text" class="form-control shadow-none" required />
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Email Address</label>
                            <input name="email" type="email" class="form-control shadow-none" required />
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Subject</label>
                            <input name="subject" type="text" class="form-control shadow-none" required />
                        </div>
                        <div class="mt-3">
                            <label class="form-label" style="font-weight: 500;">Message</label>
                            <textarea name="message" class="form-control shadow-none" rows="5" required></textarea>
                        </div>
                        <button name="send" type="submit" class="btn btn-outline custom-bg mt-3">SEND</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php
if (isset($_POST['send'])) {
    $frm_data = filteration($_POST);

    $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
    $values = [$frm_data['name'], $frm_data['email'], $frm_data['subject'], $frm_data['message']];
    $res = insert($q, $values, 'ssss');

    if ($res == 1) {
        // Output JS to trigger success alert animation and reset form
        echo "<script>
        window.addEventListener('DOMContentLoaded', function(){
            const alertBox = document.getElementById('successAlert');
            alertBox.style.display = 'flex';
            setTimeout(() => { alertBox.style.opacity = 1; }, 50); // fade in

            // fade out after 3 seconds
            setTimeout(() => {
                alertBox.style.opacity = 0;
                setTimeout(() => alertBox.style.display = 'none', 600);
            }, 3000);

            // reset form fields
            document.getElementById('contactForm').reset();

            // refresh AOS to animate elements again if needed
            if (AOS) {
                AOS.refresh();
            }
        });
        </script>";
    } else {
        alert('error', 'Server Down! Try Again Later');
    }
}
?>

<!-- AOS JS CDN -->

<script>
    AOS.init({
        once: true, // animation happens only once while scrolling down
        duration: 800,
        easing: 'ease-in-out',
    });
</script>

<?php require('partials/footer.php'); ?>
</body>
</html>
