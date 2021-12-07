<link href="<?php echo $urlHomes . 'app/Plugin/mantanHotel/style.css'; ?>" rel="stylesheet">
<script type="text/javascript" src="<?php echo $urlHomes.'app/Plugin/mantanHotel/script.js';?>"></script>
<?php
$breadcrumb = array('name' => 'Địa điểm',
    'url' => $urlPlugins . 'admin/hoankiem360-admin-location-listLocationAdmin.php',
    'sub' => array('name' => 'Thông tin địa điểm')
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
                <i>Tên địa điểm<span class="required">*</span>:</i>
                <input type="text" maxlength="100" name="name" id="name" value="<?php echo @$save['Location']['name'] ?>" class="form-control" required="">
            </div>
             <div class="form-group col-sm-6">
                <i>Địa chỉ<span class="required">*</span>:</i>
                <input type="text" maxlength="100" name="address" id="address" value="<?php echo @$save['Location']['address'] ?>" class="form-control" required="">
            </div>
            <div class="form-group col-sm-6">
                <i>Điện thoại<span class="required">*</span>:</i>
                <input type="text" name="phone" class="form-control" id="phone" required="" value="<?php echo @$save['Location']['phone'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Email:</i>
                <input type="text" name="email" class="form-control" id="email" required="" value="<?php echo @$save['Location']['email'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Loại hình dịch vụ:<span class="required">*</span>:</i>
                <select name="serviceType" class="form-control" id="serviceType">
                    <option value="" save-price="">Chọn loại hình dịch vụ </option>
                    <?php
                    $getmonth   = getmonth();
                    if(!empty($dataServiceType)){
                        foreach($dataServiceType as $serviceType){
                            if(!isset($save['Location']['serviceType']) || $serviceType['ServiceType']['id']!=$save['Location']['serviceType']){
                                echo '<option value="'.$serviceType['ServiceType']['id'].'">'.$serviceType['ServiceType']['name'].'</option>';
                            }else{
                                echo '<option selected value="'.$serviceType['ServiceType']['id'].'">'.$serviceType['ServiceType']['name'].'</option>';
                            }
                        }
                    }
                    ?>
                </select>                                          
            </div>
            <div class="form-group col-sm-6">
                <i>Chuyên mục<span class="required">*</span>:</i>
                <select name="groupLocation" class="form-control" id="groupLocation">
                    <option value="" save-price="">Chọn chuyên mục</option>
                    <?php
                    if(!empty($dataGroupLocation)){
                        foreach($dataGroupLocation as $groupLocation){
                            if(!isset($save['Location']['groupLocation']) || $groupLocation['GroupLocation']['id']!=$save['Location']['groupLocation']){
                                echo '<option value="'.$groupLocation['GroupLocation']['id'].'">'.$groupLocation['GroupLocation']['name'].'</option>';
                            }else{
                                echo '<option selected value="'.$groupLocation['GroupLocation']['id'].'">'.$groupLocation['GroupLocation']['name'].'</option>';
                            }
                        }
                    }
                    ?>
                </select>                                          
            </div>
            <div class="form-group col-sm-6">
               <i>Ảnh</i>
                <br>
                <?php
                if (!empty($save['Location']['image'])) {
                    $image = $save['Location']['image'];
                } else {
                    $image = '';
                }

                showUploadFile('image', 'image', $image);
                ?>
            </div>
            <div class="form-group col-sm-6">
                <i>Tọa độ GPS <span class="required">*</span>:</i>
                <input type="text" name="location" class="form-control" id="location" required="" value="<?php echo @$save['Location']['location'] ?>">
            </div>
            <div class="form-group col-sm-6">
                <i>Gới thệu:</i>
               <textarea name="introductory" id="introductory" onkeyup="" class="form-control" rows="5"><?php echo @$save['Event']['introductory'] ?></textarea>
            </div>
            <div class="form-group col-sm-6">
                <i>ảnh 360:</i>
               <textarea name="introductory" id="introductory" onkeyup="" class="form-control" rows="5"><?php echo @$save['Event']['introductory'] ?></textarea>
            </div>
            <div class="form-group col-sm-6">
                <i>Kết nối id Manmo:</i>
                <input type="text" name="idHotel" class="form-control" id="idHotel"  value="<?php echo @$save['Location']['idHotel'] ?>">
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
