<?php
include 'koneksi.php'; // Menghubungkan ke database

// Mengambil data dari tabel personal_info
$sql_about = "SELECT nama, universitas, jurusan, deskripsi FROM about"; // Kolom 'deskripsi' yang benar
$result_about = $conn->query($sql_about);

// Memastikan data ditemukan
$about = $result_about->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style/stiling.css">
    <title>About Me</title>
    <style>
        /* Styles for layout */
        body {
            background-color: #0a192f; /* Menambahkan latar belakang yang sama */
            color: #7FFFD4; /* Menambahkan warna teks */
            font-family: Arial, sans-serif;
            margin: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        h2, h3, p {
            color: #7FFFD4; /* Warna teks cerah untuk default */
        }

        .white-text {
            color: #ffffff; /* Warna putih untuk teks */
        }

        .profile-image {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 20px;
        }

        /* Button custom */
        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        
        .btn-custom:hover {
            background-color: #0056b3;
        }

        /* Navbar animation */
        .navbar {
            background-color: var(--dark-blue) !important;
            transition: background-color 0.3s ease;
        }

        .navbar-brand, .nav-link {
            color: var(--white) !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: var(--teal) !important;
        }

        :root {
            --dark-blue: #0a192f;
            --teal: #64ffda;
            --white: #ffffff;
        }

        /* Footer styles */
        footer {
            background-color: #112240;
            padding: 20px 0;
            text-align: center;
            color: #7FFFD4;
            margin-top: auto; /* Makes the footer stick to the bottom */
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <!-- Include navbar -->
    <?php include "layout/navbar.html"; ?>

    <!-- About Section -->
    <section id="about" class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">About Me</h2>
            <div class="row align-items-center">
                <div class="col-md-6 text-center">
                    <!-- Mengambil gambar profil dari database -->
                    <img src="fotoadam.jpeg" alt="Profile Image" class="profile-image">
                </div>
                <div class="col-md-6">
                    <!-- Menampilkan informasi dari database -->
                    <h3>Hello, I am <span><?php echo htmlspecialchars($about['nama']); ?></span></h3>
                    <p class="white-text">
                        <span class="white-text"><?php echo htmlspecialchars($about['universitas']); ?></span>, <span class="white-text"><?php echo htmlspecialchars($about['jurusan']); ?></span>. <span class="white-text"><?php echo htmlspecialchars($about['deskripsi']); ?></span>
                    </p>
                    <a href="contact.php" class="btn btn-custom mt-4">Contact Me</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer style="background-color: #112240; text-align: center; color: #7FFFD4; padding: 20px 0;">
        <p>&copy; 2024 Adam Herlambang. All rights reserved.</p>
    </footer>

    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
