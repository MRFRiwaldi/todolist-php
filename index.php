<?php
require_once __DIR__ . "/function.php";

if (isset($_POST['tambahData'])) {
    $tugas = $_POST['tugas'];
    $deadline = $_POST['deadline'];

    tambahData($tugas, $deadline);
    header("location: index.php");
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    hapusdata($id);
    header("location: index.php");
}
?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Todolist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        body {
            background-color: #6F38C5;
        }
    </style>
</head>

<body id="home">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4" href="#"><span class="text-success">TODO</span>LIST</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <ul class="navbar-nav fw-semibold">
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fs-6 active" aria-current="page" href="#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fs-6" href="#todolist">Todolist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase fs-6" href="#kontak">Kontak Kami</a>
                        </li>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- navbar end -->

    <!-- Form -->

    <div class="container" id="todolist">
        <div class="card" style="margin-top: 10%;">
            <div class="card-header" align="center">
                Apa yang anda ingin lakukan hari ini?
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="tugas" class="form-label">Tugas</label>
                        <input type="text" name="tugas" class="form-control" id="tugas" required>
                    </div>

                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="datetime-local" name="deadline" class="form-control" id="deadline" required>
                    </div>

                    <button type="submit" name="tambahData" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>

        <!-- End Form tambah data -->

        <!-- table data -->
        <div class="container-sm card mt-5 col-md-8">
            <div class="card-body">
                <table class="table table-success table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tugas Anda</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $nomor = 1;
                        foreach (ambildata() as $data) { ?>
                            <tr>
                                <th scope="row"><?php echo $nomor++ ?></th>
                                <td><?php echo $data['nama_tugas'] ?></td>
                                <td><?php echo date("d F Y  H:i A ", strtotime($data['deadline'])) ?></td>
                                <td>
                                    <a href="edit.php?id=<?php echo $data['id'] ?>" class="btn btn-warning">Edit</a>
                                    <a href="?id=<?php echo $data['id'] ?>" onclick="return confirm('Apakah Anda Yakin Hapus Tugas Ini ?')" class="btn btn-danger">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
        <!-- end table data -->


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>