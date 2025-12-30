$(".toggle-nav").click(function () {
    $("#sidebar-links .nav-menu").css("left", "0px");
});
$(".mobile-back").click(function () {
    $("#sidebar-links .nav-menu").css("left", "-410px");
});

// left sidebar and vertical menu
if ($("#pageWrapper").hasClass("compact-wrapper")) {
    jQuery(".sidebar-title").append(
        '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
    );
    jQuery(".sidebar-title").click(function () {
        jQuery(".sidebar-title")
            .removeClass("active")
            .find("div")
            .replaceWith(
                '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
            );
        jQuery(".sidebar-submenu, .menu-content").slideUp("normal");
        jQuery(".menu-content").slideUp("normal");
        if (jQuery(this).next().is(":hidden") == true) {
            jQuery(this).addClass("active");
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                );
            jQuery(this).next().slideDown("normal");
        } else {
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                );
        }
    });
    jQuery(".sidebar-submenu, .menu-content").hide();
    jQuery(".submenu-title").append(
        '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
    );
    jQuery(".submenu-title").click(function () {
        jQuery(".submenu-title")
            .removeClass("active")
            .find("div")
            .replaceWith(
                '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
            );
        jQuery(".submenu-content").slideUp("normal");
        if (jQuery(this).next().is(":hidden") == true) {
            jQuery(this).addClass("active");
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                );
            jQuery(this).next().slideDown("normal");
        } else {
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                );
        }
    });
    jQuery(".submenu-content").hide();
} else if ($("#pageWrapper").hasClass("horizontal-wrapper")) {
    $(window).on("load", function () {
        $(document).load($(window).bind("resize", checkPosition));

        function checkPosition() {
            if (window.matchMedia("(max-width: 991px)").matches) {
                $("#pageWrapper")
                    .removeClass("horizontal-wrapper")
                    .addClass("compact-wrapper");
                $(".page-body-wrapper")
                    .removeClass("horizontal-menu")
                    .addClass("sidebar-icon");
                jQuery(".submenu-title").append(
                    '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                );
                jQuery(".submenu-title").click(function () {
                    jQuery(".submenu-title").removeClass("active");
                    jQuery(".submenu-title")
                        .find("div")
                        .replaceWith(
                            '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                        );
                    jQuery(".submenu-content").slideUp("normal");
                    if (jQuery(this).next().is(":hidden") == true) {
                        jQuery(this).addClass("active");
                        jQuery(this)
                            .find("div")
                            .replaceWith(
                                '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                            );
                        jQuery(this).next().slideDown("normal");
                    } else {
                        jQuery(this)
                            .find("div")
                            .replaceWith(
                                '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                            );
                    }
                });
                jQuery(".submenu-content").hide();

                jQuery(".sidebar-title").append(
                    '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                );
                jQuery(".sidebar-title").click(function () {
                    jQuery(".sidebar-title").removeClass("active");
                    jQuery(".sidebar-title")
                        .find("div")
                        .replaceWith(
                            '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                        );
                    jQuery(".sidebar-submenu, .menu-content").slideUp("normal");
                    if (jQuery(this).next().is(":hidden") == true) {
                        jQuery(this).addClass("active");
                        jQuery(this)
                            .find("div")
                            .replaceWith(
                                '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                            );
                        jQuery(this).next().slideDown("normal");
                    } else {
                        jQuery(this)
                            .find("div")
                            .replaceWith(
                                '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                            );
                    }
                });
                jQuery(".sidebar-submenu, .menu-content").hide();
            }
        }
    });
} else if ($("#pageWrapper").hasClass("compact-sidebar")) {
    var contentwidth = jQuery(window).width();
    if (contentwidth > 992) {
        $('<div class="bg-overlay1"></div>').appendTo($("body"));
    }

    jQuery(".sidebar-title").click(function () {
        jQuery(".sidebar-title").removeClass("active");
        $(".bg-overlay1").removeClass("active");
        jQuery(".sidebar-submenu")
            .removeClass("close-submenu")
            .slideUp("normal");
        jQuery(".sidebar-submenu, .menu-content").slideUp("normal");
        jQuery(".menu-content").slideUp("normal");

        if (jQuery(this).next().is(":hidden") == true) {
            jQuery(this).addClass("active");
            jQuery(this).next().slideDown("normal");
            $(".bg-overlay1").addClass("active");

            $(".bg-overlay1").on("click", function () {
                jQuery(".sidebar-submenu, .menu-content").slideUp("normal");
                $(this).removeClass("active");
            });
        }
        if (contentwidth < "992") {
            $(".bg-overlay").addClass("active");
        }
    });
    jQuery(".sidebar-submenu, .menu-content").hide();
    jQuery(".submenu-title").append(
        '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
    );
    jQuery(".submenu-title").click(function () {
        jQuery(".submenu-title")
            .removeClass("active")
            .find("div")
            .replaceWith(
                '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
            );
        jQuery(".submenu-content").slideUp("normal");
        if (jQuery(this).next().is(":hidden") == true) {
            jQuery(this).addClass("active");
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                );
            jQuery(this).next().slideDown("normal");
        } else {
            jQuery(this)
                .find("div")
                .replaceWith(
                    '<div class="according-menu"><i class="ri-arrow-right-s-line"></i></div>'
                );
        }
    });
    jQuery(".submenu-content").hide();

    $(".sidebar-wrapper nav").find("a").removeClass("active");
    $(".sidebar-wrapper nav").find("li").removeClass("active");

    var current = window.location.pathname;
    $(".sidebar-wrapper nav ul>li a").filter(function () {
        var link = $(this).attr("href");
        if (link) {
            if (current.indexOf(link) != -1) {
                $(this).addClass("active");
                $(this).parents().children("a").addClass("active");
                $(this)
                    .parents()
                    .parents()
                    .children(".nav-sub-childmenu")
                    .css("display", "block");
                $(this).addClass("active");
                $(this)
                    .parent()
                    .parent()
                    .parent()
                    .children("a")
                    .find("div")
                    .replaceWith(
                        '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                    );
                return false;
            }
        }
    });
}

// toggle sidebar
$nav = $(".sidebar-wrapper");
$header = $(".page-header");
$toggle_nav_top = $(".toggle-sidebar");
$toggle_nav_top.click(function () {
    // $this = $(this);
    // $nav = $('.sidebar-wrapper');
    $nav.toggleClass("close_icon");
    $header.toggleClass("close_icon");
    $(window).trigger("overlay");
});

// $(window).resize(function () {
//     $nav = $('.sidebar-wrapper');
//     $header = $('.page-header');
//     $toggle_nav_top = $('.toggle-sidebar');
//     $toggle_nav_top.click(function () {
//         $this = $(this);
//         $nav = $('.sidebar-wrapper');
//         $nav.toggleClass('close_icon');
//         $header.toggleClass('close_icon');
//     });
// });
$(window).on("overlay", function () {
    $bgOverlay = $(".bg-overlay");
    $isHidden = $nav.hasClass("close_icon");
    if ($(window).width() <= 991 && !$isHidden && $bgOverlay.length === 0) {
        $('<div class="bg-overlay active"></div>').appendTo($("body"));
    }

    if ($isHidden && $bgOverlay.length > 0) {
        $bgOverlay.remove();
    }
});

$(".sidebar-wrapper .back-btn").on("click", function (e) {
    $(".page-header").toggleClass("close_icon");
    $(".sidebar-wrapper").toggleClass("close_icon");
    $(window).trigger("overlay");
});

$("body").on("click", ".bg-overlay", function () {
    $header.addClass("close_icon");
    $nav.addClass("close_icon");
    $(this).remove();
});

/////

$body_part_side = $(".body-part");
$body_part_side.click(function () {
    $toggle_nav_top.attr("checked", false);
    $nav.addClass("close_icon");
    $header.addClass("close_icon");
});

//    responsive sidebar
var $window = $(window);
var widthwindow = $window.width();
(function ($) {
    "use strict";
    if (widthwindow <= 991) {
        $toggle_nav_top.attr("checked", false);
        $nav.addClass("close_icon");
        $header.addClass("close_icon");
    }
})(jQuery);
$(window).resize(function () {
    var widthwindaw = $window.width();
    if (widthwindaw <= 991) {
        $toggle_nav_top.attr("checked", false);
        $nav.addClass("close_icon");
        $header.addClass("close_icon");
    } else {
        $toggle_nav_top.attr("checked", true);
        $nav.removeClass("close_icon");
        $header.removeClass("close_icon");
    }
});

// horizontal arrows
var view = $("#sidebar-menu");
var move = "500px";
var leftsideLimit = -500;

// var Windowwidth = jQuery(window).width();
// get wrapper width
var getMenuWrapperSize = function () {
    return $(".sidebar-wrapper").innerWidth();
};
var menuWrapperSize = getMenuWrapperSize();

if (menuWrapperSize >= "1660") {
    var sliderLimit = -3000;
} else if (menuWrapperSize >= "1440") {
    var sliderLimit = -3600;
} else {
    var sliderLimit = -4200;
}

$("#left-arrow").addClass("disabled");
$("#right-arrow").click(function () {
    var currentPosition = parseInt(view.css("marginLeft"));
    if (currentPosition >= sliderLimit) {
        $("#left-arrow").removeClass("disabled");
        view.stop(false, true).animate(
            {
                marginLeft: "-=" + move,
            },
            {
                duration: 400,
            }
        );
        if (currentPosition == sliderLimit) {
            $(this).addClass("disabled");
            console.log("sliderLimit", sliderLimit);
        }
    }
});

$("#left-arrow").click(function () {
    var currentPosition = parseInt(view.css("marginLeft"));
    if (currentPosition < 0) {
        view.stop(false, true).animate(
            {
                marginLeft: "+=" + move,
            },
            {
                duration: 400,
            }
        );
        $("#right-arrow").removeClass("disabled");
        $("#left-arrow").removeClass("disabled");
        if (currentPosition >= leftsideLimit) {
            $(this).addClass("disabled");
        }
    }
});

// page active

if ($("#pageWrapper").hasClass("compact-wrapper")) {
    $(
        ".sidebar-wrapper nav #sidebar-menu .simplebar-wrapper .simplebar-content-wrapper .simplebar-content"
    )
        .find("a")
        .removeClass("active");
    $(
        ".sidebar-wrapper nav #sidebar-menu .simplebar-wrapper .simplebar-content-wrapper .simplebar-content"
    )
        .find("li")
        .removeClass("active");

    var current = window.location.pathname;
    $(".sidebar-wrapper nav #sidebar-menu ul .simplebar-mask li a").filter(
        function () {
            var link = $(this).attr("href");
            if (link) {
                if (current.indexOf(link) != -1) {
                    $(this).parents().children("a").addClass("active");
                    $(this)
                        .parents()
                        .parents()
                        .children("ul")
                        .css("display", "block");
                    $(this).addClass("active");
                    $(this)
                        .parent()
                        .parent()
                        .parent()
                        .children("a")
                        .find("div")
                        .replaceWith(
                            '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                        );
                    $(this)
                        .parent()
                        .parent()
                        .parent()
                        .parent()
                        .parent()
                        .children("a")
                        .find("div")
                        .replaceWith(
                            '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                        );
                    return false;
                }
            }
        }
    );
}

$(".left-header .mega-menu .nav-link").on("click", function (event) {
    event.stopPropagation();
    $(this).parent().children(".mega-menu-container").toggleClass("show");
});

$(".left-header .level-menu .nav-link").on("click", function (event) {
    event.stopPropagation();
    $(this).parent().children(".header-level-menu").toggleClass("show");
});

$(document).click(function () {
    $(".mega-menu-container").removeClass("show");
    $(".header-level-menu").removeClass("show");
});

$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll >= 50) {
        $(".mega-menu-container").removeClass("show");
        $(".header-level-menu").removeClass("show");
    }
});

$(".left-header .level-menu .nav-link").click(function () {
    if ($(".mega-menu-container").hasClass("show")) {
        $(".mega-menu-container").removeClass("show");
    }
});

$(".left-header .mega-menu .nav-link").click(function () {
    if ($(".header-level-menu").hasClass("show")) {
        $(".header-level-menu").removeClass("show");
    }
});

$(document).ready(function () {
    $(".outside").click(function () {
        $(this).find(".menu-to-be-close").slideToggle("fast");
    });
});
$(document).on("click", function (event) {
    var $trigger = $(".outside");
    if ($trigger !== event.target && !$trigger.has(event.target).length) {
        $(".menu-to-be-close").slideUp("fast");
    }
});

$(".left-header .link-section > div").on("click", function (e) {
    if ($(window).width() <= 1199) {
        $(".left-header .link-section > div").removeClass("active");
        $(this).toggleClass("active");
        $(this).parent().children("ul").toggleClass("d-block").slideToggle();
    }
});

if ($(window).width() <= 1199) {
    $(".left-header .link-section").children("ul").css("display", "none");
    $(this).parent().children("ul").toggleClass("d-block").slideToggle();
}
// if ($(window).width() <= 991) {
//     $('.sidebar-wrapper .back-btn').on('click', function (e) {
//         $(".page-header").toggleClass("close_icon");
//         $(".sidebar-wrapper").toggleClass("close_icon");
//     });
// }

if (
    $("#sidebar-menu .simplebar-content-wrapper").hasClass(
        "a.sidebar-link.sidebar-title.active"
    )
) {
    $("#sidebar-menu .simplebar-content-wrapper").animate(
        {
            scrollTop:
                $("a.sidebar-link.sidebar-title.active").offset().top - 200,
        },
        1000
    );
}

/* READY-TO-PASTE
   Purpose:
   - Dropdowns/submenus inside #sidebar-menu will only open/close when their toggle is clicked.
   - Clicking inside the menu (items/controls) will NOT auto-close the dropdown.
   - Open state is persisted in localStorage so after a full page reload the same dropdowns remain OPEN.
   - To CLOSE a dropdown the user must click its TOGGLE again.
   Instructions:
   - Paste this at the end of public/assets/js/sidebar-menu.js (after existing content).
   - Hard-refresh the browser (Ctrl+F5) to ensure the new script is loaded.
*/
(function ($) {
    $(function () {
        const STORAGE_KEY = "sidebar_open_menus_final_v1";

        function safeParse(v) {
            try {
                return v ? JSON.parse(v) : [];
            } catch (e) {
                return [];
            }
        }
        function getOpenMenus() {
            try {
                return safeParse(localStorage.getItem(STORAGE_KEY));
            } catch (e) {
                return [];
            }
        }
        function setOpenMenus(arr) {
            try {
                localStorage.setItem(STORAGE_KEY, JSON.stringify(arr));
            } catch (e) {}
        }
        function addOpen(id) {
            if (!id) return;
            const arr = getOpenMenus();
            if (!arr.includes(id)) {
                arr.push(id);
                setOpenMenus(arr);
            }
        }
        function removeOpen(id) {
            if (!id) return;
            const arr = getOpenMenus().filter((x) => x !== id);
            setOpenMenus(arr);
        }

        // Give stable data-menu-id to toggles if missing
        let _idCounter = 0;
        $("#sidebar-menu")
            .find('[data-bs-toggle="dropdown"], .sidebar-title, .submenu-title')
            .each(function () {
                const $t = $(this);
                if (!$t.attr("data-menu-id")) {
                    $t.attr("data-menu-id", "sidebar-menu-" + _idCounter++);
                }
            });

        // Initialize Bootstrap dropdowns inside sidebar with autoClose: false
        $("#sidebar-menu")
            .find('[data-bs-toggle="dropdown"]')
            .each(function () {
                try {
                    if (
                        typeof bootstrap !== "undefined" &&
                        bootstrap.Dropdown
                    ) {
                        const el = this;
                        const inst = bootstrap.Dropdown.getInstance(el);
                        if (inst) inst.dispose();
                        // autoClose:false => dropdown will NOT auto-close on outside click or inside click; toggle click still works
                        new bootstrap.Dropdown(el, { autoClose: false });
                    }
                } catch (err) {
                    // ignore if bootstrap not available
                }
            });

        // Track show/hide to persist state for Bootstrap dropdowns
        $("#sidebar-menu").on(
            "shown.bs.dropdown",
            '[data-bs-toggle="dropdown"]',
            function () {
                const id = $(this).attr("data-menu-id");
                addOpen(id);
            }
        );
        $("#sidebar-menu").on(
            "hidden.bs.dropdown",
            '[data-bs-toggle="dropdown"]',
            function () {
                const id = $(this).attr("data-menu-id");
                // hidden means user closed via toggle — remove from storage
                removeOpen(id);
            }
        );

        // For custom toggles (.sidebar-title, .submenu-title) update storage after their native handlers run
        // Existing code in your file handles slideUp/slideDown; we only observe and persist visibility.
        $("#sidebar-menu").on(
            "click",
            ".sidebar-title, .submenu-title",
            function () {
                const $this = $(this);
                const id = $this.attr("data-menu-id");
                // allow existing handlers to run then sample visibility
                setTimeout(function () {
                    if ($this.next().is(":visible")) addOpen(id);
                    else removeOpen(id);
                }, 350);

                // Ensure toggle click still functions normally; do not stop propagation.
            }
        );

        // Important: do NOT block anchor (<a>) clicks. They should navigate normally.
        // We do not need to stopPropagation for inside clicks because autoClose:false
        // prevents bootstrap from auto-closing on any click; for custom toggles existing code controls open/close.

        // Save current open menus before unload so navigation that triggers page reload keeps state
        $(window).on("beforeunload", function () {
            const open = [];
            $("#sidebar-menu")
                .find("[data-menu-id]")
                .each(function () {
                    const $t = $(this);
                    const id = $t.attr("data-menu-id");
                    if ($t.is('[data-bs-toggle="dropdown"]')) {
                        const $menu = $t.next(".dropdown-menu");
                        if ($menu.length && $menu.hasClass("show"))
                            open.push(id);
                    } else {
                        if ($t.next().is(":visible")) open.push(id);
                    }
                });
            setOpenMenus(open);
        });

        // On load: reopen stored menus (Bootstrap dropdowns and custom ones)
        $(window).on("load", function () {
            const arr = getOpenMenus();
            if (!arr || !arr.length) return;
            arr.forEach(function (id) {
                const $toggle = $("#sidebar-menu").find(
                    '[data-menu-id="' + id + '"]'
                );
                if (!$toggle.length) return;

                // Bootstrap dropdown
                if ($toggle.is('[data-bs-toggle="dropdown"]')) {
                    try {
                        if (
                            typeof bootstrap !== "undefined" &&
                            bootstrap.Dropdown
                        ) {
                            let inst = bootstrap.Dropdown.getInstance(
                                $toggle[0]
                            );
                            if (!inst)
                                inst = new bootstrap.Dropdown($toggle[0], {
                                    autoClose: false,
                                });
                            // Show the dropdown (toggle remains in "expanded" state)
                            inst.show();
                        } else {
                            // fallback: set classes
                            $toggle
                                .addClass("show")
                                .attr("aria-expanded", "true");
                            $toggle.next(".dropdown-menu").addClass("show");
                        }
                    } catch (err) {
                        // ignore errors
                    }
                } else {
                    // custom toggles: show related submenu and set icon/active class similarly to template
                    const $next = $toggle.next();
                    $next.show();
                    $toggle.addClass("active");
                    const $div = $toggle.find("div");
                    if ($div.length) {
                        $div.replaceWith(
                            '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                        );
                    } else {
                        $toggle.append(
                            '<div class="according-menu"><i class="ri-arrow-down-s-line"></i></div>'
                        );
                    }
                }
            });

            // prune invalid keys
            let arr2 = getOpenMenus();
            arr2 = arr2.filter(function (id) {
                return $("#sidebar-menu").find(
                    '[data-menu-id="' + id + '"]'
                ).length;
            });
            setOpenMenus(arr2);
        });
    });
})(jQuery);
