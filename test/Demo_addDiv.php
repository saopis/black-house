<html>
<head>
<meta charset="utf-8">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

	<h1>jQuery add / remove textbox example</h1>
	<form action="show" method="POST">
		<div id='TextBoxesGroup'>
			<div class='TextBoxDiv'>
				<label>Textbox # <span id='No' class="No">1</span> : </label>
				<input type='text' class="text1" name='text1[]'>
				<input type='text' class="text2" name='text2[]'>
				<input type='button' class='btnDel'name='btn' value='ลบ' >
			</div>
		</div>
		<br>
		<input type="button" class="btnAdd" id="addrow" value="เพิ่ม">
		<input type='button' value='Get TextBox Value' id='getButtonValue'>
		<input type='submit' value='ตกลง' id='addButton'>
	</form>
	<div id="show">
		
	</div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	var addDiv=$("#TextBoxesGroup").html();
	onDinamic();
	$(document).on("click",".btnAdd",function(){
		$("#TextBoxesGroup").append(addDiv);
		onDinamic();
    });
	$(document).on("click",".btnDel",function(){
		var numRow=$(".TextBoxDiv").length;
		if(numRow>1){$(this).closest(".TextBoxDiv").remove();} 
		onDinamic();
    });
	function onDinamic(){
		$( ".No" ).each(function( index ) {
			$(this).html((index+1));
		});
	}	

	
	$(document).on('click', '#getButtonValue', function(event) {
		event.preventDefault();
		var data=$("form").serializeArray();
		var text1=[];
		var text2=[];
		var showinput="";
		$.each(data, function(i, field){
			if (i%2==0) {
				text1.push(field.value) ;
			}else {
				text2.push(field.value) ;
			}
            
        });
		for (var i = 0; i < text1.length; i++) {
			showinput += 'Textbox #'+(i+1)+" : "+text1[i]+" & "+text2[i]+"\n";
		}
		alert(showinput);
	});
});
</script>