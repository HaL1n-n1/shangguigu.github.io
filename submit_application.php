<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">

  <!-- MAIN CSS -->
  <link rel="stylesheet" href="css/style.css">

  <title>shangguigu</title>

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


  <div class="site-wrap" id="home-section">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>



    <header class="site-navbar site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center position-relative">

          <div class="col-lg-4">
            <nav class="site-navigation text-right ml-auto " role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
                <li><a href="index.html" class="nav-link">Home</a></li>
                <li class="active"><a href="pricing.html" class="nav-link">pricing</a></li>
                <li><a href="careers.html" class="nav-link">Careers</a></li>
              </ul>
            </nav>
          </div>
          <div class="col-lg-4 text-center">
            <div class="site-logo">
              <a href="index.html">shangguigu</a>
            </div>


            <div class="ml-auto toggle-button d-inline-block d-lg-none"><a href="#" class="site-menu-toggle py-5 js-menu-toggle text-white"><span class="icon-menu h3 text-white"></span></a></div>
          </div>
          <div class="col-lg-4">
            <nav class="site-navigation text-left mr-auto " role="navigation">
              <ul class="site-menu main-menu js-clone-nav ml-auto d-none d-lg-block">
              <li><a href="about.html" class="nav-link">About</a></li>
                <li><a href="contact.html" class="nav-link">Contact</a></li>
                <li><a href="course.html" class="nav-link">Course</a></li>
              </ul>
            </nav>
          </div>


        </div>
      </div>

    </header>

<?php
$uploadDirectory = "uploads/";
if (!file_exists($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") 
   
    $servername = "127.0.0.1";
    $username = "Luca703";
    $password = "";
    $dbname = "Luca703";

    $conn = new mysqli($servername, $username, $password, $dbname);

 
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

  
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // File handling
	if (is_array($_FILES["resume"])) {
		$uploadedFiles = $_FILES["resume"]; 
	
		$allowedFormats = array("pdf", "docx","doc"); 
		$successMessage = ""; 
		$errorMessage = ""; 
	
		foreach ($uploadedFiles['name'] as $key => $uploadedFileName) {
		
    $fileExtension = pathinfo($uploadedFileName, PATHINFO_EXTENSION); 
    if (in_array(strtolower($fileExtension), $allowedFormats)) {
        $uploadedFile = $uploadDirectory . basename($uploadedFileName);

       
        if (move_uploaded_file($uploadedFiles["tmp_name"][$key], $uploadedFile)) {
          
            $sql = "INSERT INTO uploads (name, email, subject, message, resume_path) VALUES ('$name', '$email', '$subject', '$message', '$uploadedFile')";

            if ($conn->query($sql) !== TRUE) {
                $errorMessage .= "Error in file $uploadedFileName: " . $conn->error . "<br>";
            } else {
                $successMessage .= "File $uploadedFileName uploaded successfully!<br>";
            }
        } else {
            $errorMessage .= "Sorry, there was an error uploading $uploadedFileName.<br>";
        }
    } else {
        $errorMessage .= "File format not allowed for $uploadedFileName.<br>";
    }
}

if (!empty($errorMessage)) {
	$errorMessage = "Errors occurred:<br>" . $errorMessage;
} else {
	$errorMessage = ""; 
}
} else {
$errorMessage = "No files were uploaded."; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submission Result</title>
    
</head>
<body>
    <div>
        <?php if (isset($successMessage)) : ?>
            <p><?php echo $successMessage; ?></p>
            <a href="contact.html" class="btn btn-danger ml-3">Return to Contact</a>
        <?php endif; ?>
        
        
        <?php if (!empty($errorMessage)) : ?>
            <p><?php echo $errorMessage; ?></p>
        <?php endif; ?>
    </div>
</body>

<footer class="site-footer v2">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-4">
            <div class="widget">
              <h3>shangguiguAcademy</h3>
              <p> NanJin Road no.17 ,Sydney,
                  , Australia</p>
                
                <p>Phone: +66 8888 6688 66</p>
                <p>Email: shangguigu@mail.com</p>
            </div>
            <div class="widget">
              
              <ul class="social list-unstyled">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
                <li><a href="#"><span class="icon-dribbble"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="row">
              <div class="col-12">
                <div class="widget">
                  <h3>Navigations</h3>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4">
                <div class="widget">
                  <ul class="links list-unstyled">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Work</a></li>
                    <li><a href="#">Process</a></li>
                    <li><a href="#">About Us</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4">
                <div class="widget">
                  <ul class="links list-unstyled">
                    <li><a href="#">Press</a></li>
                   
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Support</a></li>
                    <li><a href="#">Privacy</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-6 col-sm-6 col-md-4">
                <div class="widget">
                  <ul class="links list-unstyled">
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Process</a></li>
                    <li><a href="#">About Us</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row justify-content-center text-center copyright">
          <div class="col-md-8">

            <p class="mb-0"> © Copyright shangguigu. &copy;<script>document.write(new Date().getFullYear());</script> &mdash; </a>Luca Chen Jiehao
            </p>
          </div>
        </div>
      </div>
    </footer>

  </div>

  <script src="js/jquery.sticky.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>

</body>

</html>

