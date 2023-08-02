import notification from "toastr";

const AuthLogin = {
    init() {
        this.showPassword();
        this.showNotify();
    },

    showNotify() {
        if (typeof window._NOTIFY != 'undefined') {
            notification.options = {
                "progressBar": true,
                "timeOut": "3000",
            }
            notification[window._NOTIFY.type](window._NOTIFY.content)
        }
    },

    showPassword() {
        $(".js-toggle-password").click(function () {
            let $this = $(this),
                $inputPassword = $('#password-input');

            if ($inputPassword.attr('type') === 'password') {
                $this.children('i').removeClass('ri-eye-fill').addClass('ri-eye-off-fill');
                $inputPassword.attr('type', 'text');
            } else {
                $this.children('i').removeClass('ri-eye-off-fill').addClass('ri-eye-fill');
                $inputPassword.attr('type', 'password');
            }
        });
    }
}

$(function () {
    AuthLogin.init();
})