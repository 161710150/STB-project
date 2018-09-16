@extends('layouts.app')
@section('content')
<div class="container">
   <div class="panel-header">Daftar Tiket</div>
   <table class="table table-hover">
      <thead>
         <th>No</th>
         <th>Jenis Tiket Tribun</th>
         <th>Harga</th>
      </thead>
      <tr>
         <td>1</td>
         <td>Tribun Timur</td>
         <td>Rp. 55.000</td>
      </tr>
      <tr>
         <td>2</td>
         <td>Tribun Utara</td>
         <td>Rp. 50.000</td>
      </tr>
      <tr>
         <td>3</td>
         <td>Tribun Selatan</td>
         <td>Rp. 65.000</td>
      </tr>
      <tr>
         <td>4</td>
         <td>Tribun Barat</td>
         <td>Rp. 75.000</td>
      </tr>
      <tr>
         <td>5</td>
         <td>Tribun VIP</td>
         <td>Rp. 120.000</td>
      </tr>
      <label>Dapatkan Diskon 20% Dengan Membeli Tiket Lebih Dari 3</label>
   </table>
   <form class="form-group" id="resetform">
      <div class="form-group">
         <label>Pilih Jenis Tiket</label>
         <select id="selek" class="form-control">
            <option>-</option>
            <option value="Tribun Timur">Tiket Tribun Timur</option>
            <option value="Tribun Utara">Tiket Tribun Utara</option>
            <option value="Tribun Selatan">Tiket Tribun Selatan</option>
            <option value="Tribun Barat">Tiket Tribun Barat</option>
            <option value="Tribun VIP">Tiket Tribun VIP</option>
         </select>
      </div>
      <div class="form-group">
         <label>Jumlah Tiket</label><br>
         <input type="number" id="jumti" class="form-control">
      </div>
      <div class="form-group">
      	<label>Kategori Anda</label><br>
      	<select class="form-control" id="pilih">
      	<option>-</option>
      	<option value="Member">Member</option>
      	<option value="Nonmember">Non Member</option>
      	</select>
      </div>
   </form>
   <button class="btn btn-primary" id="simpan" type="submit">Kirim</button>
   <button class="btn btn-primary" id="setel" type="reset">Reset</button>
   <br><br>
   <b>Detail Pembelian </b><br><br>
   <span style="margin-right: 58px"> Jenis Tiket </span>: <b id="jt"></b><br>
   <span style="margin-right: 45px"> Jumlah Tiket </span>: <b id="jumlh"></b><br>
   <span style="margin-right: 16px"> Harga Satu Tiket </span>: <b id="htiket"></b><br>
   <span style="margin-right: 80px"> Diskon </span>: <b id="disc"></b><br>
   <span style="margin-right: 32px"> Kategori Anda </span>: <b id="kat"></b><br>
   <span style="margin-right: 50px"> Total Harga </span>: <b id="ttlharga"></b><br>
   <script src="{{asset ('baru/jquery.js')}}"></script>
   <script>
      $(document).ready(function(){
      	$('#simpan').click(function(){
      		var jenist = $('#selek').val();
      		var jum = $('#jumti').val();
      		var mebr = $('#pilih').val();
      		console.log(mebr);
      
      		switch (true){
      			case jenist == 'Tribun Timur':
      			var harga = 55000;
      			break;
      			case jenist == 'Tribun Utara':
      			var harga = 50000;
      			break;
      			case jenist == 'Tribun Selatan':
      			var harga = 65000;
      			break;
      			case jenist == 'Tribun Barat':
      			var harga = 75000;
      			break;
      			case jenist == 'Tribun VIP':
      			var harga = 120000;
      			break;
      			case mebr == 'Member':
      			break;
      			case mebr == 'Nonmember':
      		}
      		if (mebr == 'Member' && jum > 3) {
      			var diskon = 20;
      			$('#disc').text('20%');
      			var pertama = (parseInt(jum)*parseInt(harga));
      			var disc = (parseInt(jum)*parseInt(harga)*diskon/100);
      			var hartot = (parseInt(pertama)-parseInt(disc));
      
      			$('#ttlharga').text(hartot);
      		}
      		else if (mebr == 'Member' && jum <= 3){
      			$('#disc').text('-');
      			var bersih = (parseInt(jum)*parseInt(harga));
      			$('#ttlharga').text(bersih);
      		}
      		if (mebr == 'Nonmember') {
      			$('#disc').text('-');
      			var bersih = (parseInt(jum)*parseInt(harga));
      			$('#ttlharga').text(bersih);
      		}
      		$('#jt').text(jenist);
      		$('#jumlh').text(jum);
      		$('#htiket').text(harga);
      		$('#kat').text(mebr);
      		$('#setel').click(function(){
      			$('#resetform')[0].reset();
      			$('#jt,#jumlh,#htiket,#disc,#ttlharga,#kat').text('');
      			
      		});
      	});
      });
   </script>
</div>
</div>
@endsection