function checkAdminStuLogin() {
    console.log("Login Checked!......");
    var adminLogEmail = $("#adminLogEmail").val();
    var adminLogPass = $("#adminLogPass").val();

    $.ajax({
        url: "Admin/admin.php",
        method: "POST",
        data: {
            checkAdminLogemail: "checklogmail",
            adminLogEmail: adminLogEmail,
            adminLogPass: adminLogPass,
        },
        success: function(data) {
            console.log(data);
            if (data == 0) {
                $("#successAdminLogMsg").html('<small class="border-text border-danger">Invalid email or password!</small>');
            } else if (data == 1) {
                $("#successAdminLogMsg").html('<small class="spinner-border text-primary" role="status""><span class="visually-hidden">Loading...</span></small>');
                setTimeout(function() {
                    window.location.href = "Admin/adminDashboard.php";
                }, 1200);
            } 
        },
    });
}
