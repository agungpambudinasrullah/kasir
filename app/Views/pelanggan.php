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
              <form id="formProduk">
                <div class="row mb-3">
                  <label for="nama_produk" class="col-sm-4 col-form-label">Nama Pelanggan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_pelanggan" >
                    <input type="hidden" id="status" name="status">
                    <input type="hidden" id="id_pelanggan" name="id_pelanggan">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="harga" class="col-sm-4 col-form-label">Alamat</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="alamat" >
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stok" class="col-sm-4 col-form-label">Nomor Telepon</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nomor_telepon" >
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
                <th>Nama Pelanggan</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
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
            url: 'pelanggan/tampil',
            type: 'get',
            dataType: 'json',
            success: function(data) {
              var HTML = '';
              var no = 0;
              console.log(data)
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
                          '<td>' + data[i].nama_pelanggan + '</td>' +
                          '<td>' + data[i].alamat + '</td>' +
                          '<td>' + data[i].nomor_telepon + '</td>' +
                          '<td>'+
                            '<button id="edit" class="btn btn-warning btn-edit" data-id="'+data[i].id_pelanggan+'">Edit</button>' +
                            ' ' +
                            '<button id="delete"class="btn btn-danger btn-hapus" data-id="'+data[i].id_pelanggan+'">Hapus</button>' +
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

          var namaPelanggan = $('#nama_pelanggan').val();
          var alamat = $('#alamat').val();
          var nomorTelepon = $('#nomor_telepon').val();
            var status = $('#status').val();
            var id = $('#id_pelanggan').val();

            if(status == ''){
            $.ajax({
            url: 'pelanggan/simpan',
            type: 'post', 
            data: {namaPelanggan: namaPelanggan, alamat: alamat, nomorTelepon: nomorTelepon},
            success: function(data){
              $('#nama_pelanggan').val('');
              $('#alamat').val('');
              $('#nomor_telepon').val('');

              tampil_data();
            }
          })
            }else if(status == 'update'){
          $.ajax({
          url: 'pelanggan/update',
          type: 'post',
          data: {
            id_pelanggan : id,
            namaPelanggan: namaPelanggan,
            alamat: alamat,
            nomorTelepon: nomorTelepon
          },
          success: function(data) {
            $('#nama_pelanggan').val('');
            $('#alamat').val('');
            $('#nomor_telepon').val('');
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
                url : 'pelanggan/edit',
                type : 'get',
                dataType : 'json',
                data : {
                    id_pelanggan:id   
                },
                success : function(data){
                    $('#id_pelanggan').val(data.id_pelanggan);
                    $('#status').val('update');
                    $('#nama_pelanggan').val(data.nama_pelanggan);
                    $('#nomor_telepon').val(data.nomor_telepon);
                    $('#alamat').val(data.alamat);
                  
                   
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
          url : 'pelanggan/delete',
          data : {id_pelanggan:id},
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
