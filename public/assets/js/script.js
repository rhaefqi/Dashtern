function deleteKelas($id) {
   Swal.fire({
      title: "Hapus Kelas",
      text: "Apakah anda yakin untuk menghapus Kelas ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#D80032",
      cancelButtonColor: "#006633",
      confirmButtonText: "Delete"
   }).then((result) => {
      if (result.isConfirmed) {
         Swal.fire({
            title: "Hapus Kelas",
            text: "Jika anda benar-benar ingin menhapus Kelas ini, maka Kelas tersebut tidak dapat dikembalikan jika sudah dihapus!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#D80032",
            cancelButtonColor: "#006633",
            confirmButtonText: "Delete"
         }).then((result) => {
            if (result.isConfirmed) {
               Swal.fire({
                  title: "Hapus Kelas",
                  text: "Apakah anda benar-benar yakin?!",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#D80032",
                  cancelButtonColor: "#006633",
                  confirmButtonText: "Delete"
               }).then((result) => {
                  if (result.isConfirmed) {
                     document.getElementById(`form-delete-${$id}`).submit();
                  }
               });
            }
         });
      }
   });
}

function deletePengumuman($id) {
   Swal.fire({
      title: "Hapus Pengumuman",
      text: "Apakah anda yakin untuk menghapus Pengumuman ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#D80032",
      cancelButtonColor: "#006633",
      confirmButtonText: "Delete"
   }).then((result) => {
      if (result.isConfirmed) {
         document.getElementById(`form-delete-${$id}`).submit();
      }
   });
}

function deleteTugas($id) {
   Swal.fire({
      title: "Hapus Tugas",
      text: "Apakah anda yakin untuk menghapus Tugas ini?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#D80032",
      cancelButtonColor: "#006633",
      confirmButtonText: "Delete"
   }).then((result) => {
      if (result.isConfirmed) {
         document.getElementById(`form-delete-${$id}`).submit();
      }
   });
}

