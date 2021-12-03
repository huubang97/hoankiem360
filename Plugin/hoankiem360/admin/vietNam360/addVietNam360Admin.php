<link href="<?php echo $urlHomes . 'app/Plugin/mantanHotel/style.css'; ?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo $urlHomes.'app/Plugin/mantanHotel/script.js';?>"></script>
<?php
$breadcrumb = array('name' => 'Việt Nam 360',
    'url' => $urlPlugins . 'admin/hoankiem360-admin-vietNam360-listVietNam360Admin.php',
    'sub' => array('name' => 'Thông tin')
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
                <i>Tên loại hình dich vụ <span class="required">*</span>:</i>
                <input type="text" maxlength="100" name="name" id="name" value="<?php echo @$save['ServiceType']['name'] ?>" class="form-control" required="">
            </div>
             <div class="form-group col-sm-6">
               <i>Ảnh</i>
                <br>
                <?php
                if (!empty($save['ServiceType']['image'])) {
                    $image = $save['ServiceType']['image'];
                } else {
                    $image = '';
                }

                showUploadFile('image', 'image', $image);
                ?>
            </div>
             <div class="form-group col-sm-12">
                <i>Mô tả  <span class="required">*</span>:</i>
               <textarea name="not" id="not" onkeyup="" class="form-control" rows="5"><?php echo @$save['ServiceType']['not'] ?></textarea>
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
