<?php
$host = "localhost";
$dbname = "newsdb_21810206";
$username = "root";
$password = "";

// khởi tạo kết nối
$ketnoi = mysqli_connect($host, $username, $password, $dbname);

// kiểm tra kết nối
if (!$ketnoi) {
    die("Kết nối thất bại: " . mysqli_connect_error());
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        form #noidung {
            height: 500px;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <header class="bg-light">
        <h1 class="text-center">Blog</h1>
        <nav class="navbar navbar-expand-sm justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">WebRoot</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Danh Sách Bản Tin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Add New</a>
                </li>
            </ul>
        </nav>
    </header>

    <main class="container my-5">
        <h3 class="text-center mb-3">Tạo Bản Tin Mới</h3>
        <!-- tieude -->
        <!-- tomtat -->
        <!-- urlHinh -->
        <!-- noidung -->
        <!-- theloai -->
        <form action="" method="post" class="form_group">
            <div class="mb-3">
                <label for="tieude" class="form-label fw-bold">Tiêu Đề</label>
                <input type="text" class="form-control" id="tieude" name="tieude" required>
            </div>
            <div class="mb-3">
                <label for="tomtat" class="form-label fw-bold">Tóm Tắt</label>
                <textarea class="form-control" id="tomtat" name="tomtat" required></textarea>
            </div>
            <div class="mb-3">
                <label for="urlHinh" class="form-label fw-bold">Url Hình</label>
                <input type="text" class="form-control" id="urlHinh" name="urlHinh" required>
            </div>
            <div class="mb-3">
                <label for="noidung" class="form-label fw-bold">Nội Dung</label>
                <textarea class="form-control" id="noidung" name="noidung" required></textarea>
            </div>
            <div class="mb-3">
                <label for="theloai" class="form-label fw-bold">Thể Loại</label>
                <select class="form-select" name="theloai" required>
                    <option value="kinhdoanh">Kinh Doanh</option>
                    <option value="thegioi">Thế Giới</option>
                    <option value="thethao">Thể Thao</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </main>

    <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Nhận giá trị từ form
            $tieude = mysqli_real_escape_string($ketnoi, $_POST['tieude']);
            $tomtat = mysqli_real_escape_string($ketnoi, $_POST['tomtat']);
            $urlHinh = mysqli_real_escape_string($ketnoi, $_POST['urlHinh']);
            $noidung = mysqli_real_escape_string($ketnoi, $_POST['noidung']);
            $theloai = mysqli_real_escape_string($ketnoi, $_POST['theloai']);

            // Chuẩn bị câu truy vấn SQL để thêm dữ liệu vào bảng "bantin"
            $sql = "INSERT INTO bantin (tieude, tomtat, urlHinh, noidung, thuocTL) 
                VALUES ('$tieude', '$tomtat', '$urlHinh', '$noidung', '$theloai')";

            // Thực thi câu truy vấn
            if (mysqli_query($ketnoi, $sql)) {
            // Thêm dữ liệu thành công
                echo "<script>alert('Bản tin đã được lưu thành công!');</script>";
                header('Location: index.php');
                exit();
            } else {
                echo "Lỗi: " . $sql . "<br>" . mysqli_error($ketnoi);
            }
        }

        // Đóng kết nối
        mysqli_close($ketnoi);
    ?>


    <footer class="bg-light text-center">
        <p>&copy; 2024 Nguyen Hoang Hao. Cre: Vnexpress.</p>
    </footer>
</body>

</html>