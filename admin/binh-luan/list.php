<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
</head>

<body>
    <h3 class="alert alert-success">TỔNG HỢP BÌNH LUẬN</h3>
    <form action="index.php" method="post">
        <table class="table">
            <thead class="alert-success">
                <tr>
                    <th>HÀNG HÓA</th>
                    <th>SỐ BL</th>
                    <th>MỚI NHẤT</th>
                    <th>CŨ NHẤT</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($items as $item) {
                    extract($item);
                ?>
                    <tr>
                        <td><?= $ten_hh ?></td>
                        <td><?= $so_luong ?></td>
                        <td><?= $cu_nhat ?></td>
                        <td><?= $moi_nhat ?></td>
                        <td><a href="../binh-luan/index.php?ma_hh=<?= $ma_hh ?>" class="btn btn-default btn-sm">Chi tiết</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </form>
</body>

</html>