$(function(){

    $('select').material_select();

    var site_url = $('body').attr('site-url');
    var wp;

    $('.modal').modal();

    $('.modal-trigger').modal();

    $('.button-collapse').sideNav({'edge': 'left'});

    var url = window.location.href;

    var urllength = url.split('/').length;

    var season_array = url.split('/')[urllength-1];

    var province_array = url.split('/')[urllength-2];

    console.log(province_array+' '+season_array);

    if(province_array == 'Northern'){
        $('#nth').addClass('active indigo lighten-1');
    }else if(province_array == 'Southern'){
        $('#sth').addClass('active indigo lighten-1');
    }else if(province_array == 'Eastern'){
        $('#est').addClass('active indigo lighten-1');
    }else if(province_array == 'Western'){
        $('#wst').addClass('active indigo lighten-1');
    }else if(province_array == 'all'){
        $('#allp').addClass('active indigo lighten-1');
    }

    if(season_array == 'Water'){
        $('#wyr').addClass('active indigo lighten-1');
    }else if(season_array == 'Seasonal'){
        $('#sea').addClass('active indigo lighten-1');
    }else if(season_array == 'Dry'){
        $('#dry').addClass('active indigo lighten-1');
    }else if(season_array == 'Unknown'){
        $('#unk').addClass('active indigo lighten-1');
    }else if(season_array == 'all'){
        $('#alls').addClass('active indigo lighten-1');
    }

    $(document).on('click', '#submit-wpu', function () {

        wp = $("#wpu").val();

        if(wp == null){
            Materialize.toast('You have not selected an attribute!', 4000);
        }else{
            $('#submit-wpu').attr('id', 'submit-wp-id');

            $("#wp_id").parent().parent().show();
            $("#wpu").parent().parent().hide();
        }


    });

    $(document).on('click', '#submit-wp-id', function () {

        var wpid = $("#wp_id").val();
        wp = $("#wpu").val();

        if (wpid.length > 0 && wp.length != null) {

            $.ajax({

                type: 'GET',
                url: site_url + 'index.php/fusion/get/'+wpid,
                dataType: 'json',
                beforeSend: function () {

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
                    //console.log(data[0].age);
                    console.log(wp);

                    $('#submit-wp-id').attr('id', 'submit-wp-update');
                    $('#submit-wp-update').html('Update');
                    $('.rowid').html(data[0].rowid);

                    $("#wp_id").parent().parent().hide();

                    if(wp == 'wsm'){

                        $("#wsm_update").parent().parent().show();
                        $('.wp_column_name').html('mechanic');
                        if(data[0].mechanic == 'No' || data[0].mechanic == null){
                            $('#init_msg').empty().append('The water point currently does not have a Mechanic. If you wish to update type the word Yes then click the update button');
                        }else if(data[0].mechanic == 'Yes'){
                            $('#init_msg').empty().append('The water point currently has a Mechanic. If you wish to update type the word No then click the update button');
                        }

                    }else if(wp == 'mngr'){

                        $("#mngr_update").parent().parent().show();
                        $('.wp_column_name').html('manager');
                        $('#init_msg').empty().append('The water point is managed by '+data[0].manager+'. If you wish to update type either (Community committee, Private Person, SALWACO, Religious Group, None Or Other)');

                    }else if(wp == 'chw'){

                        $("#chw_update").parent().parent().show();
                        $('.wp_column_name').html('chlorine');
                        if(data[0].chlorine == 'Yes'){
                            $('#init_msg').empty().append('The water point is chlorinated. If you wish to update type either (No Or Unknown)');
                        }else if(data[0].chlorine == 'No'){
                            $('#init_msg').empty().append('The water point is not chlorinated. If you wish to update type (Yes Or Unknown)');
                        }else if(data[0].chlorine == 'unknown' || data[0].chlorine == null || data[0].chlorine == undefined){
                            $('#init_msg').empty().append('Their is no sufficient info about the condition of the water. If you wish to update type either (Yes Or No)');
                        }

                    }else if(wp == 'wsq'){

                        $("#wsq_update").parent().parent().show();
                        $('.wp_column_name').html('qual');
                        if(data[0].qual == 'Clean (good smell- taste and color)' || data[0].qual == 'Clean'){
                            $('#init_msg').empty().append('The water quality is clean. If you wish to update type (Not Clean)');
                        }else if(data[0].qual == 'Not clean' || data[0].qual == 'Not Clean'){
                            $('#init_msg').empty().append('The water quality is not clean. If you wish to update type Clean');
                        }else if(data[0].qual == null || data[0].qual == undefined){
                            $('#init_msg').empty().append('The water quality is unknown. If you wish to update type either (Clean Or Not Clean)');
                        }
                    }

                }
            });

        } else {

            Materialize.toast('Please Provide Water Point ID!', 4000);

        }

    });

    $(document).on('click', '#submit-wp-update', function () {

        var rowid = $('.rowid').text();
        var colnm = $('.wp_column_name').text();
        var wp_update;

        wp = $("#wpu").val();

        if(wp == 'wsm'){
            wp_update = $('#wsm_update').val();
        }else if(wp == 'mngr'){
            var caps = capitalize_Words($('#mngr_update').val());
            wp_update = caps.replace(/ /g, '');
        }else if(wp == 'chw'){
            wp_update = $('#chw_update').val();
        }else if(wp == 'wsq'){
            wp_update = $('#wsq_update').val();
        }

        $.ajax({

            type: 'GET',
            url: site_url + 'index.php/fusion/update/'+colnm+'/'+rowid+'/'+wp_update,
            dataType: 'json',
            beforeSend: function () {

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

                if(data[0].affected_rows == '1'){
                    $("#submit-wp-update").remove();
                    if(wp == 'wsm'){
                        $("#wsm_update").parent().parent().hide();
                    }else if(wp == 'mngr'){
                        $("#mngr_update").parent().parent().hide();
                    }else if(wp == 'chw'){
                        $("#chw_update").parent().parent().hide();
                    }else if(wp == 'wsq'){
                        $("#wsq_update").parent().parent().hide();
                    }
                    $('#init_msg').empty();
                    $('div.modal-content h4').css('text-align','center');
                    $('div.modal-content h4').html('Thank You For Your Contribution');
                    window.location.href = site_url+'index.php/explore';
                }
                console.log(data);
            }

        });

    });

    $('#sub1').on('click', function () {

        $('#submit-subscription').attr('id', 'submit-subscription-sub1').show();

        $(this).parent().parent().hide();
        $('#sub2').parent().parent().hide();
        $('#prov_id').parent().parent().show();
        $('#dist_id').parent().parent().show();
        $('#chief_id').parent().parent().show();
        $('#phone').parent().parent().show();

    });
    $('#sub2').on('click', function () {

        $('#submit-subscription').attr('id', 'submit-subscription-sub2').show();

        $(this).parent().parent().hide();
        $('#sub1').parent().parent().hide();
        $('#waterp_id').parent().parent().show();
        $('#phone').parent().parent().show();

    });

    $(document).on('click', '#submit-subscription-sub1', function () {

        var data = $("#subcription-form").serialize();

        var provid = $('#prov_id').val();
        var distid = $('#dist_id').val();
        var chiefid = $('#chief_id').val();
        var phone = $('#phone').val();

        if(provid.length > 0 && distid.length > 0 && chiefid.length > 0 && phone.length > 0){

            $.ajax({

                type : 'POST',
                url  : site_url+'index.php/subserv/add/one',
                data : data,
                dataType: 'json',
                beforeSend: function()
                {
                    $('div.modal-content div.row').css({'opacity':'0'});
                    $('.modal-content').css({
                        'background-color':'rgba(0, 0, 0, 0.37)',
                        'background-image':'url('+site_url+'/assets/img/loader.gif',
                        'background-position':'center',
                        'background-repeat':'no-repeat'});
                },
                success :  function(data)
                {
                    $('div.modal-content div.row').css({'opacity':''});
                    $('.modal-content').css({
                        'background-color':'',
                        'background-image':'',
                        'background-position':'',
                        'background-repeat':''});

                    $('#init_sub_msg').empty();
                    $('#prov_id').parent().parent().hide();
                    $('#dist_id').parent().parent().hide();
                    $('#chief_id').parent().parent().hide();
                    $('#phone').parent().parent().hide();
                    $('div.modal-content h4').css('text-align','center');
                    $('div.modal-content h4').html('Awesome, check your phone later for a confirmation message...');
                    window.setTimeout(function(){

                        window.location.href = site_url+'index.php/explore';

                    }, 3000);

                    console.log(data);
                }
            });

        }else{
            Materialize.toast('Please fill all inputs!', 4000);
        }
    });

    $(document).on('click', '#submit-subscription-sub2', function () {

        var data = $("#subcription-form").serialize();

        var waterpid = $('#waterp_id').val();
        var phone = $('#phone').val();

        if(waterpid.length > 0 && phone.length > 0){

            $.ajax({

                type : 'POST',
                url  : site_url+'index.php/subserv/add/two',
                data : data,
                dataType: 'json',
                beforeSend: function()
                {
                    $('div.modal-content div.row').css({'opacity':'0'});
                    $('.modal-content').css({
                        'background-color':'rgba(0, 0, 0, 0.37)',
                        'background-image':'url('+site_url+'/assets/img/loader.gif',
                        'background-position':'center',
                        'background-repeat':'no-repeat'});
                },
                success :  function(data)
                {
                    $('div.modal-content div.row').css({'opacity':''});
                    $('.modal-content').css({
                        'background-color':'',
                        'background-image':'',
                        'background-position':'',
                        'background-repeat':''});

                    $('#init_sub_msg').empty();
                    $('#waterp_id').parent().parent().hide();
                    $('#phone').parent().parent().hide();
                    $('div.modal-content h4').css('text-align','center');
                    $('div.modal-content h4').html('Awesome, check your phone later for a confirmation message...');
                    window.setTimeout(function(){

                        window.location.href = site_url+'index.php/explore';

                    }, 3000);

                    console.log(data);
                }
            });

        }else{
            Materialize.toast('Please fill all inputs!', 4000);
        }
    });
});

function capitalize_Words(str)
{
    return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
}