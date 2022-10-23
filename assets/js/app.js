(function ($) {
  "use strict";
  
  $(window).on("load", function () {
    $(".loader").fadeOut("slow");
  });


  $(function () {
    let now_layout_class = null;
    var sidebar_sticky = function () {
      if ($("body").hasClass("layout-2")) {
        $("body.layout-2 #sidebar-wrapper").stick_in_parent({
          parent: $("body"),
        });
        $("body.layout-2 #sidebar-wrapper").stick_in_parent({
          recalc_every: 1,
        });
      }
    };
    sidebar_sticky();

    var sidebar_dropdown = function () {
      if ($(".main-sidebar").length) {

        $(".main-sidebar .sidebar-menu li a.has-dropdown")
          .off("click")
          .on("click", function () {
            var me = $(this);

            me.parent()
              .find("> .dropdown-menu")
              .slideToggle(500, function () {
                return false;
              });
            return false;
          });
      }
    };
    sidebar_dropdown();

    $(".main-content").css({
      minHeight: $(window).outerHeight() - 95,
    });

    $(".nav-collapse-toggle").on('click', function () {
      $(this).parent().find(".navbar-nav").toggleClass("show");
      return false;
    });

    $(document).on("click", function (e) {
      $(".nav-collapse .navbar-nav").removeClass("show");
    });

    var toggle_sidebar_mini = function (mini) {
      let body = $("body");

      if (!mini) {
        body.removeClass("sidebar-mini");
        $(".main-sidebar").css({
          overflow: "hidden",
        });
        $(".main-sidebar .sidebar-menu > li > ul .dropdown-title").remove();
        $(".main-sidebar .sidebar-menu > li > a").removeAttr("data-toggle");
        $(".main-sidebar .sidebar-menu > li > a").removeAttr(
          "data-original-title"
        );
        $(".main-sidebar .sidebar-menu > li > a").removeAttr("title");
      } else {
        body.addClass("sidebar-mini");
        body.removeClass("sidebar-show");
        $(".main-sidebar .sidebar-menu > li").each(function () {
          let me = $(this);

          if (me.find("> .dropdown-menu").length) {
            me.find("> .dropdown-menu").hide();
            me.find("> .dropdown-menu").prepend(
              '<li class="dropdown-title pt-3">' + me.find("> a").text() + "</li>"
            );
          } else {
            me.find("> a").attr("data-toggle", "tooltip");
            me.find("> a").attr("data-original-title", me.find("> a").attr('data-title'));
            $("[data-toggle='tooltip']").tooltip({
              placement: "right",
            });
          }
        });
      }
    };

    // sticky header toggle function
    var toggle_sticky_header = function (sticky) {
      if (!sticky) {
        $(".main-navbar")[0].classList.remove("sticky");
      } else {
        $(".main-navbar")[0].classList += " sticky";
      }
    };

    $(".menu-toggle").on("click", function (e) {
      var $this = $(this);
      $this.toggleClass("toggled");
    });

    $.each($(".main-sidebar .sidebar-menu li.active"), function (i, val) {
      var $activeAnchors = $(val).find("a:eq(0)");
      $activeAnchors.addClass("toggled");
      $activeAnchors.next().show();
    });

    $("[data-toggle='sidebar']").on('click', function () {
      var body = $("body"),
        w = $(window);

      if (w.outerWidth() <= 1024) {
        body.removeClass("search-show search-gone");
        if (body.hasClass("sidebar-gone")) {
          body.removeClass("sidebar-gone");
          body.addClass("sidebar-show");
        } else {
          body.addClass("sidebar-gone");
          body.removeClass("sidebar-show");
        }

      } else {
        body.removeClass("search-show search-gone");
        if (body.hasClass("sidebar-mini")) {
          toggle_sidebar_mini(false);
        } else {
          toggle_sidebar_mini(true);
        }
      }

      return false;
    });

    var toggleLayout = function () {
      var w = $(window),
        layout_class = $("body").attr("class") || "",
        layout_classes =
        layout_class.trim().length > 0 ? layout_class.split(" ") : "";

      if (layout_classes.length > 0) {
        layout_classes.forEach(function (item) {
          if (item.indexOf("layout-") != -1) {
            now_layout_class = item;
          }
        });
      }

      if (w.outerWidth() <= 1024) {
        if ($("body").hasClass("sidebar-mini")) {
          toggle_sidebar_mini(false);
        }

        $("body").addClass("sidebar-gone");
        $("body").removeClass("layout-2 layout-3 sidebar-mini sidebar-show");
        $("body").off("click").on("click", function (e) {
            if ($(e.target).hasClass("sidebar-show") || $(e.target).hasClass("search-show")) {
              $("body").removeClass("sidebar-show");
              $("body").addClass("sidebar-gone");
              $("body").removeClass("search-show");
            }
        });


        if (now_layout_class == "layout-3") {
          let nav_second_classes = $(".navbar-secondary").attr("class"),
            nav_second = $(".navbar-secondary");

          nav_second.attr("data-nav-classes", nav_second_classes);
          nav_second.removeAttr("class");
          nav_second.addClass("main-sidebar");

          let main_sidebar = $(".main-sidebar");
          main_sidebar.find(".container").addClass("sidebar-wrapper").removeClass("container");
          main_sidebar.find(".navbar-nav").addClass("sidebar-menu").removeClass("navbar-nav");
          main_sidebar.find(".sidebar-menu .nav-item.dropdown.show a").on('click');
          main_sidebar.find(".sidebar-brand").remove();
          main_sidebar.find(".sidebar-menu").before(
            $("<div>", {
              class: "sidebar-brand",
            }).append(
              $("<a>", {
                href: $(".navbar-brand").attr("href"),
              }).html($(".navbar-brand").html())
            )
          );

          sidebar_dropdown();
          $(".main-wrapper").removeClass("container");
        }
      } else {
        $("body").removeClass("sidebar-gone sidebar-show");
        if (now_layout_class) $("body").addClass(now_layout_class);
        let nav_second_classes = $(".main-sidebar").attr("data-nav-classes"), nav_second = $(".main-sidebar");
        if (now_layout_class == "layout-3" && nav_second.hasClass("main-sidebar")) {
          nav_second.find(".sidebar-menu li a.has-dropdown").off("click");
          nav_second.find(".sidebar-brand").remove();
          nav_second.removeAttr("class");
          nav_second.addClass(nav_second_classes);

          let main_sidebar = $(".navbar-secondary");
          main_sidebar.find(".sidebar-wrapper").addClass("container").removeClass("sidebar-wrapper");
          main_sidebar.find(".sidebar-menu").addClass("navbar-nav").removeClass("sidebar-menu");
          main_sidebar.find(".dropdown-menu").hide();
          main_sidebar.removeAttr("style");
          main_sidebar.removeAttr("tabindex");
          main_sidebar.removeAttr("data-nav-classes");
          $(".main-wrapper").addClass("container");

        } else if (now_layout_class == "layout-2") {
          $("body").addClass("layout-2");
        } else {
        }
      }
    };

    toggleLayout();
    $(window).on('resize', toggleLayout);

    $("#mini_sidebar_setting").on("change", function () {
      var _val = $(this).is(":checked") ? "checked" : "unchecked";
      if (_val === "checked") {
        toggle_sidebar_mini(true);
      } else {
        toggle_sidebar_mini(false);
      }
    });

    $("#sticky_header_setting").on("change", function () {
      if ($(".main-navbar")[0].classList.contains("sticky")) {
        toggle_sticky_header(false);
      } else {
        toggle_sticky_header(true);
      }
    });

  });

  $(function () {
    // full screen call
    $(document).on("click", ".fullscreen-btn", function (e) {
      if (
        !document.fullscreenElement && // alternative standard method
        !document.mozFullScreenElement &&
        !document.webkitFullscreenElement &&
        !document.msFullscreenElement
      ) {
        // current working methods
        if (document.documentElement.requestFullscreen) {
          document.documentElement.requestFullscreen();
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullscreen) {
          document.documentElement.webkitRequestFullscreen(
            Element.ALLOW_KEYBOARD_INPUT
          );
        }
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
          document.webkitExitFullscreen();
        }
      }
    });
  });

  $(function () {

    // tooltip
    $("[data-toggle='tooltip']").tooltip();

    // popover
    $('[data-toggle="popover"]').popover({
      container: "body",
    });

    $(".notification-toggle").dropdown();
    $(".message-toggle").dropdown();

    // Background
    $("[data-background]").each(function () {
      var me = $(this);
      me.css({
        backgroundImage: "url(" + me.data("background") + ")",
      });
    });

    // Bootstrap 4 Validation
    $(".needs-validation").on('submit', function (event) {
      var form = $(this);
      if (form[0].checkValidity() === false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.addClass("was-validated");
    });
  });

  $(function () {
    // theme change event
  });

  //start up class add, add default class on body tag
  jQuery("body").addClass("light"); // light or dark
  jQuery("body").addClass("dark-sidebar"); // light-sidebar or dark-sidebar
  jQuery("body").addClass("theme-white");


})(jQuery);