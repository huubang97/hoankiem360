<?php 
function settings($input)
	{
		global $modelOption;
		global $urlPlugins;
		global $isRequestPost;
		global $urlHomes;
		global $languageMantan;
		global $modelAlbum;

		if(checkAdminLogin()){
			$data= $modelOption->getOption('ThemeSettings');
			$mess= '';
			$listAlbum = $modelAlbum->getNewAlbum(null,array());

			if($isRequestPost){
				$dataSend = arrayMap($input['request']->data);	
				

				$data['Option']['value']['logo']= @$dataSend['logo'];
				$data['Option']['value']['linkimage360']= @$dataSend['linkimage360'];
				$data['Option']['value']['title1']= @$dataSend['title1'];
				$data['Option']['value']['Content1']= @$dataSend['Content1'];
				$data['Option']['value']['title2']= @$dataSend['title2'];
				$data['Option']['value']['Content2']= @$dataSend['Content2'];
				$data['Option']['value']['title3']= @$dataSend['title3'];
				$data['Option']['value']['Content3']= @$dataSend['Content3'];
				$data['Option']['value']['title4']= @$dataSend['title4'];
				$data['Option']['value']['Content4']= @$dataSend['Content4'];
				$data['Option']['value']['title5']= @$dataSend['title5'];
				$data['Option']['value']['Content5']= @$dataSend['Content5'];
				$data['Option']['value']['title6']= @$dataSend['title6'];
				$data['Option']['value']['Content6']= @$dataSend['Content6'];
				$data['Option']['value']['title7']= @$dataSend['title7'];
				$data['Option']['value']['Content7']= @$dataSend['Content7'];
				$data['Option']['value']['logochantrang']= @$dataSend['logochantrang'];
				$data['Option']['value']['appAndroid']= @$dataSend['appAndroid'];
				$data['Option']['value']['appIos']= @$dataSend['appIos'];
				$data['Option']['value']['agencyName']= @$dataSend['agencyName'];
				$data['Option']['value']['address']= @$dataSend['address'];
				$data['Option']['value']['phone1']= @$dataSend['phone1'];
				$data['Option']['value']['phone2']= @$dataSend['phone2'];
				$data['Option']['value']['email1']= @$dataSend['email1'];
				$data['Option']['value']['responsibility']= @$dataSend['responsibility'];
				$data['Option']['value']['phone3']= @$dataSend['phone3'];
				$data['Option']['value']['phone4']= @$dataSend['phone4'];
				$data['Option']['value']['email2']= @$dataSend['email2'];
				$data['Option']['value']['facebook']= @$dataSend['facebook'];
				$data['Option']['value']['youtube']= @$dataSend['youtube'];
				$data['Option']['value']['instagram']= @$dataSend['instagram'];
				$data['Option']['value']['pinterest']= @$dataSend['pinterest'];
				$data['Option']['value']['idCateNotice']= @$dataSend['idCateNotice'];
				$data['Option']['value']['idCateNotice1']= @$dataSend['idCateNotice1'];
				
				$modelOption->saveOption('ThemeSettings', $data['Option']['value']);
				$mess= 'l??u th??nh c??ng';
			}

			setVariable('mess',$mess);
			setVariable('data',$data);
			
		}else{
			$modelOption->redirect($urlHomes);
		}
	}

function indexTheme(){
	global $urlNow;
	global $modelNotice;
	global $modelOption;

	$modelEvent = new Event();

	$conditions = array();

	$month = getdate()['mon'];
	$year = getdate()['year'];
	
	$listDataEvent= $modelEvent->find('all',array('conditions'=>array('month'=>(string)$month,'year'=>(string)$year)));


    $_SESSION['urlCallBack']= $urlNow;
    $newNoticeNetDep = $modelNotice->getOtherNotice(array(9),8);
    $noticeKM1 = $modelNotice->getOtherNotice(array(3),5);
    $noticeKM2 = $modelNotice->getOtherNotice(array(4),5);
    $noticeKM3 = $modelNotice->getOtherNotice(array(5),5);
    $noticeKM4 = $modelNotice->getOtherNotice(array(6),5);
    $noticeKM5 = $modelNotice->getOtherNotice(array(7),5);
    $noticeKM6 = $modelNotice->getOtherNotice(array(8),5);

    $listCategory = $modelOption->getOption('categoryNotice');
    $listCategoryBlog= $modelOption->getcat($listCategory['Option']['value']['category'],14,'id');
    $listCategoryNoticeKM= $modelOption->getcat($listCategory['Option']['value']['category'],2,'id');

    setVariable('newNoticeNetDep',$newNoticeNetDep);
    setVariable('listCategoryBlog',$listCategoryBlog);
    setVariable('listCategoryNoticeKM',$listCategoryNoticeKM);
    setVariable('listDataEvent',$listDataEvent);

    setVariable('noticeKM1',$noticeKM1);
    setVariable('noticeKM2',$noticeKM2);
    setVariable('noticeKM3',$noticeKM3);
    setVariable('noticeKM4',$noticeKM4);
    setVariable('noticeKM5',$noticeKM5);
    setVariable('noticeKM6',$noticeKM6);
    
}
?>