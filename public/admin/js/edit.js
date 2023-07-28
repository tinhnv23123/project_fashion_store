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
// 
// document.addEventListener("DOMContentLoaded", function() {
//     const btnDeleteMultiple = document.querySelector('.btn-delete-multiple');

//     btnDeleteMultiple.addEventListener('click', function() {
//         const selectedIds = [];
//         const checkboxes = document.querySelectorAll('input[name="selectedIds[]"]:checked');
//         checkboxes.forEach((checkbox) => {
//             selectedIds.push(checkbox.value);
//         });

//         if (selectedIds.length > 0) {
//             const form = document.createElement('form');
//             form.method = 'POST';
//             form.action = btnDeleteMultiple.getAttribute('data-route'); // Lấy route từ thuộc tính data-route
//             form.style.display = 'none';
//             const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

//             selectedIds.forEach((id) => {
//                 const input = document.createElement('input');
//                 input.type = 'hidden';
//                 input.name = 'selectedIds[]';
//                 input.value = id;
//                 form.appendChild(input);
//             });

//             const csrfInput = document.createElement('input');
//             csrfInput.type = 'hidden';
//             csrfInput.name = '_token';
//             csrfInput.value = csrfToken;
//             form.appendChild(csrfInput);

//             document.body.appendChild(form);
//             form.submit();
//         } else {
//             alert('Vui lòng chọn ít nhất một sản phẩm để xóa.');
//         }
//     });
// });
// 
document.addEventListener("DOMContentLoaded", function() {
    const selectAllCheckbox = document.getElementById('select-all-checkbox');
    const checkboxes = document.querySelectorAll('input[name="selectedIds[]"]');

    selectAllCheckbox.addEventListener('click', function() {
        checkboxes.forEach((checkbox) => {
            checkbox.checked = selectAllCheckbox.checked;
        });
    });

    checkboxes.forEach((checkbox) => {
        checkbox.addEventListener('click', function() {
            // Kiểm tra nếu tất cả các ô checkbox đã được chọn, thì chọn cả ô checkbox chung
            const allChecked = document.querySelectorAll('input[name="selectedIds[]"]:checked').length === checkboxes.length;
            selectAllCheckbox.checked = allChecked;
        });
    });

    const btnDeleteMultiple = document.querySelector('.btn-delete-multiple');

    btnDeleteMultiple.addEventListener('click', function() {
        const selectedIds = [];
        const checkboxes = document.querySelectorAll('input[name="selectedIds[]"]:checked');
        checkboxes.forEach((checkbox) => {
            selectedIds.push(checkbox.value);
        });

        if (selectedIds.length > 0) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = btnDeleteMultiple.getAttribute('data-route'); // Lấy route từ thuộc tính data-route
            form.style.display = 'none';
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            selectedIds.forEach((id) => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'selectedIds[]';
                input.value = id;
                form.appendChild(input);
            });

            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrfToken;
            form.appendChild(csrfInput);

            document.body.appendChild(form);
            form.submit();
        } else {
            alert('Vui lòng chọn ít nhất một sản phẩm để xóa.');
        }
    });
});




