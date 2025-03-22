<?php
include 'include/check.php';
redirectToLogin();

// Function to paginate an array
function paginateArray($array, $page, $perPage) {
    $offset = ($page - 1) * $perPage;
    return array_slice($array, $offset, $perPage);
}

// Check if the request method is POST and selected messages are set
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['selected_messages'])) {
    // Get the selected messages
    $selectedMessages = $_POST['selected_messages'];

    // Define the path to the JSON file
    $jsonFilePath = 'janiya/data/received_sms.json';

    // Check if the JSON file exists
    if (file_exists($jsonFilePath)) {
        // Read the JSON file content
        $jsonData = file_get_contents($jsonFilePath);

        // Decode JSON data into an associative array
        $receivedSMS = json_decode($jsonData, true);

        // Remove selected messages from the array
        foreach ($selectedMessages as $selectedMessage) {
            foreach ($receivedSMS as $key => $sms) {
                if ($sms['token'] === $selectedMessage) {
                    unset($receivedSMS[$key]);
                }
            }
        }

        // Encode the array back into JSON format
        $jsonData = json_encode($receivedSMS, JSON_PRETTY_PRINT);

        // Write the updated JSON data to the file
        if (file_put_contents($jsonFilePath, $jsonData)) {
            // Successfully deleted messages, show toast
            echo '<div class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="3000">
                    <div class="toast-header">
                        <strong class="me-auto">Success</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                    </div>
                    <div class="toast-body">
                        Selected messages deleted successfully
                    </div>
                </div>';
        } else {
            // Error deleting messages
            echo "Error deleting selected messages";
        }
    } else {
        // If the JSON file doesn't exist, display an error message
        echo 'Error: JSON file does not exist.';
    }
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
    #refreshButton {
    background-color: #007bff; /* Button color */
    color: white; /* Text color */
    border: none; /* No border */
    padding: 10px 20px; /* Padding */
    border-radius: 5px; /* Rounded corners */
    cursor: pointer; /* Cursor style */
    display: block; /* Display as block element */
    margin: 20px auto; /* Center horizontally */
    text-align: center; /* Center text */
}

#refreshButton:hover {
    background-color: #0056b3; /* Darker color on hover */
}

        /* Custom styles for delete button */
        .delete-button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        .delete-button:hover {
            background-color: #c82333;
        }
        h1 {
            text-align: center;
            color: #fff;
            margin-bottom: 20px;
        }

        .container {
            width: 50%;
            margin: 50px auto;
        }

.delete-button {
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    display: block;
    margin: 20px auto; /* Centers the button horizontally */
    text-align: center; /* Centers the text inside the button */
}

        @media (max-width: 768px) {
            table {
                width: 85%;
                margin-left: auto;
                margin-right: auto;
            }
        }

        th,
        td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #444;
        }

        tr:nth-child(even) {
            background-color: #555;
        }

        tr:hover {
            background-color: #666;
        }

        h1 {
            text-align: center;
            color: #333;
        }
    </style>
</head>

<body>
   
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
                    <a href="messages.php" class="nav-item nav-link active">
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
           
            <?php
        

// Define the path to the JSON file
$jsonFilePath = 'janiya/data/received_sms.json';

// Check if the JSON file exists
if (file_exists($jsonFilePath)) {
    // Read the JSON file content
    $jsonData = file_get_contents($jsonFilePath);

    // Decode JSON data into an associative array
    $receivedSMS = json_decode($jsonData, true);

    // Paginate the array
    $paginatedMessages = paginateArray($receivedSMS, $page, $perPage);

    // Check if there are any messages
    if (!empty($paginatedMessages)) {
        // Start HTML table
        echo '<form method="post" action="">';
        echo '<table border="1">';
        echo '<tr><th>Select</th><th>Token ID</th><th>Sender</th><th>Message</th><th>Received Date</th></tr>';

        // Iterate over each message
        foreach ($paginatedMessages as $sms) {
            // Display message details in table rows
            echo '<tr>';
            echo '<td><input type="checkbox" name="selected_messages[]" value="' . $sms['token'] . '"></td>';
            echo '<td>' . $sms['token'] . '</td>';
            echo '<td>' . $sms['sender'] . '</td>';
            echo '<td>' . $sms['message'] . '</td>';
            echo '<td>' . $sms['received_date'] . '</td>';
            echo '</tr>';
        }

        // End HTML table
        echo '</table>';

     
        echo '<button type="submit" class="delete-button">Delete Selected</button>
';
        echo '</form>';
    } else {
        // If there are no messages, display a message
        echo 'No messages received yet.';
    }
} else {
    // If the JSON file doesn't exist, display an error message
    echo 'Error: JSON file does not exist.';
}
?>
      
<button id="refreshButton">Refresh</button>


            <!-- Footer -->
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
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <!-- JavaScript for Toast -->
<script>
    $(document).ready(function(){
        // Submit form on button click
        $("button[type='submit']").click(function(){
            $("form").submit();
        });

        // Show toast on successful deletion
        <?php if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['selected_messages'])) { ?>
            $('.toast').toast('show');
        <?php } ?>
    });
    document.getElementById("refreshButton").addEventListener("click", function() {
    location.reload(); // Reloads the current page
});

</script>

    </div>
</body>

</html>
