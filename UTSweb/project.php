<?php 
// Koneksi ke database
include 'koneksi.php'; 

// Cek jika data sudah ada di tabel project untuk halaman Home
$sql_check = "SELECT title, deskripsi, gambar, link FROM project";
$result_check = $conn->query($sql_check);

// Cek jika ada data
if ($result_check->num_rows > 0) {
    // Jika data ada, simpan ke dalam array
    $projects = [];
    while ($row = $result_check->fetch_assoc()) {
        $projects[] = $row; // Menyimpan data proyek ke dalam array
    }
} else {
    $projects = []; // Inisialisasi array jika tidak ada data
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adam Herlambang - My Projects</title>
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
        .project-card {
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            transition: transform 0.3s ease-in-out;
        }
        .project-card:hover {
            transform: translateY(-5px);
        }
        .project-image {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
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
    </style>
</head>
<body>
    <?php include "layout/navbar.html"; ?>
    <main class="container my-5">
        <h1 class="text-center section-title mb-5">My Projects</h1>
        <div class="row g-4" id="projectContainer">
            <?php
            // Ambil hanya tiga proyek
            $projectsToShow = array_slice($projects, 0, 3);
            if (!empty($projectsToShow)) {
                foreach ($projectsToShow as $project) {
                    echo '
                        <div class="col-md-6 col-lg-4">
                            <div class="card project-card h-100">
                                <img src="' . htmlspecialchars($project['gambar']) . '" class="card-img-top project-image" alt="' . htmlspecialchars($project['title']) . '">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">' . htmlspecialchars($project['title']) . '</h5>
                                    <p class="card-text flex-grow-1">' . htmlspecialchars($project['deskripsi']) . '</p>
                                    <a href="' . htmlspecialchars($project['link']) . '" class="btn btn-custom mt-auto">View Project</a>
                                </div>
                            </div>
                        </div>
                    ';
                }
            } else {
                echo '<p class="text-center text-white">Tidak ada proyek yang ditemukan.</p>';
            }
            ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Adam Herlambang. All rights reserved.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
