let x = getCookie('alert');

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

console.log(x);
if (x == 1) {
    eraseCookie('alert');
    Swal.fire({
        confirmButtonColor: '#0c6f5d',
        title: 'Thank you for your request!',
        text: 'We will get back to you shortly.',
        imageUrl: 'https://skhalalfood.com/images/email/logo.png',
        imageWidth: 400,
        imageHeight: 100,
        imageAlt: 'Custom image',
    }).then(function() {
        window.location = "/";
    });
}

if (x == 10) {
    toastr.success("Your product has been added on Cart", "Product Add", {
        timeOut: 3000,
        closeButton: !0,
        debug: !1,
        newestOnTop: !0,
        progressBar: !0,
        positionClass: "toast-bottom-right",
        preventDuplicates: !0,
        onclick: null,
        showDuration: "300",
        hideDuration: "1000",
        extendedTimeOut: "1000",
        showEasing: "swing",
        hideEasing: "linear",
        showMethod: "fadeIn",
        hideMethod: "fadeOut",
        iconClass: "toast-custom",
        tapToDismiss: !1
    })

    eraseCookie('alert');
}

function eraseCookie(name) {
    document.cookie = name + '=;';
}
