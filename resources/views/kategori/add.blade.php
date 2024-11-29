<!-- Modal -->
<div class="modal fade" id="ModalKategori" tabindex="-1" role="dialog" aria-labelledby="ModalKategoriLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ModalKategoriLabel">Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control @error('namaKategori') is-invalid @enderror"
                        name="namaKategori" value="{{ old('namaKategori') }}" id="namaKategori">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" class="form-control @error('descKategori') is-invalid @enderror"
                        name="descKategori" value="{{ old('descKategori') }}" id="descKategori">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="savechange">Save changes</button>
            </div>

        </div>
    </div>
</div>

<script>
    document.getElementById("savechange").addEventListener("click", function(e) {
        e.preventDefault();

        //define variable
        let title = $('#namaKategori').val();
        let content = $('#descKategori').val();
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
