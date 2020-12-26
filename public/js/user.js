$(function() {
    get_users();
});



function get_users() {
    $.ajax({
        url: "/ajax/users/",
        dataType: "json",
        success: data => {
            $("#user-data")
            .find(".users")
            .remove();
            for (var i = 0; i < data.user.length; i++) {
                console.log("yeah");
                
                
                var html = `
                <div class="users">
                    <p>${data.user[i].name}</p>  
                </div>

                `;

                
                

                $("#user-data").append(html);

            }
        },
        error: () => {
            alert("ajax Error");
        }
    });

    setTimeout("get_data()", 5000);
}