<?php
    session_start();
    require "private/conn.php";

    if(!isset($_SESSION['admin'])){
        header("Location: login.php");
        exit();
    }

    // ambil data ketika tombol di click dengan get, karena menggunakan url
    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * FROM simerah_ambon WHERE id = $id";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_assoc($result);
    }
    // handle edit form submit
    if(isset($_POST['update'])){
        $kategori = $_POST['kategori'];
        $no_isbn = $_POST['no_isbn'];
        $judul = $_POST['judul'];
        $pengarang = $_POST['pengarang'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $penerbit = $_POST['penerbit'];
        $query = "UPDATE simerah_ambon SET kategori = '$kategori', no_isbn = '$no_isbn', judul = '$judul' ,
                   pengarang = '$pengarang' , tahun_terbit = '$tahun_terbit' , penerbit = '$penerbit' WHERE id = '$id'";
        $result = mysqli_query($conn, $query);
        header("Location: index.php");
    } 
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="css/mdb.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container-xs">
    <div class="form-login">
    <form action="" method="POST">
  <div class="form-outline mb-4">
    <textarea type="text" id="form4Example1" class="form-control" name="kategori" rows="4""><?=$row['kategori']?></textarea>
    <label class="form-label" for="form4Example1">Kategori</label>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="form4Example2" class="form-control" name="no_isbn" value="<?=$row['no_isbn']?>"/>
    <label class="form-label" for="form4Example2">No ISBN</label>
  </div>

  <div class="form-outline mb-4">
    <input type="text" id="form4Example2" class="form-control" name="judul" value="<?=$row['judul']?>"/>
    <label class="form-label" for="form4Example2">Judul</label>
  </div>

  <div class="form-outline mb-4">
    <input class="form-control" id="form4Example3" name="pengarang" value="<?=$row['pengarang']?>">
    <label class="form-label" for="form4Example3" >Pengarang</label>
  </div>

  <div class="form-outline mb-4">
    <input class="form-control" id="form4Example3" name="tahun_terbit" value="<?=$row['tahun_terbit']?>">
    <label class="form-label" for="form4Example3" >Tahun Terbit</label>
  </div>

  <div class="form-outline mb-4">
    <input class="form-control" id="form4Example3" name="penerbit" value="<?=$row['penerbit']?>">
    <label class="form-label" for="form4Example3" >Penerbit</label>
  </div>

  <!-- Checkbox -->
  <div class="form-check d-flex justify-content-center mb-4">
    <input class="form-check-input me-2" type="checkbox" id="form4Example4" checked required/>
    <label class="form-check-label" for="form4Example4">
      Setujui untuk menganti!
    </label>
  </div>

  <!-- Submit button -->
  <button type="submit" class="btn btn-primary btn-block mb-4" name="update">Send</button>
</form>
</div>
</div>
<script src="js/mdb.min.js"></script>
</body>
</html>