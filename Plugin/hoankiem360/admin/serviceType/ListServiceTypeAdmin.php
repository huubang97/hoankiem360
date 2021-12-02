<script type="text/javascript" src="<?php echo $urlHomes . 'app/Plugin/mantanHotel/script.js'; ?>"></script>
<link href="<?php echo $urlHomes . 'app/Plugin/mantanHotel/style.css'; ?>" rel="stylesheet">
<?php
$breadcrumb = array('name' => 'Loại hình dịch vụ',
    'url' => $urlPlugins . 'admin/mantanHotel-admin-serviceType-listServiceTypeAdmin.php',
    'sub' => array('name' => 'Danh sách')
    );
addBreadcrumbAdmin($breadcrumb);
?>   

<style type="text/css">
    
element.style {
}
.tableList th {
    font-weight: bold;
    text-align: center;
}
.tableList td, .tableList th {
    padding: 5px;
    border-bottom: 1px solid #bcbcbc;
    border-right: 1px solid #bcbcbc;
    word-break: break-all;
}
.tableList {
    width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
    border-spacing: 0;
    border-top: 1px solid #bcbcbc;
    border-left: 1px solid #bcbcbc;
    word-break: break-all;
}
</style> 

<div class="clear"></div>
<a style="padding: 4px 8px;" href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-serviceType-addServiceTypeAdmin.php'; ?>" class="input">
    <img src="<?php echo $webRoot; ?>images/add.png"> Thêm
</a>  
<div class="taovien" >
    <form action="" method="post" name="listForm">
        <table id="listTable" cellspacing="0" class="tableList">

            <tr>
                <th>Tên loại hình dịch vụ </th>
                <th>Ảnh </th>
                <th colspan="2">Hành động</th>
            </tr>

            <?php
            if (!empty($listData)) {
                
                $stt =1;
                foreach ($listData as $item) {
                    ?>
                    <tr>
                        <td><?php echo $item['ServiceType']['name'] ?></td>
                        <td><img src="<?php echo $item['ServiceType']['image']; ?>" width="100" /></td>
                        
                        <td align="center">
                            <a href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-serviceType-addServiceTypeAdmin.php?id='.$item['ServiceType']['id']; ?>">Sửa</a>
                        </td>
                        <td align="center">
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa chương trình này không?');" href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-serviceType-deleteServiceTypeAdmin.php?id='.$item['ServiceType']['id']; ?>">Xóa</a>
                        </td>

                    </tr>
                    <?php
                    $stt ++;
                }
            } else {
                echo '<tr><td align="center" colspan="7">Chưa có dữ liệu </td></tr>';
            }
            ?>

        </table>
        <p>
            <?php
            $urlListHotelAdmin = $urlPlugins . 'admin/mantanHotel-admin-typeroom-sortTypeRoom.php';
            if ($page > 5) {
                $startPage = $page - 5;
            } else {
                $startPage = 1;
            }

            if ($totalPage > $page + 5) {
                $endPage = $page + 5;
            } else {
                $endPage = $totalPage;
            }

            echo '<a href="' . $urlListHotelAdmin . '?page=' . $back . '">Trang trước</a> ';
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo ' <a href="' . $urlListHotelAdmin . '?page=' . $i . '">' . $i . '</a> ';
            }
            echo ' <a href="' . $urlListHotelAdmin . '?page=' . $next . '">Trang sau</a> ';

            echo 'Tổng số trang: ' . $totalPage;
            ?>
        </p>
    </form>
</div>
<script type="text/javascript">
    var urlWeb = "<?php echo $urlHomes; ?>options/";
    var urlNow = "<?php echo $urlHomes; ?>options/themes";

    function active(theme)
    {
        $.ajax({
            type: "POST",
            url: urlWeb + "changeTheme",
            data: {theme: theme}
        }).done(function (msg) {
            window.location = urlNow;
        })
        .fail(function () {
            window.location = urlNow;
        });
    }
</script>
