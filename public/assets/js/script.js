$(document).ready(function () {
    addToCart();
    remove_cart_item();


    function addToCart() {
        $("body").delegate(".product", "click", function (e) {
            e.preventDefault();
            let pid = $(this).attr("add");
            $.ajax({
                url: "/e_commerce/resources/checkout.php?p_id=" + pid + "",
                method: "GET",
                data: {
                    addToCart: 1,
                    p_id: pid
                },
                success: function (data) {
                    // console.log(data);
                    if (data == "user_identity_not_set") {
                        window.location.href = "/e_commerce/public/login.php";
                    }
                }
            });
        });

        cart_count();
        remove_cart_item();
        display_cart_items();
    }


    function display_cart_items() {
        $.ajax({
            url: "/e_commerce/resources/checkout.php",
            method: "POST",
            data: {
                get_cart_items: 1,
            },
            success: function (data) {
                // console.log(data);
                $("#get_cart_item").html(data);
            }
        })
    }


    function cart_count() {
        $.ajax({
            url: "/e_commerce/resources/functions.php",
            method: "POST",
            data: {
                cart_count: 1
            },
            success: function (data) {
                $("#cart_items").text(data);
                $("#cart_item").text(data);
            }
        })
    }

    function remove_cart_item() {
        $("body").delegate(".remove", "click", function (e) {
            e.preventDefault();
            let rem_id = $(this).attr("remove");
            $.ajax({
                url: "/e_commerce/resources/functions.php?rid=" + rem_id + "",
                method: "GET",
                data: {
                    remove: 1,
                    rid: rem_id
                },
                success: function (data) {
                    console.log(data);
                    window.location.href = "/e_commerce/public/cart";
                }

            })

        })
    }

    setInterval(() => {
        remove_cart_item();
        cart_count();
    }, 200);


    // email verification;
    $(".send").click(function (e) {

        e.preventDefault();

        let name = $(".name").val();
        let email = $(".email").val();
        let subject = $(".subject").val();
        let message = $(".message").val();

        $.ajax({
            url: "/e_commerce/resources/templates/back/mail.php",
            method: "POST",
            data: {
                "send": 1,
                "name": name,
                "email": email,
                "subject": subject,
                "message": message
            },
            success: function (data) {
                console.log(data);
                $(".notice").html(data);
                $(".form").trigger("reset");
            }
        });
    });


    document.getElementById("toggle-button").addEventListener("click", function (e) {
        e.preventDefault();

        $("#toggler").toggle("slow");
    });


});