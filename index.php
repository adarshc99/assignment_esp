<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Arvo&family=Roboto+Slab:wght@500&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="50">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
    <div class="container-fluid d-flex justify-content-end">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="#Home">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#Login">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#SignUp">Sign Up</a>
        </li>
        </ul>
    </div>
    </nav>
    <div id="Home" class="container-fluid text-white text-center">
        <div class="display-1 py-1">WELCOME</div>
        <div class="display-4 py-1">To</div>
        <div class="display-1 bg-dark text-white brand-name py-1">CITY MALL</div>
    </div>

    <div id="Login" class="container-fluid">
        <h2 class="text-center w-25 m-auto mb-1">Login</h2>
        <div class="w-50 m-auto p-5 rounded" id="form-login">
            
            <form>
                <div class="mb-3 mt-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pswd">
                </div>
                <h5 class="bg-dark text-warning" id="loginError">hello</h5>
                <button class="btn btn-primary" id="loginBtn">Submit</button>
            </form>
        </div>
    </div>

    <div id="SignUp" class="container-fluid text-white">
        <h2 class="text-center w-25 m-auto mb-1">SignUp</h2>
        <div class="w-50 m-auto p-5 rounded" id="form-signup">
            <form method="POST"> 
                <div class="mb-3 mt-3">
                    <label for="Name">Name:</label>
                    <input type="text" class="form-control" id="SignName" placeholder="Enter Name" name="SinName">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="SignEmail" placeholder="Enter Email" name="SignEmail">
                </div>
                <div class="mb-3">
                    <label for="phone">Phone:</label>
                    <input type="number" class="form-control" id="SignPhone" placeholder="Enter Phone" name="SignPhone">
                </div>
                <div class="mb-3 mt-3">
                    <label for="Password">Password:</label>
                    <input type="password" class="form-control" id="SignPwd" placeholder="Enter Password" name="SignPwd">
                </div>
                <h5 class="bg-dark text-warning" id="signupError"></h5>
                <button id="signupBtn" class="btn btn-primary">Submit</button>
            </form>
        </div>
        
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/index.js"></script>
    
</body>
</html>
