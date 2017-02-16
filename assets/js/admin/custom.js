$(function(){

    var site_url = $('body').attr('site_url');

    $('select').material_select();

    $('.button-collapse').sideNav();

    get_subscribers();
    get_community_updates();
    get_last_row();
    
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

    function get_last_row() {

        $.ajax({
            type: 'GET',
            url: site_url + 'index.php/fusion/getlast',
            dataType: 'json'
        }).done(function(data){

            var nwid = parseInt(data[0].cartodb_id) + 1;

            $('#newid').val(nwid);

        });
    }

    $('#dash_menu').on('click',function () {
        $('#dashboard').show();
        $('#addwp').hide();
    });

    $('#add_wp_menu').on('click',function () {
        $('#dashboard').hide();
        $('#addwp').show();
    });

});