<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../login/adminlogin.php");
    exit(); 
}


require_once '../config.php';


if (isset($_POST['upload'])) {
  
    $productName = $_POST['pname'];
    $productDescription = $_POST['pdes'];
    $productPrice = $_POST['pprice'];
    $productCategory = $_POST['pcat'];

    
    if (isset($_FILES['pimg']) && $_FILES['pimg']['error'] === UPLOAD_ERR_OK) {
        
        $fileTmpPath = $_FILES['pimg']['tmp_name'];
        $fileName = $_FILES['pimg']['name'];
        $fileSize = $_FILES['pimg']['size'];
        $fileType = $_FILES['pimg']['type'];

        if ($fileSize > 5242880) { 
            $errorMsg = "File size exceeds 5MB limit.";
        } else {
            
            $uploadDir = '../uploaded/';
            $uploadPath = $uploadDir . basename($fileName);
            if (move_uploaded_file($fileTmpPath, $uploadPath)) {
                $sql = "INSERT INTO products (name, description, price, image, category) VALUES (?, ?, ?, ?, ?)";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ssdss", $productName, $productDescription, $productPrice, $uploadPath, $productCategory);
                if ($stmt->execute()) {
                    $successMsg = "Product added successfully.";
                } else {
                    $errorMsg = "Failed to add product.";
                }
                $stmt->close();
            } else {
                $errorMsg = "Failed to upload file.";
            }
        }
    } else {
        $errorMsg = "Please select a file to upload.";
    }
}

$sql = "SELECT * FROM products";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $products = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $products = [];
}

$con->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
    

    h1 {
      text-align: center;
      color: #333;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 400px;
      margin-top: 20px;
    }

    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
      border: 2px solid #3498db;
      margin-top: 20px;
    }
    #form-heading{
        align-items: center;
        color: orange;
        padding-right: 30px;
    }
    label {
      display: block;
      margin-bottom: 8px;
      color: #333;
    }

    input,
    select {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
    }

    textarea {
      width: calc(100% - 20px);
      padding: 10px;
      margin-bottom: 16px;
      border: 1px solid #ddd;
      border-radius: 4px;
      box-sizing: border-box;
      resize: vertical;
    }

    select {
      appearance: none;
    }

    button {
      background-color: #2ecc71; 
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    button:hover {
      background-color: #27ae60; 
    }
    .operation:hover{
background-color: red;
    }
    </style>
</head>
<body>
<section id="header">
        <a href="../index.html"><img src="../img/logo1.png" alt="" style="
        height: 41px;
        width: 124px; "></a></li>
        <div>
            <ul id="navbar">

                <li><a href=""></a></li>
                <li><a href=""></a></li>
                <li><a href="../login/welcomeadmin.php">home</a></li>
                <li><a href=""> </a></li>
                <li class="button-33"><i class="fa-regular fa-user"></i> <a href="../login/logout.php" onclick="return confirm('do you want to logout ?')">logout</a></li>

            </ul>
        </div>

    </section>

<div class="container">
    <h1>Product Management</h1>
    
    <form action="" method="POST" enctype="multipart/form-data">
        <h3><label id="form-heading">-----Product details----</label></h3>
        <label for="productName">Product Name:</label>
        <input type="text" id="productName" name="pname">

        <label for="productDescription">Product Description:</label>
        <textarea id="productDescription" name="pdes" rows="4"></textarea>

        <label for="productPrice">Product Price:</label>
        <input type="number" id="productPrice" name="pprice" step="0.01">

        <label for="productImage">Product Image:</label>
        <input type="file" id="productImage" name="pimg">

        <label for="productCategory">Product Category:</label>
        <select id="productCategory" name="pcat">
            <option value="Fashion">Fashion</option>
            <option value="Beauty and wellness">Beauty and wellness</option>
            <option value="Home">Home</option>
            <option value="Gift">Gift</option>
        </select>

        <button type="submit" name="upload" class="btn btn-primary">Add Product</button>
    </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div>
              
                <table class="table table-striped border my-5 w-900">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td><?php echo $product['product_id']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td><?php echo $product['description']; ?></td>
                            <td><?php echo "Rs " . $product['price']; ?></td>
                            <td><img src="../<?php echo $product['image']; ?>" height="90px" width="200px"></td>
                            <td><?php echo $product['category']; ?></td>
                            <td>
                                <a href="update.php?ID=<?php echo $product['product_id']; ?>"><button class="btn btn-primary">Update</button></a>
                                <a href="delete.php?ID=<?php echo $product['product_id']; ?>" onclick="return confirm('Are you sure you want to delete this product?');"><button class="btn btn-danger">Delete</button></a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
</html>
