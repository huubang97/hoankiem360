<style>
.tableList{
    width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
    border-spacing: 0;
    border-top: 1px solid #bcbcbc;
    border-left: 1px solid #bcbcbc;
}
.tableList td{
    padding: 5px;
    border-bottom: 1px solid #bcbcbc;
    border-right: 1px solid #bcbcbc;
}
</style>
<?php
 global $modelOption;
    $categoryNotice = $modelOption->getOption('categoryNotice');

    $breadcrumb= array( 'name'=>'Theme Settings',
                        'url'=>$urlPlugins.'theme/ktmaithanh-admin-settings.php',
                        'sub'=>array('name'=>'Settings')
                      );
    addBreadcrumbAdmin($breadcrumb);
?>  
<script type="text/javascript">
    
    function save()
    {
        document.listForm.submit();
    }
</script>
<div class="thanhcongcu">

    <div class="congcu" onclick="save();">
        <input type="hidden" id="idChange" value="" />
        <span id="save">
            <input type="image" src="<?php echo $webRoot;?>images/save.png" />
        </span>
        <br/>
        <?php echo $languageMantan['save'];?>
    </div>
</div>

<div class="clear" style="height: 10px;margin-left: 15px;margin-bottom: 15px;" id='status'>
    <?php
        echo @$mess;
    ?>
</div>
    
<div class="taovien">
    <form action="" method="post" name="listForm">
        <table class="tableList">
            <tr>
                <td colspan="2" align="center">header</td>
            </tr>
            <tr>
                <td>
                    <p><b>Ảnh logo </b></p>
                    <?php showUploadFile('logo','logo', @$data['Option']['value']['logo'],0); ?>
                </td>
                <td >
                    <p><b>Link ảnh 360 </b></p>
                    <input type="text" name="linkimage360" value="<?php echo @$data['Option']['value']['linkimage360'] ?>">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">Khối 1 </td>
            </tr>
            <tr>
                <td>
                    <p><b>Tiêu đề 1</b></p>
                    <input type="text" name="title1" value="<?php echo @$data['Option']['value']['title1'] ?>">
                </td>
                <td>
                    <p><b>Nội dung 1</b></p>
                    <input type="text" name="Content1" value="<?php echo @$data['Option']['value']['Content1'] ?>">
                </td>
            </tr>  
            <tr>
                <td colspan="2" align="center">Khối 2 </td>
            </tr>
            <tr>
                <td>
                    <p><b>Tiêu đề 2</b></p>
                    <input type="text" name="title2" value="<?php echo @$data['Option']['value']['title2'] ?>">
                </td>
                <td>
                    <p><b>Nội dung 2</b></p>
                    <input type="text" name="Content2" value="<?php echo @$data['Option']['value']['Content2'] ?>">
                </td>
            </tr> 
            <tr>
                <td colspan="2" align="center">Khối 3 </td>
            </tr>
            <tr>
                <td>
                    <p><b>Tiêu đề 3</b></p>
                    <input type="text" name="title3" value="<?php echo @$data['Option']['value']['title3'] ?>">
                </td>
                <td>
                    <p><b>Nội dung 3</b></p>
                    <input type="text" name="Content3" value="<?php echo @$data['Option']['value']['Content3'] ?>">
                </td>
            </tr> 
            <tr>
                <td colspan="2" align="center">Khối 4 </td>
            </tr>
            <tr>
                <td>
                    <p><b>Tiêu đề 4</b></p>
                    <input type="text" name="title4" value="<?php echo @$data['Option']['value']['title4'] ?>">
                </td>
                <td>
                    <p><b>Nội dung 4</b></p>
                    <input type="text" name="Content4" value="<?php echo @$data['Option']['value']['Content4'] ?>">
                </td>
            </tr>  
            <tr>
                <td colspan="2" align="center">Khối 5 </td>
            </tr>
            <tr>
                <td>
                    <p><b>Tiêu đề 5</b></p>
                    <input type="text" name="title5" value="<?php echo @$data['Option']['value']['title5'] ?>">
                </td>
                <td>
                    <p><b>Nội dung 5</b></p>
                    <input type="text" name="Content5" value="<?php echo @$data['Option']['value']['Content5'] ?>">
                </td>
            </tr>  
            <tr>
                <td colspan="2" align="center">Khối 6 </td>
            </tr>
            <tr>
                <td>
                    <p><b>Tiêu đề 6</b></p>
                    <input type="text" name="title6" value="<?php echo @$data['Option']['value']['title6'] ?>">
                </td>
                <td>
                    <p><b>Nội dung 6</b></p>
                    <input type="text" name="Content6" value="<?php echo @$data['Option']['value']['Content6'] ?>">
                </td>
            </tr>  
            <tr>
                <td colspan="2" align="center">Khối 7 </td>
            </tr>
            <tr>
                <td>
                    <p><b>Tiêu đề 7</b></p>
                    <input type="text" name="title7" value="<?php echo @$data['Option']['value']['title7'] ?>">
                </td>
                <td>
                    <p><b>Nội dung 7</b></p>
                    <input type="text" name="Content7" value="<?php echo @$data['Option']['value']['Content7'] ?>">
                </td>
            </tr>  
            <tr>
                <td colspan="2" align="center">chân trang </td>
            </tr>
             <tr>
                <td>
                    <p><b>Logo chân trang </b></p>
                    <?php showUploadFile('logochantrang','logochantrang', @$data['Option']['value']['logochantrang'],2); ?>
                </td>
                <td>
                    <p><b>Link tải app android </b></p>
                    <input type="text" name="appAndroid" value="<?php echo @$data['Option']['value']['appAndroid'] ?>">
                    <p><b>Link tải app ios </b></p>
                    <input type="text" name="appIos" value="<?php echo @$data['Option']['value']['appIos'] ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <p><b>Tên Cơ quan chủ quản </b></p>
                    <input type="text" name="agencyName" value="<?php echo @$data['Option']['value']['agencyName'] ?>">
                    <p><b>Địa chỉ </b></p>
                    <input type="text" name="address" value="<?php echo @$data['Option']['value']['address'] ?>">
                    <p><b>Điện thoại 1</b></p>
                    <input type="text" name="phone1" value="<?php echo @$data['Option']['value']['phone1'] ?>">
                    <p><b>Điện thoại 2</b></p>
                    <input type="text" name="phone2" value="<?php echo @$data['Option']['value']['phone2'] ?>">
                    <p><b>Email </b></p>
                    <input type="text" name="email1" value="<?php echo @$data['Option']['value']['email1'] ?>">
                </td>
                <td>
                    <p><b>Chịu trách nhiệm chính</b></p>
                    <input type="text" name="responsibility" value="<?php echo @$data['Option']['value']['responsibility'] ?>">
                     <p><b>Điện thoại 3</b></p>
                    <input type="text" name="phone3" value="<?php echo @$data['Option']['value']['phone3'] ?>">
                    <p><b>Điện thoại 4</b></p>
                    <input type="text" name="phone4" value="<?php echo @$data['Option']['value']['phone4'] ?>">
                    <p><b>Email </b></p>
                    <input type="text" name="email2" value="<?php echo @$data['Option']['value']['email2'] ?>">
                </td>
            </tr>    
            <tr>
                <td colspan="2" align="center">Mạng xã hội </td>
            </tr>
             <tr>
                <td>
                    <p><b>Facebook </b></p>
                    <input type="text" name="facebook" value="<?php echo @$data['Option']['value']['facebook'] ?>">
                     <p><b>Youtube</b></p>
                    <input type="text" name="youtube" value="<?php echo @$data['Option']['value']['youtube'] ?>">
                </td>
                <td>
                    <p><b>Instagram</b></p>
                    <input type="text" name="instagram" value="<?php echo @$data['Option']['value']['instagram'] ?>">
                     <p><b>Pinterest </b></p>
                    <input type="text" name="pinterest" value="<?php echo @$data['Option']['value']['pinterest'] ?>">
                    <p><b>Điện thoại 4</b></p>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">Khối doanh nghiệp </td>
            </tr>
             <tr>
                <td>
                    <p><b>Tin tức nổi bật </b></p>
                    <select class="form-control" name="idCateNotice">
                        <?php foreach ($categoryNotice['Option']['value']['category'] as $key => $value) { ?>
                            <option <?php echo $data['Option']['value']['idCateNotice']==$value['id']?'selected':''; ?> value="<?php echo @$value['id'] ?>"><?php echo @$value['name'] ?></option>
                        <?php
                        } ?>
                    </select>
                   
                </td>
                <td>
                    <p><b>Khuyến Mãi </b></p>
                    <select class="form-control" name="idCateNotice1">
                        <?php foreach ($categoryNotice['Option']['value']['category'] as $key => $value) { ?>
                            <option <?php echo $data['Option']['value']['idCateNotice1']==$value['id']?'selected':''; ?> value="<?php echo @$value['id'] ?>"><?php echo @$value['name'] ?></option>
                        <?php
                        } ?>
                    </select>
                   
                </td>
            </tr>
        </table>
        <div class="thanhcongcu">
            <div class="congcu" onclick="save();">
                <input type="hidden" id="idChange" value="" />
                <span id="save">
                    <input type="image" src="<?php echo $webRoot;?>images/save.png" />
                </span>
                <br/>
                <?php echo $languageMantan['save'];?>
            </div>
        </div>


    </form>
</div>
