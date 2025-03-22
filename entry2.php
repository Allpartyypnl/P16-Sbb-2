<?php
include 'include/check.php';
redirectToLogin();
// Path to the JSON file
$jsonFile = 'janiya/data/live.json';

// Read JSON file contents
$jsonData = file_get_contents($jsonFile);

// Decode JSON data to associative array
$data = json_decode($jsonData, true);

// Check if decoding was successful
if ($data === null) {
    die("Error decoding JSON data.");
}

// Check if token IDs are provided for deletion
if (isset($_POST['tokens']) && is_array($_POST['tokens'])) {
    // Get token IDs from the request
    $tokensToDelete = $_POST['tokens'];

    // Loop through provided token IDs
    foreach ($tokensToDelete as $token) {
        // Check if the token exists in the data array
        if (isset($data[$token])) {
            // Remove the user with the specified token ID
            unset($data[$token]);
        }
    }

    // Encode the updated data back to JSON
    $updatedJson = json_encode($data, JSON_PRETTY_PRINT);

    // Write the updated JSON back to the file
    if (file_put_contents($jsonFile, $updatedJson) === false) {
        echo "Error writing to JSON file.";
        exit;
    }

    // Send success message
    echo "Users deleted successfully.";
    exit;
}
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
        .content {
            text-align: center;
            padding: 20px;
            width: 100%;
        }

        .search-form {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        .search-form input[type="search"] {
            width: 200px;
            margin-left: 20px;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            margin-left: -12%;
        }

        th,
        td {
            border: 2px solid #74f300;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ff0000;
        }

        .footer {
            width: 100%;
            margin-top: 20px;
        }

        /* Internal CSS */
        .data-button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border-radius: 10px;
        }

        .data-button:hover {
            background-color: #45a049;
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
                        <h6 class="mb-0">SK Admin</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashboard.php" class="nav-item nav-link">
                        <i class="fa fa-tachometer-alt me-2"></i>Dashboard </a>
                    <a href="entry.php" class="nav-item nav-link">
                        <i class="fa fa-th me-2"></i>Users </a>
                    <a href="entry2.php" class="nav-item nav-link active">
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
        <br>
        <br>
        <div class="content">
            <!-- Search Form -->
            <form class="d-flex ms-auto" style="justify-content: center;">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"
                    id="search-input" style="width: 200px; margin-left: 20px;">
                <button class="btn btn-outline-light" type="button" id="search-button">Search</button>
            </form>
            <!-- End of Search Form --><br>
            <h1>User Entry</h1>
            <!-- Delete Button -->
            <button class="btn btn-danger mb-3" id="delete-selected">Delete Selected</button>
            <table id="complaint">
                <thead>
                    <tr>
                        <th> Select</th>
                        <th> Name</th>
                        <th>Mobile Number</th>
                        <th>Details</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data as $item): ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="user-checkbox" data-token="<?php echo $item['token']; ?>">
                            </td>
                            <td>
                                <?php echo isset($item['name']) ? $item['name'] : 'null'; ?>
                            </td>
                            <td>
                                <?php echo isset($item['Mobile']) ? $item['Mobile'] : 'null'; ?>
                            </td>
                            <td>
                                <a href=" details2.php?token=<?php echo isset($item['token']) ? $item['token'] : ''; ?>"
                                    class="view-details">User Details</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <button class="data-button" onclick="openTable2()">Data</button>

        <style>
            .footer {
                width: 100%;
            }
        </style>
        <div class="container-fluid pt-4 px-4 footer">
            <div class="bg-secondary rounded-top p-4">
                <div class="row">
                    <div class="col-12 col-sm-6 text-center text-sm-start"> &copy; <a href="#">SK Services</a>, All
                        Right Reserved. </div>
                    <div class="col-12 col-sm-6 text-center text-sm-end"> Designed By <a href="#">SK Team</a>
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
    <!-- Custom Script for Search Functionality -->
    <script>
        $(document).ready(function () {
            $("#search-button").click(function () {
                var searchText = $("#search-input").val().toLowerCase();
                $("#complaint tbody tr").each(function () {
                    var shopName = $(this).find("td:nth-child(1)").text().toLowerCase();
                    var lapuNumber = $(this).find("td:nth-child(2)").text().toLowerCase();
                    if (shopName.includes(searchText) || lapuNumber.includes(searchText)) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });
            });
        });
        // Delete Selected Users
        $("#delete-selected").click(function () {
            var selectedTokens = [];
            $(".user-checkbox:checked").each(function () {
                selectedTokens.push($(this).data("token"));
            });

            // Check if any tokens are selected
            if (selectedTokens.length === 0) {
                alert("Please select users to delete.");
                return;
            }

            // AJAX call to delete users with selected tokens
            $.ajax({
                url: window.location.href, // Send AJAX request to the same page
                method: "POST",
                data: {
                    tokens: selectedTokens
                },
                success: function (response) {
                    alert(response); // Show success message or handle response accordingly
                    location.reload(); // Reload the page after deletion
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText); // Log error message
                }
            });
        });
        // Function to open table2.php
        function openTable2() {
            window.location.href = "table2.php";
        }
    </script>
</body>

</html>