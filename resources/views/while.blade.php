<!DOCTYPE html>
<html>
<head>
	<title>looping</title>
</head>
<body>
	While   	   : <b id="While"></b><br>
	Do While	   : <b id="dowhile"></b><br>
	For 		   : <b id="for"></b><br>
	<input type="text" id="test"><button type="submit" id="simpan">Simpan</button><br>
	Hasil 		   : <b id="hasil"></b><br>
	<script src="{{asset ('/baru/jquery.js')}}"></script>
	<script src="{{asset ('/baru/style.css')}}"></script>
	
	<script type="text/javascript">
		
		$(document).ready(function(){

			$('#simpan').click(function(){
				var ulang = parseInt($('#test').val());
				var i = 1;
				while(i <= ulang){
					$('#hasil').append(i);
					i++;
				}
			});

			//while dicek kemudian di proses
			var i=1;
			while(i<=10){
				$('#While').append(i);
				i++;
			}
			//do while diproses kemudian dicek
			var i=1;
			do{
				$('#dowhile').append(i);
				i++;
			}while(i <= 10);

			for(r=1; r<=10; r++)
				$('#for').append(r);

		});
	</script>

</body>
</html>