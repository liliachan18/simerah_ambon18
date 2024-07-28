<?php

require "private/conn.php";
session_start();


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANDUAN</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/mdb.min.css">

</head>

<style>
    .form-simkah {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .simkah-container {
        margin: 2rem 0;
    }

    .simkah-container h1 {
        font-size: 2rem;
    }

    .simkah-container .card-box {
        display: flex;
        gap: 1.25rem;
        flex-wrap: wrap;
        margin: 2rem 0;
    }

    .simkah-container .card-box .card-header {
        font-size: 1.25rem;
        font-weight: 600;
    }

    .simkah-container .simkah-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
</style>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container">
            <!-- Navbar brand -->
            <a class="navbar-brand me-2" href="/">
                <img src="src/assets/donor.png" height="50" alt="MDB Logo" loading="lazy" style="margin-top: -1px;" />
            </a>

            <!-- Toggle button -->
            <button data-mdb-collapse-init class="navbar-toggler" type="button" data-mdb-target="#navbarButtonsExample" aria-controls="navbarButtonsExample" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 d-flex gap-1">
                    <li class="nav-item">
                        <a data-mdb-ripple-init class="btn btn-light" href="index.php" role="button">Home</a>
                    </li>
                    <li class="nav-item">
                        <a data-mdb-ripple-init class="btn btn-light" href="relawan.php" role="button">RELAWAN</a>
                    </li>
                    <li class="nav-item">
                        <a data-mdb-ripple-init class="btn btn-light" href="donor.php" role="button">DONOR</a>
                    </li>
                    <li class="nav-item">
                        <a data-mdb-ripple-init class="btn btn-danger" href="panduan.php" role="button">PANDUAN</a>
                    </li>

                </ul>

                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <a data-mdb-ripple-init class="btn btn-danger  px-3 me-2" href="logout.php" role="button">Logout</a>
                </div>
            </div>
            <!-- Collapsible wrapper -->
        </div>
        <!-- Container wrapper -->
    </nav>

    <!-- Main -->
    <div class="container">
        <div class="simkah-container">
            <div class="simkah-header">
                <h1>Panduan donor</h1>


                                        
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-box">
                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Panduan Donor</div>
                    <div class="card-body">
                        <p class="card-text">Pendonor harus dalam kondisi sehat, berusia minimal 17 tahun (atau sesuai dengan peraturan setempat), dan memiliki berat badan minimal 50 kg.
                        Pendonor tidak boleh memiliki penyakit menular atau kondisi medis tertentu yang dapat mempengaruhi kualitas darah.</p>
                    </div>
                </div>

                
            </div>
        </div>


    </div>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>

</body>

</html>