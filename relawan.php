<?php

require "private/conn.php";
session_start();


if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Proses Tambah relawan
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_relawan = $_POST['nama_relawan'];
    $tipe_darah = $_POST['tipe_darah'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $waktu = $_POST['waktu'];

    // Assuming your table name is "simkah"
    $query = "INSERT INTO relawan (nama_relawan, tipe_darah, no_hp, alamat, waktu) 
          VALUES ('$nama_relawan', '$tipe_darah', '$no_hp', '$alamat', '$waktu')";


    $result = mysqli_query($koneksi, $query);
    var_dump($query);

    if ($result) {
        echo "Query executed successfully!";
    } else {
        echo "Error: " . mysqli_error($koneksi);
    }



    header("Location: relawan.php");
    exit();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RELAWAN</title>
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
                        <a data-mdb-ripple-init class="btn btn-danger" href="relawan.php" role="button">RELAWAN</a>
                    </li>
                    <li class="nav-item">
                        <a data-mdb-ripple-init class="btn btn-light" href="donor.php" role="button">DONOR</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Daftar Relawan</h5>
                                <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="relawan.php" method="post">

                                    <div class="row mb-4">
                                        <div class="col">
                                            <!-- NIK Pria input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="nama_relawan" class="form-control" name="nama_relawan" required />
                                                <label class="form-label" for="nama_relawan">Nama Relawan</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!-- NIK Wanita input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="tipe_darah" class="form-control" name="tipe_darah" required />
                                                <label class="form-label" for="tipe_darah">Tipe Darah</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col">
                                            <!-- Nama Mempelai Pria input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="no_hp" class="form-control" name="no_hp" required />
                                                <label class="form-label" for="no_hp">No. HP</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!-- Nama Mempelai Wanita input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="alamat" class="form-control" name="alamat" required />
                                                <label class="form-label" for="alamat">Alamat</label>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!-- Nama Mempelai Wanita input -->
                                            <div data-mdb-input-init class="form-outline mb-4">
                                                <input type="text" id="waktu" class="form-control" name="waktu" required />
                                                <label class="form-label" for="waktu">Waktu</label>
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
                    <div class="card-header">Apa itu relawan</div>
                    <div class="card-body">
                        <p class="card-text">Relawan adalah individu atau kelompok yang secara sukarela memberikan waktu, tenaga, dan keterampilan mereka untuk membantu orang lain, komunitas, atau organisasi tanpa mengharapkan imbalan finansial</p>
                    </div>
                </div>

                <div class="card text-bg-light mb-3" style="max-width: 18rem;">
                    <div class="card-header">Relawan Darah</div>
                    <div class="card-body">
                        <p class="card-text">Relawan donor darah adalah individu yang secara sukarela memberikan waktu dan tenaga mereka untuk mendukung kegiatan donor darah.”</p>
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
                            <th>Nama relawan</th>
                            <th>Tipe Darah</th>
                            <th>No hp</th>
                            <th>Alamat</th>
                            <th>Waktu</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                // Query untuk mengambil data relawan
                $sql = mysqli_query($koneksi, "SELECT * FROM relawan");
                while ($row = mysqli_fetch_array($sql)) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nama_relawan']}</td>
                            <td>{$row['tipe_darah']}</td>
                            <td>{$row['no_hp']}</td>
                            <td>{$row['alamat']}</td>
                            <td>
                                <button class='btn btn-sm btn-warning'
                                    data-bs-toggle='modal' data-bs-target='#formrelawanEdit'>Edit</button>
                                <a href='delete.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus Data?')\">Delete</a>
                            </td>
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
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Data Relawan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="simpan_relawan.php" method="POST">
                                <div class="mb-3">
                                    <label for="nama_relawan" class="form-label">Relawan</label>
                                    <input type="text" class="form-control" id="nama_relawan" name="nama_relawan"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_darah" class="form-label">Tipe Darah</label>
                                    <input type="tipe_darah" class="form-control" id="tipe_darah" name="tipe_darah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                        required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Waktu</label>
                                    <input type="text" class="form-control" id="waktu" name="waktu" required>
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
            
            $sql = mysqli_query($koneksi, "SELECT * FROM relawan");
            while($data = mysqli_fetch_array($sql)):
            
            ?>
            <!-- Modal Edit -->
            <div class="modal fade" id="formrelawanEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Form Data Relawan</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="edit_relawan.php" method="POST">
                                <input type="hidden" name="id" value="<?=$data['id']?>">
                                <div class="mb-3">
                                    <label for="nama_relawan" class="form-label">Daftar Relawan</label>
                                    <input type="text" class="form-control text-danger" id="nama_relawan"
                                        value="<?= $data['nama_relawan']?>" name="nama_relawan" required>
                                </div>
                                <div class="mb-3">
                                    <label for="tipe_darah" class="form-label">Tipe darah</label>
                                    <input type="text" class="form-control" id="tipe_darah" value="<?= $data['tipe_darah']?>"
                                        name="tipe_darah" required>
                                </div>
                                <div class="mb-3">
                                    <label for="no_hp" class="form-label">No Hp</label>
                                    <input type="text" class="form-control" id="no_hp"
                                        value="<?= $data['no_hp']?>" name="no_hp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"
                                        required><?=$data['alamat']?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="waktu" class="form-label">Waktu</label>
                                    <input type="text" class="form-control" id="waktu" value="<?= $data['waktu']?>"
                                        name="waktu" required>
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