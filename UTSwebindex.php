<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <!-- Link Font Awesome CSS untuk Ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <link rel="stylesheet" href="style/stiling.css">
    <title>Portfolio</title>
    <style>
        /* Hero Section Styles */
        .hero-section {
            background-color: #0a192f; /* Dark navy */
            color: #7FFFD4; /* Light teal */
            padding: 100px 0;
        }

        .hero-content h1 {
            color: #ffffff; /* Ubah warna teks nama menjadi putih */
            font-weight: bold;
        }

        .hero-content h2 {
            color: #7FFFD4; /* Text color */
            font-weight: bold;
        }

        .hero-content p {
            color: #ffffff; /* Lighter text for the description */
            font-size: 1.2rem;
        }

        .profile-image {
            max-width: 300px;
            border-radius: 50%;
            object-fit: cover;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
        }

        .social-icons a {
            color: #ffffff;
            font-size: 2rem;
            margin-right: 15px;
            transition: color 0.3s ease;
        }

        .social-icons a:hover {
            color: #64ffda; /* Light teal hover effect */
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            font-size: 1.1rem;
        }

        .btn-custom:hover {
            background-color: #0056b3;
        }

        /* Tambahkan CSS untuk efek hover */
        .service-card {
            transition: transform 0.3s, box-shadow 0.3s; /* Animasi transisi */
            border: 1px solid #dee2e6; /* Border default */
            border-radius: 8px; /* Sudut melengkung */
        }

        .service-card:hover {
            transform: scale(1.05); /* Zoom saat hover */
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2); /* Bayangan saat hover */
        }

        /* Animasi teks */
        .animated-text {
            font-size: 2rem;
            font-weight: bold;
            color: #7FFFD4;
        }

        /* Navbar Styles */
        .navbar {
            background-color: var(--dark-blue);
            transition: background-color 0.3s ease;
        }

        .navbar-brand, .nav-link {
            color: #ffffff !important;
            transition: color 0.3s ease;
        }

        .nav-link:hover {
            color: #64ffda !important;
        }

        /* Updated Footer styles */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
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
    <div class="content-wrapper">
        <!-- Navbar -->
        <?php include "layout/navbar.html"; ?>

        <!-- Hero Section -->
        <section id="home" class="hero-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 hero-content">
                        <?php
                        include 'koneksi.php';

                        // Query untuk mengambil data dari tabel personal_info
                        $sql_personal_info = "SELECT nama, universitas, jurusan, deskripsi FROM personal_info WHERE id = 1";
                        $result = $conn->query($sql_personal_info);

                        if ($result->num_rows > 0) {
                            // Menampilkan data jika ada
                            while ($row = $result->fetch_assoc()) {
                                echo "<h1>" . htmlspecialchars($row['nama']) . "</h1>"; // Nama diubah jadi putih
                                echo "<h2>I am a student at " . htmlspecialchars($row['universitas']) . ", majoring in " . htmlspecialchars($row['jurusan']) . ".</h2>";
                                echo "<p class='mt-3'>" . htmlspecialchars($row['deskripsi']) . "</p>";
                            }
                        } else {
                            echo "<p>Data tidak ditemukan.</p>";
                        }

                        // Menutup koneksi
                        $conn->close();
                        ?>
                        
                        <!-- Social Icons -->
                        <div class="social-icons mt-4">
                            <a href="https://www.instagram.com/herlambangadam021/profilecard/?igsh=Y2FkeXF3ZHZjdW10"><i class="fab fa-instagram"></i></a>
                            <a href="https://www.linkedin.com/in/adam-herlambang-458544286?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"><i class="fab fa-linkedin"></i></a>
                        </div>

                        <!-- More About Me Button -->
                        <a href="about.php" class="btn btn-custom mt-4">More About Me</a>
                    </div>

                    <!-- Profile Image -->
                    <div class="col-lg-6 text-center">
                        <img src="fotoadam.jpeg" alt="Profile Image" class="profile-image">
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Adam Herlambang. All rights reserved.</p>
    </footer>

    <!-- Script untuk Font Awesome -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

    <!-- Script untuk animasi teks -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const animatedText = document.querySelector('.animated-text');
            if (animatedText) { 
                const text = animatedText.textContent;
                animatedText.textContent = '';
                let index = 0;

                function typeWriter() {
                    if (index < text.length) {
                        animatedText.textContent += text.charAt(index);
                        index++;
                        setTimeout(typeWriter, 100);
                    }
                }

                typeWriter();
            }
        });
    </script>
</body>
</html>
