document.addEventListener('DOMContentLoaded', function() {
    // Bagian untuk Validasi Form
    var form = document.getElementById('registrationForm');
    if (form) {
        form.addEventListener('submit', function(event) {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var email = document.getElementById('email').value;
            var gender = document.querySelector('input[name="gender"]:checked');

            if (!username || !password || !email || !gender) {
                alert('Semua field harus diisi dan pilih gender!');
                event.preventDefault();
            }
        });

        var inputs = form.querySelectorAll('input[type=text], input[type=password], input[type=email], input[type=radio], input[type=checkbox]');
        inputs.forEach(function(input) {
            input.addEventListener('input', function() {
                // Memberikan fokus pada elemen saat diisi
                this.focus();
            });
        });
    }

    // Fungsi untuk Mengelola Cookie
    function setCookie(name, value, days) {
        var expires = "";
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    function getCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    function eraseCookie(name) {   
        document.cookie = name + '=; Max-Age=-99999999;';  
    }

    // Fungsi untuk Mengelola Local Storage
    function saveToLocal(key, value) {
        localStorage.setItem(key, value);
    }

    function getFromLocal(key) {
        return localStorage.getItem(key);
    }

    function removeFromLocal(key) {
        localStorage.removeItem(key);
    }

    // Contoh set cookie dan local storage
    setCookie('user', 'namaPengguna', 7);
    saveToLocal('user', 'namaPengguna');
});

