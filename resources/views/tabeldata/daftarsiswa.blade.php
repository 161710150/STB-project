@extends('tabeldata.layout')
 
@section('content')
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <table class="table table-hover" id="siswa-table">
        <button class="btn btn-success" id="btnTambah" style="margin-bottom: 20px"><span class="glyphicon glyphicon-plus-sign"></span> Tambah Data</button>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jurusan</th>
                <th>Created At</th>
              </tr>
        </thead>
    </table>
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-plus"></span> Tambah Data</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-user"></span> Nama Siswa </label>
              <input type="text" class="form-control" id="yourname" placeholder="Nama Lengkap">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-book"></span> Kelas </label>
              <input type="text" class="form-control" id="yourclass" placeholder="Kelas Anda">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-briefcase"></span> Jurusan </label>
              <input type="text" class="form-control" id="jurusan" placeholder="Jurusan Anda">
            </div>
              <button type="submit" class="btn btn-success btn-block" id="add"><span class="glyphicon glyphicon-plus"></span> Tambah</button>
          </form>
        </div>
      </div>
      
    </div>
  </div> 

</body>
</html>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

@push('scripts')
<script>
$(document).ready(function() {
    $('#siswa-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/daftarsiswa/json',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'Nama_Siswa', name: 'Nama_Siswa' },
            { data: 'Kelas', name: 'Kelas' },
            { data: 'Jurusan', nama: 'Jurusan' },
            { data: 'created_at', name: 'created_at' }
            // { data: 'updated_at', name: 'updated_at' }
        ]
    });
    $("#btnTambah").click(function(){
        $("#myModal").modal();
    })
});
</script>
@endpush