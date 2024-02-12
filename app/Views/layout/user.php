<?= $this->extend("v_template");?>
<?= $this->section("content")?>

<!doctype html>
<html lang="en">
  <head>
    <!-- ... (bagian head tetap sama) ... -->
  </head>

  <body>
    <h1>Data Produk</h1>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header">
              Tambah Data
            </div>
            <div class="card-body">
              <form id="formUser">
                <div class="row mb-3">
                  <label for="nama_user" class="col-sm-4 col-form-label">Nama User</label>
                  <div class="col-sm-10">
                    <input type="gmail" class="form-control" id="nama_user">
                    <input type="hidden" id="status" name="status">
                    <input type="hidden" id="id_user" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="username" class="col-sm-4 col-form-label">UserName</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="password" class="col-sm-4 col-form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="password" >
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="role" class="col-sm-4 col-form-label">Role</label>
                    <div class="col-sm-10">
                        <select class="form-select" id="role" name="role">
                            <option value="" selected disabled>Select Role</option>
                            <option value="admin">Admin</option>
                            <option value="kasir">Kasir</option>
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary" id="simpan">Simpan</button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama User </th>
                <th>Username</th>
                <th>Password</th>
                <th>Role</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody id="showData">
              <!-- Data Produk akan ditampilkan di sini -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <script src="<?= base_url('')?>AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function(){
        tampil_data();

        function tampil_data(){
          $.ajax({
            url: 'user/tampil',
            type: 'get',
            dataType: 'json',
            success: function(data) {
              var HTML = '';
              var no = 0;

              if (data.length == 0) {
                HTML += '<tr>' + 
                        '<td colspan="5" class="text-center"> Data pada tabel masih kosong </td>' +
                        '</tr>';
                $('#showData').html(HTML);
              } else {
                for (var i = 0; i < data.length; i++) {
                  no++;
                  HTML += '<tr>' +
                          '<td>' + no + '</td>' +
                          '<td>' + data[i].nama_user + '</td>' +
                          '<td>' + data[i].username + '</td>' +
                          '<td>' + data[i].password + '</td>' +
                          '<td>' + data[i].Stok + '</td>' +
                          '<td>'+
                            '<button id="edit" class="btn btn-warning btn-edit" data-id="'+data[i].id_user+'">Edit</button>' +
                            ' ' +
                            '<button id="delete"class="btn btn-danger btn-hapus" data-id="'+data[i].id_user+'">Hapus</button>' +
                          '</td>'+
                          '</tr>'
                }
                $('#showData').html(HTML);

                
              }
            }
          });
        }

        $('#simpan').on('click', function(e) {
          e.preventDefault();

          var namaUser = $('#nama_user').val();
          var username = $('#username').val();
          var passwordd = $('#password').val();
          var stok = $('#stok').val();
            var status = $('#status').val();
            var id = $('#id_user').val();
            if(status == ''){
            $.ajax({
            url: 'user/simpan',
            type: 'post', 
            data: {namaUser: namaUser, username: username, password:password, stok: stok},
            success: function(data){
                $('#nama_user').val('');
                $('#username').val('');
                $('#password').val('');
                $('#stok').val('');

              tampil_data();
            }
          })
            }else if(status == 'update'){
          $.ajax({
          url: 'user/update',
          type: 'post',
          data: {
            id_user : id,
            NamaUser: namaUser,
            Password: password,
            Stok: stok
          },
          success: function(data) {
            $('#nama_user').val('');
            $('#username').val('');
            $('#password').val('');
            $('#stok').val('');
            $('#status').val('');

            tampil_data();
          }
        
        });
    }
        });
        //edit
        $('#showData').on('click', '#edit', function(e){
            e.preventDefault();
            var id = $(this).data('id')
            
            $.ajax({
                url : 'user/edit',
                type : 'get',
                dataType : 'json',
                data : {
                    id_produk:id   
                },
                success : function(data){
                    $('#id_user').val(data.id_produk);
                    $('#status').val('update');
                    $('#nama_user').val(data.nama_user);
                    $('#username').val(data.username);
                    $('#password').val(data.password);
                    $('#stok').val(data.Stok);
                   
                }
            });
        })


       //delete
       $('#showData').on('click','#delete', function(e){
        e.preventDefault();

        var id = $(this).data('id');
        console.log('Berhasil Dihapus');
       

        $.ajax({
          method : 'post',
          url : 'user/delete',
          data : {id_user:id},
          success : function(data){
            tampil_data();
          }
          
        });

      });
      //end delete

    });
    </script>
  </body>
</html>

<?= $this->endSection();?>
