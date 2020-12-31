$('.search-area .btn-search').on('click', function get_users() {
    $('#user-data').empty();
    let userName = $('#search-user').val(); //入力された値を取得

    if (!userName) {
        return false;
    } 


    $.ajax({
        type: 'GET',
        url: "/search/" + userName,
        data: {
            'search-user': userName, 
        },
        dataType: "json",
        beforeSend: function () {
            $('.loading').removeClass('display-none');
        }
    })
    
    .done(function (data) {
        let html = '';
        $.each(data, function (index, value) {

            for (var i = 0; i < value.length; i++) {

                let name = value[i].name;
                let id = value[i].id;

                if (!value[i].image) {
                    var img = 'noicon.jpg';
                } else {
                    var img = 'storage/' + value[i].image;
                }
                       
                html = `
                <div class="users">
                    <a href="/user/show?id=${id}"></a>
                    <img src="/storage/${img}" id="img">
                    <div class="info">
                        <p>${name}</p>
                    </div> 
                </div>
                        `

                $('#user-data').append(html);
            }
        })
        

    }).fail(function () {
        alert("ajax Error");    
    });
    
});

//enter入力でもon clickイベントを発生させる。
$("#search-user").keypress(function(key){
    if(key.which == 13){
      $(".search-area .btn-search").click();
    }
});
