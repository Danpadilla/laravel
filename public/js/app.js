$(function () {
    app.addEventBotton();
});
var app = {
    addEventBotton:function(){
        $( ".btnSubmit" ).click(function( event ) {
            app.sendPost();
            event.preventDefault();
        });

    },
    sendPost:function () {
        app.setToken();
        $('.spine').show();
        let divElement=$('.responsed');
        $.ajax({
            method: "POST",
            url: "/send-post",
            data: {'urlpost':'https://atomic.incfile.com/fakepost'},
            beforeSend: function (r) {
                //LoaderShow();
            },
            success: function (r) {
                console.log(r);
                switch (r.status){
                    case 200:
                        divElement.empty();
                        divElement.append('<li class="list-group-item"><strong>urlpost:</strong>'+r.urlpost+'</li>');
                        divElement.append('<li class="list-group-item"><strong>httpPostStatus:</strong>'+r.httpPostStatus+'</li>');
                        divElement.append('<li class="list-group-item"><strong>clientError:</strong>'+r.clientError+'</li>');
                        divElement.append('<li class="list-group-item"><strong>responseBody:</strong>'+r.body+'</li>');
                        divElement.append('<li class="list-group-item"><strong>status:</strong>'+r.status+'</li>');
                        divElement.append('<li class="list-group-item"><strong><code>[save in db temporal]</code></li>');
                        divElement.append('<li class="list-group-item"><strong>user name:</strong>'+r.data.savein.name+'</li>');
                        divElement.append('<li class="list-group-item"><strong> mail:</strong>'+r.data.savein.mail+'</li>');
                        divElement.append('<li class="list-group-item"><strong> dbtemporal:</strong>'+r.data.savein.db+'</li>');
                        break;
                }

            } 
        });
    },
    setToken:function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }

};
