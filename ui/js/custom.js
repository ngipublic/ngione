/**
 * 在这里自定义你的JS代码
 */

jQuery(function($) {
  // 你可以在这里继续使用$作为别名...
var tophtml="<div id=\"izl_rmenu\" class=\"izl-rmenu\"><div class=\"btn btn-top\"></div></div>";
	$("#top").html(tophtml);
	$("#izl_rmenu").each(function(){
		$(this).find(".btn-wx").mouseenter(function(){
			$(this).find(".pic").fadeIn("fast");
		});
		$(this).find(".btn-wx").mouseleave(function(){
			$(this).find(".pic").fadeOut("fast");
		});
		$(this).find(".btn-phone").mouseenter(function(){
			$(this).find(".phone").fadeIn("fast");
		});
		$(this).find(".btn-phone").mouseleave(function(){
			$(this).find(".phone").fadeOut("fast");
		});
		$(this).find(".btn-top").click(function(){
			$("html, body").animate({
				"scroll-top":0
			},800);
		});
	});
	var lastRmenuStatus=false;
	$(window).scroll(function(){//bug
		var _top=$(window).scrollTop();
		if(_top>300){
			$("#izl_rmenu").data("expanded",true);
		}else{
			$("#izl_rmenu").data("expanded",false);
		}
		if($("#izl_rmenu").data("expanded")!=lastRmenuStatus){
			lastRmenuStatus=$("#izl_rmenu").data("expanded");
			if(lastRmenuStatus){
				$("#izl_rmenu .btn-top").slideDown();
			}else{
				$("#izl_rmenu .btn-top").slideUp();
			}
		}
	});
 
 function IsPC() {
    var userAgentInfo = navigator.userAgent;
    var Agents = ["Android", "iPhone",
                "SymbianOS", "Windows Phone",
                "iPad", "iPod"];
    var flag = true;
    for (var v = 0; v < Agents.length; v++) {
        if (userAgentInfo.indexOf(Agents[v]) > 0) {
            flag = false;
            break;
        }
    }
    return flag;
} 
/* 头部banner部分效果*/
var $label = $('.header-hot-label');
var $header = $('.header');
var $logo		= $('.logo');
var $overlay		= $('.overlay');
if(IsPC()){
    $(document).ready(function() { 
         $logo.animate({marginLeft:'160px'},'fast');
         $label.stop(true,true).fadeIn(4000);
});
}   
/*窗口变化时logo位置*/
$(window).resize(function(){
    	if ($label.is(":hidden")) {
var wd = $(window).width()/2 - $('.logo').width()/2;
        $logo.stop(true,true).animate({marginLeft:wd},1000);    	
     }
if ($label.is(":visible")){

        $logo.stop(true,true).animate({marginLeft:'160px'},1000);    	
     }
    });

$("img").lazyload();

/*顶部导航栏中的搜索框js效果*/
var ts = $(".toggle-search");
var se = $(".search-expand");
ts.click(function(){
	if( ts.hasClass("active") ){
         ts.removeClass("active");
	} else {
		ts.addClass("active");
	}

	if (ts.hasClass("active")) {
		se.css("display","block");
	} else {
		se.css("display","none");
	}
})
	
});

	