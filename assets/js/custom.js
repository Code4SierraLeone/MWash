$(function(){

    $('select').material_select();

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

    $(document).on('click', '#submit-wpu', function () {

        $('#submit-wpu').attr('id', 'submit-wp-id');

        $("#wp_id").parent().parent().show();
        $("#wpu").parent().parent().hide();

    });

    $(document).on('click', '#submit-wp-id', function () {

        var wpid = $("#wp_id").val();
        var wp = $("#wpu").val();

        if (wpid.length > 0 && wp.length != null) {

            $.ajax({

                type: 'GET',
                url: site_url + 'index.php/google_fusion/get/'+wpid,
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
                    $("#wsm_update").parent().parent().show();

                    if(wp == 'wsm'){
                        $('.wp_column_name').html('mechanic');
                        if(data[0].mechanic == 'No' || data[0].mechanic == null){
                            $('#init_msg').empty().append('The water point currently does not have a Mechanic. If you wish to update type the word Yes then click the update button');
                        }else if(data[0].mechanic == 'Yes'){
                            $('#init_msg').empty().append('The water point currently has a Mechanic. If you wish to update type the word No then click the update button');
                        }
                    }

                }
            });

        } else {

            Materialize.toast('Please Provide Water Point ID!', 4000);

        }

    });

    $(document).on('click', '#submit-wp-update', function () {

        var wsm_update = $('#wsm_update').val();
        //console.log(wsm_update);
        var rowid = $('.rowid').text();
        //console.log(rowid);
        var colnm = $('.wp_column_name').text();
        //console.log(colnm);

        $.ajax({

            type: 'GET',
            url: site_url + 'index.php/google_fusion/update/'+colnm+'/'+rowid+'/'+wsm_update,
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
                    $("#wsm_update").parent().parent().hide();
                    $('#init_msg').empty();
                    $('div.modal-content h4').css('text-align','center');
                    $('div.modal-content h4').html('Thank You For Your Contribution');
                    window.location.href = site_url+'index.php/explore';
                }
                console.log(data);
            }

        });

    });
});