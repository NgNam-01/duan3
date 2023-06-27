<?php
require_once "pdo.php";
// Thêm hàng hóa
function hang_hoa_insert($ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $mo_ta)
{
    $sql = "INSERT INTO hang_hoa(ten_hh, don_gia, giam_gia, hinh, ma_loai, dac_biet, ngay_nhap, mo_ta) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet == 1, $ngay_nhap, $mo_ta);
}

//Cập nhật hàng hóa
function hang_hoa_update($ma_hh, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet, $ngay_nhap, $mo_ta)
{
    $sql = "UPDATE hang_hoa SET ten_hh=?, don_gia=?, giam_gia=?, hinh=?, ma_loai=?, dac_biet=?, ngay_nhap=?, mo_ta=? WHERE ma_hh=?;";
    pdo_execute($sql, $ten_hh, $don_gia, $giam_gia, $hinh, $ma_loai, $dac_biet == 1, $ngay_nhap, $mo_ta, $ma_hh);
}

// Xóa một hoặc nhiều hàng hóa
function hang_hoa_delete($ma_hh)
{
    $sql = "DELETE FROM hang_hoa WHERE ma_hh=?";
    if (is_array($ma_hh)) {
        foreach ($ma_hh as $ma) pdo_execute($sql, $ma);
    } else pdo_execute($sql, $ma_hh);
}

// Truy vấn tất cả các hàng hóa
function hang_hoa_select_all()
{
    $sql = "SELECT * FROM hang_hoa";
    return pdo_query($sql);
}

// Truy vấn hàng hóa theo ID
function hang_hoa_select_by_id($ma_hh)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_hh = $ma_hh";
    return pdo_query_one($sql);
}

function hang_hoa_exit($ma_hh)
{
    $sql = "SELECT count(*) FROM hang_hoa WHERE ma_hh = ?";
    return pdo_query_value($sql, $ma_hh) > 0;
}

// Truy vấn hàng hóa theo loại
function hang_hoa_select_by_loai($ma_loai)
{
    $sql = "SELECT * FROM hang_hoa WHERE ma_loai = $ma_loai";
    return pdo_query($sql);
}

// Truy vấn tất cả hàng hóa theo từ khóa
function hang_hoa_select_keyword($keywords)
{
    $sql = "SELECT * FROM hang_hoa hh JOIN loai ON hh.ma_loai = loai.ma_loai WHERE ten_hh like ? or ten_loai like ?";
    return pdo_query($sql, '%' . $keywords . '%', '%' . $keywords . '%');
}

// Truy vấn tất cả các hàng hóa đặc biệt
function hang_hoa_select_dac_biet()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=1";
    return pdo_query($sql);
}

// Truy vấn top 10 hàng hóa
function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa ORDER BY so_luot_xem DESC LIMIT 10";
    return pdo_query($sql);
}

// Truy vấn 9 hàng hóa thường mới nhập
function hang_hoa_select_new()
{
    $sql = "SELECT * FROM hang_hoa WHERE dac_biet=0 ORDER BY ngay_nhap DESC LIMIT 9";
    return pdo_query($sql);
}

// Tăng số lượt xem lên 1
function hang_hoa_tang_so_luot_xem($ma_hh)
{
    $sql = "UPDATE hang_hoa SET so_luot_xem = so_luot_xem + 1 WHERE ma_hh = $ma_hh";
    return pdo_execute($sql);
}

function hang_hoa_select_page()
{
    global $PER_PAGE;
    if (!isset($_SESSION['page_no'])) {
        $_SESSION['page_no'] = 0;
    }
    if (!isset($_SESSION['page_count'])) {
        $row_count = pdo_query_value("SELECT count(*) FROM hang_hoa");
        $_SESSION['page_count'] = ceil($row_count / $PER_PAGE*1.0);
    }

    if (exist_param("page_no")) {
        $_SESSION['page_no'] = $_REQUEST['page_no'];
    }
    if ($_SESSION['page_no'] < 0) {
        $_SESSION['page_no'] = $_SESSION['page_count'] - 1;
    }
    if ($_SESSION['page_no'] > $_SESSION['page_count'] - 1) {
        $_SESSION['page_no'] = 0;
    }
    $start = $PER_PAGE * $_SESSION['page_no'];
    $sql = "SELECT * FROM hang_hoa ORDER BY ma_hh LIMIT $start,$PER_PAGE";
    return pdo_query($sql);
}
