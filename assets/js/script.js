$(document).ready(function(){
    fetchUsers();
    //Load the data on User Object
    function fetchUsers() {
        var action = "Load";
        //Use the ajax API
        $.ajax({
            url: "action.php", //Send request to action.php
            method: "POST",
            data: {action:action},
            success:function(data) {
                $("#result").html(data); //Display the result in tag
            }
        });
    }

    //This reset value of modal will load or update existing record.
    $("#modal_button").click(function() {
        $("#userModal").modal('show');
        $("#name").val('');
        $("#username").val('');
        $("#password").val('');
        $("#email").val('');
        $(".modal-title").text("Add New records");
        $("#action").val("Create Record");
    });

   //This code will create new data
   $("#action").click(function() {
        let name = $("#name").val();
        let username = $("#username").val();
        let password = $("#password").val();
        let email = $("#email").val();
        let user_id = $("#user_id").val();
        let action = $("#action").val();

       if (name != "" && username != "" && password != "" && email != "") {
            //Use ajax to fetch request
            $.ajax({
                url:"action.php",
                method: "POST",
                data: {
                    name:name,
                    username:username,
                    password:password,
                    email:email,
                    user_id:user_id,
                    action:action
                },
                success:function(data) {
                    alert(data);
                    $("#userModal").modal('hide');
                    fetchUsers(); //Fetch all users that added
                }
            });
    
        } else {
            alert("All fields are required");
        }
   });

   //Select data and show in the modal table
    $(document).on("click", ".update", function(){
        var id = $(this).attr("id"); // Get the ID of this button
        var action = "Select"; //Define the value of button action
            //Use ajax to fetch data in the table
        $.ajax({
            url:"action.php",
            method: "POST",
            data: {id:id,action:action},
            dataType:"json",
            success:function(data) {
                $("#userModal").modal("show");
                $('.modal-title').text('Update Records');
                $('#action').val("Update");
                $('#user_id').val(id); //This hidden input will have the value of ID in button
                $('#name').val(data.name);
                $('#username').val(data.username);
                $('#password').val(data.password);
                $('#email').val(data.email);
            }
        });  
   });

   //Delete data
   $(document).on('click','.delete' ,function(){
       var id = $(this).attr("id");
       
       if(confirm("Are you sure you want to delete this data")) {
            var action = "Delete";
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {id:id,action:action},
                success: function(data) {
                    fetchUsers();
                    alert(data);
                }
            });
       } else {
           return false
       }
   });

});