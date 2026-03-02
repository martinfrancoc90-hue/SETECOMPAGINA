window.addEventListener("scroll", () => {
  let nav = document.getElementsByTagName('nav')
  if (window.scrollY > 100) {
    nav[0].classList.add("black")
  } else {
    nav[0].classList.remove("black")
  }
})

window.onscroll = function () {
  scrollFunction();
};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    $('#buttom-to-top').css({
      'display': 'block'
    });
  } else {
    $('#buttom-to-top').css({
      'display': 'none'
    });
  }
}

function topFunction() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

$(document).ready(function() {
    $('.loader-container').css({'visibility': 'hidden', 'opacity': 0});
    $('.menu ul .lito').click(function (e) {
        e.stopPropagation();
        let link = $(e.currentTarget).find('.link')
        let win = window.open(link.attr('href'), link.attr('target'));
        win.focus();
        $('.menu ul .lito').removeClass("activo");
        $(this).addClass("activo");
    });


    $('.menu ul').change(function () {
        $(this).find('li').removeClass("activo");
    });

    /*Hover en los cuadros de nosotros*/
    // $(".square").hover(function () {
    //     $(this).css({
    //         "background-color": "#072B83",
    //         "color": "#ffff"
    //     });
    //     $(this).find($('.icon-square i')).css({
    //         "color": "#ffff"
    //     });
    // }, function () {
    //     $(this).css({
    //         "background-color": "#ffff",
    //         "color": "black"
    //     });
    //     $(this).find($('.icon-square i')).css({
    //         "color": "#072B83"
    //     });
    // })

    // $('.carousel').carousel({
    //     interval: 2000
    // })

    $('.each-services').hover(function () {
        $(this).css({
            "background-color": "#072B83"
        });
        $(this).find($('.icon-service')).css({
            "background-color":"#ffff"
        });
        $(this).find($('.name-service')).css({
            "color": "#ffff"
        });
        $(this).find($('.icon-service i')).css({
            "color": "#072B83"
        });
    },function () {
        $(this).css({
            "background-color": "#ffff"
        });
        $(this).find($('.icon-service')).css({
            "background-color": "#072B83"
        });
        $(this).find($('.name-service')).css({
            "color": "black"
        });
        $(this).find($('.icon-service i')).css({
            "color": "#fff"
        });
    })
    /*animacion de contadores*/
    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });

    /*para el portafolio tabs*/

    $(".tab_content").hide(); //Hide all content
    $("ul.tabs li:first").addClass("active").show(); //Activate first tab
    $(".tab_content:first").show(); //Show first tab content

    //On Click Event
    $("ul.tabs li").click(function () {
        $("ul.tabs li").removeClass("active"); //Remove any "active" class
        $(this).addClass("active"); //Add "active" class to selected tab
        $(".tab_content").hide(); //Hide all tab content

        let activeTab = $(this).find("a").attr("href"); //Find the href attribute value to
        //identify the active tab + content
        $(activeTab).show(); //Fade in the active ID content
        return false;
    });

    /*cuando desliza se esconde el menu*/
    $(this).scroll(function () {
        $('#btn-menu').prop('checked', false);
    });

    /*Owl Carousel*/
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1400: {
                items: 3,
                nav: true,
                loop: false
            }
        },
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
    });

    let asesoria = $('.owl-carousel-asesoria');
    asesoria.owlCarousel({
        loop: true,
        margin: 10,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            1000: {
                items: 4,
                nav: true,
                loop: false
            }
        },
        autoplay: true,
        autoplayTimeout: 2000,
        autoplayHoverPause: true,
    });

    const emailIsValid = (email) => {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.toString());
    }

    const hideSuccessMessage = () => {
        setTimeout(() => {
            $("#success-1").hide("slow");
        }, 5000);
    }

    // Validacion para enviar correo
    $("#btnSend").click(function (e) {
        e.preventDefault();

        let name = $("#name").val();

        let email = $("#email").val();

        let cellphone = $("#cellphone").val();

        let message = $("#message").val();

        let _token = $("input[name=_token]").val();

        if (name.length < 4 ) {
            $('#error-1').show("slow");
        } else
        if (!emailIsValid(email)) {
            $('#error-2').show("slow");
        } else
        if (cellphone.length !== 9) {
            $('#error-3').show("slow");
        } else
        if (message.length < 21) {
            $('#error-4').show("slow");
        } else {
            let data = {
                name: name,
                email: email,
                cellphone: cellphone,
                message: message,
            }

            $('#btnSend').attr('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: base_url + "send-message",
                method: 'POST',
                cache:false,
                data: {
                    _token:_token,
                    data: data
                },
                success: function (resp) {
                    $('#btnSend').attr('disabled', false);
                    $('#error-1').hide();
                    $('#error-2').hide();
                    $('#error-3').hide();
                    $('#error-4').hide();

                    $("#success-1").show("slow");

                    $("#name").val("");

                    $("#email").val("");

                    $("#cellphone").val("");

                    $("#message").val("");

                    hideSuccessMessage();
                    console.log(resp);
                }
            });

            return false;
        }
    });


});
