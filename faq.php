<!DOCTYPE html>
<html lang="en" data-bs-theme="" id="htmlPage">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <?php require('partials/links.php'); ?>
   <title>FAQs || <?php echo $setting_r['site_title']?> | Sikkim Accommodation Guide</title>
  <meta name="description" content="Find answers to common questions about staying at <?php echo $setting_r['site_title']?> in Sikkim. Learn about booking, access, food, safety, and local experiences.">
  <meta name="keywords" content="<?php echo $setting_r['site_title']?>, Sikkim Homestay FAQ, booking Sikkim, Sikkim travel, accommodation, Sikkim tourism, family stay Sikkim">
  <meta name="author" content="<?php echo $setting_r['site_title']?>">

  <!-- Open Graph / Facebook -->
  <meta property="og:title" content="FAQs - <?php echo $setting_r['site_title']?> | Sikkim Accommodation Guide">
  <meta property="og:description" content="Answers to frequently asked questions about <?php echo $setting_r['site_title']?> – location, facilities, food, activities, and more.">
  <meta property="og:image" content="https://www.tamudheehomestay.com/assets/images/favicon.jpg">
  <meta property="og:url" content="https://www.tamudheehomestay.com/faq">
  <meta property="og:type" content="website">

  <!-- Twitter Meta -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="FAQs - <?php echo $setting_r['site_title']?> | Sikkim Accommodation Guide">
  <meta name="twitter:description" content="Plan your visit to <?php echo $setting_r['site_title']?> in Sikkim with helpful FAQs about booking, food, stay, and local attractions.">
  <meta name="twitter:image" content="https://www.tamudheehomestay.com/assets/images/favicon.jpg">

  <!-- Canonical Link -->
  <link rel="canonical" href="https://www.tamudheehomestay.com/faq">
  <style>
    header.experience {
      position: relative;
      height: 500px;
      background: url('assets/images/Sikkim-India-1.jpg') center center/cover no-repeat;
      color: white;
    }
  
    header.experience::before {
      content: '';
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.4);
      backdrop-filter: blur(2px);
    }
    .experience .caption {
      position: relative;
      z-index: 1;
      padding-top: 150px;
    }
    .accordion-button:not(.collapsed) {
      background-color: #f8f9fa;
      font-weight: bold;
      font-size: 22px;
    }
    .accordion-item {
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      margin-bottom: 10px;
    }

    .accordion-button {
      font-size: 22px;
    }
    .section-title {
      display: flex;
      align-items: center;
      gap: 10px;
      font-size: 1.5rem;
      font-weight: 600;
      margin-bottom: 1rem;
    }
    .section-title i {
      font-size: 1.8rem;
      color: #0d6efd;
    }
    .faq-section {
      padding: 60px 0;
    }
  </style>
</head>
<body>

<?php require('partials/header.php'); ?>

<!-- Hero Section -->
<header class="experience text-center d-flex align-items-center justify-content-center">
  <div class="caption">
    <div class="container">
      <h1 class="display-4 fw-bold"><?php echo $setting_r['site_title']?></h1>
      <p class="lead">Frequently Asked Questions</p>
    </div>
  </div>
</header>

<!-- FAQs Section -->
<section class="faq-section">
  <div class="container">

    <!-- Location & Access -->
    <div class="mb-5">
      <div class="section-title">
        <i class="bi bi-geo-alt"></i>
        Location & Access
      </div>
      <div class="accordion" id="faqLocation">
        <?php
        $locationFaqs = [
          ["Where is Tamudhee Homestay located in Sikkim?", "Tamudhee Homestay is located in the heart of Sikkim, offering easy access to popular tourist spots and natural attractions."],
          ["How do I reach Tamudhee Homestay from Bagdogra Airport?", "You can hire a taxi or take a shared jeep from Bagdogra Airport, approximately a 4-5 hour drive."],
          ["Do you offer airport or railway station pick-up and drop services?", "Yes, we provide pick-up and drop services on request. Please inform us in advance."],
          ["Is there mobile network coverage at the homestay?", "Yes, major network providers have good coverage in the area."],
          ["Are there shops or markets nearby?", "Local markets and shops are within walking distance for your convenience."],
          ["Do you have emergency medical facilities nearby?", "Yes, medical clinics and hospitals are within a short drive."]
        ];

        foreach ($locationFaqs as $index => [$question, $answer]) {
          echo <<<HTML
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingLoc{$index}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseLoc{$index}" aria-expanded="false" aria-controls="collapseLoc{$index}">
                {$question}
              </button>
            </h2>
            <div id="collapseLoc{$index}" class="accordion-collapse collapse" aria-labelledby="headingLoc{$index}" data-bs-parent="#faqLocation">
              <div class="accordion-body">{$answer}</div>
            </div>
          </div>
          HTML;
        }
        ?>
      </div>
    </div>

    <!-- Booking & Payment -->
    <div class="mb-5">
      <div class="section-title">
        <i class="bi bi-bookmark-check"></i>
        Booking & Payment
      </div>
      <div class="accordion" id="faqBooking">
        <?php
        $bookingFaqs = [
          ["Can I pay online to book a room?", "Yes, we accept online payments via multiple methods for hassle-free booking."],
          ["What is your cancellation and refund policy?", "Cancellations made 7 days prior to arrival usually get a full refund. Please check booking terms for details."],
          ["Is there a cancellation fee if I cancel last minute?", "Yes, cancellations within 48 hours of arrival may incur charges."],
          ["Can I extend my stay if needed?", "Subject to availability, yes. Please contact us to check."],
          ["How can I contact Tamudhee Homestay for bookings or inquiries?", "Contact us via phone, email, or our website’s booking form."]
        ];

        foreach ($bookingFaqs as $index => [$question, $answer]) {
          echo <<<HTML
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingBook{$index}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseBook{$index}" aria-expanded="false" aria-controls="collapseBook{$index}">
                {$question}
              </button>
            </h2>
            <div id="collapseBook{$index}" class="accordion-collapse collapse" aria-labelledby="headingBook{$index}" data-bs-parent="#faqBooking">
              <div class="accordion-body">{$answer}</div>
            </div>
          </div>
          HTML;
        }
        ?>
      </div>
    </div>

    <!-- Accommodation & Facilities -->
    <div class="mb-5">
      <div class="section-title">
        <i class="bi bi-house-door"></i>
        Accommodation & Facilities
      </div>
      <div class="accordion" id="faqAccommodation">
        <?php
        $accommodationFaqs = [
          ["What types of rooms are available at Tamudhee Homestay?", "We offer single, double, and family rooms with basic amenities."],
          ["Is Wi-Fi available at the homestay?", "Yes, free Wi-Fi is available throughout the property."],
          ["Do you provide laundry services?", "Yes, laundry services are available at a nominal charge."],
          ["Are towels and toiletries provided?", "Yes, fresh towels and basic toiletries are provided in every room."],
          ["Is there a heater or warm bedding available during winter?", "Yes, heaters and warm bedding are provided during the cold season."],
          ["Do you offer parking facilities?", "Yes, free parking is available for guests with vehicles."],
          ["Are pets allowed at Tamudhee Homestay?", "Pets are generally not allowed. Contact us for special requests."],
          ["Is the homestay accessible for elderly or differently-abled guests?", "We strive to accommodate all guests; please discuss any special needs in advance."]
        ];

        foreach ($accommodationFaqs as $index => [$question, $answer]) {
          echo <<<HTML
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingAcc{$index}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAcc{$index}" aria-expanded="false" aria-controls="collapseAcc{$index}">
                {$question}
              </button>
            </h2>
            <div id="collapseAcc{$index}" class="accordion-collapse collapse" aria-labelledby="headingAcc{$index}" data-bs-parent="#faqAccommodation">
              <div class="accordion-body">{$answer}</div>
            </div>
          </div>
          HTML;
        }
        ?>
      </div>
    </div>

    <!-- Food & Dining -->
    <div class="mb-5">
      <div class="section-title">
        <i class="bi bi-egg-fried"></i>
        Food & Dining
      </div>
      <div class="accordion" id="faqFood">
        <?php
        $foodFaqs = [
          ["Are meals provided at the homestay?", "Yes, homemade Sikkimese and Nepali cuisine is served."],
          ["Can you accommodate special dietary requirements?", "Yes, please inform us in advance about dietary restrictions."],
          ["Is drinking water provided?", "Safe, filtered drinking water is provided for guests."]
        ];

        foreach ($foodFaqs as $index => [$question, $answer]) {
          echo <<<HTML
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFood{$index}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFood{$index}" aria-expanded="false" aria-controls="collapseFood{$index}">
                {$question}
              </button>
            </h2>
            <div id="collapseFood{$index}" class="accordion-collapse collapse" aria-labelledby="headingFood{$index}" data-bs-parent="#faqFood">
              <div class="accordion-body">{$answer}</div>
            </div>
          </div>
          HTML;
        }
        ?>
      </div>
    </div>

    <!-- Activities & Experiences -->
    <div class="mb-5">
      <div class="section-title">
        <i class="bi bi-binoculars"></i>
        Activities & Experiences
      </div>
      <div class="accordion" id="faqActivities">
        <?php
        $activitiesFaqs = [
          ["Are guided tours or trekking trips available from the homestay?", "Yes, we can help arrange tours and trekking trips on request."],
          ["What popular tourist spots are near Tamudhee Homestay?", "Nearby attractions include Tsongmo Lake, Nathula Pass, Gangtok, and Rumtek Monastery."],
          ["Do you offer any cultural activities or local experiences?", "Guests can join traditional cooking classes, festivals, and handicraft workshops."],
          ["Can you assist with travel permits required for Sikkim?", "We provide guidance on permits such as the Inner Line Permit."],
          ["Can I host small events or celebrations at the homestay?", "Yes, we accommodate small private gatherings upon prior arrangement."]
        ];

        foreach ($activitiesFaqs as $index => [$question, $answer]) {
          echo <<<HTML
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingAct{$index}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAct{$index}" aria-expanded="false" aria-controls="collapseAct{$index}">
                {$question}
              </button>
            </h2>
            <div id="collapseAct{$index}" class="accordion-collapse collapse" aria-labelledby="headingAct{$index}" data-bs-parent="#faqActivities">
              <div class="accordion-body">{$answer}</div>
            </div>
          </div>
          HTML;
        }
        ?>
      </div>
    </div>

    <!-- Family & Safety -->
    <div class="mb-5">
      <div class="section-title">
        <i class="bi bi-people"></i>
        Family & Safety
      </div>
      <div class="accordion" id="faqFamilySafety">
        <?php
        $familySafetyFaqs = [
          ["Is Tamudhee Homestay family-friendly?", "Yes, the homestay is suitable for families and children."],
          ["Are there safety measures in place for guests?", "We have security protocols, fire safety measures, and first aid facilities."],
          ["Is the area safe for solo female travelers?", "Yes, many solo female travelers stay with us and feel safe."],
          ["Do you provide baby cots or extra beds for children?", "Yes, on request and subject to availability."]
        ];

        foreach ($familySafetyFaqs as $index => [$question, $answer]) {
          echo <<<HTML
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingFam{$index}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFam{$index}" aria-expanded="false" aria-controls="collapseFam{$index}">
                {$question}
              </button>
            </h2>
            <div id="collapseFam{$index}" class="accordion-collapse collapse" aria-labelledby="headingFam{$index}" data-bs-parent="#faqFamilySafety">
              <div class="accordion-body">{$answer}</div>
            </div>
          </div>
          HTML;
        }
        ?>
      </div>
    </div>

    <!-- Rules & Policies -->
    <div class="mb-5">
      <div class="section-title">
        <i class="bi bi-card-checklist"></i>
        Rules & Policies
      </div>
      <div class="accordion" id="faqRules">
        <?php
        $rulesFaqs = [
          ["What are the check-in and check-out times?", "Check-in is from 12 PM onwards, and check-out is by 11 AM."],
          ["Are visitors allowed at the homestay?", "Visitors are allowed during daytime with prior permission."],
          ["Do you have a no-smoking policy?", "Yes, smoking is prohibited inside the rooms and common areas."],
          ["Are pets allowed?", "Pets are generally not allowed, except with prior approval."],
          ["Is there a curfew or quiet hours?", "Quiet hours are from 10 PM to 6 AM to ensure a peaceful stay."],
          ["What is your policy on damages?", "Guests are responsible for any damages caused to the property."]
        ];

        foreach ($rulesFaqs as $index => [$question, $answer]) {
          echo <<<HTML
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingRules{$index}">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRules{$index}" aria-expanded="false" aria-controls="collapseRules{$index}">
                {$question}
              </button>
            </h2>
            <div id="collapseRules{$index}" class="accordion-collapse collapse" aria-labelledby="headingRules{$index}" data-bs-parent="#faqRules">
              <div class="accordion-body">{$answer}</div>
            </div>
          </div>
          HTML;
        }
        ?>
      </div>
    </div>

  </div>
</section>

<?php require('partials/footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
