$(function(){

    var site_url = $('body').attr('site_url');

    $('.button-collapse').sideNav();

    get_subscribers();
    get_community_updates();
    
    function get_subscribers() {

        $.ajax({
            type: 'GET',
            url: site_url + 'index.php/sub/getsubno',
            dataType: 'json'
        }).done(function(data){

            $('#alertscount').html(data);

        });
    }

    function  get_community_updates() {

        $.ajax({
            type: 'GET',
            url: site_url + 'index.php/community/getupdates',
            dataType: 'json'
        }).done(function(data){

            $('#comupdatescount').html(data);

        });

    }

});