<!DOCTYPE html>
<html>
   <head>
      <title>Datatables</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>       
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   </head>
   <body>
      <div class="container">
         <br />
         <h3 align="center">DataTables Daftar Siswa</h3>
         <br />
         <div align="left">
            <button type="button" name="add" id="add_data" class="btn btn-primary btn-sm">Tambah</button>
         </div>
         <br />
         <table id="student_table" class="table table-bordered" style="width:100%">
            <thead>
               <tr>
                  <th>Nama Siswa</th>
                  <th>Jenis Kelamin</th>
                  <th>Kelas</th>
                  <th>Jurusan</th>
                  <th>Nilai Satu</th>
                  <th>Nilai Dua</th>
                  <th>Jumlah</th>
                  <th>Keterangan</th>
               </tr>
            </thead>
         </table>
      </div>
      <div id="studentModal" class="modal fade" role="dialog">
         <div class="modal-dialog">
            <div class="modal-content">
               <form method="post" id="student_form">
                  <div class="modal-header" style="background-color: lightblue;">
                     <button type="button" class="close" data-dismiss="modal" >&times;</button>
                     <h4 class="modal-title" >Add Data</h4>
                  </div>
                  <div class="modal-body">
                     {{csrf_field()}}
                     <span id="form_output"></span>
                     <div class="form-group">
                        <label>Nama Siswa</label>
                        <input type="text" name="Nama_Siswa" id="Nama_Siswa" class="form-control" placeholder="masukan nama anda" />
                     </div>
                     <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control" id="selek">
                        <option>-</option>
                        <option value="laki-laki">Laki-laki</option>
                        <option value="perempuan">Perempuan</option>
                        </select>
                     </div>
                     <div class="form-group">
                        <label>Kelas</label>
                        <input type="text" name="Kelas" id="Kelas" class="form-control" placeholder="masukan kelas anda" />
                     </div>
                     <div class="form-group">
                        <label>Jurusan</label>
                        <input type="text" name="Jurusan" id="Jurusan" class="form-control" placeholder="masukan nama jurusan" />
                     </div>
                     <div class="form-group">
                        <label>Nilai Satu</label>
                        <input type="number" name="nilai1" id="nilai1" class="form-control" placeholder="nilai pertama" />
                     </div>
                     <div class="form-group">
                        <label>Nilai Dua</label>
                        <input type="number" name="nilai2" id="nilai2" class="form-control" placeholder="nilai kedua" />
                     </div>
                  </div>
                  <div class="modal-footer">
                     <input type="hidden" name="button_action" id="button_action" value="insert" />
                     <input type="submit" name="submit" id="aksi" value="Tambah" class="btn btn-info" />
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script type="text/javascript">
         //proses get data ke dalam datatable
         $(document).ready(function() {
          $('#student_table').DataTable({
             "processing": true,
             "serverSide": true,
             //dapat menggunakan url kurung kurawa dua kali dalamnya menggunakan route name
             "ajax": "{{ route ('json')}}",
             "columns":[
                 { "data": "Nama_Siswa" },
                 { "data": "Kelas" },
                 { "data": "Jurusan"},
                 { "data": "nilai1"},
                 { "data": "nilai2"},
                 { "data": "jumlah"},
                 { "data": "keterangan"}
             ]
          });
         
         $('button[name=add]').click(function(){
             $('#studentModal').modal('show');
             $('#student_form')[0].reset();
             $('#form_output').html('');
             $('#button_action').val('insert');
             $('#aksi').val('Tambah');
         });
         
         $('#student_form').on('submit', function(event){
             event.preventDefault();
             var form_data = $(this).serialize();
             $.ajax({
                 url:"{{ route('store') }}",
                 method:"POST",
                 data:form_data,
                 dataType:"json",
                 success:function(data)
                 {
                     if(data.error.length > 0)
                     {
                         var error_html = '';
                         for(var count = 0; count < data.error.length; count++)
                         {
                             error_html += '<div class="alert alert-danger">'+data.error[count]+'</div>';
                         }
                         $('#form_output').html(error_html);
                     }
                     else
                     {
                         $('#form_output').html(data.success);
                         $('#student_form')[0].reset();
                         $('#aksi').val('Tambah');
                         $('.modal-title').text('Tambah Data');
                         $('#button_action').val('insert');
                         $('#student_table').DataTable().ajax.reload();
                         $('#studentModal').modal('hide');
                     }
                 }
             })
         });
         
         });
      </script>
   </body>
</html>
<!-- // { "data" : 0,
   //   "mRender" : function(data, full ){
   //     return full['Nama_Siswa']+', '+full['Kelas'];
   // }}, -->