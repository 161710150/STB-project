<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<input type="text" id="test" placeholder="masukan jumlah bintang"><button type="submit" id="simpan">Simpan</button><br><br>
	Hasil : <br><b id="hasil"></b><br><br>

	<script src="{{asset ('/baru/jquery.js')}}"></script>
	<script src="{{asset ('/baru/style.css')}}"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			$('#simpan').click(function(){
				var ulang = parseInt($('#test').val());
				for(var r=ulang; r>=1; r--){
					for(var j=ulang; j>=r; j--){
						$('#hasil').append("&nbsp; ");
					}
					for(var k=1; k<=r ; k++){
						$('#hasil').append(" *&nbsp; ");
					}
					$('#hasil').append("</br>");
				}
				//rapat kiri
				for(var r=1; r<=ulang; r++){
					for(var j=ulang; j>=r; j--){
						$('#hasil').append("");
					}
					for(var k=1; k<=r ; k++){
						$('#hasil').append(" *");
					}
					$('#hasil').append("</br>");
				}
				//rapat kanan
				for(var r=1; r<=ulang; r++){
					for(var j=ulang; j<=r; j++){
						$('#hasil').append("");
					}
					for(var k=1; k<=r ; k++){
						$('#hasil').append(" *");
					}
					$('#hasil').append("</br>");
				}
			});
		});
	</script>

</body>
</html>