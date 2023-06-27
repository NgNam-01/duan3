<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h3 class="alert alert-success">QUẢN LÝ HÀNG HÓA</h3>
    <?php
    if (strlen($MESSAGE)) {
        echo "<h5 class='alert alert-warning'>$MESSAGE</h5>";
    }
    ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group col-sm-4">
            <label>Mã hàng hóa</label>
            <input name="ma_hh" value="<?= $ma_hh ?>" class="form-control" readonly>
        </div>

        <div class="form-group col-sm-4">
            <label>Tên hàng hóa</label>
            <input name="ten_hh" value="<?= $ten_hh ?>" class="form-control">
        </div>

        <div class="form-group col-sm-4">
            <label>Đơn giá</label>
            <input name="don_gia" value="<?= $don_gia ?>" class="form-control" type="number">
        </div>

        <div class="form-group col-sm-4">
            <label>Giảm giá</label>
            <input name="giam_gia" value="<?= $giam_gia ?>" class="form-control" type="number">
        </div>

        <div class="form-group col-sm-4">
            <label>Hình ảnh</label>
            <input name="up_hinh" class="form-control" type="file">
            <input name="hinh" value="<?= $hinh ?>" type="hidden">
        </div>

        <div class="form-group col-sm-4">
            <label>Loại hàng</label>
            <select name="ma_loai" class="form-control col-sm-4">
                <?php
                $list_loai = loai_select_all();
                foreach ($list_loai as $list) {
                    if ($list['ma_loai'] == $ma_loai)
                        echo "<option selected value='{$list['ma_loai']}'>{$list['ten_loai']}</option>";
                    else
                        echo "<option value='{$list['ma_loai']}'>{$list['ten_loai']}</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group col-sm-4">
            <label>Kiểu hàng hóa</label>
            <div class="form-control">
                <label class="radio-inline"><input name="dac_biet" value="1" type="radio" <?= $dac_biet == 1 ? "checked" : ""; ?>>Đặc biệt</label>
                <label class="radio-inline"><input name="dac_biet" value="0" type="radio" <?= $dac_biet == 0 ? "checked" : ""; ?>>Bình thường</label>
            </div>
        </div>

        <div class="form-group col-sm-4">
            <label>Ngày nhập</label>
            <input name="ngay_nhap" value="<?= $ngay_nhap ?>" class="form-control" type="date">
        </div>

        <div class="form-group col-sm-4">
            <label>Số lượt xem</label>
            <input name="so_luot_xem" value="<?= $so_luot_xem ?>" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label>Mô tả</label>
            <textarea name="mo_ta" class="form-control" cols="30" rows="5"><?= $mo_ta ?></textarea>
        </div>

        <div>
            <button name="btn_update" class="btn btn-default">Cập nhật</button>
            <button type="reset" class="btn btn-default">Nhập lại</button>
            <a href="index.php" class="btn btn-default">Thêm mới</a>
            <a href="index.php?btn_list" class="btn btn-default">Danh sách</a>
        </div>
    </form>
</body>

</html>