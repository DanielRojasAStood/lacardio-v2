document.addEventListener("DOMContentLoaded", function () {
  const toggleButton = document.getElementById("js-toggle-button");
  const menuMobile = document.getElementById("js-menu-mobile");

  toggleButton.addEventListener("click", function () {
    this.classList.toggle("is-active");
    menuMobile.classList.toggle("is-active");
  });
});

/* Menu Escritorio */
document.addEventListener("DOMContentLoaded", function () {
  var menuItems = document.querySelectorAll(".has-submenu");

  menuItems.forEach(function (menuItem) {
    var subMenu = findSubMenu(menuItem);

    menuItem.addEventListener("mouseover", function () {
      if (subMenu) {
        menuItem.classList.add("is-hover");
      }
    });

    menuItem.addEventListener("mouseleave", function () {
      if (subMenu) {
        menuItem.classList.remove("is-hover");
      }
    });

    if (subMenu) {
      subMenu.addEventListener("mouseover", function () {
        menuItem.classList.add("is-hover");
      });

      subMenu.addEventListener("mouseleave", function () {
        menuItem.classList.remove("is-hover");
      });
    }
  });

  function findSubMenu(element) {
    var sibling = element.nextElementSibling;
    while (sibling) {
      if (sibling.tagName.toLowerCase() === "div") {
        var potentialSubMenu = sibling.querySelector(
          ".sub-menu-nivel-0-wrapper, .sub-menu-nivel-1-wrapper, .sub-menu-nivel-2-wrapper, .sub-menu-nivel-3-wrapper"
        );
        if (potentialSubMenu) {
          return potentialSubMenu;
        }
      }
      sibling = sibling.nextElementSibling;
    }
    return null;
  }
});

/* Menu Mobile */
document.addEventListener("DOMContentLoaded", function () {
  const hasSubmenu = document.querySelectorAll(".has-submenu-mobile");
  const allSubmenus = document.querySelectorAll(
    ".sub-menu-mobile-nivel-0, .sub-menu-mobile-nivel-1, .sub-menu-mobile-nivel-2, .sub-menu-mobile-nivel-3"
  );

  function closeAllSubmenus() {
    allSubmenus.forEach(function (submenu) {
      submenu.classList.remove("is-open");
    });
  }

  function handleSubmenuClick(event) {
    event.preventDefault();
    const submenu = this.nextElementSibling;

    if (submenu.classList.contains("is-open")) {
      submenu.classList.remove("is-open");
    } else {
      closeAllSubmenus();
      submenu.classList.add("is-open");
    }
  }

  hasSubmenu.forEach(function (item) {
    item.addEventListener("click", handleSubmenuClick);
  });

  const submenuTitles = document.querySelectorAll(
    ".sub-menu-mobile-nivel-0-title, .sub-menu-mobile-nivel-1-title, .sub-menu-mobile-nivel-2-title, .sub-menu-mobile-nivel-3-title"
  );

  function handleTitleClick() {
    const parentSubMenu = this.parentElement.parentElement;
    const grandParentSubMenu = parentSubMenu.parentElement.parentElement;

    parentSubMenu.classList.remove("is-open");
    grandParentSubMenu.classList.add("is-open");
  }

  submenuTitles.forEach(function (title) {
    title.addEventListener("click", handleTitleClick);
  });
});

jQuery(document).ready(function ($) {
  // Manejar clic en una categoría

  $(".post-item").slice(0, 6).show();
  $("[data-vermas]").click(function (e) {
    e.preventDefault();

    $(".post-item:hidden").slice(0, 3).fadeIn("slow");

    if ($(".post-item:hidden").length == 0) {
      $("[data-vermas]").fadeOut("slow");
    }
  });

  $(document).on("click", ".category-link", function (e) {
    e.preventDefault();
    var catID = $(this).data("cat-id");
    getPostsByCategory(catID);

    $(".category-link").removeClass("active");
    // Agregar la clase 'active' al enlace de categoría seleccionado
    $(".category-link[data-cat-id='" + catID + "']").addClass("active");
  });

  // Obtener la primera categoría al cargar la página
  $.ajax({
    url: lm_params.ajaxurl,
    type: "POST",
    data: {
      action: "get_first_category_id",
    },
    success: function (response) {
      var firstCatID = parseInt(response);
      getPostsByCategory(firstCatID);

      // Agregar la clase 'active' al enlace de la primera categoría
      $(".category-link").removeClass("active");
      $(".category-link[data-cat-id='" + firstCatID + "']").addClass("active");
    },
  });

  $.ajax({
    url: lm_params.ajaxurl,
    type: "POST",
    data: {
      action: "get_blog_follows_categories",
    },
    success: function (response) {
      $(".categories").html(response);
    },
  });

  // Función para obtener posts por categoría
  function getPostsByCategory(catID) {
    $.ajax({
      url: lm_params.ajaxurl,
      type: "POST",
      data: {
        action: "get_posts_by_category",
        catID: catID,
      },
      success: function (response) {
        // Mostrar posts utilizando Slick
        $(".posts").html(response);
        $blogFellowSlider = $(".blogFellowSlider");
        blogFellowSliderSettings = {
          slidesToShow: 4,
          slidesToScroll: 1,
          dots: true,
          arrows: true,
          infinite: false,
          responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 2,
                arrows: false,
              },
            },
          ],
        };
        $blogFellowSlider.slick(blogFellowSliderSettings);
      },
    });
  }

  $("#search-input").on("input", function () {
    var searchTerm = $(this).val();
    searchPosts(searchTerm);
  });

  // Función para obtener posts por titulo
  function searchPosts(searchTerm) {
    $.ajax({
      url: lm_params.ajaxurl,
      type: "POST",
      data: {
        action: "search_blog_fellows",
        searchTerm: searchTerm,
      },
      success: function (response) {
        $(".posts").html(response);

        // Mostrar elementos iniciales
        $(".post-item").slice(0, 3).show();
        $("[data-vermas]").click(function (e) {
          e.preventDefault();
          $(".post-item:hidden").slice(0, 3).fadeIn("slow");
          if ($(".post-item:hidden").length == 0) {
            $("[data-vermas]").fadeOut("slow");
          }
        });
        // $blogFellowSlider = $(".blogFellowSlider");
        // blogFellowSliderSettings = {
        //   slidesToShow: 4,
        //   slidesToScroll: 1,
        //   dots: true,
        //   arrows: true,
        //   infinite: false,
        //   responsive: [
        //     {
        //       breakpoint: 1024,
        //       settings: {
        //         slidesToShow: 2,
        //         arrows: false,
        //       }
        //     },
        //   ]
        // };
        // $blogFellowSlider.slick(blogFellowSliderSettings);
      },
    });
  }

  const $slickBannerSlide = $(".slickBannerSlide");
  const slickBannerSlideSettings = {
    fade: true,
    cssEase: "linear",
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    touchMove: true,
    dots: true,
    arrows: false,
    infinite: false,
  };
  $slickBannerSlide.slick(slickBannerSlideSettings);

  const $slickEventoDia = $(".slickEventoDia");
  const slickEventoDiaSettings = {
    slidesToShow: 6,
    slidesToScroll: 1,
    arrows: false,
    fade: false,
    infinite: false,
    asNavFor: ".slickEventoInfo",
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 3,
        },
      },
      {
        breakpoint: 680,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        },
      },
    ],
  };
  $slickEventoDia.slick(slickEventoDiaSettings);

  const $slickEventoInfo = $(".slickEventoInfo");
  const slickEventoInfoSettings = {
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: ".slickEventoDia",
    dots: true,
    infinite: false,
    centerMode: false,
    focusOnSelect: true,
    arrows: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows: false,
        },
      },
      {
        breakpoint: 680,
        settings: {
          arrows: false,
        },
      },
    ],
  };
  $slickEventoInfo.slick(slickEventoInfoSettings);

  const $slickTargetas = $(".slickTargetas");
  const slickTargetasSettings = {
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: ".slickEventoDia",
    dots: true,
    infinite: false,
    centerMode: false,
    focusOnSelect: true,
    arrows: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          arrows: false,
        },
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
          arrows: false,
        },
      },
    ],
  };
  $slickTargetas.slick(slickTargetasSettings);

  $(".seccionTargeta").closest("div").addClass("seccionTargeta__alto");

  $window = $(window);
  const $slickArticulos = $(".slickArticulos");
  const slickArticulosSettings = {
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    arrows: false,
    infinite: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          arrows: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          arrows: false,
        },
      },
    ],
  };
  $slickArticulos.slick(slickArticulosSettings);

  function setEqualHeightArticulos() {
    var maxHeight = 0;
    $(".seccionTargetas .slick-slide").each(function () {
      var itemHeight = $(this).outerHeight();
      if (itemHeight > maxHeight) {
        maxHeight = itemHeight;
      }
    });
    $(".seccionTargetas .slick-slide").css("height", maxHeight);
  }

  setEqualHeightArticulos();

  $slickNoticias = $(".slickNoticias");
  slickNoticiasSettings = {
    slidesToShow: 3,
    slidesToScroll: 1,
    dots: true,
    arrows: true,
    infinite: false,
    adaptiveHeight: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          arrows: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          arrows: false,
        },
      },
    ],
  };
  $slickNoticias.slick(slickNoticiasSettings);

  $(".seccionNoticias__articulo")
    .closest("div")
    .addClass("seccionNoticias__alto");

  function setEqualHeightNoticias() {
    var maxHeight = 0;
    $(".seccionNoticias .slick-slide").each(function () {
      var itemHeight = $(this).outerHeight();
      if (itemHeight > maxHeight) {
        maxHeight = itemHeight;
      }
    });
    $(".seccionNoticias .slick-slide").css("height", maxHeight);
  }

  setEqualHeightNoticias();


  $slickNoticias = $(".slickProfesionalesUrg");
  slickNoticiasSettings = {
    slidesToShow: 4,
    slidesToScroll: 1,
    dots: true,
    arrows: true,
    infinite: false,
    adaptiveHeight: false,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          arrows: false,
        },
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          arrows: false,
        },
      },
    ],
  };
  $slickNoticias.slick(slickNoticiasSettings);



});
