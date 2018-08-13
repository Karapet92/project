$(function () {

    $('#email').on('blur',function () {
        var email = $(this).val();
        var data = {
            'a':email
        };
        $.ajax({

            url:'emailValidation.php',
            method:"post",
            data:data,
            dataType:'json',
            success:function (res) {
                if(res){

                    $('#error').html(res.error);
                }
                else {
                    $('#error').html(' ');
                }
            }


        })


    });


    $('#edit').on('submit',function (event) {
        event.preventDefault();
        var action = $(this).attr('action');
        var data = $(this).serialize();
        console.log(action);
        $.ajax({

            url: action,
            method: "post",
            data: data,
            dataType: 'json',
            success: function (res) {

                if (res) {
                    $('#f_name').html(res.name);
                    $('#l_name').html(res.lastname);
                    $('#myModal').modal('hide');

                }
            }

        })
        });

        $('#editt').on('submit', function (event) {
            event.preventDefault();
            var action = $(this).attr('action');
            var form = $(this);
            var data = new FormData(this);
            console.log(data);

            $.ajax({

                url: action,
                method: "post",
                data: data,
                cache:false,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (res) {
                    console.log(res);
                    if (res) {
                        console.log(res);
                        $('#tit').html(res.title);
                        $('#desc').html(res.description);

                        $('#im').attr('src','blog/'+res.img_name);
                        $('#img1').attr('src','blog/'+res.img_name);
                        $('#current_image').attr('value',res.img_name);
                        $('#myModal').modal('hide');

                    }
                }


            });
        });


       /* $('[data-fancybox="gallery"]').fancybox({
            loop: true
        });*/

        $(".home").on("click", function (e) {
            console.log($(this))
            //event.preventDefault();
            $('.active').removeClass("active");
            $(this).addClass("active");

        });

        $('#search').on('click', function () {
            $.ajax({

                url: 'search.php',
                method: "post",
                dataType: 'json',
                success: function (res) {
                    $("#search").autocomplete({
                        source: res
                    });
                }


            })
        })

    $('.page').on('click',function (event) {
        event.preventDefault();
        var pageid = $(this).data('pageid');
       // console.log(pageid)
        $.ajax({

            url: 'blog.php?page_id='+pageid,
            method: "get",
            dataType: 'html',
            success: function (res) {
                console.log(res);
                $('body').html(res)
            }


        })


    })


    });


