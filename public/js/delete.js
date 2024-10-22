$(function () {
    $('.delete').click(function (){

        Swal.fire({
            title: "Czy napewno chcesz usunąć rekord?",
            text: "Nie będziesz mógł tego cofnąć!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Tak",
            cancelButtonText: "Nie",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                        method: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: deleteUrl + $(this).data("id")
                    })
                    .done(function ( data ) {
                        Swal.fire("SUCCESS", "Udalo się usunąć rekord",'success');
                        location.reload();
                    })
                    .fail(function (data) {
                        Swal.fire("ERROR",data.responseJSON.message,data.responseJSON.status);
                    });
            }
        })
    });
});
