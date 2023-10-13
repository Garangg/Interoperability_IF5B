<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "akademik";

$koneksi = mysqli_connect($host, $user, $password, $db);
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$nim = "";
$nama = "";
$alamat = "";
$fakultas = "";
$sukses = "";
$error = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

// Edit Data
if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "select * from mahasiswa where id = '$id'";
    $q = mysqli_query($koneksi, $sql1);
    $r = mysqli_fetch_array($q);
    $nim = $r['nim'];
    $nama = $r['nama'];
    $alamat = $r['alamat'];
    $fakultas = $r['fakultas'];
}

// Delete Data
if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "delete from mahasiswa where id = '$id'";
    $q = mysqli_query($koneksi, $sql1);
    if ($q) {
        $sukses = "Berhasil delete data";
    } else {
        $error = "Gagal melakukan delete data";
    }
}

// Simpan Data / Edit Data 
if (isset($_POST['simpan'])) {
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $fakultas = $_POST['fakultas'];

    if ($nim && $nama && $alamat && $fakultas) {
        if ($op == 'edit') {
            $sql1 = "update mahasiswa set nim = '$nim', nama='$nama', alamat='$alamat', fakultas='$fakultas' where id='$id'";
            $q = mysqli_query($koneksi, $sql1);
            if ($q) {
                $sukses = "Berhasil update data";
            } else {
                $error = "Gagal melakukan update data";
            }
        } else {
            $sql = "insert into mahasiswa(nim, nama, alamat, fakultas) VALUES ('$nim', '$nama', '$alamat', '$fakultas')";
            $q = mysqli_query($koneksi, $sql);
            if ($q) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data";
            }
        }
    } else {
        $error = "Data harus diisi semua";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .mx-auto {
            width: 800px;
        }

        .card {
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="mx-auto">
        <div class="card">
            <div class="card-header">
                Create Data
            </div>
            <div class="card-body">
                <?php if ($sukses) {
                    echo '<div class="alert alert-success" role="alert">';
                    echo $sukses;
                    echo '</div>';
                } ?>
                <?php if ($error) {
                    echo '<div class="alert alert-danger" role="alert">';
                    echo $error;
                    echo '</div>';
                } ?>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" value="<?= $nim; ?>" name="nim">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" value="<?= $nama; ?>" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" value="<?= $alamat; ?>" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="fakultas" class="form-label">Fakultas</label>
                        <select class="form-control" id="fakultas" name="fakultas">
                            <option selected>Pilih Fakultas Anda</option>
                            <option value="Fakultas Ilmu Komputer" <?php if ($fakultas == "Fakultas Ilmu Komputer")
                                echo "Selected" ?>>Fakultas Ilmu Komputer</option>
                                <option value="Fakultas Ekonomi" <?php if ($fakultas == "Fakultas Ekonomi")
                                echo "Selected" ?>>
                                    Fakultas Ekonomi</option>
                                <option value="Fakultas Hukum" <?php if ($fakultas == "Fakultas Hukum")
                                echo "Selected" ?>>
                                    Fakultas Hukum</option>
                                <option value="Fakultas Teknik" <?php if ($fakultas == "Fakultas Teknik")
                                echo "Selected" ?>>
                                    Fakultas Teknik</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary" name="simpan" value="Simpan Data">Save</button>
                    </form>
                </div>

            </div>

            <div class="card">
                <div class="card-header">
                    Data Mahasiswa
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NIM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Fakultas</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        <tbody>
                            <?php
                            $sql = "select * from mahasiswa order by nim asc";
                            $q = mysqli_query($koneksi, $sql);
                            $urut = 1;
                            while ($data = mysqli_fetch_array($q)) {
                                $id = $data['id'];
                                $nim = $data['nim'];
                                $nama = $data['nama'];
                                $alamat = $data['alamat'];
                                $fakultas = $data['fakultas'];
                                ?>
                            <tr>
                                <th scope="row">
                                    <?= $urut++ ?>
                                </th>
                                <td scope="row">
                                    <?= $nim ?>
                                </td>
                                <td scope="row">
                                    <?= $nama ?>
                                </td>
                                <td scope="row">
                                    <?= $alamat ?>
                                </td>
                                <td scope="row">
                                    <?= $fakultas ?>
                                </td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?= $id ?>" class="btn btn-warning">Edit</a>
                                    <a href="index.php?op=delete&id=<?= $id ?>"
                                        onclick="return confirm('Yakin ingin menghapus data?')"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php
                            }
                            ?>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>

</html>