<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="<?= $CONTENT_URL ?>/js/xshop-list.js"></script>
</head>

<body>
    <h3 class="alert alert-success">QUẢN LÝ HÀNG HÓA</h3>
    <?php
    if (strlen($MESSAGE)) {
        echo "<h5 class='alert alert-warning'>$MESSAGE</h5>";
    }
    $fast_backward = 0;
    $fast_forward = $_SESSION['page_count'] - 1;
    $step_backward = $_SESSION['page_no'] - 1<$fast_backward?$fast_forward:$_SESSION['page_no'] - 1;
    $step_forward = $_SESSION['page_no'] + 1>$fast_forward?$fast_backward:$_SESSION['page_no'] + 1;
    ?>
    <ul class="pager">
        <li><a href="?btn_list&page_no=<?php echo $fast_backward?>" class="glyphicon glyphicon-fast-backward"></a></li>
        <li><a href="?btn_list&page_no=<?php echo $step_backward?>" class="glyphicon glyphicon-step-backward"></a></li>
        <li><a href="?btn_list&page_no=<?php echo $step_forward?>" class="glyphicon glyphicon-step-forward"></a></li>
        <li><a href="?btn_list&page_no=<?php echo $fast_forward?>" class="glyphicon glyphicon-fast-forward"></a></li>
    </ul>

    <form action="index.php" method="post">
        <table class="table">
            <thead class="alert-success">
                <tr>
                    <th></th>
                    <th>MÃ HH</th>
                    <th>TÊN HH</th>
                    <th>ĐƠN GIÁ</th>
                    <th>GIẢM GIÁ</th>
                    <th>SỐ LƯỢT XEM</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($items as $item) {
                    extract($item);
                ?>
                    <tr>
                        <th><input type="checkbox" name="ma_hh[]" value="<?= $ma_hh ?>"></th>
                        <td><?= $ma_hh ?></td>
                        <td><?= $ten_hh ?></td>
                        <td><?= $don_gia ?></td>
                        <td><?= $giam_gia ?></td>
                        <td><?= $so_luot_xem ?></td>
                        <td>
                            <a href="index.php?btn_edit&ma_hh=<?= $ma_hh ?>" class="btn btn-default btn-sm">Sửa</a>
                            <a href="index.php?btn_delete&ma_hh=<?= $ma_hh ?>" class="btn btn-default btn-sm">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <button id="check-all" type="button" class="btn btn-default">Chọn tất cả</button>
                        <button id="clear-all" type="button" class="btn btn-default">Bỏ chọn tất cả</button>
                        <button id="btn-delete" name="btn_delete" class="btn btn-default">Xóa các mục chọn</button>
                        <a href="index.php" class="btn btn-default">Nhập thêm</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>