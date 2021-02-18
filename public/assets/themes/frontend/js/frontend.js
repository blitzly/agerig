$(document).ready(function () {
    // Onload
    // Style the homepage cats menu on hero
    $('.active-cat').parent().addClass("active");
    $(".nav a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
          $(this).parent().addClass("active");
    });// ./style cats menu

    $('.search-option').click(function(){
        var option = $(this).data('option');
        var dropdown = $("#select-item-to-compare");

        $.ajax({
            type: 'POST',
            url: "/page/update_hero",
            data: "option=" + option,
            dataType: 'text',
            success: function (data) {
                //console.log(data);
                var hero = jQuery.parseJSON(data);
                //console.log(hero.title);
                $('#hero-heading').html(hero.title);
                $('#hero-text').html(hero.description);
                dropdown.empty();
                for (var key in hero.products) {
                    dropdown.append('<option value="' + hero.products[key]['slug'] + '"> ' + hero.products[key]['name']  + ' </option>');
                }
            }
        });
    });

    $('#select-item-to-compare').on('change', function(){
        //alert($("#select-item-to-compare option:selected").val());
        //$(".country option:selected").val()
    })

    $('#btn-go-to-product').on('click', function(){
        window.location = "/product/compare/" + $("#select-item-to-compare option:selected").val();
        //alert("/product/view/" + $("#select-item-to-compare option:selected").val());
    })

    // Login
    $("#btn-login").click(function () {
        username = $("#username").val();
        password = $("#password").val();
        defa_controller = $("#defa_controller").val();
        defa_action = $("#defa_action").val();
        
        /*$.ajax({
            type: "POST",
            url: "/user/auth",
            data: "username=" + username + "&password=" + password,
            cache: "false",
            success: function (data) {
                console.log(data);
                if (data === 'true') {
                    $("#add_err").html("");
                    window.location = "/" + defa_controller + "/" + defa_action;
                } else {
                    $("#add_err").css('display', 'inline', 'important');
                    $("#add_err").css('color', 'red', 'important');
                    $("#add_err").html("Wrong username or password");
                    $("#preloader").html("");
                }
            },
            beforeSend: function ()
            {
                $("#add_err").css('display', 'none', 'important');
                $("#preloader").html("<i class='fa fa-spinner fa-spin'>");
            },
        });*/
    });

});