jQuery(document).ready(function () {

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "Please fix this field.",
        email: "",
        number: "Please enter a valid number.",
        maxlength: jQuery.validator.format("Please enter no more than {0} characters."),
        minlength: jQuery.validator.format("Please enter at least {0} characters."),
        rangelength: jQuery.validator.format("Please enter a value between {0} and {1} characters long."),
        range: jQuery.validator.format("Please enter a value between {0} and {1}."),
        max: jQuery.validator.format("Please enter a value less than or equal to {0}."),
        min: jQuery.validator.format("Please enter a value greater than or equal to {0}.")
    });

    $(document).ready(function () {
        $("#codeId").inputmask({ "mask": "999999" }); //specifying options
    });

    $("#formId").validate({
        highlight: function (element) { // hightlight error inputs
            $(element).addClass('has-error'); // set error class to the control group   
        },

        unhighlight: function (element) { // revert the change done by hightlight
            $(element).removeClass("has-error");
        },
        onfocusout: function (el) {
            $(el).valid();
        }.bind(this),

        submitHandler: function (form) {
            var params = $("#formId").serializeArray();
            var url = "backend/ctrl.php";

            $.post(url, params, function (result) {



                if (result.success) {
                    $(document).ready(function () {
                        $("#formContentDiv").hide();
                        $("#formResultDiv").show();
                    });
                    $("#resultMsg").text(result.message);
                } else {
                    $("#formErrorDiv").show();
                    $("#resultMsgError").text(result.message);
                }


            }, 'json')
                .fail(function (jqxhr, textStatus, error) {
                    var e = textStatus + ", " + error;
                    alert(e);
                });
        }.bind(this)
    });






















});