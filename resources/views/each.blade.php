<!DOCTYPE html>
<html>
<head>
	<title>Each jQuery</title>
	<link rel="stylesheet" type="text/css" href="{{asset ('baru/dar.min.css')}}">
</head>
<body>

	<div class="container">
		<div class="panel-group">
			<div class="panel panel-header">
				<h1>Jumlah Otomatis</h1>
			</div>
			<br>
			<div class="panel panel-body">
				<label>Angka Pertama</label>
				<input type="text" class="form-control input-sm text-right jumlah" placeholder="masukan angka">
			</div>
			<div class="panel panel-body">
				<label>Angka Kedua</label>
				<input type="text" class="form-control input-sm text-right jumlah" placeholder="masukan angka">
			</div>
			<div class="panel panel-body">
				<label>Total Jumlah</label>
				<input type="text" class="form-control input-sm text-right" id="total" placeholder="Total Keseluruhan" readonly>
			</div>
			<center><label><h3> Each Array </h3></label>
			<br>
			<button type="submit" class="btn btn-success" id="btneach"> Click Me!</button></center>
		</div>
	</div>
	<script src="{{asset ('baru/code.jquery.js')}}"></script>
	<script src="{{asset ('baru/jquery.mask.min.js')}}"></script>
	<script type="text/javascript">
		$(function(){
			//mask
			$('.jumlah').mask('#,###.##',{reverse : true });
			var ttl = function(){
				var sum = 0;
				$('.jumlah').each(function(){
					var num = $(this).val().replace(',','');

					if (num != 0) {
						sum += parseFloat(num);
					}
				});
				$('#total').val(sum.toFixed(2));
			}
			//keyup
			$('.jumlah').keyup(function(){
				ttl();
			});
		});

		$(document).ready(function(){
			$('#btneach').click(function(){
				var arr = [
				{"id":"1","awal":"Robi","akhir":"Febrianto"},
				{"id":"2","awal":"Bomber","akhir":"Sejati"},
				{"id":"3","awal":"VIKING","akhir":"PERSIB"},
				];

				$.each(arr, function(index, objectarray){
					console.log("ID : " + objectarray.id);
					console.log("Nama Depan : " + objectarray.awal);
					console.log("Nama Belakang : " + objectarray.akhir);
					console.log(" ");
				});
			});
		});
	</script>


</body>
</html>