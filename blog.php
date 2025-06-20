<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Blog - Your Website</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
 
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

    #blog-container {
      background-image: url('leaf-background.jpg');
      background-size: cover;
      padding: 50px 20px;
      color: #333; 
    }
    .blog-post {
      background-color: rgba(255, 255, 255, 0.7);
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 5px;
      transition: all 0.3s;
    }
    .blog-post h2 {
      margin-bottom: 10px;
      color: #555; 
    }
    .blog-post p {
      margin-bottom: 10px;
      color: #666;
    }
    .read-more-content {
      display: none;
      color: #666; 
    }
    .read-more-btn {
      color: #fff; 
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
                <li><a href="aboutus.php">about us</a></li>
            </ul>
        </div>

    </section>
  <div id="blog-container">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          <div class="blog-post">
            <h2>How to Live a More Sustainable Lifestyle</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non feugiat libero. Aliquam erat volutpat. Ut malesuada, odio at ultricies accumsan, lectus orci bibendum nisi, at faucibus nulla mauris ut lorem.</p>
            <div class="read-more-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non feugiat libero. Aliquam erat volutpat. Ut malesuada, odio at ultricies accumsan, lectus orci bibendum nisi, at faucibus nulla mauris ut lorem.</p>
              <p>Nulla facilisi. Duis eu ultricies ipsum. Quisque accumsan pharetra nisi, at interdum ligula. Nullam vel suscipit metus, vitae consequat nunc. Vivamus vitae felis eros.</p>
            </div>
            <button class="btn btn-primary read-more-btn">Read More</button>
          </div>
          <div class="blog-post">
            <h2>The Benefits of Using Eco-Friendly Products</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non feugiat libero. Aliquam erat volutpat. Ut malesuada, odio at ultricies accumsan, lectus orci bibendum nisi, at faucibus nulla mauris ut lorem.</p>
            <div class="read-more-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non feugiat libero. Aliquam erat volutpat. Ut malesuada, odio at ultricies accumsan, lectus orci bibendum nisi, at faucibus nulla mauris ut lorem.</p>
              <p>Nulla facilisi. Duis eu ultricies ipsum. Quisque accumsan pharetra nisi, at interdum ligula. Nullam vel suscipit metus, vitae consequat nunc. Vivamus vitae felis eros.</p>
            </div>
            <button class="btn btn-primary read-more-btn">Read More</button>
          </div>
          <div class="blog-post">
            <h2>10 Easy Ways to Reduce Your Carbon Footprint</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non feugiat libero. Aliquam erat volutpat. Ut malesuada, odio at ultricies accumsan, lectus orci bibendum nisi, at faucibus nulla mauris ut lorem.</p>
            <div class="read-more-content">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed non feugiat libero. Aliquam erat volutpat. Ut malesuada, odio at ultricies accumsan, lectus orci bibendum nisi, at faucibus nulla mauris ut lorem.</p>
              <p>Nulla facilisi. Duis eu ultricies ipsum. Quisque accumsan pharetra nisi, at interdum ligula. Nullam vel suscipit metus, vitae consequat nunc. Vivamus vitae felis eros.</p>
            </div>
            <button class="btn btn-primary read-more-btn">Read More</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="bg-dark text-white py-4">
    <div class="container text-center">
      <p>&copy; 2024 Your Website. All rights reserved.</p>
    </div>
  </footer>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</body>
</html>
