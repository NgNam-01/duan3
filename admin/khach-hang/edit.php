<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<body>
    <h3 class="alert alert-success">QUẢN LÝ KHÁCH HÀNG</h3>
    <?php
    if (strlen($MESSAGE)) {
        echo "<h5 class='alert alert-warning'>$MESSAGE</h5>";
    }
    ?>
    <form action="index.php" method="post" enctype="multipart/form-data">
        <div class="form-group col-sm-6">
            <label>MÃ KHÁCH HÀNG</label>
            <input name="ma_kh" value="<?= $ma_kh ?>" class="form-control" required>
        </div>
        <div class="form-group col-sm-6">
            <label>HỌ VÀ TÊN</label>
            <input name="ho_ten" value="<?= $ho_ten ?>" class="form-control" required>
        </div>
        <div class="form-group col-sm-6">
            <label>MẬT KHẨU MỚI</label>
            <input name="mat_khau1" class="form-control" type="password">
            <input name="mat_khau" value="<?= $mat_khau ?>" type="hidden">
        </div>
        <div class="form-group col-sm-6">
            <label>XÁC NHẬN MẬT KHẨU</label>
            <input name="mat_khau2" class="form-control" type="password">
        </div>
        <div class="form-group col-sm-6">
            <label>ĐỊA CHỈ EMAIL</label>
            <input name="email" value="<?= $email ?>" class="form-control" type="email">
        </div>
        <div class="form-group col-sm-6">
            <label>HÌNH ẢNH</label>
            <input name="up_hinh" class="form-control" type="file">
            <input name="hinh" value="<?= $hinh ?>" type="hidden">
        </div>
        <div class="form-group col-sm-6 align-self-center">
            <label>KÍCH HOẠT?</label>
            <div class="form-control">
                <label class="radio-inline"><input type="radio" name="kich_hoat" value="0" <?= $kich_hoat == 0 ? "checked" : ""; ?>>Chưa kích hoạt</label>
                <label class="radio-inline"><input type="radio" name="kich_hoat" value="1" <?= $kich_hoat == 1 ? "checked" : ""; ?>>Kích hoạt</label>
            </div>
        </div>
        <div class="form-group col-sm-6 align-self-center">
            <label>VAI TRÒ?</label>
            <div class="form-control">
                <label class="radio-inline"><input type="radio" name="vai_tro" value="0" <?= $vai_tro == 0 ? "checked" : ""; ?>>Khách hàng</label>
                <label class="radio-inline"><input type="radio" name="vai_tro" value="1" <?= $vai_tro == 1 ? "checked" : ""; ?>>Nhân viên</label>
            </div>
        </div>
        <div class="form-group">
            <button name="btn_update" class="btn btn-default">Cập nhật</button>
            <button type="reset" class="btn btn-default">Nhập lại</button>
            <a href="index.php" class="btn btn-default">Thêm mới</a>
            <a href="index.php?btn_list" class="btn btn-default">Danh sách</a>
        </div>
    </form>
</body>

</html>