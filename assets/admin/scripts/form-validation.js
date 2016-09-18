var FormValidation = function () {
 var base_url = window.location.origin+"/fti-unwaha/admin/";

 var handlePasswordStrengthChecker = function () {
     var initialized = false;
     var input = $("#password");

     input.keydown(function () {
         if (initialized === false) {
             // set base options
             input.pwstrength({
                 raisePower: 1.4,
                 minChar: 6,
                 verdicts: ["Lemah", "Normal", "Sedang", "Kuat", "Sangat Kuat"],
                 scores: [17, 26, 40, 50, 60]
             });

             // add your own rule to calculate the password strength
             input.pwstrength("addRule", "demoRule", function (options, word, score) {
                 return word.match(/[a-z].[0-9]/) && score;
             }, 10, true);

             // set as initialized
             initialized = true;
         }
     });
 }

 var handleFormGuru = function() {
     // for more info visit the official plugin documentation:
     // http://docs.jquery.com/Plugins/Validation

         var formsiswa = $('#form_guru');
         var error3 = $('.alert-danger', formsiswa);

         //IMPORTANT: update CKEDITOR textarea with actual content before submit
         formsiswa.validate({
             errorElement: 'span', //default input error message container
             errorClass: 'help-block', // default input error message class
             focusInvalid: true, // do not focus the last invalid input
             ignore: "",
             rules: {
                 nama: {
                     required: true
                 },
                 foto: {
                     extension: "jpg|jpeg|png"
                 },
                 nip: {
                     required: true,
                     number: true,
                     "remote" :{
                     url:base_url+'akademik/guru/cek_nip',
                     type:"post",
                     data:
                     {
                       nip:function()
                       {
                         return $('#form_guru :input[name="nip"]').val();
                       }
                     }

               }
                 },
                 password: {
                     minlength: 6,
                     required: true
                 },
                 re_password: {
                     equalTo: "#password"
                 },
                 jenis_kelamin: {
                     required: true
                 },
                 tempat_tanggal_lahir: {
                     required: true
                 },
                 alamat: {
                   required: true
                 },
                 agama: {
                   required: true
                 },
                 jabatan : {
                   required : true
                 },
                 email: {
                   required: true,
                   email: true
                 },
                 no_telp: {
                   required : true,
                   number: true
                 }
             },

             messages: { // custom messages for radio buttons and checkboxes
                 nama: {
                     required: "Nama tidak boleh kosong"
                 },
                 foto: {
                     extension: "Tipe file tidak diizinkan"
                 },
                 nip: {
                     required: "NIP tidak boleh kosong",
                     number: "NIP harus angka",
                     remote: jQuery.validator.format("NISN {0} sudah terdaftar")
                 },
                 password: {
                     minlength: "Password minimal 6 karakter",
                     required: "Password tidak boleh kosong"
                 },
                 re_password:{
                   equalTo: "Password konfirmasi salah"
                 },
                 jenis_kelamin: {
                     required: "Jenis Kelamin tidak boleh kosong"
                 },
                 tempat_tanggal_lahir: {
                     required: "Tempat Tanggal Lahir tidak boleh kosong"
                 },
                 alamat: {
                   required: "Alamat tidak boleh kosong"
                 },
                 email: {
                   required: "email tidak boleh kosong",
                   email: "Email tidak valid"
                 },
                 agama: {
                   required: "Agama tidak boleh kosong"
                 },
                 no_telp: {
                   required: "No Telephone tidak boleh kosong",
                   number: "No Telephone harus angka"
                 },
                 jabatan: {
                   required: "Jabatan tidak boleh kosong"
                 }
             },

             errorPlacement: function (error, element) { // render error placement for each input type
                 if (element.parent(".input-group").size() > 0) {
                     error.insertAfter(element.parent(".input-group"));
                 } else if (element.attr("data-error-container")) {
                     error.appendTo(element.attr("data-error-container"));
                 } else if (element.parents('.radio-list').size() > 0) {
                     error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                 } else if (element.parents('.radio-inline').size() > 0) {
                     error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                 } else if (element.parents('.checkbox-list').size() > 0) {
                     error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                 } else if (element.parents('.checkbox-inline').size() > 0) {
                     error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                 } else {
                     error.insertAfter(element); // for other inputs, just perform default behavior
                 }
             },

             invalidHandler: function (event, validator) { //display error alert on form submit
                 error3.show();
                 App.scrollTo(error3, -200);
             },

             highlight: function (element) { // hightlight error inputs
                $(element)
                     .closest('.form-group').addClass('has-error'); // set error class to the control group
             },

             unhighlight: function (element) { // revert the change done by hightlight
                 $(element)
                     .closest('.form-group').removeClass('has-error'); // set error class to the control group
             },

             success: function (label) {
                 label
                     .closest('.form-group').removeClass('has-error'); // set success class to the control group
             },

             submitHandler: function (form) {
                 form.submit();
                 error3.hide();
             }
         });

         $('#form_guru input').keypress(function (e) {
           if (e.which == 13) {
               if ($('#form_guru').validate().form()) {
                   $('#form_guru').submit();
               }
               return false;
           }
   });

          //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
         $('.select2me', formsiswa).change(function () {
             formsiswa.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
         });
 }

 var handleFormGuruEdit = function() {
     // for more info visit the official plugin documentation:
     // http://docs.jquery.com/Plugins/Validation

         var formsiswa = $('#form_guru_edit');
         var error3 = $('.alert-danger', formsiswa);

         //IMPORTANT: update CKEDITOR textarea with actual content before submit
         formsiswa.validate({
             errorElement: 'span', //default input error message container
             errorClass: 'help-block', // default input error message class
             focusInvalid: true, // do not focus the last invalid input
             ignore: "",
             rules: {
                 nama: {
                     required: true
                 },
                 foto: {
                     extension: "jpg|jpeg|png"
                 },
                 jenis_kelamin: {
                     required: true
                 },
                 tempat_tanggal_lahir: {
                     required: true
                 },
                 alamat: {
                   required: true
                 },
                 agama: {
                   required: true
                 },
                 jabatan : {
                   required : true
                 },
                 email: {
                   required: true,
                   email: true
                 },
                 no_telp: {
                   required : true,
                   number: true
                 }
             },

             messages: { // custom messages for radio buttons and checkboxes
                 nama: {
                     required: "Nama tidak boleh kosong"
                 },
                 foto: {
                     extension: "Tipe file tidak diizinkan"
                 },
                 jenis_kelamin: {
                     required: "Jenis Kelamin tidak boleh kosong"
                 },
                 tempat_tanggal_lahir: {
                     required: "Tempat Tanggal Lahir tidak boleh kosong"
                 },
                 alamat: {
                   required: "Alamat tidak boleh kosong"
                 },
                 email: {
                   required: "email tidak boleh kosong",
                   email: "Email tidak valid"
                 },
                 agama: {
                   required: "Agama tidak boleh kosong"
                 },
                 no_telp: {
                   required: "No Telephone tidak boleh kosong",
                   number: "No Telephone tidak boleh angka"
                 },
                 jabatan: {
                   required: "Jabatan tidak boleh kosong"
                 }
             },

             errorPlacement: function (error, element) { // render error placement for each input type
                 if (element.parent(".input-group").size() > 0) {
                     error.insertAfter(element.parent(".input-group"));
                 } else if (element.attr("data-error-container")) {
                     error.appendTo(element.attr("data-error-container"));
                 } else if (element.parents('.radio-list').size() > 0) {
                     error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                 } else if (element.parents('.radio-inline').size() > 0) {
                     error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                 } else if (element.parents('.checkbox-list').size() > 0) {
                     error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                 } else if (element.parents('.checkbox-inline').size() > 0) {
                     error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                 } else {
                     error.insertAfter(element); // for other inputs, just perform default behavior
                 }
             },

             invalidHandler: function (event, validator) { //display error alert on form submit
                 error3.show();
                 App.scrollTo(error3, -200);
             },

             highlight: function (element) { // hightlight error inputs
                $(element)
                     .closest('.form-group').addClass('has-error'); // set error class to the control group
             },

             unhighlight: function (element) { // revert the change done by hightlight
                 $(element)
                     .closest('.form-group').removeClass('has-error'); // set error class to the control group
             },

             success: function (label) {
                 label
                     .closest('.form-group').removeClass('has-error'); // set success class to the control group
             },

             submitHandler: function (form) {
                 form.submit();
                 error3.hide();
             }
         });

         $('#form_guru_edit input').keypress(function (e) {
           if (e.which == 13) {
               if ($('#form_guru_edit').validate().form()) {
                   $('#form_guru_edit').submit();
               }
               return false;
           }
   });

          //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
         $('.select2me', formsiswa).change(function () {
             formsiswa.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
         });
 }


 var handleFormSiswa = function() {
     // for more info visit the official plugin documentation:
     // http://docs.jquery.com/Plugins/Validation

         var formsiswa = $('#form_siswa');
         var error3 = $('.alert-danger', formsiswa);

         //IMPORTANT: update CKEDITOR textarea with actual content before submit
         formsiswa.validate({
             errorElement: 'span', //default input error message container
             errorClass: 'help-block', // default input error message class
             focusInvalid: true, // do not focus the last invalid input
             ignore: "",
             rules: {
                 nama: {
                     required: true
                 },
                 foto: {
                     extension: "jpg|jpeg|png"
                 },
                 nisn: {
                     required: true,
                     number: true,
                     "remote" :{
                     url:base_url+'akademik/siswa/cek_nisn',
                     type:"post",
                     data:
                     {
                       nisn:function()
                       {
                         return $('#form_siswa :input[name="nisn"]').val();
                       }
                     }

               }
                 },
                 nis: {
                     required: true,
                     number: true,
                     "remote" :{
                     url:base_url+'akademik/siswa/cek_nis',
                     type:"post",
                     data:
                     {
                       nis:function()
                       {
                         return $('#form_siswa :input[name="nis"]').val();
                       }
                     }

               }
                 },
                 password: {
                     minlength: 6,
                     required: true
                 },
                 re_password: {
                     equalTo: "#password"
                 },
                 jenis_kelamin: {
                     required: true
                 },
                 tempat_tanggal_lahir: {
                     required: true
                 },
                 alamat: {
                   required: true
                 },
                 kelas:{
                   required: true
                 },
                 agama: {
                   required: true
                 }
             },

             messages: { // custom messages for radio buttons and checkboxes
                 nama: {
                     required: "Nama tidak boleh kosong"
                 },
                 foto: {
                     extension: "Tipe file tidak diizinkan"
                 },
                 nisn: {
                     required: "NISN tidak boleh kosong",
                     number: "NISN harus angka",
                     remote: jQuery.validator.format("NISN {0} sudah terdaftar")
                 },
                 nis: {
                     required: "NIS tidak boleh kosong",
                     number: "NIS harus angka",
                     remote: jQuery.validator.format("NIS {0} sudah terdaftar")
                 },
                 password: {
                     minlength: "Password minimal 6 karakter",
                     required: "Password tidak boleh kosong"
                 },
                 re_password:{
                   equalTo: "Password konfirmasi salah"
                 },
                 jenis_kelamin: {
                     required: "Jenis Kelamin tidak boleh kosong"
                 },
                 tempat_tanggal_lahir: {
                     required: "Tempat Tanggal Lahir tidak boleh kosong"
                 },
                 alamat: {
                   required: "Alamat tidak boleh kosong"
                 },
                 kelas: {
                   required: "Kelas tidak boleh kosong"
                 },
                 agama: {
                   required: "Agama tidak boleh kosong"
                 }
             },

             errorPlacement: function (error, element) { // render error placement for each input type
                 if (element.parent(".input-group").size() > 0) {
                     error.insertAfter(element.parent(".input-group"));
                 } else if (element.attr("data-error-container")) {
                     error.appendTo(element.attr("data-error-container"));
                 } else if (element.parents('.radio-list').size() > 0) {
                     error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                 } else if (element.parents('.radio-inline').size() > 0) {
                     error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                 } else if (element.parents('.checkbox-list').size() > 0) {
                     error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                 } else if (element.parents('.checkbox-inline').size() > 0) {
                     error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                 } else {
                     error.insertAfter(element); // for other inputs, just perform default behavior
                 }
             },

             invalidHandler: function (event, validator) { //display error alert on form submit
                 error3.show();
                 App.scrollTo(error3, -200);
             },

             highlight: function (element) { // hightlight error inputs
                $(element)
                     .closest('.form-group').addClass('has-error'); // set error class to the control group
             },

             unhighlight: function (element) { // revert the change done by hightlight
                 $(element)
                     .closest('.form-group').removeClass('has-error'); // set error class to the control group
             },

             success: function (label) {
                 label
                     .closest('.form-group').removeClass('has-error'); // set success class to the control group
             },

             submitHandler: function (form) {
                 form.submit();
                 error3.hide();
             }
         });

         $('#form_siswa input').keypress(function (e) {
           if (e.which == 13) {
               if ($('#form_siswa').validate().form()) {
                   $('#form_siswa').submit();
               }
               return false;
           }
   });

          //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
         $('.select2me', formsiswa).change(function () {
             formsiswa.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
         });
 }

 var handleFormSiswaEdit = function() {
     // for more info visit the official plugin documentation:
     // http://docs.jquery.com/Plugins/Validation

         var formsiswa = $('#form_siswa_edit');
         var error3 = $('.alert-danger', formsiswa);

         //IMPORTANT: update CKEDITOR textarea with actual content before submit
         formsiswa.validate({
             errorElement: 'span', //default input error message container
             errorClass: 'help-block', // default input error message class
             focusInvalid: true, // do not focus the last invalid input
             ignore: "",
             rules: {
                 nama: {
                     required: true
                 },
                 foto: {
                     extension: "jpg|jpeg|png"
                 },
                 nisn: {
                     required: true
                 },
                 nis: {
                     required: true
                 },
                 jenis_kelamin: {
                     required: true
                 },
                 tempat_tanggal_lahir: {
                     required: true
                 },
                 alamat: {
                   required: true
                 },
                 kelas:{
                   required: true
                 },
                 agama: {
                   required: true
                 }
             },

             messages: { // custom messages for radio buttons and checkboxes
                 nama: {
                     required: "Nama tidak boleh kosong"
                 },
                 foto: {
                     extension: "Tipe file tidak diizinkan"
                 },
                 nisn: {
                     required: "NISN tidak boleh kosong"
                 },
                 nis: {
                     required: "NIS tidak boleh kosong"
                 },
                 jenis_kelamin: {
                     required: "Jenis Kelamin tidak boleh kosong"
                 },
                 tempat_tanggal_lahir: {
                     required: "Tempat Tanggal Lahir tidak boleh kosong"
                 },
                 alamat: {
                   required: "Alamat tidak boleh kosong"
                 },
                 kelas: {
                   required: "Kelas tidak boleh kosong"
                 },
                 agama: {
                   required: "Agama tidak boleh kosong"
                 }
             },

             errorPlacement: function (error, element) { // render error placement for each input type
                 if (element.parent(".input-group").size() > 0) {
                     error.insertAfter(element.parent(".input-group"));
                 } else if (element.attr("data-error-container")) {
                     error.appendTo(element.attr("data-error-container"));
                 } else if (element.parents('.radio-list').size() > 0) {
                     error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                 } else if (element.parents('.radio-inline').size() > 0) {
                     error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                 } else if (element.parents('.checkbox-list').size() > 0) {
                     error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                 } else if (element.parents('.checkbox-inline').size() > 0) {
                     error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                 } else {
                     error.insertAfter(element); // for other inputs, just perform default behavior
                 }
             },

             invalidHandler: function (event, validator) { //display error alert on form submit
                 error3.show();
                 App.scrollTo(error3, -200);
             },

             highlight: function (element) { // hightlight error inputs
                $(element)
                     .closest('.form-group').addClass('has-error'); // set error class to the control group
             },

             unhighlight: function (element) { // revert the change done by hightlight
                 $(element)
                     .closest('.form-group').removeClass('has-error'); // set error class to the control group
             },

             success: function (label) {
                 label
                     .closest('.form-group').removeClass('has-error'); // set success class to the control group
             },

             submitHandler: function (form) {
                 form.submit();
                 error3.hide();
             }
         });

         $('#form_siswa_edit input').keypress(function (e) {
           if (e.which == 13) {
               if ($('#form_siswa_edit').validate().form()) {
                   $('#form_siswa_edit').submit();
               }
               return false;
           }
   });

          //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
         $('.select2me', formsiswa).change(function () {
             formsiswa.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
         });
 }

 var handlePasswordStrengthChecker = function () {
     var initialized = false;
     var input = $("#pass_user");

     input.keydown(function () {
         if (initialized === false) {
             // set base options
             input.pwstrength({
                 raisePower: 1.4,
                 minChar: 6,
                 verdicts: ["Lemah", "Normal", "Sedang", "Kuat", "Sangat Kuat"],
                 scores: [17, 26, 40, 50, 60]
             });

             // add your own rule to calculate the password strength
             input.pwstrength("addRule", "demoRule", function (options, word, score) {
                 return word.match(/[a-z].[0-9]/) && score;
             }, 10, true);

             // set as initialized
             initialized = true;
         }
     });
 }

    var handleFormUser = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var formuser = $('#form_user');
            var error3 = $('.alert-danger', formuser);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            formuser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                    nama_user: {
                        minlength: 4,
                        required: true
                    },
                    foto_user: {
                        extension: "jpg|jpeg|png"
                    },
                    email_user: {
                        email: true,
                        required: true,
                        "remote":{
                            url: base_url+'master/user/cek_email',
                            type: "post",
                            data:
                                {
                                    email: function()
                                    {
                                        return $('#form_user :input[name="email_user"]').val();
                                    },
                                    id: function()
                                    {
                                        return $('#form_user :input[name="id"]').val();
                                    }
                                }
                        }
                    },
                    user_name: {
                        minlength: 4,
                        required: true,
                        "remote":{
                            url: base_url+'master/user/cek_username',
                            type: "post",
                            data:
                                {
                                    username: function()
                                    {
                                        return $('#form_user :input[name="user_name"]').val();
                                    },
                                    id: function()
                                    {
                                        return $('#form_user :input[name="id"]').val();
                                    }
                                }
                        }
                    },
                    pass_user: {
                        minlength: 6,
                        required: true
                    },
                    re_pass_user: {
	                    equalTo: "#pass_user"
	            }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    nama_user: {
                        minlength: "Nama minimal 4 karakter",
                        required: "Nama tidak boleh kosong"
                    },
                    foto_user: {
                        extension: "Tipe file tidak diizinkan"
                    },
                    email_user: {
                        email: "Masukan email yang valid",
                        required: "Email tidak boleh kosong",
                        remote: jQuery.validator.format("Email {0} Sudah digunakan")
                    },
                    user_name: {
                        minlength: "Username minimal 4 karakter",
                        required: "Username tidak boleh kosong",
                        remote: jQuery.validator.format("Username {0} Sudah digunakan")
                    },
                    pass_user: {
                        minlength: "Password minimal 6 karakter",
                        required: "Password tidak boleh kosong"
                    },
                    re_pass_user:{
                      equalTo: "Password konfirmasi salah"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

            $('#form_user input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_user').validate().form()) {
	                    $('#form_user').submit();
	                }
	                return false;
	            }
	    });

             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('.select2me', formuser).change(function () {
                formuser.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
    }

    var handleFormUserEdit = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var formuser = $('#form_user_edit');
            var error3 = $('.alert-danger', formuser);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            formuser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                    nama_user: {
                        minlength: 4,
                        required: true
                    },
                    foto_user: {
                        extension: "jpg|jpeg|png"
                    },
                    email_user: {
                        email: true,
                        required: true,
                        "remote":{
                            url: base_url+'master/user/cek_email',
                            type: "post",
                            data:
                                {
                                    email: function()
                                    {
                                        return $('#form_user_edit :input[name="email_user"]').val();
                                    },
                                    id: function()
                                    {
                                        return $('#form_user_edit :input[name="id"]').val();
                                    }
                                }
                        }
                    },
                    user_name: {
                        minlength: 4,
                        required: true,
                        "remote":{
                            url: base_url+'master/user/cek_username',
                            type: "post",
                            data:
                                {
                                    username: function()
                                    {
                                        return $('#form_user_edit :input[name="user_name"]').val();
                                    },
                                    id: function()
                                    {
                                        return $('#form_user_edit :input[name="id"]').val();
                                    }
                                }
                        }
                    },
                    pass_user: {
                        minlength: 6
                    },
                    re_pass_user: {
	                    equalTo: "#pass_user"
	            }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    nama_user: {
                        minlength: "Nama minimal 4 karakter",
                        required: "Nama tidak boleh kosong"
                    },
                    foto_user: {
                        extension: "Tipe file tidak diizinkan"
                    },
                    email_user: {
                        email: "Masukan email yang valid",
                        required: "Email tidak boleh kosong",
                        remote: jQuery.validator.format("Email {0} Sudah digunakan")
                    },
                    user_name: {
                        minlength: "Username minimal 4 karakter",
                        required: "Username tidak boleh kosong",
                        remote: jQuery.validator.format("Username {0} Sudah digunakan")
                    },
                    pass_user: {
                        minlength: "Password minimal 6 karakter"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

            $('#form_user_edit input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_user_edit').validate().form()) {
	                    $('#form_user_edit').submit();
	                }
	                return false;
	            }
	    });

             //apply validation on select2 dropdown value change, this only needed for chosen dropdown integration.
            $('.select2me', formuser).change(function () {
                formuser.validate().element($(this)); //revalidate the chosen dropdown value and show error or success message for the input
            });
    }

    var handleFormPages = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var formuser = $('#form_pages');
            var error3 = $('.alert-danger', formuser);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit
            formuser.on('submit', function() {
                for(var instanceName in CKEDITOR.instances) {
                    CKEDITOR.instances[instanceName].updateElement();
                }
            })

            formuser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                    judul: {
                        required: true
                    },
                    kategori:{
                        required: true
                    },
                    isi: {
                        required: true
                    },
                    tags: {
                        required: true
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    judul: {
                        required: "Judul tidak boleh kosong"
                    },
                    kategori: {
                        required: "Kategori tidak boleh kosong"
                    },
                    isi: {
                        required: "Isi tidak boleh kosong"
                    },
                    tags: {
                        required: "Tags tidak boleh kosong"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

            $('#form_pages input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_pages').validate().form()) {
	                    $('#form_pages').submit();
	                }
	                return false;
	            }
	    });
    }

    var handleFormKatArtikel = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#form_kategori');
            var error3 = $('.alert-danger', form3);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                    nama_kategori: {
                        required: true,
                        minlength: 3
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    nama_kategori: {
                        required: "Nama kategori tidak boleh kosong",
                        minlength: "Nama kategori minimal 3 karakter"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

                $('#form_kategori input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_kategori').validate().form()) {
	                    $('#form_kategori').submit();
	                }
	                return false;
	            }
	        });
    }

    var handleFormFile = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var formuser = $('#form_file');
            var error3 = $('.alert-danger', formuser);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            formuser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                  judul_file:{
                    required: true
                  },
                    userfile: {
                        required: true,
                        extension: "pdf|doc|zip|rar"
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                  judul_file:{
                    required: "Nama file tidak boleh kosong"
                  },
                    userfile: {
                        required: "Silahkan pilih file",
                        extension: "Tipe file tidak diizinkan"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

            $('#form_file input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_file').validate().form()) {
	                    $('#form_file').submit();
	                }
	                return false;
	            }
	    });
    }

    var handleFormFileEdit = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var formuser = $('#form_file_edit');
            var error3 = $('.alert-danger', formuser);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            formuser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                  judul_file:{
                    required: true
                  },
                    userfile: {
                        extension: "pdf|doc|zip|rar"
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                  judul_file:{
                    required: "Nama file tidak boleh kosong"
                  },
                    userfile: {
                        extension: "Tipe file tidak diizinkan"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

            $('#form_file_edit input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_file_edit').validate().form()) {
	                    $('#form_file_edit').submit();
	                }
	                return false;
	            }
	    });
    }


    var handleFormAlbum = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var form3 = $('#form_album');
            var error3 = $('.alert-danger', form3);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            form3.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                    nama_album: {
                        required: true,
                        minlength: 3
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    nama_album: {
                        required: "Nama album foto tidak boleh kosong",
                        minlength: "Nama album foto minimal 3 karakter"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

                $('#form_album input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_album').validate().form()) {
	                    $('#form_album').submit();
	                }
	                return false;
	            }
	        });
    }

    var handleFormPortofolio = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var formuser = $('#form_portofolio');
            var error3 = $('.alert-danger', formuser);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            formuser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                    'files[]': {
                        required: true,
                        extension: "gif|jpg|jpeg|png"
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'files[]': {
                        required: "Silahkan pilih gambar",
                        extension: "Tipe file tidak diizinkan"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

            $('#form_portofolio input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_portofolio').validate().form()) {
	                    $('#form_portofolio').submit();
	                }
	                return false;
	            }
	    });
    }

    var handleFormPortofolioData = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var formuser = $('#form_portofolio_data');
            var error3 = $('.alert-danger', formuser);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            formuser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                    'caption_portofolio[]': {
                        required: true
                    },
                    'lokasi_portofolio[]': {
                        required: true
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'caption_portofolio[]': {
                        required: "Caption tidak boleh kosong."
                    },
                    'lokasi_portofolio[]': {
                        required: "Lokasi tidak boleh kosong."
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

            $('#form_portofolio_data input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_portofolio_data').validate().form()) {
	                    $('#form_portofolio_data').submit();
	                }
	                return false;
	            }
	    });
    }

    var handleFormBanner = function() {
        // for more info visit the official plugin documentation:
        // http://docs.jquery.com/Plugins/Validation

            var formuser = $('#form_banner');
            var error3 = $('.alert-danger', formuser);

            //IMPORTANT: update CKEDITOR textarea with actual content before submit


            formuser.validate({
                errorElement: 'span', //default input error message container
                errorClass: 'help-block', // default input error message class
                focusInvalid: true, // do not focus the last invalid input
                ignore: "",
                rules: {
                    'banners[]': {
                        required: true,
                        extension: "jpg|jpeg|png"
                    }
                },

                messages: { // custom messages for radio buttons and checkboxes
                    'banners[]': {
                        required: "Silahkan pilih gambar",
                        extension: "Tipe file tidak diizinkan"
                    }
                },

                errorPlacement: function (error, element) { // render error placement for each input type
                    if (element.parent(".input-group").size() > 0) {
                        error.insertAfter(element.parent(".input-group"));
                    } else if (element.attr("data-error-container")) {
                        error.appendTo(element.attr("data-error-container"));
                    } else if (element.parents('.radio-list').size() > 0) {
                        error.appendTo(element.parents('.radio-list').attr("data-error-container"));
                    } else if (element.parents('.radio-inline').size() > 0) {
                        error.appendTo(element.parents('.radio-inline').attr("data-error-container"));
                    } else if (element.parents('.checkbox-list').size() > 0) {
                        error.appendTo(element.parents('.checkbox-list').attr("data-error-container"));
                    } else if (element.parents('.checkbox-inline').size() > 0) {
                        error.appendTo(element.parents('.checkbox-inline').attr("data-error-container"));
                    } else {
                        error.insertAfter(element); // for other inputs, just perform default behavior
                    }
                },

                invalidHandler: function (event, validator) { //display error alert on form submit
                    error3.show();
                    App.scrollTo(error3, -200);
                },

                highlight: function (element) { // hightlight error inputs
                   $(element)
                        .closest('.form-group').addClass('has-error'); // set error class to the control group
                },

                unhighlight: function (element) { // revert the change done by hightlight
                    $(element)
                        .closest('.form-group').removeClass('has-error'); // set error class to the control group
                },

                success: function (label) {
                    label
                        .closest('.form-group').removeClass('has-error'); // set success class to the control group
                },

                submitHandler: function (form) {
                    form.submit();
                    error3.hide();
                }
            });

            $('#form_banner input').keypress(function (e) {
	            if (e.which == 13) {
	                if ($('#form_banner').validate().form()) {
	                    $('#form_banner').submit();
	                }
	                return false;
	            }
	    });
    }

    return {
        //main function to initiate the module
        init: function () {
            handleFormSiswa();
            handleFormSiswaEdit();
            handleFormGuru();
            handleFormGuruEdit();
            handleFormFile();
            handleFormFileEdit();
            handleFormBanner();
            handleFormPortofolio();
            handleFormPortofolioData();
            handleFormUser();
            handleFormUserEdit();
            handleFormPages();
            handleFormKatArtikel();
            handleFormAlbum();
            handlePasswordStrengthChecker();
        }

    };

}();
