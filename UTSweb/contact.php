<?php 
// Koneksi ke database
include 'koneksi.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari formulir
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Masukkan data ke database
    $sql_insert = "INSERT INTO contact (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("sss", $name, $email, $message);

    if ($stmt->execute()) {
        echo "Message sent successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adam Herlambang - Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --dark-blue: #0a192f;
            --teal: #64ffda;
            --white: #ffffff;
        }
        body {
            background-color: var(--dark-blue);
            color: var(--white);
            font-family: 'Arial', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        .navbar {
            background-color: var(--dark-blue) !important;
        }
        .navbar-brand, .nav-link {
            color: var(--white) !important;
        }
        .nav-link:hover {
            color: var(--teal) !important;
        }
        .btn-custom {
            background-color: transparent;
            color: var(--teal);
            border: 2px solid var(--teal);
        }
        .btn-custom:hover {
            background-color: var(--teal);
            color: var(--dark-blue);
        }
        .section-title {
            color: var(--teal);
            font-weight: bold;
        }
        .content-wrapper {
            flex: 1 0 auto;
        }
        footer {
            flex-shrink: 0;
            background-color: #112240;
            padding: 20px 0;
            text-align: center;
            color: #7FFFD4;
            width: 100%;
        }
        footer p {
            margin: 0;
            font-size: 1rem;
        }
    </style>
</head>
<body>
    <?php include "layout/navbar.html"; ?>
    
    <div class="content-wrapper">
        <main class="container my-5">
            <h1 class="text-center section-title mb-5">Contact Us</h1>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-custom">Submit</button>
            </form>
        </main>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Adam Herlambang. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>