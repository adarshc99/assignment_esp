$(document).ready(function()
{
    $("input,#ActiveOrNot").focus(function()
    {
        $("#Perror").css("display","none");
    });
    $(document).on("click","button",function()
    {
        $("#Perror").css("display","none");
    });
    // delete product
    $(document).on("click",".deleteProduct",function()
    {

        let getid = $(this).attr("data-id");
        console.log(getid);
        let obj = {getid};
            fetch('../php/deleteProduct.php', 
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
                    if(json["status"] == true)
                    {$("#Perror").css({"display":"block","background-color":"green"});
                    $("#Perror").html("Product Deleted Succesfuly");
                    getAllData();}
                    else
                    {   $("#Perror").css({"display":"block","background-color":"green"});
                        $("#Perror").html(json["value"]);
                    }
            }); 
    });

    // show product
    $(document).on("click",".showProduct",function()
    {
        let getid = $(this).attr("data-id");
        let obj = {getid};
            fetch('../php/showProduct.php', 
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
                let status = ""
                if(json["value"]["status"] == "0")
                {
                    status = "Active";
                }
                else
                {
                    status = "Inactive";

                }
                $("#myModal").html(
                    `<div class="modal-dialog">
                        <div class="modal-content">

                        <div class="modal-header">
                            <h4 class="modal-title">Product Details</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            Product Name &nbsp ${json["value"]["pname"]}<br/>
                            Product Cateory &nbsp ${json["value"]["category"]}<br/>
                            Product Status &nbsp ${status}                            
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        </div>

                        </div>
                    </div>`);
                    $("#myModal").modal("show");
            }); 

    });

    // update Product
    var statusId = undefined;
    // console.log(statusId);
    $(document).on("click",".updateProduct",function()
    {
        let getid = $(this).attr("data-id");
        let obj = {getid};
            fetch('../php/showProduct.php', 
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
                if(json["status"] == true)
                {
                    $("#Pname").val(json["value"]["pname"]);
                    $("#category").val(json["value"]["category"]);
                    $("#ActiveOrNot").val(json["value"]["status"]);
                    // if(json["status"])
                    $("#status").html("UPDATE PRODUCT");
                    $("#addBtn").css("display","none");
                    $("#UpdateBtn").css("display","block");
                    statusId = json["value"]["id"];
                }
                else
                {
                    $("#Pname").val("");
                    $("#category").val("");
                    $("#ActiveOrNot").val("2");
                    // if(json["status"])
                    $("#status").html("Add Product");
                    $("#addBtn").css("display","block");
                    $("#UpdateBtn").css("display","none");
                    statusId = undefined;
                    showProductError(json["value"]);
                    getAllData();

                }
            }); 

    });

    // update user deatils onclick
    $(document).on("click","#UpdateBtn",function(e)
    {
        e.preventDefault();
        let productName = $("#Pname").val();
        let productCategory = $("#category").val();
        let productStatus = $("#ActiveOrNot").val();
        if(productName == "")
        {
            showProductError("Enter Product Name");
            return;
        }
        if(productCategory == "")
        {
            showProductError("Enter Product Category");
            return;
        }
        $("#Pname").val("");
        $("#category").val("");
        $("#ActiveOrNot").val("2");
        let obj = {productName,productCategory,productStatus,statusId};
        fetch('../php/updateProduct.php', 
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
            if(json["status"] == true)
            {
                $("#Pname").val("");
                $("#category").val("");
                $("#ActiveOrNot").val("2");
                // if(json["status"])
                $("#status").html("Add Product");
                $("#addBtn").css("display","block");
                $("#UpdateBtn").css("display","none");
                statusId = undefined;
                showProductError("Updated Successfully");
                getAllData();
            }
            else
            {
                showProductError(json["value"]);
            }
            
        }); 
    })


        
    // featch all data fuction
    var getAllData = () => 
    {
        fetch('../php/showAllProduct.php', 
        {
            method: 'GET',
            headers: {
                'Content-type': 'application/json',
            },
        })
        .then((response) => response.json())
        .then((json) => 
        {
            if(json["status"] == true)
            {
               let displayProduct = `<table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product Name</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>`;
               for(let i = 0 ;i<json["ProductArray"].length;i++)
               {
                        displayProduct+= `<tr class="table-warning">
                                            <td>${json["ProductArray"][i]["pname"]}</td>
                                            <td>${json["ProductArray"][i]["category"]}</td>
                                            <td>
                                                <div class="d-flex justify-content-start">
                                                    <button class="btn btn-denger mx-2 showBox showProduct" data-id=(${json["ProductArray"][i]["id"]})><span class="material-symbols-outlined">visibility</span></button>
                                                    <button class="btn btn-denger mx-2 deleteProduct" data-id=(${json["ProductArray"][i]["id"]})><span class="material-symbols-outlined">delete</span></button>
                                                    <button class="btn btn-denger mx-2 updateProduct" data-id=(${json["ProductArray"][i]["id"]})><span class="material-symbols-outlined">edit</span></button>
                                                </div>
                                            </td>
                                        </tr>`;
               }
               displayProduct+=`</table>`;
               $("#ProductItem").html(displayProduct);
            }
            else
            {
                $("#ProductItem").html(`<kbd>${json["value"]}</kbd>`)
            }
            
        }); 
    }
    getAllData();

    $("#addBtn").click(function(e)
    {
        e.preventDefault();
        let productName = $("#Pname").val();
        let productCategory = $("#category").val();
        let productStatus = $("#ActiveOrNot").val();
        if(productName == "")
        {
            showProductError("Enter Product Name");
            return;
        }
        if(productCategory == "")
        {
            showProductError("Enter Product Category");
            return;
        }
        if(productStatus == null)
        {
            showProductError("Select Product Status");
            return;
        }
        $("#Pname").val("");
        $("#category").val("");
        $("#ActiveOrNot").val("2");
        let obj = {productName,productCategory,productStatus};
        fetch('../php/addProduct.php', 
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
            if(json["status"] == true)
            {
                $("#Perror").css({"display":"block","background-color":"green"});
                $("#Perror").html("Product Insert Successfully");
                getAllData();
            }
            
        }); 

    })
    function showProductError(text)
    {
        $("#Perror").css("display","block");
        $("#Perror").html(text);
    }

});



