
$(function() {
    get_data();
    get_current_user();
});

var current_user = "";

function get_current_user() {
    $.ajax({
        url: "/ajax_user/",
        dataType: "json",
        success: data => {
            
            current_user = data.user.id;
        },
        error: () => {
            alert("ajax Error");
        }
    });

    setTimeout("get_data()", 5000);
}

function get_data() {
    $.ajax({
        url: "/ajax/",
        dataType: "json",
        success: data => {
            $("#talk-data")
            .find(".talk-wrapper")
            .remove();
            for (var i = 0; i < data.talks.length; i++) {

                if (data.talks[i].user_id == current_user) {
                    console.log ("true!");
                }
                
                var html = `
                <div class="talk-wrapper">
                    <h4>${data.talks[i].title}</h4>  
                    <p>${data.talks[i].body.replace(/(\n|\r)/g, "<br/>")}</p>
                    <div class="talk-info">
                        <p>${data.talks[i].language} / ${data.talks[i].tool}</p>
                        <p>${data.talks[i].created_at}</p>
        
                    </div>
                </div>

                `;

                
                

                $("#talk-data").append(html);

            }
        },
        error: () => {
            alert("ajax Error");
        }
    });

    setTimeout("get_data()", 5000);
}



