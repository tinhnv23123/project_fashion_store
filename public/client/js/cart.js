const toggleFormCheckboxes = document.querySelectorAll('.toggleFormCheckbox');
const forms = document.querySelectorAll('div[id^="form"]');

toggleFormCheckboxes.forEach((checkbox) => {
    checkbox.addEventListener('change', function () {
        const targetId = this.dataset.target;
        const targetForm = document.getElementById(targetId);

        forms.forEach((form) => {
            if (form !== targetForm) {
                form.style.display = 'none';
            }
        });

        if (this.checked) {
            targetForm.style.display = 'block';
        } else {
            targetForm.style.display = 'none';
        }
    });
});

