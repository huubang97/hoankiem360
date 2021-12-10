<link href="<?php echo $urlHomes . 'app/Plugin/mantanHotel/style.css'; ?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo $urlHomes.'app/Plugin/mantanHotel/script.js';?>"></script>
<?php
$breadcrumb = array('name' => 'Giải trí',
    'url' => $urlPlugins . 'admin/hoankiem360-admin-entertainment-listEntertainmentAdmin.php',
    'sub' => array('name' => 'Thông tin giải trí')
);
addBreadcrumbAdmin($breadcrumb);
?>  

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://quanlyluutru.com/app/Plugin/mantanHotel/view/manager/js/bootstrap-datepicker.js"></script> 

<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

<script>
  $( function() {
    $( ".datepicker" ).datepicker({
      defaultDate:new Date(),
      closeOnDateSelect:true
    });



    $('.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 1,
        defaultTime: 'now',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });


  } );
</script>

<div class="taovien row">
    <?php if (!empty($mess)) { 
        echo $mess;  
    } ?>
    <form action="" method="post" name="">
        <div class="taovien col-md-12 col-sm-12 col-xs-12" >
            <div class="form-group col-sm-6">
                <i>Tiêu đề<span class="required">*</span>:</i>
                <input type="text" maxlength="100" name="name" id="name" value="<?php echo @$save['Entertainment']['name'] ?>" class="form-control" required="">
            </div>
             <div class="form-group col-sm-6">
                <i>Địa chỉ<span class="required">*</span>:</i>
                <input type="text" maxlength="100" name="address" id="address" value="<?php echo @$save['Entertainment']['address'] ?>" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
                <i>Điện thoại<span class="required">*</span>:</i>
                <input type="text" name="phone" class="form-control" id="phone" required="" value="<?php echo @$save['Entertainment']['phone'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Email:</i>
                <input type="text" name="email" class="form-control" id="email"  value="<?php echo @$save['Entertainment']['email'] ?>">
            </div>
            <div class="form-group col-sm-6">
               <i>Ảnh đại diện</i>
                <br>
                <?php
                if (!empty($save['Entertainment']['image'])) {
                    $image = $save['Entertainment']['image'];
                } else {
                    $image = '';
                }

                showUploadFile('image', 'image', $image);
                ?>
            </div>
             <div class="form-group col-sm-6">
                <i>Seo:</i>
                <input type="text" name="seo" class="form-control" id="seo" required="" value="<?php echo @$save['Entertainment']['seo'] ?>">
            </div>
             <div class="form-group col-sm-6">
                <i>Từ khóa metadata <span class="required">*</span>:</i>
                <input type="text" name="keyMetadata" class="form-control" id="keyMetadata" required="" value="<?php echo @$save['Entertainment']['keyMetadata'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i> Mô tả thẻ metadata<span class="required">*</span>:</i>
                <input type="text" name="notmetadata" class="form-control" id="notmetadata" required="" value="<?php echo @$save['Entertainment']['notmetadata'] ?>">
            </div>
             <div class="form-group col-sm-6">
                <i>Vĩ độ:</i>
                <input type="text" name="latitude" class="form-control" id="latitude" value="<?php echo @$save['Entertainment']['latitude'] ?>">
            </div>
             <div class="form-group col-sm-6">
                <i>Kinh độ:</i>
                <input type="text" name="longitude" class="form-control" id="longitude" value="<?php echo @$save['Entertainment']['longitude'] ?>">
            </div>
             <div class="form-group col-sm-6">
                <i>Ảnh 360:</i>
                <input type="text" name="image360" class="form-control" id="image360"  value="<?php echo @$save['Entertainment']['image360'] ?>">
                <br>    
                <i>Thứ tự:</i>
                <input type="text" name="cassavaorder" class="form-control" id="cassavaorder" value="<?php echo @$save['Entertainment']['cassavaorder'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Tổng quan:</i>
               <textarea name="introductory" id="introductory" onkeyup="" class="form-control" rows="5"><?php echo @$save['Entertainment']['introductory'] ?></textarea>
            </div>
            <div class="form-group col-sm-12">
                <i>Nội dung bài viết</i>
               <?php
                        showEditorInput('content','content',@$save['Entertainment']['content'],1);
                    ?>                                          
            </div>  
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12" style="text-align: center; margin-bottom: 15px;"><button type="submit" class="btn btn-primary">Thêm</button></div>
    </form>
</div>


<script>
  $( function() {
    $( ".hasDatepicker" ).datepicker({
      dateFormat: "dd-mm-yy"
    });
  } );
</script>