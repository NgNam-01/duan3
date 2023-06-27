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
            <label>MÃ HÀNG HÓA</label>
            <input name="ma_hh" value="auto number" class="form-control" type="text" readonly>
        </div>

        <div class="form-group col-sm-4">
            <label>TÊN HÀNG HÓA</label>
            <input name="ten_hh" class="form-control" required>
        </div>

        <div class="form-group col-sm-4">
            <label>ĐƠN GIÁ</label>
            <input name="don_gia" class="form-control" type="number">
        </div>

        <div class="form-group col-sm-4">
            <label>GIẢM GIÁ</label>
            <input name="giam_gia" class="form-control" type="number">
        </div>

        <div class="form-group col-sm-4">
            <label>HÌNH ẢNH</label>
            <input name="up_hinh" class="form-control" type="file">
        </div>

        <div class="form-group col-sm-4">
            <label>LOẠI HÀNG</label>
            <select name="ma_loai" class="form-control col-sm-4">
                <?php
                    $list_loai = loai_select_all();
                    foreach ($list_loai as $list) {
                        echo "<option value='{$list['ma_loai']}'>{$list['ten_loai']}</option>";
                    }
                ?>
            </select>
        </div>

        <div class="form-group col-sm-4 align-self-center">
        <label>HÀNG ĐẶC BIỆT?</label>
            <div class="form-control">
                <label class="radio-inline"><input type="radio" name="dac_biet" value="1">Đặc biệt</label>
                <label class="radio-inline"><input type="radio" name="dac_biet" value="0" checked>Bình thường</label>
            </div>
        </div>

        <div class="form-group col-sm-4">
            <label>NGÀY NHẬP</label>
            <input name="ngay_nhap" class="form-control" type="date">
        </div>

        <div class="form-group col-sm-4">
            <label>SỐ LƯỢT XEM</label>
            <input name="so_luot_xem" class="form-control" value="0" readonly>
        </div>

        <div class="form-group">
            <label>MÔ TẢ</label>
            <textarea name="mo_ta" class="form-control" cols="30" rows="5"></textarea>
        </div>

        <div class="form-group">
            <button name="btn_insert" class="btn btn-default">Thêm mới</button>
            <button type="reset" class="btn btn-default">Nhập lại</button>
            <a href="index.php?btn_list" class="btn btn-default">Danh sách</a>
        </div>
    </form>
</body>

</html>