$(function() {
    get_current_user();
    get_data();
});

// 現在ログイン中のユーザーIDを取得
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
    let roomId = $('#room-id').val(); //入力された値を取得 
    $.ajax({
        url: "/messages/" + roomId,
        dataType: "json",
        success: data => {
            $("#messages")
            .find(".message")
            .remove();
            for (var i = 0; i < data.messages.length; i++) {

                //条件分岐・ログイン中ユーザーのメッセージは右側に来るようにする
                if (data.messages[i].user_id == current_user) {
                    var html = `
                    <div class="message">
                        <div class="right-message">
                            <p>${data.messages[i].content}</p>
                        </div>
                    </div>
                    `;
                } else {
                    var html = `
                    <div class="message">
                        <div class="left-message">
                            <p>${data.messages[i].content}</p>
                        </div>
                    </div>
                    `;
                }
                


                $("#messages").append(html);

            }
            //スクロールは常に最下部
            let target = document.getElementById('scroll');
            target.scrollIntoView(false); 
        },
        error: () => {
            alert("ajax Error");
        }
    });

    
    

}

/*

$('.post-area #post-btn').on('click', function post_message() {
    let roomId = $('#room-id').val(); //入力された値を取得 
    let content = $('#messege-content').val();
    $.ajaxSetup({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}
    });
    $.ajax({
        url: "/messages/" + roomId,
        type: 'POST',
        data: 
        {
            'messege-content': content, 
            '_method': 'POST'
        },
        dataType: "json",
    })
    // Ajaxリクエストが成功した場合
    .done(function(data) {
        $('.delete_message').text(data.content);
    })
    // Ajaxリクエストが失敗した場合
    .fail(function(data) {
        alert(content);
    });
});

*/



