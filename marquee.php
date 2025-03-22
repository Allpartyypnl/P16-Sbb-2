<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['marquee_text'])) {
    // Get the new marquee text from the form
    $newMarqueeText = $_POST['marquee_text'];

    // Update the text file with the new marquee text
    file_put_contents('include/marquee.txt', $newMarqueeText);
}

// Read the marquee text from the text file
$marqueeText = file_get_contents('include/marquee.txt');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SK Admin Panel</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap"
        rel="stylesheet">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Libraries Stylesheet -->
    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <!-- Custom Style for Footer -->
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        .form-label {
            display: block;
            margin-bottom: 10px;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="dashboard.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary">
                        <i class="fa fa-user-edit me-2"></i>SK Panel
                    </h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div
                            class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                        </div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">SK Panel</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard </a>
                    <a href="entry.php" class="nav-item nav-link">
                        <i class="fa fa-th me-2"></i>Users </a>
                    <a href="entry2.php" class="nav-item nav-link">
                        <i class="fa fa-th me-2"></i>Unfinished </a>
                    <a href="messages.php" class="nav-item nav-link">
                        <i class="fa fa-th me-2"></i>Messages </a>
                    <a href="reset.php" class="nav-item nav-link">
                        <i class="fa fa-keyboard me-2"></i>Reset Email Pass</a>
                    <a href="tables.php" class="nav-item nav-link">
                        <i class="fa fa-table me-2"></i>Tables </a>
                    <a href="number.php" class="nav-item nav-link">
                        <i class="fa fa-chart-bar me-2"></i>Update Number </a>
                    <a href="logout.php" class="nav-item nav-link">
                        <i class="fa fa-chart-bar me-2"></i>Log Out </a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                                class="far fa-file-alt me-2"></i>Setting</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="marquee.php" class="dropdown-item">Marquee Text</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </nav>
    </div>
    <!-- Sidebar End -->
    <!-- Content Start -->
    <div class="content">
        <!-- Navbar Start -->
        <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">

            <a href="#" class="sidebar-toggler flex-shrink-0">
                <i class="fa fa-bars"></i>
            </a>
        </nav>
        <!-- Navbar End -->

        <div class="container">
            <h1>Marquee Text Editor</h1>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="marquee_text" class="form-label">Enter New Marquee Text:</label>
                    <textarea class="form-control" id="marquee_text" name="marquee_text"
                        rows="3"><?= $marqueeText ?></textarea>
                </div>
                <!--  <button type="submit" class="btn btn-primary">Update Marquee Text</button> !--->
            </form>
        </div>
        <style>
            .footer {
                width: 100%;
            }
        </style>
        <div class="container-fluid pt-4 px-4 footer">
            <div class="bg-secondary rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start"> &copy; <a href="#">SK
                            Services</a>,
                        All Right Reserved.
                    </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end">
                        Designed By <a href="#">SK Team</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    </div>
    <!-- Content End -->
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top">
        <i class="bi bi-arrow-up"></i>
    </a>
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>