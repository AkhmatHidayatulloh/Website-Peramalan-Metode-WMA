<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>asd</title>
    <link href="./plugins/sweetalert/css/sweetalert.css" rel="stylesheet">
</head>

<body>

<button  type="button" class="btn btn-primary" id="confirm-color">Alert</button>
           <button type="button" class="btn btn-primary me-1 mb-1" id="outside-click">
  Click Outside
</button>


</body>
   <script src="./plugins/sweetalert/js/sweetalert.min.js"></script>
    <script src="./plugins/sweetalert/js/sweetalert.init.js"></script>
<script type="text/javascript">
    
  const  outsideClick = document.querySelector('#outside-click');
  // CLOSE ALERT ON BACKDROP CLICK
outsideClick.onclick = function() {
  Swal.fire({
    title: 'Click outside to close!',
    text: 'This is a cool message!',
    allowOutsideClick: true,
    backdrop: true,
    customClass: {
      confirmButton: 'btn btn-primary'
    },
    buttonsStyling: false
  })
};

</script>
</html>// const confirmColor = document.querySelector('#confirm-color');
    
// // ALERT WITH FUNCTIONAL CONFIRM & CANCEL BUTTON
// confirmColor.onclick = function() {
//   Swal.fire({
//     title: 'Are you sure?',
//     text: "Apakah anda yakin menghapus data ini",
//     icon: 'warning',
//     showCancelButton: true,
//     confirmButtonColor: '#3085d6',
//     cancelButtonColor: '#d33',
//     confirmButtonText: 'Iya, Hapus Ini!',
//     customClass: {
//       confirmButton: 'btn btn-primary me-1',
//       cancelButton: 'btn btn-label-secondary'
//     },
//     buttonsStyling: false
//   }).then(function(result) {
//     if (result.value) {
            
//       Swal.fire({
//         icon: 'success',
//         title: 'Terhapus!',
//         text: 'Data berhasil di hapus.',
//         customClass: {
//           confirmButton: 'btn btn-success'
//         }
//       });

     
//     } else if (result.dismiss === Swal.DismissReason.cancel) {
//       Swal.fire({
//         title: 'Cancelled',
//         text: 'Data Tidak Jadi Dihapus :)',
//         icon: 'error',
//         customClass: {
//           confirmButton: 'btn btn-success'
//         }
//       });
//     }
//   });
// }
