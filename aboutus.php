<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Your Website</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 
  <link href="styles.css" rel="stylesheet">
  <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Spartan', sans-serif;
        }

        #header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 80px;
            background-color: #E3E6F3;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.06);
        }

        #navbar {
            display: flex;
            align-items: center;
            justify-content: center;

        }

        #navbar li {
            list-style: none;
            padding: 0 20px;
        }

        #navbar li a {
            text-decoration: none;
            font-size: 15px;
            font-weight: 600;
            font-family: 'spartan ', sans-serif;
            color: #1a1a1a;
            transition: 0.03s ease;
        }

        #navbar li a:hover {
            color: #088178;
        }
        .card:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease;
            color:#088178;
            background-color: #90EE90;
            transition: background-color 0.3s ease;
        }
        body {
    background-color: #f0fff0; 
}

        </style>
</head>
<body>
  <section id="header">
        <a href="index.html"><img src="img/logo1.png" alt="" style="
        height: 41px;
        width: 124px; "></a></li>
        <div>
            <ul id="navbar">
                <li><a href="home.php">Home</a></li>
                <li><a href="shop.php">shop</a></li>
                <li><a href="blog.php">blog</a></li>
            </ul>
        </div>
    </section>
  <section id="about" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <h2 class="text-center mb-4">About Us</h2>
        <p>
        Welcome to My Ecomart! 

At our <b>Ecomart</b>, we are passionate about providing sustainable and eco-friendly solutions for everyday living. Our mission is to offer high-quality products that not only meet your needs but also promote environmental awareness and responsibility.

Founded on the principles of integrity, transparency, and innovation, we strive to make a positive impact on the planet and our communities. From household essentials to personal care items, each product in our collection is carefully selected to align with our commitment to sustainability.

Join us on our journey towards a greener future. Together, we can make a difference, one eco-friendly choice at a time.

Thank you for choosing us.<b>Let's create a better world, together.</b>

        </p> 
        </div>
        <div class="col-lg-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Our Mission</h5>
              <p class="card-text">Our mission is to provide high-quality, eco-friendly products to our customers while promoting sustainability and environmental awareness.</p>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-body">
              <h5 class="card-title">Our Vision</h5>
              <p class="card-text">Our vision is to create a greener and more sustainable future by offering innovative and eco-friendly solutions for everyday living.</p>
            </div>
          </div>
          <div class="card mt-3">
            <div class="card-body">
              <h5 class="card-title">Our Values</h5>
              <p class="card-text">Our values are rooted in integrity, transparency, and a commitment to environmental responsibility. We strive to make a positive impact on the planet and our communities.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
      <p>&copy; 2024 Your Website. All rights reserved.</p>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
