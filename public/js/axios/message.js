var app = new Vue ({
    el: '#app',
    //jsonファイルのbpi部分を格納するプロパティの作成
    data: {
        current_user: null,
        messages: null,
        hasError: false,
        mine: true,
        others: false,
    },
    mounted: function() {
        let roomId = $('#room-id').val(); //入力された値を取得 

        //Promis.allで複数APIを取得
        Promise.all([
        axios.get('/ajax_user'),
        axios.get('/messages/' + roomId)
        ])

        // responsesにapiの戻り値が入る。
        .then(function(responses){
            this.current_user = responses[0].data.user.id
            this.messages = responses[1].data.messages
            
        }.bind(this))
        .catch(function(error){
            console.log(error)
            this.hasError = true
        }.bind(this))
    }
})