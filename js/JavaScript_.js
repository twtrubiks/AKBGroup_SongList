// JavaScript Document

 function getCookie(c_name){
	
	if (document.cookie.length>0){ 
		c_start=document.cookie.indexOf(c_name + "=")
		if (c_start!=-1)
		{ 
			c_start=c_start + c_name.length+1 
			c_end=document.cookie.indexOf(";",c_start)
			if (c_end==-1) c_end=document.cookie.length
			return unescape(document.cookie.substring(c_start,c_end))
		} 
 	}
		return ""
}
	
function setCookie(c_name,value,expiredays){
	
	var exdate=new Date()
	exdate.setDate(exdate.getDate()+expiredays)
	document.cookie=c_name+ "=" +escape(value)+
	((expiredays==null) ? "" : "; expires="+exdate.toGMTString())
}
    
	
var str;

function talk(data) {
	val = new Array();
	today = new Date();			// 產生日期物件
	hour = today.getHours();		// 取得時數
	minute = today.getMinutes();		// 取得分數
	var src = data;	
	var default_user="PTT_AKB48"
	var default_prompt_title="請輸入暱稱(ID)"

	var temp=today.toString().split("(");
	var area=temp[1].split(")") ;
	
	username=getCookie('username')
	if (username!=null && username!=""){  //有Cookie
		uid=prompt(default_prompt_title,username)	
	}
	else{  //沒有Cookie
		uid=prompt(default_prompt_title,default_user)			
	}
	
	if(uid){
			setCookie('username',uid,365)
	}
	
	val[0] = area[0];
	val[1] = hour;
	val[2] = minute;
	val[3] = uid;
	val[4] = str;
	val[5] = src;
	val[6]= ""	;
		
	if(uid){		
		var default_talk="阿阿阿~哦哦哦~(我是範例)"
		var default_title="如沒其他想說的，請選取消"
		user_talk=getCookie('user_talk')
		if (user_talk!=null && user_talk!=""){
			uid_talk=prompt(default_title,user_talk)					
		}
		else{
			uid_talk=prompt(default_title,default_talk)		
		}
		
		if(uid_talk){
			setCookie('user_talk',uid_talk,365)
		}
		val[6] = uid_talk;
		//location.href="confirm.php"+"?val="+val;	
		
		post_request();
		check_request_song();
	}				
}

function post_request(){
   		 //post the field with ajax
    		$.ajax({
		        url: 'confirm.php',
        		type: 'POST',
		        dataType: 'text',
    		    data: {data : val},
        		success: function(response){ 
       		  //do anything with the response
		      //  console.log(response);
		        }       
		    }); 	
}


function check_request_song(){
	var is_request = confirm("你已經成功點了\n\n『"+str+"』\n\n，如還需要點歌請按確定，否則請按取消進入播放清單");
	if (!is_request) {
    	location.href="list.php";	
	} 	
}


function back_home() {  
 location.href="index_new.html";

}



$(function(){
    $("#gotop").click(function(){
        jQuery("html,body").animate({
            scrollTop:0
        },1000);
    });
    $(window).scroll(function() {
        if ( $(this).scrollTop() > 50){
            $('#gotop').fadeIn("fast");
        } else {
            $('#gotop').stop().fadeOut("fast");
        }
    });
});



/*
$(document).ready(function(){
$(".flip").click(function(){
    $(".panel").slideToggle("slow");
  });
});*/

//測試
$(document).ready(function(){
	$("table tr:first-child").click(function(){
   	 $(this).nextAll().fadeToggle("slow");
	});
});	


$stat = 1;		
$(document).ready(function(){
	$('#switch').click(function() {
    	/*$('tr:not(:first-child)').toggleClass("hide_content");*/
		if($stat == 1){
			$('table tr:not(:first-child)').fadeIn("slow");
			$(this).val('全部收合');
			$stat = 0;
		}
		else{
			$('table tr:not(:first-child)').fadeOut("slow");
			$(this).val('全部展開');
			$stat = 1;
		}
	});
});

$(function() {
    // run the currently selected effect
    function runEffect() {
      // get effect type from   
	  
	  //var selectedEffect="blind";
  	  var selectedEffect="clip";
      //var selectedEffect="fold";
	  //var selectedEffect="puff";
      //var selectedEffect="slide";
	   
      // most effect types need no options passed by default
      var options = {};
      // some effects have required parameters
      if ( selectedEffect === "scale" ) {
        options = { percent: 100 };
      } else if ( selectedEffect === "size" ) {
        options = { to: { width: 280, height: 185 } };
      }
 
      // run the effect
      $( "#effect" ).show( selectedEffect, options, 1000 );
    };
  
	$(document).ready(function(){
	runEffect();
	});
 
    $( "#effect" ).hide();
 });
 
 
  
  
  