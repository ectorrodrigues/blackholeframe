
<script type="text/javascript" charset="utf-8">
function selectImg(str) {
	var path = "http://localhost/app/webroot/img/biblioteca/";
	$("#main_photo").css("background-image", "url("+path+str+")");
}
</script>

<script type="text/javascript" charset="utf-8">
function lightbox() {
	var doc_height		= $( document ).height();
	var win_height		= $( window ).height();
	window.win_height2	= win_height-50;
	var margin_top		= doc_height/2;
	var scrolled 		= $(window).scrollTop();
	var scrolled2 		= scrolled+25;
	var main_photo		= $("#main_photo").css("background-image")
	var main_photo_res	= main_photo.replace("url(\"", "");
	var main_photo_res2	= main_photo_res.replace("\")", "");
	var tmpImg	= new Image();
	tmpImg.src	= main_photo_res2;
	$(tmpImg).on("load",function(){
		var orgWidth	= tmpImg.width;
		var orgHeight	= tmpImg.height;
		var finalWidth	= (orgWidth*win_height2)/orgHeight;
		$("body").prepend("<div class=\"black_overlay\" style=\"height:"+doc_height+"px;\"></div>");
		$("body").prepend("<div class=\"whitescreen\" align=\"center\" style=\"height:"+win_height+"px; margin-top:"+scrolled2+"px;\" onclick=\"fechar()\"><img src=\""+main_photo_res2+"\" height=\""+win_height2+"" width=\""+finalWidth+"\"></div></div>");
	});
	
}

function fechar() {
	$( ".black_overlay" ).remove();
	$( ".whitescreen" ).remove();
}
</script>

<link rel="stylesheet" type="text/css" href="<?=CSS_DIR?>galeria.css" /> 

<?php  $path = "http://localhost/app/webroot/img/biblioteca/"; ?>

	<div id="main_photo" onclick="lightbox()" style="background-image:url(<?php echo $path.$img; ?>);">
    </div>
    
    <div id="thumbstrip">
    <?php
		
		echo "
			<input type="button" id="thumb" 
			value=\"".$img."\"
			alt=\"<strong><font size=+2>".$titulo."</font></strong>\" name=\"firstthumb\" 
			onclick=\"selectImg(this.value)\" 
			onfocus=\"selectImg2(this.alt)\" 
			style=\"	background-image:url(".$path.$img."); 
					background-size:cover; 
					background-repeat:no-repeat; 
					margin-left:0\"
		/>";
	
		foreach($conn->query("SELECT * FROM biblioteca_galeria WHERE id_biblioteca ='".$id."'") as $row_gal) {
									
			$titulo_gal	= $row_gal["titulo"];
			$img_gal	= $row_gal["img"];			
		
			echo "
			<input type=\"button\" id=\"thumb\" 
			value=\"".$img_gal."\"
			alt=\"<strong><font size=+2>".$titulo_gal."</font></strong>\" name=\"firstthumb\" 
			onclick=\"selectImg(this.value)\" 
			onfocus=\"selectImg2(this.alt)\" 
			style=\"	background-image:url(".$path.$img_gal."); 
					background-size:cover; 
					background-repeat:no-repeat; 
					margin-left:0;\"
			/>";
		
		}
	?>
    </div>
