<?php
    session_start();
    if(!(isset($_SESSION["userid"])))
    {
        header("Location: http://localhost/ESP_Assignment/index.php");
    }
    if(isset($_POST["logout"]))
    {
        session_unset();
        session_destroy();
        header("location: http://localhost/ESP_Assignment/index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Prompt:wght@600&family=Roboto+Slab:wght@500&family=Secular+One&family=Tiro+Telugu&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Arvo&family=Lobster+Two:ital,wght@1,700&family=Permanent+Marker&family=Prompt:wght@600&family=Roboto+Slab:wght@500&family=Secular+One&family=Tiro+Telugu&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="../css/product.css" rel="stylesheet">
    
    <title>Document</title>
</head>
<body style="background-color:rgb(255, 229, 180)">
    <ul class="nav justify-content-end mt-2">
        <li class="nav-item">
            <form method="POST" action="">
                <button type="submit" class="btn btn-dark" name="logout">Log Out</div>
            </form>
        </li>
    </ul>
    <div class="container-fluid my-3 py-5" id="AddItem">
        <h2 id="status">Add Product</h2>
        <form>
            <div class="row">
                <div class="col">
                    <input type="text" class="form-control" placeholder="Enter Product Name" name="Pname" id="Pname">
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Enter Categoty" name="category" id="category">
                </div>
            </div>
            <div class="row mt-2">
                <div class="col">
                    <select id="ActiveOrNot" class="w-100 form-select" required>
                        <option selected disabled value="2">Select Option</option>
                        <!-- <option value="volvo">Volvo</option> -->
                        <option value="0">Active</option>
                        <option value="1">Inactive</option>
                    </select>
                </div>
                <div class="col">
                    <button class="btn w-100" name="pswd" value="add" id="addBtn">ADD</button>
                    <button class="btn w-100" name="pswd" value="add" id="UpdateBtn">UPDATE</button>
                </div>
            </div>
        </form>
        <h5 id="Perror" class="mt-1">Add Product</h5>
    </div>
    <hr/>
    <div class="container-fluid my-3 py-5" id="ProductItem">
    </div>
    <div class="modal" id="myModal"></div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../js/product.js"></script>
</body>
</html>