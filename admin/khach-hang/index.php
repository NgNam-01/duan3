<?php
require '../../global.php';
require '../../dao/khach-hang.php';
//--------------------------------//

check_login();

extract($_REQUEST);
if (exist_param("btn_insert")) {
    $file_name = save_file("up_hinh", "$IMAGE_DIR/users/");
    $hinh = $file_name ? $file_name : "user.png";
    //$mat_khau = md5($mat_khau);
    try {
        khach_hang_insert($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
        unset($ma_kh, $mat_khau, $mat_khau2, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
        $MESSAGE = "Đăng ký thành viên thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Đăng ký thành viên thất bại!";
    }
    $VIEW_NAME = "khach-hang/new.php";
} else if (exist_param("btn_update")) {
    $file_name = save_file("up_hinh", "$IMAGE_DIR/products/");
    $hinh = $file_name ? $file_name : $hinh;
    if ($mat_khau1) {
        if ($mat_khau1 != $mat_khau2) {
            $MESSAGE = "Xác nhận mật khẩu không thành công";
        } else {
            $mat_khau = $mat_khau1;
            try {
                khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
                $MESSAGE = "Cập nhật thành công!";
            } catch (Exception $exc) {
                $MESSAGE = "Cập nhật thất bại!";
            }
        }
    } else {
        try {
            khach_hang_update($ma_kh, $mat_khau, $ho_ten, $email, $hinh, $kich_hoat, $vai_tro);
            $MESSAGE = "Cập nhật thành công!";
        } catch (Exception $exc) {
            $MESSAGE = "Cập nhật thất bại!";
        }
    }
    $VIEW_NAME = "khach-hang/edit.php";
} else if (exist_param("btn_delete")) {
    try {
        khach_hang_delete($ma_kh);
        $MESSAGE = "Xóa thành công!";
    } catch (Exception $exc) {
        $MESSAGE = "Xóa thất bại!";
    }
    $items = khach_hang_select_all();
    $VIEW_NAME = "khach-hang/list.php";
} else if (exist_param("btn_edit")) {
    $item = khach_hang_select_by_id($ma_kh);
    extract($item);
    $VIEW_NAME = "khach-hang/edit.php";
} else if (exist_param("btn_list")) {
    $items = khach_hang_select_all();
    $VIEW_NAME = "khach-hang/list.php";
} else {
    $VIEW_NAME = "khach-hang/new.php";
}

require "../layout.php";
