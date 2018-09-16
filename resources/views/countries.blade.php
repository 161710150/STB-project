<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Contries</title>
      <link rel="stylesheet" type="text/css" href="{{asset ('baru/dar.min.css')}}">
      <style>
         input[type='submit'], button, [aria-label]{
         cursor: pointer;
         }
      </style>
   </head>
   <body style="margin-top: 20px">
      <div class="container">
         <div class="panel-group">
            <div class=" panel panel-success">
               <div class="panel-heading">Countries</div>
               <div class="panel-body">
                  <form action="javascript:void(0);" method="POST" onsubmit="app.Add()">
                     <input class="form-control" type="text" id="add-name" placeholder="New Country" style="margin-bottom: 20px">
                     <input class="btn btn-success" type="submit" value="Add" style="margin-bottom: 15px">
                  </form>
                  <p id="counter"></p>
                  <table class="table table-bodered table-hover table-striped">
                     <tr>
                        <th>Nama Negara</th>
                     </tr>
                     <tbody id="countries"></tbody>
                  </table>
                  <script type="text/javascript">
                     var app = new function(){
                     	this.el = document.getElementById('countries');
                     	this.countries = [];
                     	this.Count = function(data){
                     		var el = document.getElementById('counter');
                     		var name = 'country';
                     		if (data) {
                     			if (data > 1) {
                     				name = 'countries';
                     			}
                     			el.innerHTML = data + ' ' + name ;
                     		}else {
                     			el.innerHTML = 'No ' + name ;
                     		}
                     	};
                     	this.FetchAll = function(){
                     		var data = '';
                     		if (this.countries.length > 0) {
                     			for (i = 0; i< this.countries.length; i++){
                     				data += '<tr>';
                     				data += '<td>' + this.countries[i] + '</td>';
                     				data += '</tr>'
                     			}
                     		}
                     		this.Count(this.countries.length);
                     		return this.el.innerHTML = data;
                     	};
                     	this.Add = function(){
                     		al = document.getElementById('add-name');
                     		//ngambil value
                     		var negara = al.value;
                     		if (negara) {
                     			//menambah value baru
                     			this.countries.push(negara.trim());
                     			//Reset inputan
                     			al.value = '';
                     			this.FetchAll();
                     		}
                     	};
                     }
                  </script>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>