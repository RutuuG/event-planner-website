<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Event Planner | Home</title>
  <link href="https://fonts.googleapis.com/css?family=Jost:400,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="style.css" />
</head>
<body>
  <nav class="navbar">
    <div class="container nav-flex">
      <a href="#home" class="logo"><img src="./img/images.png" alt="Event Planner Logo"></a>
      <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#categories">Categories</a></li>
        <li><a href="#contact">Contact Us</a></li>
        <li><a href="#location">Location</a></li>
        <li><a href="login.html" class="nav-login">Login</a></li>

      </ul>
    </div>
  </nav>

  <header id="home" class="hero-section">
    <div class="hero-content">
      <h1>Expertly Crafting Birthday, Anniversary & Proposal Experiences</h1>
      <p>Event Planner is India's largest surprise planning company, offering candlelight dinners, proposal planning, birthdays and anniversaries across India.</p>
      <a href="#categories" class="btn btn-primary">Explore Categories</a>
    </div>
    <div class="hero-image">
      <img src="https://ext.same-assets.com/3899793884/1158702818.jpeg" alt="Proposal Planning" />
    </div>
  </header>

  <section id="categories" class="categories-section">
    <h2 class="section-title">Popular Categories</h2>
    <div class="categories-grid">
      <div class="category-card">
         <a href="corporate-world.html"><img src="./img/istockphoto-1446478773-612x612.jpg" alt="Corporate World Planning" />
        <h3>Corporate World</h3> </a>
      </div>
      <div class="category-card">
         <a href="anniversary-birthday.html"><img src="./img/product-jpeg-500x500.webp" alt="Anniversary & Birthday Planning" />
        <h3>Anniversary & Birthday Planning</h3> </a>
      </div>
    </div>
  </section>

  <section id="contact" class="contact-section">
    <div class="container">
      <h2 class="section-title">Contact Us</h2>
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

  <div class="modal" id="loginModal">
    <div class="modal-content">
      <span class="close-btn" id="closeLoginModal">&times;</span>
      <h2>Login</h2>
      <form class="login-form">
        <input type="email" name="email" placeholder="Email" required />
        <input type="password" name="password" placeholder="Password" required />
        <button type="submit" class="btn btn-primary">Login</button>
      </form>
    </div>
  </div>
  <script src="main.js"></script>
</body>
</html>