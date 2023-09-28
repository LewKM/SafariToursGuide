document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'mail.php', true);

    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('response').innerHTML = xhr.responseText;
            document.getElementById('contactForm').reset();
        }
    };

    xhr.send(formData);
});