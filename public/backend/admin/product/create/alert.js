function actionDelete(e) {
    e.preventDefault();
    let urlRequest = $(this).data("url");
    let btn = $(this);
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "GET",
                url: urlRequest,
                success: function (data) {
                    if (data.message === "success") {
                        btn.parent().parent().remove();
                        Swal.fire(
                            "Deleted!",
                            "Your file has been deleted.",
                            "success"
                        );
                    }
                },
                error: function (error) {
                    console.log(error);
                },
            });
        }
    });
}

$(function () {
    $(document).on("click", ".delete-items", actionDelete);
    $(document).on("click", ".delete-slide", actionDelete);
    $(document).on("click", ".delete-setting", actionDelete);
});
