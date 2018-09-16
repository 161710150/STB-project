<!DOCTYPE html>
   <html>
      <head>
         <title>array</title>
         <link rel="stylesheet" type="text/css" href="{{asset ('baru/dar.min.css')}}">
      </head>
      <body>
         <br>
         <br>
         <br>
         <br>
         <div class="container">
            <div class="panel-group">
               <div class=" panel panel-success">
                  <div class="panel-heading">test</div>
                  <div class="panel-body">
                     <input class="form-control" type="text" id="masuk">
                     <br>
                     Hasil : 
                     <p id="hasil"></p>
                     <br>
                     <button class="btn btn-success" onclick="add()">Push</button>
                     <button class="btn btn-success" onclick="searchanddelete()">Search And Delete</button>
                     <br>
                     <table class="table table-striped" id="tabelku">
                     	<thead>
                     		<tr>
                     			<th>Nama</th>
                     		</tr>
                     	</thead>
                     </table>
                  </div>
               </div>
            </div>
         </div>
         <script src="{{asset ('baru/jquery.js')}}"></script>
         <script>
            var myrar = [];
            
            //array tambah
            function add()
            {
            	//mengambil isi input
            	var text = document.getElementById('masuk').value;
            	//diinput ke array 
            	myrar.push(text);
            	console.log('Data',text,'berhasil ditambah');
            	// document.getElementById('hasil').innerHTML = myrar;
            	var isi = "<tr><td>"+text+"</td></tr>";
            	$('#tabelku').append(isi);
            }
            
            function searchanddelete()
            {
            	var text2 = document.getElementById('masuk').value;
            
            	var index = myrar.indexOf(text2);
            
            	if (index !== -1) 
            	{
            		myrar.splice(index,1);
            		document.getElementById('hasil').innerHTML = myrar;
            		console.log('Berhasil Menghapus');
            	}
            	else {
            		console.log('Tidak Ada Data')
            	}
            }
         </script>
      </body>
   </html>