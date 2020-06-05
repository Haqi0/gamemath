<?php
include 'koneksi.php';
$db = new db();
    session_start();

    $nama = $_SESSION['nama'];
    $lives = $_SESSION['lives'];
    $skor = $_SESSION['skor'];
    $email = $_SESSION['email'];


    $exist = mysqli_query($db->con, "SELECT * FROM tabel WHERE email = '".$email."'") or exit(mysqli_error($db->con));
    
    if(mysqli_num_rows($exist)) {
        $db->updatedata($nama, $email, $skor);
    } else {
        $db->insertdata($nama, $email, $skor);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HASIL</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src=" https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container pt-4">
        <h1>Hello <?php echo $_SESSION['nama'] ?>, Permainan sudah selesai</h1>
        <h1>Skor Anda : <?php echo $_SESSION['skor'] ?></h1>
        <a href="index.php" class="btn btn-primary">Main Lagi</a>
        <hr>
        <h2>Hall of Fame</h2>
        <table class='table'>
            <thead>
                <tr>
                    <td>No</td>
                    <td>Nama</td>
                    <td>Skor</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $q = mysqli_query($db->con, "select * from tabel order by skor desc limit 10");
                $no = 0;
                while($dt = mysqli_fetch_array($q)){
                    $no += 1;
                    echo "<tr>";
                    echo "<td>$no</td>";
                    echo "<td>".$dt['nama']."</td>";
                    echo "<td>".$dt['skor']."</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
session_destroy();
?>