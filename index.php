<?php
$host = "localhost";
$dbname = "newsdb_21810206";
$username = "root";
$password = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .theloai a {
            text-decoration: none;
            color: #000;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <header class="bg-light">
        <h1 class="text-center">Blog</h1>
        <nav class="navbar navbar-expand-sm justify-content-center">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">WebRoot</a></li>
                <li class="nav-item"><a class="nav-link" href="index.php">Danh Sách Bản Tin</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Add New</a></li>
            </ul>
        </nav>
    </header>

    <main class="container my-5">
        <h3 class="text-center mb-3">Danh sách bài viết</h3>

        <?php 
            // Kết nối MySQL
            $ketnoi = mysqli_connect($host, $username, $password, $dbname);
            if (!$ketnoi) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }

            // Truy vấn thể loại tin
            $sql1 = "SELECT matl, tentheloai FROM theloaitin";
            $data = mysqli_query($ketnoi, $sql1);
            $html = "<div class='mb-3 theloai'>";

            while($row = mysqli_fetch_assoc($data)){
                $matl = $row["matl"];
                $tentheloai = $row["tentheloai"];
                $html .= "<a href='index.php?tl=$matl'>$tentheloai</a> | ";
            }
            $html .= "</div>";
            mysqli_close($ketnoi);
            echo $html;
        ?>

        <?php
            // Kiểm tra tham số từ URL
            if (isset($_GET["tl"])) {
                $theloaitin = $_GET["tl"];
            } else {
                $theloaitin = "";
            }

            // Kết nối lại MySQL để truy vấn bài viết
            $ketnoi = mysqli_connect($host, $username, $password, $dbname);
            if (!$ketnoi) {
                die("Kết nối thất bại: " . mysqli_connect_error());
            }

            // Nếu có tham số thể loại, lấy các bài viết theo thể loại
            // Cách 1:
            if ($theloaitin) {
                $sql2 = "SELECT id, tieude, tomtat, urlHinh FROM bantin WHERE thuocTL = ?";
                $stmt = mysqli_prepare($ketnoi, $sql2);
                mysqli_stmt_bind_param($stmt, 's', $theloaitin);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);
            } else {
                // Nếu không có tham số thể loại, lấy tất cả bài viết
                $sql2 = "SELECT id, tieude, tomtat, urlHinh FROM bantin";
                $result = mysqli_query($ketnoi, $sql2);
            }

            // Cải tiến:
            // if ($theloaitin) {
            //     $stmt = $ketnoi->prepare("SELECT id, tieude, tomtat, urlHinh FROM bantin WHERE thuocTL = ?");
            //     $stmt->bind_param("s", $theloaitin);
            // } else {
            //     $stmt = $ketnoi->prepare("SELECT id, tieude, tomtat, urlHinh FROM bantin");
            // }
            // $stmt->execute();
            // $result = $stmt->get_result();

            // Kiểm tra kết quả
            if (mysqli_num_rows($result) > 0) {
                $html2 = "<div class='row row-cols-1 row-cols-md-3 g-4'>";
                while($row = mysqli_fetch_assoc($result)) {
                    $id = $row["id"];
                    $tieude = $row["tieude"];
                    $tomtat = $row["tomtat"];
                    $urlHinh = $row["urlHinh"];

                    $html2 .= "
                        <div class='col'>
                            <div class='card h-100'>
                                <img src='$urlHinh' class='card-img-top w-100' alt='...'>
                                <div class='card-body'>
                                    <h5 class='card-title'>$tieude</h5>
                                    <p class='card-text'>$tomtat</p>
                                </div>
                                <div class='card-footer'>
                                    <a href='chitiet.php?id=$id' class='text-decoration-none'><small class='text-body-secondary'>Xem chi tiết</small></a>
                                </div>
                            </div>
                        </div>";
                }
                $html2 .= "</div>";
                echo $html2;
            } else {
                echo "Không có dữ liệu.";
            }

            // Đóng kết nối
            mysqli_close($ketnoi);
        ?>
    </main>

    <footer class="bg-light text-center">
        <p>&copy; 2024 Nguyen Hoang Hao. Cre: Vnexpress.</p>
    </footer>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
