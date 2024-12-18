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
        .title {
            font-size: 2em;
            margin-bottom: 15px;
        }

        .tomtat {
            color: rgba(119, 119, 119, 1);
            margin: 20px 0;
        }

        .img_bantin {
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .noidung {
            font-size: 1em;
            line-height: 1.5;
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

    <main class="container my-5 mx-auto w-75">
        <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }

            $stmt = $ketnoi->prepare("SELECT * FROM bantin WHERE id = ?");
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<h2 class="title">' . $row['tieude'] . '</h2>';
                    echo '<p class="tomtat">' . $row['tomtat'] . '</p>';
                    echo '<img src="' . $row['urlHinh'] . '" alt="" class="img_bantin w-100">';
                    echo '<div class="noidung">' . $row['noidung'] . '</div>';
                }
            }

        ?>








        <!-- <h2 class="title">Drone lạ lảng vảng gần loạt căn cứ không quân Mỹ tại Anh</h2>
        <p class="tomtat">Không quân Mỹ cho biết phát hiện nhiều drone lạ hoạt động gần các căn cứ của họ tại Anh, song chưa coi chúng là phương
        tiện thù địch.</p>
        <img src="https://i1-vnexpress.vnecdn.net/2024/11/26/5563187178137268590a-My-7777-1732639747.jpg?w=680&h=0&q=100&dpr=1&fit=crop&s=HWeph_Dn9OQdj0Spugt35A" alt="" class="img_bantin w-100">
        <div class="noidung">
            <p>Không quân Mỹ cho biết phát hiện nhiều drone lạ hoạt động gần các căn cứ của họ tại Anh, song chưa coi chúng là phương
            tiện thù địch.
            
            <br><br>Từ ngày 20/11 đến 25/11, không quân Mỹ đã phát hiện phương tiện bay không người lái (drone) xuất hiện gần ba căn cứ gồm
            Lakenheath, Mildenhall và Feltwell ở miền đông nước Anh. Số drone này có kích thước và cấu hình khác nhau. Số lượng
            drone mỗi lần xuất hiện cũng không giống nhau.
            
            <br><br>Không quân Mỹ ngày 26/11 khẳng định những drone nói trên không gây tác động đến nhân sự hoặc hạ tầng tại ba căn cứ.
            "Chúng tôi chưa coi đây là phương tiện thù địch, song vẫn liên tục theo dõi để đảm bảo an toàn và an ninh cho các cơ
            sở", lực lượng này thông báo.
            
            <br><br>Phát ngôn viên của Bộ Quốc phòng Anh cho biết cơ quan này "nhìn nhận các mối đe dọa một cách nghiêm túc" và đang hỗ trợ
            không quân Mỹ đối phó với chúng.
            
            <br><br>Sự việc tại các căn cứ ở Anh nằm trong chuỗi vụ drone xâm nhập căn cứ và cơ sở nhạy cảm của Mỹ gần đây. Hàng loạt drone
            cuối năm ngoái tiếp cận căn cứ không quân Langley, nơi đóng quân của tiêm kích tàng hình F-22, khiến quân đội Mỹ phải
            cẩn trọng với mối đe dọa kiểu này hơn.
            
            <br><br>Các căn cứ Lakenheath, Mildenhall và Feltwell thuộc sở hữu của không quân Anh, song không quân Mỹ là lực lượng duy nhất
            đóng quân tại đó. Lakenheath là nơi đồn trú của Không đoàn số 48 không quân Mỹ, đơn vị vận hành hai phi đoàn F-35A và
            hai phi đoàn F-15E.
            
            <br><br>Một bộ phận thuộc Phi đội số 73 Mỹ đang đóng tại căn cứ Feltwell, làm nhiệm vụ thu thập thông tin tình báo, giám sát và
            trinh sát. Căn cứ Mildenhall là nơi đóng quân của Không đoàn Tiếp liệu số 100, Không đoàn Đặc nhiệm số 352 và Không đoàn
            Hỗ trợ số 501 của không quân Mỹ.</p>
        </div> -->
    </main>

    <footer class="bg-light text-center">
        <p>&copy; 2024 Nguyen Hoang Hao. Cre: Vnexpress.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>