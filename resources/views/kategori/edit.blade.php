<!-- Modal -->
<div class="modal fade" id="EditKategori" tabindex="-1" role="dialog" aria-labelledby="EditKategori" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditKategoriLabel">Edit Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control @error('editNamaKategori') is-invalid @enderror"
                        name="editNamaKategori" value="" id="editNamaKategori">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control @error('editDescKategori') is-invalid @enderror"
                        name="editDescKategori" value="" id="editDescKategori">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="simpanPerubahan">Save changes</button>
            </div>

        </div>
    </div>
</div>

<script>
    function GetDetailKategori(id) {
        // document.getElementById("demo").innerHTML = "Paragraph changed.";
        // alert(id);
        $('#EditKategori').modal('show');

        // ajax
        $.ajax({
            url: "/admin/kategori/" + id + "/edit",
            type: "GET",
            dataType: "json",
            success: function(dataKategori) {
                console.log("Data Berhasil Didapat", dataKategori);
                // console.log(dataKategori['namaKategori']);
                // document.getElementById("editNamaKategori").value = dataKategori['namaKategori'];
                $('#editNamaKategori').val(dataKategori['namaKategori']);
                $('#editDescKategori').val(dataKategori['descKategori']);
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    document.getElementById("simpanPerubahan").addEventListener("click", function(e) {
        e.preventDefault();

        //define variable
        let title = $('#editNamaKategori').val();
        let content = $('#editDescKategori').val();
        let token = '{{ csrf_token() }}';

        console.log(title, content, token);

        // ajax
        $.ajax({
            url: `/admin/kategori`,
            type: "POST",
            cache: false,
            data: {
                "namaKategori": title,
                "descKategori": content,
                '_token': token
            },
            success: function(response) {
                // alert("Kategori berhasil di tambah");
                // //append to table
                // $('#table-posts').prepend(post);

                //show success message
                // Swal.fire({
                //     type: 'success',
                //     icon: 'success',
                //     title: `${response.message}`,
                //     showConfirmButton: false,
                //     timer: 3000
                // });

                //clear form
                $('#namaKategori').val('');
                $('#descKategori').val('');

                $('#kategori').load(document.URL + ' #kategori');

                //close modal
                $('#ModalKategori').modal('hide');


            },
            error: function(error) {}

        });
    });
</script>
