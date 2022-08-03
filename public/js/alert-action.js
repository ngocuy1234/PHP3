// alert('Uy');
function configAlert(data) {
   
    if (data == 'error') {
        Swal.fire({
            position: 'bottom-end',
            icon: 'warning',
            title: 'Update error !!!',
            timer: 3000,
        })
    } else {
        Swal.fire({
            position: 'bottom-end',
            icon: 'success',
            title: 'Update success',
            showConfirmButton: false,
            timer: 1500

        })
    }
}