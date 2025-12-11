$(document).ready(function() {

    $("#regForm").submit(function() {

        if ($("#fullname").val().trim() === "") {
            alert("Full name is required!");
            return false;
        }

        if ($("#phone").val().length !== 10) {
            alert("Phone number must be 10 digits!");
            return false;
        }

        return true; 
    });
});