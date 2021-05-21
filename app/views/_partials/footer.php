</div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="modaleditLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modaleditLabel">Edit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formEdit" method="POST">
                <input type="hidden" name="id">
                <div class="form-group">
                    <label for="editFullName">Nama Lengkap</label>
                    <input type="text" class="form-control" name="full_name" id="editFullName">
                </div>
                <div class="form-group">
                    <label for="editUsername">Username</label>
                    <input type="text" name="username" class="form-control" id="editUsername">
                </div>
                <div class="form-group">
                    <label for="editPassword">Password</label>
                    <input type="text" name="password" class="form-control" id="editPassword">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-paper-plane"></i> Simpan</button>
                </div>
        </form>
      </div>
    </div>
  </div>
</div>
    <script src="<?= BASEURL ?>assets/js/jquery-3.5.1.min.js"></script>
    <script src="<?= BASEURL ?>assets/js/popper.min.js"></script>
    <script src="<?= BASEURL ?>assets/js/bootstrap.min.js"></script>
    <script src="<?= BASEURL ?>assets/vendor/sweetalert2js/sweetalert2.min.js"></script>
    <script>
        $(document).ready(function(){
            table_user();
            function table_user(){
                $.ajax({
                    url     :   "<?= BASEURL ?>ajax/getUsers",
                    type    :   "GET",
                    dataType:   "JSON",
                    async   :   false,
                    success :   (res)=>{
                        var i;
                        var html = "";
                        var no = 1;
                        for(i = 0; i < res.length;i++){
                            html +=
                            `
                                <tr>
                                    <td>${no++}</td>
                                    <td>${res[i].full_name}</td>
                                    <td>${res[i].username}</td>
                                    <td>${res[i].password}</td>
                                    <td>
                                        <a class='btn edit' data-id='${res[i].id}'><i class='fas fa-edit'></i></a>
                                        <a class='btn delete' data-id='${res[i].id}'><i class='fas fa-trash'></i></a>
                                    </td>
                                </tr>
                            `;
                        }
                        $("#tBody").html(html);
                    }
                });
            }
            $('.refresh').click(()=>{
                table_user();
            });
            // Delete
            $('#tBody').on('click', '.delete', function(){
                var id  =   $(this).data('id');
                Swal.fire({
                    title   :   "Yakin mau dihapus ?",
                    text    :   "Kalo dihapus data nda bisa kembali",
                    icon    :   "warning",
                    confirmButtonText : "Saya Yakin",
                    cancelButtonText  : "Batal",
                    showCancelButton : true,
                }).then((value)=>{
                    if(value.isConfirmed){
                        $.ajax({
                            url         :   "<?= BASEURL ?>ajax/deleteUsers",
                            type        :   "POST",
                            data        :   {id:id},
                            dataType    :   "JSON",
                            success     :   (res)=>{
                                if(res.success === true){
                                    table_user();
                                    Swal.fire('Sukses', res.data, 'success');
                                }else{
                                    table_user();
                                    Swal.fire('Gagal', res.data, 'error');
                                }
                            }
                        });
                    }
                })
            });
            // Input Data
            $("#formInput").submit(function(e){
                e.preventDefault();
                var form = $("#formInput").serialize();
                $.ajax({
                    url     :   "<?= BASEURL ?>ajax/addUsers",
                    type    :   "POST",
                    data    :   form,
                    dataType:   "JSON",
                    success :   (res)=>{
                        $("#fullName").val('');
                        $("#username").val('');
                        $("#password").val('');
                        if(res.success === true){
                            table_user();
                            Swal.fire('Sukses', res.data, 'success');
                        }else{
                            table_user();
                            Swal.fire('Gagal', res.data, 'error');
                        }
                    }
                });
            });
            // Get User Modal Edit
            $("#tBody").on('click', '.edit', function(){
                var id      =   $(this).data('id');
                $.ajax({
                    url     :   "<?= BASEURL ?>ajax/getUser",
                    type    :   "POST",
                    data    :   {id:id},
                    dataType:   "JSON",
                    success :   (res)=>{
                        if(res.success === true){
                            var data = res.data;
                            $("input[name=id]").val(id);
                            $("#editFullName").val(data.full_name);
                            $("#editUsername").val(data.username);
                            $("#editPassword").val(data.password);
                            $("#modalEdit").modal('show');
                        }       
                    }
                });
            });
            // Update
            $("#formEdit").submit(function(e){
                e.preventDefault();
                $.ajax({
                    url         :   "<?= BASEURL ?>ajax/editUser",
                    type        :   "POST",
                    data        :   $("#formEdit").serialize(),
                    dataType    :   "JSON",
                    success     :   (res)=>{
                        if(res.success === true){
                            table_user();
                            $("#modalEdit").modal('hide');
                            Swal.fire('Sukses', res.data, 'success');
                        }else{
                            table_user();
                            Swal.fire('Gagal', res.data, 'error');
                        }
                    }
                });
            });
        });
    </script>
  </body>
</html>