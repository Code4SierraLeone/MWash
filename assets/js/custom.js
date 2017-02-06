$(function(){

    $('.modal').modal();

    $('.modal-trigger').modal();

    $('.button-collapse').sideNav({'edge': 'left'});

    var url = window.location.href;
    var params = url.split('?')[1].split('&');
    for(var i =0;i<params.length;i++){
        var temp = params[i].split('=');
        var key   = temp[0];
        var value = temp[1];
        console.log(key +':'+value);
    }

    if(value == 'Northern'){
        $('#nth').addClass('active indigo lighten-1');
    }else if(value == 'Southern'){
        $('#sth').addClass('active indigo lighten-1');
    }else if(value == 'Eastern'){
        $('#est').addClass('active indigo lighten-1');
    }else if(value == 'Western'){
        $('#wst').addClass('active indigo lighten-1');
    }else{
        $('#allp').addClass('active indigo lighten-1');
    }
});