<?php
require_once __DIR__ . "/function.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $data = ambilsatudata($id)->fetch();
} else {
    header("location: index.php");
}
if (isset($_POST['editData'])) {
    $tugas = $_POST['tugas'];
    $deadline = $_POST['deadline'];

    editdata($data['id'], $tugas, $deadline);

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
        body{
            background-color: #6F38C5;
        }
    </style>
</head>

<body>

    <!-- Form -->

     <div class="container">
        <div class="card" style="margin-top: 70px;">
            <div class="card-header">
                Edit Tugas Anda
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="tugas" class="form-label">Tugas</label>
                        <input type="text" name="tugas" class="form-control" id="tugas" value="<?php echo $data['nama_tugas']?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="deadline" class="form-label">Deadline</label>
                        <input type="datetime-local" name="deadline" class="form-control" id="deadline" required>
                    </div>

                    <button type="submit" name="editData" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>

        <!-- End Form -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>

</html>