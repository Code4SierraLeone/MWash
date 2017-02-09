$(function(){

    var site_url = $('body').attr('site-url');

    $('.modal').modal();

    $('.modal-trigger').modal();

    $('.button-collapse').sideNav({'edge': 'left'});

    var url = window.location.href;

    if(url.indexOf("?") > -1) {
        var params = url.split('?')[1].split('&');
        for(var i =0;i<params.length;i++){
            var temp = params[i].split('=');
            var key   = temp[0];
            var value = temp[1];
            console.log(key +':'+value);
        }
    }else{
        $('#allp').addClass('active indigo lighten-1');
    }

    if(value == 'Northern'){
        $('#nth').addClass('active indigo lighten-1');
    }else if(value == 'Southern'){
        $('#sth').addClass('active indigo lighten-1');
    }else if(value == 'Eastern'){
        $('#est').addClass('active indigo lighten-1');
    }else if(value == 'Western'){
        $('#wst').addClass('active indigo lighten-1');
    }

    $("#submit-wp-id").on('click', function () {

        console.log('em')

        //var data = $("#login-form").serialize();

        var wpid = $("#wp_id").val();

        if (wpid.length > 0) {

            $.ajax({

                type: 'GET',
                url: site_url + 'index.php/google_fusion/'+wpid,
                dataType: 'json',
                beforeSend: function () {
                    // background-color: rgba(0, 0, 0, 0.37);
                    // background-image: url(../assets/img/loader.gif);
                    // background-position: center;
                    // background-repeat: no-repeat;
                    $('div.modal-content div.row').css({'opacity':'0'});
                    $('.modal-content').css({
                        'background-color':'rgba(0, 0, 0, 0.37)',
                        'background-image':'url('+site_url+'/assets/img/loader.gif',
                        'background-position':'center',
                        'background-repeat':'no-repeat'});
                },
                success: function (data) {

                    $('div.modal-content div.row').css({'opacity':''});
                    $('.modal-content').css({
                        'background-color':'',
                        'background-image':'',
                        'background-position':'',
                        'background-repeat':''});
                    console.log(data);

                }
            });

        } else {

            alert('Please Provide Water Point ID');

        }

    });
});