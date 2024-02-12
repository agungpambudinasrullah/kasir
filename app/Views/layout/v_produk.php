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
                  <label for="nama_produk" class="col-sm-4 col-form-label">Nama Produk</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nama_produk" name="namaProduk">
                    <input type="hidden" id="status" name="status">
                    <input type="hidden" id="id_produk" name="id_produk">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="harga" class="col-sm-4 col-form-label">Harga</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="harga" name="harga">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="stok" class="col-sm-4 col-form-label">Stok</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="stok" name="stok">
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
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
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
            url: 'produk/tampil',
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
                          '<td>' + data[i].NamaProduk + '</td>' +
                          '<td>' + data[i].Harga + '</td>' +
                          '<td>' + data[i].Stok + '</td>' +
                          '<td>'+
                            '<button id="edit" class="btn btn-warning btn-edit" data-id="'+data[i].ProdukID+'">Edit</button>' +
                            ' ' +
                            '<button id="delete"class="btn btn-danger btn-hapus" data-id="'+data[i].ProdukID+'">Hapus</button>' +
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

          var namaProduk = $('#nama_produk').val();
          var harga = $('#harga').val();
          var stok = $('#stok').val();
            var status = $('#status').val();
            var id = $('#id_produk').val();
            if(status == ''){
            $.ajax({
            url: 'produk/simpan',
            type: 'post', 
            data: {namaProduk: namaProduk, harga: harga, stok: stok},
            success: function(data){
              $('#nama_produk').val('');
              $('#harga').val('');
              $('#stok').val('');

              tampil_data();
            }
          })
            }else if(status == 'update'){
          $.ajax({
          url: 'produk/update',
          type: 'post',
          data: {
            ProdukID : id,
            NamaProduk: namaProduk,
            Harga: harga,
            Stok: stok
          },
          success: function(data) {
            $('#nama_produk').val('');
            $('#harga').val('');
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
                url : 'produk/edit',
                type : 'get',
                dataType : 'json',
                data : {
                    ProdukID:id   
                },
                success : function(data){
                    $('#id_produk').val(data.ProdukID);
                    $('#status').val('update');
                    $('#nama_produk').val(data.NamaProduk);
                    $('#harga').val(data.Harga);
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
          url : 'produk/delete',
          data : {ProdukID:id},
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
