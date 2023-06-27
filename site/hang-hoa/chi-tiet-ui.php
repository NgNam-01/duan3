<!DOCTYPE html>
<html>
    <body>
        <div class="thumbnail">
            <img src='<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>' style="max-width: 95%">
            <div class="caption">
                <p>
                    <ul>
                        <li>MÃ HH: <?=$ma_hh?></li>
                        <li>TÊN HH: <?=$ten_hh?></li>
                        <li>ĐƠN GIÁ: <?=number_format($don_gia, 0)?></li>
                        <li>GIẢM GIÁ: <?=$giam_gia?>%</li>
                    </ul>
                </p>
                <div><?= $mo_ta ?></div>
            </div>
        </div>
        
        <?php require 'binh-luan.php';?>
        
        <?php require 'hang-cung-loai.php';?>
    </body>
</html>