$(document).ready(function(){
	
	$(".shot").each(function(){
		$(".shot").niceScroll({touchbehavior:true});
	});
	
	target = (location.search) ? location.search.replace("\?", "") : 1;
	target = (parseInt(target) - 1);
	
	// 指定した（あるいは最初の）画像を見せておく
	$("#iphone > .shot").eq(target).css("display", "block");
	$("#xperia > .shot").eq(target).css("display", "block");
	$("#nexus > .shot").eq(target).css("display", "block");
	$("select#page").val(target);
	
	// ページ選択時の変化効果
	$("select#page").change(function(){
		$(".shot").each(function(){
			$(this).hide();
		});
		$("#iphone > .shot").eq($("select#page option:selected").attr("value")).show();
		$("#xperia > .shot").eq($("select#page option:selected").attr("value")).show();
		$("#nexus > .shot").eq($("select#page option:selected").attr("value")).show();
	});
	
});