<script type="text/javascript" src="<?php echo $urlHomes . 'app/Plugin/mantanHotel/script.js'; ?>"></script>
<link href="<?php echo $urlHomes . 'app/Plugin/mantanHotel/style.css'; ?>" rel="stylesheet">
<?php
$breadcrumb = array('name' => 'Sự kiện',
    'url' => $urlPlugins . 'admin/hoankiem360-admin-event-listEventAdmin.php',
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
 <form action="" method="GET">
           <table class="table table-bordered" style="border: 1px solid #ddd!important; margin-top: 10px;">  
            <tr>
                <td>
                    <label>Tên sự kiện</label>
                    <input type="" name="name" class="form-control" placeholder="Tên sự kiện" value="<?php echo @$_GET['name'];?>">
                </td>
                <td>
                    <label>Tháng diễn ra</label> 
                      <select name="month" class="form-control" id="month">
                    <option value="" save-price="">Chọn tháng diễn ra </option>
                    <?php
                    $getmonth   = getmonth();
                    if(!empty($getmonth)){
                        foreach($getmonth as $month){
                            if(!isset($_GET['month']) || $month['id']!=@$_GET['month']){
                                echo '<option value="'.$month['id'].'">'.$month['name'].'</option>';
                            }else{
                                echo '<option selected value="'.$month['id'].'">'.$month['name'].'</option>';
                            }
                        }
                    }
                    ?>
                </select> 
                </td>
                <td>
                    <label>Năm diễn ra</label>
                    <input type="" name="year" class="form-control" placeholder="Năm diễn ra" value="<?php echo @$_GET['year'];?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="" value="Tìm kiếm">
                </td>
                <td colspan="2">
                    <!-- <input type="submit" name="excel" value="Xuất excel"> -->
                </td>
            </tr>
        </table>
    </form>
<div class="clear"></div>
<a style="padding: 4px 8px;" href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-event-addEventAdmin.php'; ?>" class="input">
    <img src="<?php echo $webRoot; ?>images/add.png"> Thêm
</a>  
<div class="taovien" >
    <form action="" method="post" name="listForm">
        <table id="listTable" cellspacing="0" class="tableList">

            <tr>
                <th>Hình ảnh</th>
                <th>Tên sự kiện</th>
                <th>Từ ngày</th>
                <th>Đến ngày</th>
                <th colspan="2">Hành động</th>
            </tr>

            <?php
            if (!empty($listData)) {
                
                $stt =1;
                foreach ($listData as $item) {
                    ?>
                    <tr>
                        <td><img src="<?php echo $item['Event']['image']; ?>" width="100" /></td>
                        <td><?php echo $item['Event']['title'] ?></td>
                        <td><?php echo $item['Event']['dateStart'] ?></td>
                        <td><?php echo $item['Event']['dateEnd'] ?></td>
                        
                        <td align="center">
                            <a href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-event-addEventAdmin.php?id='.$item['Event']['id']; ?>">Sửa</a>
                        </td>
                        <td align="center">
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa chương trình này không?');" href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-event-deleteEventAdmin.php?id='.$item['Event']['id']; ?>">Xóa</a>
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

            $search = '';

            if(!empty($_GET['name'])){
                 $search .= '&name='.$_GET['name'].'';
            }

            if(!empty($_GET['month'])){
                $search .= '&month='.$_GET['month'].'';
                
            }
            $urlListHotelAdmin = $urlPlugins . 'admin/hoankiem360-admin-event-listEventAdmin.php';
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

            echo '<a href="' . $urlListHotelAdmin . '?page=' . $back.@$search.'">Trang trước</a> ';
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo ' <a href="' . $urlListHotelAdmin . '?page=' . $i.@$search.'">' . $i . '</a> ';
            }
            echo ' <a href="' . $urlListHotelAdmin . '?page=' . $next.@$search.'">Trang sau</a> ';

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
