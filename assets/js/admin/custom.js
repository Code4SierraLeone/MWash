$(function(){

    var site_url = $('body').attr('site_url');

    $('select').material_select();

    $('.modal').modal({
        complete: function() {

            $('#update-username')[0].reset();
            $('#u_resp').empty();
            $('#update-email')[0].reset();
            $('#e_resp').empty();
            $('#update-password')[0].reset();
            $('#p_resp').empty();

        }
    });

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

    $('#submit-nwp').on('click', function () {

        var data = $('#nwp-form').serialize();

        var newid = $('#newid').val().length;
        var nwlon = $('#nw_lon').val().length;
        var nwlat = $('#nw_lat').val().length;
        var nwname = $('#nw_name').val().length;
        var nwused = $('#nw_used').val();
        var nwprov = $('#nw_prov').val().length;
        var nwdist = $('#nw_dist').val().length;
        var nwchief = $('#nw_chief').val().length;
        var nwsection = $('#nw_section').val().length;
        var nwparts = $('#nw_parts').val();
        var nwmechanic = $('#nw_mechanic').val();
        var nwmoney = $('#nw_money').val();
        var nwage = $('#nw_age').val().length;
        var nwmanager = $('#nw_manager').val().length;
        var nwfunct = $('#nw_funct').val();
        var nwwtype = $('#nw_wtype').val();
        var nwchlorine = $('#nw_chlorine').val();
        var nwseason = $('#nw_season').val();
        var nwquality = $('#nw_quality').val();

        if(newid > 0 && nwlon > 0 && nwlat > 0 && nwname > 0 && nwused != null && nwprov > 0 && nwdist > 0 && nwchief > 0 && nwsection > 0 && nwparts != null && nwmechanic != null && nwmoney != null && nwage > 0 && nwmanager > 0 && nwfunct != null && nwwtype != null && nwchlorine != null && nwseason != null && nwquality != null) {

            $.ajax({
                type: 'POST',
                url: site_url + 'index.php/fusion/newdatarow',
                data: data,
                dataType: 'json',
            }).done(function (data) {

               if(data[0].rowid > 0){
                   Materialize.toast('Water Point Added!..Redirecting...', 4000);
                   window.setTimeout(function(){
                       window.location.href = site_url+'index.php/dash';
                   }, 3000);
               }

            });

        }else{

            Materialize.toast('You Have Empty Fields!');

        }

    });

    $('#submit-username-update').on('click', function () {

        var data = $('#update-username').serialize();

        $.ajax({
            type: 'POST',
            url: site_url + 'index.php/dash/users/updateinfo',
            data: data,
            dataType: 'json',
        }).done(function (data) {

            if(data['resp'] == 1){
                Materialize.toast('Username Updated, You will be logged out out in 5 seconds...', 5000);
                window.setTimeout(function () {
                    window.location.href = site_url + 'index.php/logout';
                }, 5000);
                $('#update-username')[0].reset();
                $('#u_resp').empty();
            }else{
                $('#u_resp').html(data);
            }

        });
    });

    $('#submit-email-update').on('click', function () {

        var data = $('#update-email').serialize();

        $.ajax({
            type: 'POST',
            url: site_url + 'index.php/dash/users/updateinfo',
            data: data,
            dataType: 'json',
        }).done(function (data) {

            if(data['resp'] == 1){
                Materialize.toast('Email Updated', 5000);
                $('#update-email')[0].reset();
                $('#e_resp').empty();
            }else{
                $('#e_resp').html(data);
            }

        });
    });

    $('#submit-password-update').on('click', function () {

        var data = $('#update-password').serialize();

        $.ajax({
            type: 'POST',
            url: site_url + 'index.php/dash/users/updateinfo',
            data: data,
            dataType: 'json',
        }).done(function (data) {

            if(data['resp'] == 1){
                Materialize.toast('Password Updated', 5000);
                $('#update-password')[0].reset();
                $('#p_resp').empty();
            }else{
                $('#p_resp').html(data);
            }

        });
    });

});