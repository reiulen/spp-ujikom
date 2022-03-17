function hapus(id) {
    nama = $(`#nama${id}`).attr("nama");
    Swal.fire({
        title: `Apakah data ${nama} akan dihapus?`,
        showCancelButton: true,
        confirmButtonText: "Hapus",
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $(`#hapus${id}`).submit();
        }
    });
}
