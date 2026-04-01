<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Event Planner | Corporate World</title>
  <link href="https://fonts.googleapis.com/css?family=Jost:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
  <style>
    /* Specific styles for corporate-world.html if needed */
    .corporate-hero-section {
      background: linear-gradient(90deg, var(--secondary) 0%, #a265d6 100%); /* Adjust to a corporate-friendly gradient */
      color: #fff;
      padding: 4rem 0;
      text-align: center;
    }

    .corporate-hero-section h1 {
      font-size: 3rem;
      margin-bottom: 1.5rem;
    }

    .corporate-hero-section p {
      font-size: 1.2rem;
      max-width: 800px;
      margin: 0 auto 2rem auto;
    }

    .corporate-content {
      padding: 3rem 0;
      max-width: 1200px;
      margin: 0 auto;
    }

    .corporate-features-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 2rem;
      margin-top: 2rem;
    }

    .corporate-feature-card {
      background: var(--card-bg);
      border-radius: 18px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      padding: 1.5rem;
      text-align: center;
      transition: transform 0.2s, box-shadow 0.2s;
    }

    .corporate-feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 20px rgba(0,0,0,0.1);
    }

    .corporate-feature-card h3 {
      color: var(--primary);
      margin-bottom: 0.8rem;
    }

    .corporate-feature-card p {
      color: var(--text);
      font-size: 0.95rem;
    }
  </style>
</head>
<body>
  <nav class="navbar">
    <div class="container nav-flex">
      <a href="index.html" class="logo"><img src="./img/images.png" alt="Event Planner Logo"></a>
      <ul class="nav-links">
        <li><a href="index.html">Home</a></li>
        <li><a href="#categories">Categories</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="#location">Location</a></li>
        <li><a href="./login.html" class="nav-login">Login</a></li>
      </ul>
    </div>
  </nav>

  <header class="corporate-hero-section">
    <div class="container">
      <h1>Elevate Your Business Events</h1>
      <p>From grand conferences to intimate team-building retreats, we provide seamless corporate event planning solutions that leave a lasting impression.</p>
      <a href="#contact" class="btn btn-primary">Get a Quote</a>
    </div>
  </header>

  <section class="corporate-content">
    <div class="container">
      <h2 class="section-title">Our Corporate Event Services</h2>
      <div class="corporate-features-grid">
        <div class="corporate-feature-card">
          <a href="agm.php"><img src="./img/corporate2.jpg"></a>
          <h3>Conferences & Seminars</h3>
          <p>Professional planning for large-scale events, including venue selection, technical setup, and speaker coordination.</p>
        </div>
        <div class="corporate-feature-card">
          <a href="training.html"><img src="./img/product launch.jpg"></a>
          <h3>Product Launches</h3>
          <p>Create a buzz around your new product with our innovative and engaging launch event strategies.</p>
        </div>
        <div class="corporate-feature-card">
           <a href="exhibition.html"><img src="./img/seminar2.jpg"></a>
          <h3>Team Building</h3>
          <p>Boost morale and productivity with tailored team-building activities and offsite planning.</p>
        </div>
        <div class="corporate-feature-card">
          <a href="board.html"><img src="./img/gala dinner.jpg"></a>
          <h3>Gala Dinners & Awards</h3>
          <p>Host prestigious events with elegant decor, exquisite catering, and flawless execution.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="contact-section">
    <div class="container">
      <h2 class="section-title">Contact Us for Your Corporate Event</h2>
      <form class="contact-form">
        <input type="text" name="name" placeholder="Your Name" required />
        <input type="email" name="email" placeholder="Your Email" required />
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit" class="btn btn-primary">Send Message</button>
      </form>
    </div>
  </section>

  <section id="location" class="location-section">
    <div class="container">
      <h2 class="section-title">Our Locations</h2>
      <div class="locations-grid">
        <div class="location-card">
          <img src="https://ext.same-assets.com/3899793884/3702326708.png" alt="Jaipur">
          <span>Jaipur</span>
        </div>
        <div class="location-card">
          <img src="https://ext.same-assets.com/3899793884/2862392476.png" alt="Delhi NCR">
          <span>Delhi NCR</span>
        </div>
        <div class="location-card">
          <img src="https://ext.same-assets.com/3899793884/3489089380.png" alt="Bangalore">
          <span>Bangalore</span>
        </div>
        <div class="location-card">
          <img src="https://ext.same-assets.com/3899793884/911666590.png" alt="Kolkata">
          <span>Kolkata</span>
        </div>
      </div>
    </div>
  </section>

  <script src="main.js"></script>
</body>
</html>