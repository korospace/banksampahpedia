/**
 * Togle Switch
 * =============================================
 */
$('#toggle-switch-wraper .switch-section').on('click',function (e) {
    let data_toggle = $(this).data('toggle');
    $('#data_toggle').val(data_toggle);

    // clear form error
    $('.form-control').removeClass('is-invalid');
    $('.form-check-input').removeClass('is-invalid');
    $('.text-danger').html('');
    
    // switch toggle
    let pixel_move = $(this).position().left == 0 ? $(this).position().left : $(this).position().left - 4;
    $('#toggle-switch-wraper .toggle-switch').css("transform", `translateX(${pixel_move}px)`);
    $('#toggle-switch-wraper .toggle-switch').html($(this).html());

    // change title left side
    let title_left_side = data_toggle == 'nasabah' ? 'Buat Akun Nasabah' : 'Buat Akun Pengelola';
    $('#left_side h1').html(title_left_side);

    // hide input for nasabah or banksampah
    if (data_toggle == 'nasabah') {
        $('#formRegister .only_for_nasabah').show();
        $('#formRegister .only_for_banksampah').hide();
    }
    else {
        $('#formRegister .only_for_nasabah').hide();
        $('#formRegister .only_for_banksampah').show();
    }
})

/**
 * LOGIN
 * =============================================
 */
// form on submit
$('#formLoginNasabah').on('submit', function(e) {
    e.preventDefault();

    if (doValidate()) {
        showLoadingSpinner();
        let formLogin = new FormData(e.target);

        if ($('#data_toggle').val() == 'banksampah') {
            axios
            .post(`${APIURL}/login/admin`,formLogin, {
                headers: {
                    // header options 
                }
            })
            .then((response) => {
                hideLoadingSpinner();
                
                let url = `${BASEURL}/admin`;
                if (LASTURL != '' && LASTURL != 'null' && LASTURL != null) {
                    url = LASTURL;
                }

                document.cookie = `token=${response.data.token}; path=/;SameSite=None; Secure`;
                window.location.replace(url);
            })
            .catch((error) => {
                hideLoadingSpinner();

                // akun tidak aktif
                if (error.response.status == 401) {
                    showAlert({
                        message: `<strong>Maaf . . .</strong> akun anda sedang di Non-aktifkan!`,
                        autohide: true,
                        type:'warning' 
                    })
                }
                // error username/password
                else if (error.response.status == 404) {
                    if (error.response.data.messages.username_or_email) {
                        $('#username-or-email').addClass('is-invalid');
                        $('#username-or-email-error').text(error.response.data.messages.username_or_email);
                    } 
                    else if (error.response.data.messages.password){
                        $('#password').addClass('is-invalid');
                        $('#password-error').text(error.response.data.messages.password);
                    }
                }
                // server error
                else if (error.response.status == 500){
                    showAlert({
                        message: `<strong>Ups . . .</strong> terjadi kesalahan, coba sekali lagi!`,
                        autohide: true,
                        type:'danger' 
                    })
                }
            })
        } 
        else {
            axios
            .post(`${APIURL}/login/nasabah`,formLogin, {
                headers: {
                    // header options 
                }
            })
            .then((response) => {
                hideLoadingSpinner();
    
                document.cookie = `token=${response.data.token}; path=/;SameSite=None; Secure`;
                window.location.replace(`${BASEURL}/nasabah`);
            })
            .catch((error) => {
                hideLoadingSpinner();
    
                // error email/password
                if (error.response.status == 404) {
                    if (error.response.data.messages.username_or_email) {
                        $('#username-or-email').addClass('is-invalid');
                        $('#username-or-email-error').text(error.response.data.messages.username_or_email);
                    } 
                    else if (error.response.data.messages.password){
                        $('#password').addClass('is-invalid');
                        $('#password-error').text(error.response.data.messages.password);
                    }
                }
                // account not verify
                else if (error.response.status == 401) {
                    if (error.response.data.messages == 'account is not verify') {
                        setTimeout(() => {
                            Swal.fire({
                                icon: 'warning',
                                title: 'LOGIN GAGAL!',
                                text: 'akun anda belum ter-verifikasi. silahkan verifikasi akun terlebih dahulu',
                                confirmButtonText: 'ok',
                            })
                            .then(() => {
                                var url = BASEURL + '/otp';
                                var form = $('<form action="' + url + '" method="post">' +
                                '<input type="text" name="username_or_email" value="' + formLogin.get('username_or_email') + '" />' +
                                '<input type="text" name="password" value="' + formLogin.get('password') + '" />' +
                                '</form>');
                                $('body').append(form);
                                form.submit();
                            })
                        }, 300);
                    }
                    else if (error.response.data.messages == 'akun tidak aktif') {
                        showAlert({
                            message: `<strong>Maaf . . .</strong> akun anda sedang di Non-aktifkan!`,
                            autohide: true,
                            type:'warning' 
                        })
                    }
                }
                // server error
                else if (error.response.status == 500){
                    showAlert({
                        message: `<strong>Ups . . .</strong> terjadi kesalahan, coba sekali lagi!`,
                        autohide: true,
                        type:'danger' 
                    })
                }
            })
        }
    }
})

// validate login
function doValidate() {
    let status     = true;
    // let emailRules = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;

    // clear error message first
    $('.form-control').removeClass('is-invalid');
    $('.text-danger').html('');

    // email validation
    if ($('#username-or-email').val() == '') {
        $('#username-or-email').addClass('is-invalid');
        $('#username-or-email-error').html('*username/email harus di isi');
        status = false;
    }
    // password validation
    if ($('#password').val() == '') {
        $('#password').addClass('is-invalid');
        $('#password-error').html('*password harus di isi');
        status = false;
    }

    return status;
}

// btn forgot password on click
$('#btn-forgotpass').on('click', function(e) {
    e.preventDefault();

    Swal.fire({
        title: 'LUPA PASSWORD?',
        input: 'text',
        inputAttributes: {
            autocapitalize: 'off'
        },
        html:`<p class='mb-4'>masukan email yang terdaftar. kami akan mengirim password anda melalui email</p>`,
        footer: '<a href="https://wa.me/628569886410?text=Hallo%20Admin,%20saya%20ada%20kendala%20mengenai%20password">hubungi admin</a>',
        showCancelButton: true,
        confirmButtonText: 'submit',
        showLoaderOnConfirm: true,
        preConfirm: (email) => {
            let form = new FormData();
            form.append('email',email);

            return axios
            .post(`${APIURL}/login/forgotpass`,form, {
                headers: {
                    // header options 
                }
            })
            .then(() => {
                Swal.fire({
                    icon: 'success',
                    title: 'success!',
                    text: 'password sudah dikirim ke email anda. silahkan cek email',
                    showConfirmButton: true,
                })
            })
            .catch(error => {
                if (error.response.status == 404) {
                    Swal.showValidationMessage(error.response.data.messages);
                }
                else if (error.response.status == 500) {
                    Swal.showValidationMessage(
                        `terjadi kesalahan, coba sekali lagi`
                    )
                }
            })
        },
        allowOutsideClick: () => !Swal.isLoading()
    })
})

/**
 * LOGIN ADMIN
 * =============================================
 */
// // form on submit
// $('#formLoginAdmin').on('submit', function(e) {
//     e.preventDefault();

//     if (doValidateAdmin()) {
//         showLoadingSpinner();
//         let form = new FormData(e.target);

//         axios
//         .post(`${APIURL}/login/admin`,form, {
//             headers: {
//                 // header options 
//             }
//         })
//         .then((response) => {
//             hideLoadingSpinner();
            
//             let url = `${BASEURL}/admin`;
//             if (LASTURL != '' && LASTURL != 'null' && LASTURL != null) {
//                 url = LASTURL;
//             }

//             document.cookie = `token=${response.data.token}; path=/;SameSite=None; Secure`;
//             window.location.replace(url);
//         })
//         .catch((error) => {
//             hideLoadingSpinner();

//             // akun tidak aktif
//             if (error.response.status == 401) {
//                 showAlert({
//                     message: `<strong>Maaf . . .</strong> akun anda sedang di Non-aktifkan!`,
//                     autohide: true,
//                     type:'warning' 
//                 })
//             }
//             // error username/password
//             else if (error.response.status == 404) {
//                 if (error.response.data.messages.username) {
//                     $('#admin-username').addClass('is-invalid');
//                     $('#admin-username-error').text(error.response.data.messages.username);
//                 } 
//                 else if (error.response.data.messages.password){
//                     $('#admin-password').addClass('is-invalid');
//                     $('#admin-password-error').text(error.response.data.messages.password);
//                 }
//             }
//             // server error
//             else if (error.response.status == 500){
//                 showAlert({
//                     message: `<strong>Ups . . .</strong> terjadi kesalahan, coba sekali lagi!`,
//                     autohide: true,
//                     type:'danger' 
//                 })
//             }
//         })
//     }
// })

// // validate login admin
// function doValidateAdmin(form) {
//     let status     = true;

//     // clear error message first
//     $('.form-control').removeClass('is-invalid');
//     $('.text-danger').html('');

//     // email validation
//     if ($('#admin-username').val() == '') {
//         $('#admin-username').addClass('is-invalid');
//         $('#admin-username-error').html('*username harus di isi');
//         status = false;
//     }
//     // password validation
//     if ($('#admin-password').val() == '') {
//         $('#admin-password').addClass('is-invalid');
//         $('#admin-password-error').html('*password harus di isi');
//         status = false;
//     }

//     return status;
// }