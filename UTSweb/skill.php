<?php
include 'koneksi.php'; // Menghubungkan ke database

// Mengambil data dari tabel skill
$sql_skill = "SELECT judul, deskripsi FROM skill"; // Perbaikan query
$result_skill = $conn->query($sql_skill);

// Memastikan data ditemukan
$skills = []; // Array untuk menyimpan semua keterampilan
if ($result_skill->num_rows > 0) {
    while ($row = $result_skill->fetch_assoc()) {
        $skills[] = $row; // Menyimpan setiap baris data ke dalam array
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style/stiling.css">
    <title>Portfolio</title>
    <style>
        /* Existing styles */
        .service-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border: 1px solid #dee2e6;
            border-radius: 8px;
        }

        .service-card:hover {
            transform: scale(1.05);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-custom {
            background-color: #007bff;
            color: white;
        }
        
        .btn-custom:hover {
            background-color: #0056b3;
        }

        /* Updated styles for layout and footer */
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: #0a192f; /* Dark navy background */
            min-height: 100vh;
        }

        .content-wrapper {
            flex: 1 0 auto;
        }

        footer {
            flex-shrink: 0;
            background-color: #112240; /* Warna latar belakang footer */
            padding: 20px 0; /* Padding atas dan bawah */
            text-align: center; /* Menyelaraskan teks ke tengah */
            color: #7FFFD4; /* Warna teks cerah */
            width: 100%;
        }

        footer p {
            margin: 0;
            font-size: 1rem; /* Ukuran font */
            color: #7FFFD4; /* Sesuaikan warna teks */
        }

        /* New styles for skills section */
        #skills {
            background-color: #0a192f;
            color: #7FFFD4; /* Light teal color */
        }

        #skills h2 {
            color: #7FFFD4;
            font-size: 2.5rem;
            font-weight: bold;
        }

        .service-card {
            background-color: #112240; /* Slightly lighter navy */
            color: white;
        }

        .service-card h4 {
            color: #7FFFD4;
        }

        /* Animasi navbar */
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
    </style>
</head>
<body>
    <!-- Include navbar -->
    <?php include "layout/navbar.html"; ?>

    <!-- Main content wrapper -->
    <div class="content-wrapper">
        <!-- Skills Section -->
        <section id="skills" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5">My Skills</h2>
                <div class="row">
                    <?php foreach ($skills as $skill): ?>
                        <div class="col-md-4 mb-4">
                            <div class="service-card p-3">
                                <h4><?php echo htmlspecialchars($skill['judul']); ?></h4>
                                <p><?php echo htmlspecialchars($skill['deskripsi']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Adam Herlambang. All rights reserved.</p>
    </footer>
</body>
</html>