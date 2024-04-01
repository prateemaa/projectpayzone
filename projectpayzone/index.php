<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PayZone</title>
  <!-- CSS -->
  <link rel="stylesheet" href="style.css">
  <!-- Javascript -->
  <script src="script.js" defer></script>
  <!-- Google fonts link for icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0">
</head>

<body>
  <!-- Navigation bar -->


  <header>
    <nav class="navbar">
      <span class="menu-btn material-symbols-rounded">menu</span>
      <a href="#" class="logo">
        <img src="./homepage/img/logo.png" alt="logo">
        <h2>PayZone</h2>

      </a>
      <ul class="links">
        <span class="close-btn material-symbols-rounded">close</span>
        <li><a href="#top">Home</a></li>
        <li><a href="#about">About Us</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="#contact">Contact Us</a></li>

      </ul>
      <div class="dropdown">
        <button class="login-btn">Log In</button>
        <ul class="dropdown-content">
          <li><a href="./homepage/admin_login.php">As Admin</a></li>
          <li><a href="./homepage/employee_login.php">As Employee</a></li>
        </ul>
      </div>
    </nav>
    <h1>Welcome to PayZone</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Reprehenderit
      soluta fugiat vero odio, quod ratione? Dolorem, inventore </p>
    <a href="#contact" class="getintouch-btn">Get in Touch</a>
  </header>


  <main>
    <!-- Services Section -->
    <section id="services">
      <h2>Our Services</h2>
      <div class="service">
        <img src="./homepage/img/service1.png" alt="service 1">
        <h3>Automated Payroll Processing</h3>
        <p>Say goodbye to manual calculations and spreadsheets.</p>
      </div>
      <div class="service">
        <img src="./homepage/img/service2.png" alt="service 2">
        <h3>Employee Self-Service</h3>
        <p>Empower your employees with self-service capabilities.</p>
      </div>
      <div class="service">
        <img src="./homepage/img/service3.png" alt="service 3">
        <h3>Tax Compliance</h3>
        <p>Stay compliant with automated tax calculations.</p>
      </div>
    </section>
    <!-- Services Section End -->

    <!-- About Section -->

    <section id="about">
      <h2>About Us</h2>
      <p>Lorem ipsum dolor sit porro necessitatibus dolor dicta beatae laborum doloribus
        vitae cum hic eos at minima eligendi ipsa, dolores unde dicta temporibus nostrum delectus odio incidunt quisquam
        deleniti neque ducimus facilis? Eum accusantium, perferendis vero possimus aut debitis voluptatibus iure natus aliquid
        quas aliquam beatae eveniet quam rem ipsum voluptatibus.</p>
      <img src="./homepage/img/about.jpg" width="100%" alt="">
    </section>
    <!-- About Section End -->

    <!-- Contact us Section -->
    <section id="contact">
      <h2>Contact Us</h2>
      <form action="submit-form.php" method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea placeholder="Your Message" required></textarea>
        <button type="submit" class="btn">Submit</button>
      </form>
    </section>
    <!-- Contact us Section End -->
  </main>

  <!-- Footer -->
  <?php include "./homepage/includes/footer.php"?>
  <!-- Footer End -->
</body>

</html>
