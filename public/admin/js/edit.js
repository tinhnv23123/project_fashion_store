document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function () {
        const formId = this.dataset.formId;

        Swal.fire({
            title: 'Xác nhận xóa',
            text: 'Bạn có chắc chắn muốn xóa?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy'
        }).then((result) => {
            if (result.isConfirmed) {
                // Nếu người dùng xác nhận xóa, tiến hành gửi yêu cầu xóa
                document.getElementById(`deleteForm-${formId}`).submit();
            }
        });
    });
});



