<link href="<?php echo $urlHomes . 'app/Plugin/mantanHotel/style.css'; ?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo $urlHomes.'app/Plugin/mantanHotel/script.js';?>"></script>
<?php
$breadcrumb = array('name' => 'Khách sạn',
    'url' => $urlPlugins . 'admin/hoankiem360-admin-hotel-listHotelAdmin.php',
    'sub' => array('name' => 'Thông tin khách sạn')
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
    /*$( ".datepicker" ).datepicker({
      defaultDate:new Date(),
      closeOnDateSelect:true
    });
*/


    $('.timepicker').timepicker({
        timeFormat: 'HH:mm',
        interval: 1,
       // defaultTime: 'now',
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
                <input type="text" maxlength="100" name="name" id="name" value="<?php echo @$save['Hotel']['name'] ?>" class="form-control" required="">
            </div>
             <div class="form-group col-sm-6">
                <i>Địa chỉ:</i>
                <input type="text" maxlength="100" name="address" id="address" value="<?php echo @$save['Hotel']['address'] ?>" class="form-control">
            </div>
            <div class="form-group col-sm-6">
                <i>Điện thoại<span class="required">*</span>:</i>
                <input type="text" name="phone" class="form-control" id="phone" required="" value="<?php echo @$save['Hotel']['phone'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Email:</i>
                <input type="text" name="email" class="form-control" id="email" value="<?php echo @$save['Hotel']['email'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Thời gian làm việc bắt đầu:</i>
                <input type="text" name="timeStart" id="timeStart" value="<?php echo @$save['Hotel']['timeStart'] ?>"  class="form-control timepicker" />                                   
            </div>
            <div class="form-group col-sm-6">
                <i>Thời gian làm việc kết thúc:</i>
                <input type="text" name="timeEnd" id="timeEnd" value="<?php echo @$save['Hotel']['timeEnd'] ?>"  class="form-control timepicker" />                                          
            </div> 
            <div class="form-group col-sm-6">
               <i>Ảnh đại diện</i>
                <br>
                <?php
                if (!empty($save['Hotel']['image'])) {
                    $image = $save['Hotel']['image'];
                } else {
                    $image = '';
                }

                showUploadFile('image', 'image', $image);
                ?>
            </div>
             <div class="form-group col-sm-6">
                <i>Seo:</i>
                <input type="text" name="seo" class="form-control" id="seo" required="" value="<?php echo @$save['Hotel']['seo'] ?>">
            </div>
             <div class="form-group col-sm-6">
                <i>Từ khóa metadata:</i>
                <input type="text" name="keyMetadata" class="form-control" id="keyMetadata" value="<?php echo @$save['Hotel']['keyMetadata'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Mô tả thẻ metadata:</i>
                <input type="text" name="notmetadata" class="form-control" id="notmetadata" value="<?php echo @$save['Hotel']['notmetadata'] ?>">
            </div>
             <div class="form-group col-sm-6">
                <i>Vĩ độ:</i>
                <input type="text" name="latitude" class="form-control" id="latitude" value="<?php echo @$save['Hotel']['latitude'] ?>">
            </div>
             <div class="form-group col-sm-6">
                <i>Kinh độ:</i>
                <input type="text" name="longitude" class="form-control" id="longitude" value="<?php echo @$save['Hotel']['longitude'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Ảnh 360:</i>
                <textarea type="text" name="image360" class="form-control" id="image360"><?php echo @$save['Hotel']['image360'] ?></textarea>
            </div>
            <div class="form-group col-sm-6">
                <i>Thứ tự:</i>
                <input type="text" name="cassavaorder" class="form-control" id="cassavaorder" value="<?php echo @$save['Hotel']['cassavaorder'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Giá nghỉ giờ:</i>
                <input type="text" name="gia_gio" class="form-control" id="gia_gio"  value="<?php echo @$save['Hotel']['gia_gio'] ?>">
            </div>
             <div class="form-group col-sm-6">
               <i>Mã trên Manmo:</i>
                <input type="text" name="codeManmo" class="form-control" id="codeManmo" value="<?php echo @$save['Hotel']['codeManmo'] ?>">
            </div>
             <div class="form-group col-sm-6">
                <i>Giá nghỉ đêm:</i>
                <input type="text" name="gia_dem" class="form-control" id="gia_dem"  value="<?php echo @$save['Hotel']['gia_dem'] ?>">  
                <br> 
                <i>Giá nghỉ ngày:</i>
                <input type="text" name="gia_ngay" class="form-control" id="gia_ngay"  value="<?php echo @$save['Hotel']['gia_ngay'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Tổng quan:</i>
               <textarea name="introductory" id="introductory" onkeyup="" class="form-control" rows="5"><?php echo @$save['Hotel']['introductory'] ?></textarea>
            </div>
            
            <div class="form-group col-sm-12">
                <i>Nội dung bài viết</i>
               <?php
                        showEditorInput('content','content',@$save['Hotel']['content'],1);
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
