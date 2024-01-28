$(document).ready(function(){
    //Ajax call for checking existing email
    $("#stuemail").on("keypress blur", function(){
        var reg=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var stuemail = $("#stuemail").val();
        $.ajax({
            url: "Student/addstudent.php",
            method: "POST",
            data: {
                checkemail: "checkemail",
                stuemail: stuemail,
            },
            success: function(data){
                // console.log(data);
                // Handle the response data here

                if (data !=0) {
                    $("#statusMsg2").html('<small style="color:red"> Email ID Already!</small>');
                    $("#signup").attr("disabled", true); // Added # before signup
                }else if(data ==0 && reg.test(stuemail)){
                    $("#statusMsg2").html('<small style="color:green">Email: There you go!</small>');
                    $("#signup").attr("disabled", false); // Added # before signup
                }else if (!reg.test(stuemail)) {
                    $("#statusMsg2").html('<small style="color:red"> Valid Email! Example@gmail.com</small>');
                    $("#signup").attr("disabled", false);
                }
                if (stuemail =="") {
                    $("#statusMsg2").html('<small style="color:red">Enter your Email!</small>');
                }
                                         
            },
        });
    });
});

function addStu() {
    var reg=/^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
    var stuname = $("#stuname").val();
    var stuemail = $("#stuemail").val();
    var stupass = $("#stupass").val();

    //check Fomr fields on Fomr submission
    if(stuname.trim()== ""){
        $("#statusMsg1").html('<small style="color:red">Please Enter name!</small>');
        $("#stuname").focus();
        return false;
    }else if(stuemail.trim()==""){
        $("#statusMsg2").html('<small style="color:red"> Please Enter your email!</small>');
        $("#stuemail").focus();
        return false;
    
    }else if (stuemail.trim() != "" && !reg.test(stuemail)) {
        $("#statusMsg2").html('<small style="color:red"> Please Enter valid Email e.g example@gmail.com</small>');
        $("#stuemail").focus();
        return false;
    }
    
    else if(stupass.trim()==""){
        $("$statusMsg3").html('<small style="color:red"> Please Enter your passwords!</small>');
        $("#stupass").focus();
        return false;
    }else{
        $.ajax({
            url: "Student/addstudent.php",
            method: "POST",
            dataType: "json",
            data: {
                stusignup: "stusignup",
                stuname: stuname,
                stuemail: stuemail,
                stupass: stupass
            },
            success: function(data) {
                console.log(data); 
                if(data=="OK"){
                    $("#successMsg").html("<span class='alert alert-success'>Registeration successfully!");
                    clearStuRegField();
                }
                else if(data=="Failed"){
                    $("#successMsg").html("<span class='alert alert-danger'>Unable Registeration !</span>");
                }             
            }
        });
    }
}
//Empty all Fiels
function clearStuRegField(){
    $("#stuRegForm").trigger("reset");
    $("#statusMsg1").html(" ");
    $("#statusMsg2").html(" ");
    $("#statusMsg3").html(" ");
}
//Ajax call for student Login Verification 
function checkStuLogin() {
    console.log("Login Checked!");
    var stuLogEmail = $("#stuLogemail").val();
    var stuLogPass = $("#stuLogpass").val();
    
    $.ajax({
        url: "Student/addstudent.php",
        method: "POST",
        data: {
            checkLogemail: "checklogmail",
            stuLogEmail: stuLogEmail,
            stuLogPass: stuLogPass,
        },
        success: function(data) {
            console.log(data);
            if (data ==0) {
                $("#successLogMsg").html('<small class="border-text border-danger">Email or password is invalid!</small>');
                            
            } else if (data ==1) {
                $("#successLogMsg").html('<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>');
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 1000);
            } 
        },
    });
}

  
  