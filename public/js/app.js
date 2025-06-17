var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function () {
    var dropdownContent = this.nextElementSibling;
    dropdownContent.classList.toggle("show");
  });
}

document.addEventListener('DOMContentLoaded', function () {
    const securityTerm = document.getElementById('security_term');
    const paymentTermWrapper = document.getElementById('security_time_wrapper');

    securityTerm.addEventListener('change', function () {
        if (this.value === 'Lunas') {
            paymentTermWrapper.style.display = 'flex';
        } else {
            paymentTermWrapper.style.display = 'none';
        }
    });
});

document.addEventListener('DOMContentLoaded', function () {
    const securityTerm = document.getElementById('cleaning_term');
    const paymentTermWrapper = document.getElementById('cleaning_time_wrapper');

    securityTerm.addEventListener('change', function () {
        if (this.value === 'Lunas') {
            paymentTermWrapper.style.display = 'flex';
        } else {
            paymentTermWrapper.style.display = 'none';
        }
    });
});

document.getElementById('phone').addEventListener('input', function (e) {
        let value = e.target.value;
        value = value.replace(/[^0-9]/g, '');

        if (value.length > 15) {
            value = value.slice(0, 15);
        }
        e.target.value = value;
});

function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function(){
        var output = document.getElementById('preview');
        output.src = reader.result;
        output.style.display = 'block';
    };
    reader.readAsDataURL(event.target.files[0]);
}
