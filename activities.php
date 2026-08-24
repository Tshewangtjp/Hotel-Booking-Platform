<!DOCTYPE html>
<html lang="en" data-bs-theme="" id="htmlPage">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php require('partials/links.php'); ?>
<title>Activities | <?php echo $setting_r['site_title']; ?> - Things to Do at Our  <?php echo $setting_r['site_title']; ?></title>

  <!-- SEO Meta Tags -->
  <meta name="description" content="Explore cultural events, nature activities, and local experiences at <?php echo $setting_r['site_title']; ?>, your perfect homestay in Sikkim.">
  <meta name="keywords" content=" <?php echo $setting_r['site_title']; ?> Activities, Things to do in Sikkim, Cultural events, Local experiences, Homestay events, <?php echo $setting_r['site_title']; ?>">
  <meta name="author" content="<?php echo $setting_r['site_title']; ?>">

  <!-- Canonical URL -->
  <link rel="canonical" href="https://www.tamudheehomestay.com/activities.php" />

  <!-- Open Graph -->
  <meta property="og:title" content="Activities | <?php echo $setting_r['site_title']; ?> Homestay in Sikkim">
  <meta property="og:description" content="Join engaging events and cultural activities during your stay at our Sikkim  <?php echo $setting_r['site_title']; ?>.">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://www.tamudheehomestay.com/activities.php">
  <meta property="og:image" content="https://www.tamudheehomestay.com/assets/images/activities/">

  <!-- Twitter Card -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Things to Do at <?php echo $setting_r['site_title']; ?> - Sikkim Homestay Activities">
  <meta name="twitter:description" content="Check out fun and cultural activities hosted at our homestay in Sikkim.">
  <meta name="twitter:image" content="https://www.tamudheehomestay.com/assets/images/activities/S">

  <!-- JSON-LD Structured Data: WebPage -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "WebPage",
    "name": "Activities | <?php echo $setting_r['site_title']; ?>",
    "description": "Explore activities and events at <?php echo $setting_r['site_title']; ?> homestay in Sikkim.",
    "url": "https://www.tamudheehomestay.com/activities.php"
  }
  </script>

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .h-font {
      letter-spacing: 2px;
    }



    .gwrapper {
      position: relative;
      overflow: hidden;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgb(50 50 93 / 0.1);
      background: #fff;
      cursor: pointer;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      height: 280px;
      display: flex;
      flex-direction: column;
      justify-content: flex-end;
      opacity: 0; /* initial hidden for animation */
      transform: translateY(30px) scale(0.95); /* initial state */
    }

    .gwrapper:hover {
      transform: translateY(-5px) scale(1);
      box-shadow: 0 20px 30px rgb(50 50 93 / 0.15);
    }

    .item {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-size: cover !important;
      background-position: center !important;
      filter: brightness(0.7);
      transition: filter 0.3s ease;
      border-radius: 15px;
      z-index: 1;
    }

    .gwrapper:hover .item {
      filter: brightness(0.5);
    }

    .gwrapper h2 {
      position: relative;
      z-index: 2;
      color: #e6fffa;
      margin: 0 15px 20px 15px;
      font-weight: 700;
      font-size: 1.5rem;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.6);
      user-select: none;
    }

    a.gwrapper {
      text-decoration: none;
    }

    @media (max-width: 576px) {
      .gwrapper {
        height: 220px;
      }
      .gwrapper h2 {
        font-size: 1.2rem;
      }
    }
  </style>
</head>
<body>

  <?php require('partials/header.php'); ?>

  <div class="my-5 px-4" data-aos="fade-down">
    <h2 class="fw-bold h-font text-center">ACTIVITIES</h2>
    <h5 class="text-center text-muted">Events and activities in the homestay.</h5>
   
  </div>

  <div class="container">
    <div class="row g-4">
      <?php
        $res = mysqli_query($con, "SELECT * FROM `activities` ORDER BY `date` DESC");
        $path = ACTIVITY_IMG_PATH;

        while ($row = mysqli_fetch_assoc($res)) {
          $name = htmlspecialchars($row['name']);
          $img = htmlspecialchars($path . $row['picture']);
          echo <<<data
            <div class="col-lg-4 col-md-6 col-sm-6 col-12">
              <a href="#" class="gwrapper text-decoration-none">
                <div class="item" alt="$name" style="background-image: url('$img');"></div>
                <h2>$name</h2>
              </a>
            </div>
          data;
        }
      ?>
    </div>
  </div>

  <?php require('partials/footer.php'); ?>

  <!-- GSAP and ScrollTrigger -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

  <script>
    gsap.registerPlugin(ScrollTrigger);

    gsap.utils.toArray('.gwrapper').forEach((el, i) => {
      gsap.to(el, {
        opacity: 1,
        y: 0,
        scale: 1,
        duration: 0.8,
        delay: i * 0.15,
        ease: "power3.out",
        scrollTrigger: {
          trigger: el,
          start: "top 85%",
          toggleActions: "play none none none",
        }
      });
    });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
    });
</script>

</body>
</html>
