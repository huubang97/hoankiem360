<link href="<?php echo $urlHomes . 'app/Plugin/mantanHotel/style.css'; ?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo $urlHomes.'app/Plugin/mantanHotel/script.js';?>"></script>
<?php
$breadcrumb = array('name' => 'Sự Kiện',
    'url' => $urlPlugins . 'admin/hoankiem360-admin-event-listEventAdmin.php',
    'sub' => array('name' => 'Thông tin Sự Kiện')
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
                <i>Tên sự kiện<span class="required">*</span>:</i>
                <input type="text" maxlength="100" name="title" id="title" value="<?php echo @$save['Event']['title'] ?>" class="form-control" required="">
            </div>
             <div class="form-group col-sm-6">
                <i>Địa chỉ>:</i>
                <input type="text" maxlength="100" name="address" id="address" value="<?php echo @$save['Event']['address'] ?>" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
                <i>Ngày bắt đầu:</i>
                <input type="text" name="dateStart" class="form-control hasDatepicker" id="dateStart" value="<?php echo @$save['Event']['dateStart'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Ngày kết thúc:</i>
                <input type="text" name="dateEnd" class="form-control hasDatepicker" id="dateEnd" value="<?php echo @$save['Event']['dateEnd'] ?>">
            </div>
            <div class="form-group col-sm-6">
               <i>Ảnh đại diện</i>
                <br>
                <?php
                if (!empty($save['Event']['image'])) {
                    $image = $save['Event']['image'];
                } else {
                    $image = '';
                }

                showUploadFile('image', 'image', $image);
                ?>
            </div>
             <div class="form-group col-sm-6">

                <i>Tháng diễn ra<span class="required">*</span>:</i>
                <select name="month" class="form-control" id="month">
                    <option value="" save-price="">Chọn tháng diễn ra </option>
                    <?php
                    $getmonth   = getmonth();
                    if(!empty($getmonth)){
                        foreach($getmonth as $month){
                            if(!isset($save['Event']['month']) || $month['id']!=$save['Event']['month']){
                                echo '<option value="'.$month['id'].'">'.$month['name'].'</option>';
                            }else{
                                echo '<option selected value="'.$month['id'].'">'.$month['name'].'</option>';
                            }
                        }
                    }
                    ?>
                </select>                                          
            </div>
            <div class="form-group col-md-6">
                <i>Trạng thái diễn ra <span class="required">*</span></i>
                <div class="col-sm-12">
                    <input name="takesplace" type="radio" value="not" <?php if(!empty($save['Event']['takesplace']) && $save['Event']['takesplace']=='not') echo 'checked';?> > Chưa diễn ra &nbsp;&nbsp;
                    <input name="takesplace" type="radio" value="Happenning" <?php if(!empty($save['Event']['takesplace']) && $save['Event']['takesplace']=='Happenning') echo 'checked';?> > Đang diễn ra &nbsp;&nbsp;
                    <input name="takesplace" type="radio" value="done" <?php if(!empty($save['Event']['takesplace']) && $save['Event']['takesplace']=='done') echo 'checked';?> > Đã diễn ra
                </div>
            </div>
             <div class="form-group col-sm-6">
                <i>Giới thiệu:</i>
               <textarea name="introductory" id="introductory" onkeyup="" class="form-control" rows="5"><?php echo @$save['Event']['introductory'] ?></textarea>
            </div>
           


            <div class="form-group col-sm-12">
                <i>Bài viết</i>
               <?php
                        showEditorInput('content','content',@$save['Event']['content'],1);
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
