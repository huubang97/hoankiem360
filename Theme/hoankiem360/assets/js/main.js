$('#select').click(function(){
	$('.pop_select').css('display','block');
	$('.mask-select').css({'visibility':'visible','opacity':'1'})
})

$('#select_colse').click(function(){
	$('.pop_select').css('display','none');
  $('.mask-select').css({'visibility':'hidden','opacity':'0'})
})