<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="row">
            <div class="col-md-6">
                <h5 class="card-title">Thông tin cá nhân</h5>
                <ul class="list-unstyled">
                    <li><span class="fw-bold">Họ và tên:</span> Nguyễn Hoàng Hảo</li>
                    <li><span class="fw-bold">MSSV:</span> 21810206</li>
                    <li><span class="fw-bold">Email:</span> 21810206@student.hcmus.edu.vn</li>
                </ul>
                <p class="card-text" id="browserTime"><small class="text-body-secondary"></small></p>
                <?php
                    date_default_timezone_set('Asia/Ho_Chi_Minh');
                    $currentDateTime = date('Y/m/d H:i:s');
                    echo "Host time (PHP): " . $currentDateTime;
                ?>
            </div>
            <div class="col-md-6">
                <h5 class="card-title">Các Phần Đã Hoàn Thành</h5>
                <ul class="list-unstyled">
                    <li>Yêu cầu 1: Tạo CSDL</li>
                    <li>Yêu cầu 2: Tạo Menu</li>
                    <li>Yêu cầu 3: Tạo Trang Chủ</li>
                    <li>Yêu cầu 4: Tạo Các Bản Tin</li>
                    <li>Yêu cầu 5: Thêm Bản Tin Mới</li>
                </ul>
            </div>
        </div>
    </main>


    <footer class="bg-light text-center">
        <p>&copy; 2024 Nguyen Hoang Hao. Cre: Vnexpress.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function updateDateTime() {
            const now = new Date();
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            const dateTimeString = `${year}/${month}/${day} ${hours}:${minutes}:${seconds}`;
            document.getElementById('browserTime').textContent = "Browser time: " + dateTimeString;
        }

        updateDateTime();
        setInterval(updateDateTime, 1000);
    </script>
</body>

</html>