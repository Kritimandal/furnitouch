$(document).ready(function(){
    $("form").validate({
        rules: {
            name:{
                minlength: 3,
                maxlength: 20,
                required: true
            },
			address:{
                minlength: 3,
                maxlength: 20,
                required: true
            },
            email:{
                minlength: 3,
                maxlength: 50,
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error').addClass('has-success');
        }
    });
}); 
