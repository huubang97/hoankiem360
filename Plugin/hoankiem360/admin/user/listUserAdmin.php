<link href="<?php echo $urlHomes . 'app/Plugin/mantanHotel/style.css'; ?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo $urlHomes . 'app/Plugin/mantanHotel/script.js'; ?>"></script>
<?php
$breadcrumb = array('name' => 'Quản lý tài khoản người dùng',
    'url' => $urlPlugins . 'admin/hoankiem360-admin-user-listUserAdmin.php',
    'sub' => array('name' => 'Tất cả người dùng')
);
addBreadcrumbAdmin($breadcrumb);
?> 

<div class="clear"></div>

<div id="content">
    <?php
    if (isset($_GET['status'])) {
        switch ($_GET['status']) {
            case 1: echo '<p class="color_green">Thêm tài khoản người dùng thành công!</p>';
                break;
            case -1: echo '<p class="color_red">Thêm tài khoản người dùng không thành công!</p>';
                break;
            case 3: echo '<p class="color_green">Sửa tài khoản người dùng thành công!</p>';
                break;
            case -3: echo '<p class="color_red">Sửa tài khoản người dùng không thành công!</p>';
                break;
            case 4: echo '<p class="color_green">Xóa tài khoản người dùng thành công!</p>';
                break;
        }
    }
    ?>
    <form action="" method="GET">
           <table class="table table-bordered" style="border: 1px solid #ddd!important; margin-top: 10px;">  
            <tr>
                <td>
                    <input type="" name="fullname" class="form-control" placeholder="Tên người dùng" value="<?php echo @$_GET['fullname'];?>">
                </td>
                <td>
                    <input type="" name="email" class="form-control" placeholder="Email" value="<?php echo @$_GET['email'];?>">
                </td>
                <td>
                    <input type="" name="phone" class="form-control" placeholder="SĐT" value="<?php echo @$_GET['phone'];?>">
                </td>
                <td>
                    <input type="" name="user" class="form-control" placeholder="Tài khoản" value="<?php echo @$_GET['user'];?>">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="" value="Tìm kiếm">
                </td>
                <td colspan="2">
                    <input type="submit" name="excel" value="Xuất excel">
                </td>
            </tr>
        </table>
    </form>
    <a style="padding: 4px 8px;" href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-user-addUserAdmin.php'; ?>" class="input">
        <img src="<?php echo $webRoot; ?>images/add.png"> Thêm
    </a>  
    <table class="table table-bordered" style="border: 1px solid #ddd!important; margin-top: 10px;">  
        <thead> 
            <tr> 
                <th>Ngày tạo</th> 
                <th>Tài khoản</th> 
                <th>Họ và tên</th> 
                <th>Loại TK</th> 
                <th>Email</th> 
                <th>Điện thoại</th> 
                <th style="text-align: center;">Chọn</th>  
            </tr> 
        </thead>
        <tbody> 
            <?php
            if (!empty($listData)) {
                foreach ($listData as $key => $tin) {
                    if(!empty($tin['User']['idGoogle'])){
                        $typeReg= 'Google';
                    }elseif(!empty($tin['User']['idFacebook'])){
                        $typeReg= 'Facebook';
                    }else{
                        $typeReg= 'Tự ĐK';
                    }
                    ?>

                    <tr> 
                        <td class=""><?php echo date('d/m/Y', $tin['User']['created']->sec);?></td> 
                        <td class="break_word"><?php echo $tin['User']['user']; ?></td> 
                        <td class="break_word"><?php echo @$tin['User']['fullname']; ?></td> 
                        <td class="break_word"><?php echo $typeReg; ?></td> 
                        <td class="break_word"><?php echo @$tin['User']['email']; ?></td> 
                        <td class="break_word"><?php echo @$tin['User']['phone']; ?></td> 
                        <td class="break_word" align="center">
                            <a style="padding: 4px 8px;" href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-user-editUserAdmin.php?id=' . $tin['User']['id']; ?>" class="input"  >Sửa</a>  
                            <a style="padding: 4px 8px;" href="<?php echo $urlPlugins . 'admin/hoankiem360-admin-user-deleteUserAdmin.php?id=' . $tin['User']['id'] ?>" class="input" onclick="return confirm('Bạn có chắc chắn muốn xóa không?');"  >Xóa</a>
                        </td> 

                    </tr> 


                    <?php
                }
            } else {
                ?>
                <tr>
                    <td align="center" colspan="8">Chưa có người dùng nào.</td>
                </tr>
            <?php }
            ?>
        </tbody> 
    </table>
    <p>
        <?php
        if(@$totalPage>0){
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
            
            echo '<a href="' . $urlPage . $back . '">Trang trước</a> ';
            for ($i = $startPage; $i <= $endPage; $i++) {
                echo ' <a href="' . $urlPage. $i . '">' . $i . '</a> ';
            }
            echo ' <a href="' . $urlPage. $next . '">Trang sau</a> ';
            
            // echo 'Tổng số trang: ' . $totalPage;
            echo 'Hiển thị trang thứ '.$page.'/'.$totalPage;
        }
        ?>
    </p>
</div>