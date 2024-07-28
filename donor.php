<?php

require "private/conn.php";
session_start();


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Proses Tambah Siwak
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $goldar = $_POST['goldar'];
    $tempat = $_POST['tempat'];
   


    // Assuming your table name is "Siwak"
    $query = "INSERT INTO donor (nama, goldar, tempat) 
          VALUES ('$nnama', '$goldar', '$tempat')";

    $result = mysqli_query($koneksi, $query);
    var_dump($query);

    if ($result) {
        echo "Query executed successfully!";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }

    header("Location: donor.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DONOR</title>
    <!-- <link rel="stylesheet" href="css/style.css"> -->
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
                        <a data-mdb-ripple-init class="btn btn-light" href="relawan.php" role="button">SRELAWAN</a>
                    </li>
                    <li class="nav-item">
                        <a data-mdb-ripple-init class="btn btn-danger" href="donor.php" role="button">DONOR</a>
                    </li>
                    <li class="nav-item">
                        <a data-mdb-ripple-init class="btn btn-light" href="panduan.php" role="button">PANDUAN</a>
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
                <h1>Relawan</h1>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal">
                    Daftar Disini
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">List Pendonor</h5>
                                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="donor.php" method="post">

                                    <div class="row mb-4">
                                        <div class="col">
                                            <!-- NIK Pria input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="nama" class="form-control" name="nama" required />
                                                <label class="form-label" for="nama">Nama </label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!-- NIK Wanita input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="goldar" class="form-control" name="goldar" required />
                                                <label class="form-label" for="goldar">Golongan Darah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <!-- Nama Mempelai Pria input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="tempat" class="form-control" name="tempat" required />
                                                <label class="form-label" for="tempat">Tempat</label>
                                            </div>
                                        </div>

                                    </div>
                                        

                                    <!-- Submit button -->
                                    <button data-mdb-ripple-init type="submit" class="btn btn-primary btn-block mb-4">Daftar</button>

                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="card-box">
                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Apa itu donor</div>
                    <div class="card-body">
                        <p class="card-text">Donor darah adalah proses di mana seseorang secara sukarela memberikan darahnya untuk digunakan dalam transfusi darah atau pembuatan produk darah lainnya.</p>
                    </div>
                </div>

                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Manfaat Donor</div>
                    <div class="card-body">
                        <p class="card-text">Menyelamatkan Nyawa: Setiap donasi darah dapat menyelamatkan hingga tiga nyawa.
                        Kesehatan Pendonor: Donor darah secara teratur dapat membantu menjaga kesehatan jantung dan mengurangi risiko kanker tertentu”</p>
                    </div>
                </div>

                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">PMI</div>
                    <div class="card-body">
                        <p class="card-text">Deskripsi: PMI adalah organisasi kemanusiaan yang memiliki program donor darah dan mengkoordinasikan kegiatan relawan donor darah di seluruh Indonesia.
                        Kegiatan: PMI sering mengadakan acara donor darah dan kampanye kesadaran untuk mendorong lebih banyak orang menjadi pendonor darah sukarela.</p>
                    </div>
                </div>

            </div>
        </div>
        <div class="container mt-5">




                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Golongan Darah</th>
                            <th>Tempat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                // Query untuk mengambil data relawan
                $sql = mysqli_query($koneksi, "SELECT * FROM donor");
                while ($row = mysqli_fetch_array($sql)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama']}</td>
                            <td>{$row['goldar']}</td>
                            <td>{$row['tempat']}</td>

                        </tr>";
                }
                ?>
                    </tbody>
                </table>
            </div>

            <!-- Modal Tambah -->
            <div class="modal fade" id="formrelawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">List Pendonor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="simpan_donor.php" method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="goldar" class="form-label">Golongan Darah</label>
                                    <input type="goldar" class="form-control" id="goldar" name="goldar" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat" class="form-label">Tempat</label>
                                    <input type="text" class="form-control" id="tempat" name="tempat"
                                        required>
                                </div>

                                <hr>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-dark">Simpan</button>
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <?php
            
            $sql = mysqli_query($koneksi, "SELECT * FROM donor");
            while($data = mysqli_fetch_array($sql)):
            
            ?>
            <!-- Modal Edit -->
            <div class="modal fade" id="formdonorEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">List Pendonor</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="edit_donor.php" method="POST">
                                <input type="hidden" name="id" value="<?=$data['id']?>">
                                <div class="mb-3">
                                    <label for="nama" class="form-label">Daftar Relawan</label>
                                    <input type="text" class="form-control text-danger" id="nama"
                                        value="<?= $data['nama']?>" name="nama" required>
                                </div>
                                <div class="mb-3">
                                    <label for="goldar" class="form-label">Golongan darah</label>
                                    <input type="text" class="form-control" id="goldar" value="<?= $data['goldar']?>"
                                        name="goldar" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tempat" class="form-label">Tempat</label>
                                    <input type="text" class="form-control" id="tempat"
                                        value="<?= $data['tempat']?>" name="tempat" required>
                                </div>

                                <hr>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                    <button type="button" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php

            endwhile;
            
            ?>



    </div>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"></script>


</body>

</html>