const flashData = $(".flash-data").data("flashdata");

if (flashData) {
  Swal.fire({
    position: "center",
    icon: "success",
    title: flashData,
    showConfirmButton: false,
    timer: 2700,
  });
}

$(document).on("click", ".btn-delete", function (e) {
  e.preventDefault();
  const href = $(this).attr("href");

  Swal.fire({
    title: "Hapus data ini?",
    text: "Data yang telah dihapus tidak dapat dikembalikan!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus!",
  }).then((result) => {
    if (result.isConfirmed) {
      document.location.href = href;
    }
  });
});
