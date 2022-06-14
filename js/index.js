$(document).ready(function()
{   $("form input").focus(function()
    {
        $("h5").css("display","none");
    });
    $(document).on("click","#loginBtn",function(e)
    {
        e.preventDefault();
        let loginEmail = $("#email").val();
        let loginPwd = $("#pwd").val();
        // $("h5").css("display","block");
        if(loginEmail == "")
        {
            showloginError("Enter Email");
            return;
        }
        if(loginPwd == "")
        {
            showloginError("Enter Password");
            return;
        }
        let obj = {loginEmail,loginPwd};
        fetch('php/login.php', 
        {
            method: 'POST',
            body: JSON.stringify(obj),
            headers: {
                'Content-type': 'application/json',
            },
        })
        .then((response) => response.json())
        .then((json) => 
        {
            if(json["status"] == false)
            {
                showloginError(json["value"]);
                return;
                
            }
            else
            {
                location.assign("php/productList_addProduct.php");
            }
            
        });   
    });
    $(document).on("click","#signupBtn",function(e)
    {
        e.preventDefault();
        let signName = $("#SignName").val();
        let signEmail = $("#SignEmail").val();
        let signPhone = $("#SignPhone").val();
        let signPassword = $("#SignPwd").val();
        if(signName == "")
        {
            showsignError("Enter Name");
            return; 
        }
        if(signEmail == "")
        {
            showsignError("Enter Email");
            return; 
        }
        if(signPhone == "")
        {
            showsignError("Enter Phone Number");
            return; 
        }
        if(signPassword == "")
        {
            showsignError("Enter Password");
            return; 
        }
        if(Number.isNaN(signPhone) == true || signPhone.length != 10)
        {
            showsignError("Enter Valid Phone Number");
            return;
        }
        let x=signEmail;  
        let atposition=x.indexOf("@");  
        let dotposition=x.lastIndexOf(".");  
        if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length)
        {  
            showsignError("Enter a valid email address");
            return;  
        }  
        // console.log(signName,signEmail,signPhone,signPassword);
        let obj = {signName,signEmail,signPhone,signPassword};
        $("#SignName").val("");
        $("#SignEmail").val("");
        $("#SignPhone").val("");
        $("#SignPwd").val("");
        fetch('php/signup.php', 
        {
            method: 'POST',
            body: JSON.stringify(obj),
            headers: {
                'Content-type': 'application/json',
            },
        })
        .then((response) => response.json())
        .then((json) => 
        {
            console.log(json);
            if(json["status"] == false)
            {
                showsignError("User Already Exsist");
            }
            else
            {
                location.assign("php/productList_addProduct.php");
            }
        });    
    });


});
function showloginError(text)
{
    $("#loginError").html(text);
    $("#loginError").css("display","block");
}
function showsignError(text)
{
    $("#signupError").css("display","block");
    $("#signupError").html(text);
    return;
}