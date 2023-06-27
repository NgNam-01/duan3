<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <script src="<?= $CONTENT_URL ?>/js/xshop-list.js"></script>
</head>

<body>
    <h3 class="alert alert-success">CHI TIẾT BÌNH LUẬN</h3>
    <?php
    if (strlen($MESSAGE)) {
        echo "<h5 class='alert alert-warning'>$MESSAGE</h5>";
    }
    ?>
    <form action="index.php?ma_hh=<?= $ma_hh ?>" method="post">
        <h3>HÀNG HÓA: <?= $items[0]['ten_hh'] ?></h3>
        <table class="table">
            <thead class="alert-success">
                <tr>
                    <th></th>
                    <th>NỘI DUNG</th>
                    <th>NGÀY BL</th>
                    <th>NGƯỜI BL</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($items as $item) {
                    extract($item);
                ?>
                    <tr>
                        <th><input type="checkbox" name="ma_bl[]" value="<?= $ma_bl ?>"></th>
                        <td><?= $noi_dung ?></td>
                        <td><?= $ngay_bl ?></td>
                        <td><?= $ma_kh ?></td>
                        <td><a href="index.php?btn_delete&ma_bl=<?= $ma_bl ?>&ma_hh=<?= $ma_hh ?>" class="btn btn-default btn-sm">Xóa</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="6">
                        <button id="check-all" type="button" class="btn btn-default btn-sm">Chọn tất cả</button>
                        <button id="clear-all" type="button" class="btn btn-default btn-sm">Bỏ chọn tất cả</button>
                        <button id="btn-delete" name="btn_delete" class="btn btn-default btn-sm">Xóa các mục đã chọn</button>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>