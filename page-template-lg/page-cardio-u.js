jQuery(document).ready(function ($) {
  /* Accordion */
  $(".seccionCardioUPreguntasAccordion__title").click(function () {
    $(this)
      .toggleClass("active")
      .next(".seccionCardioUPreguntasAccordion__tab")
      .slideToggle()
      .parent()
      .siblings()
      .find(".seccionCardioUPreguntasAccordion__tab")
      .slideUp()
      .prev()
      .removeClass("active");
      $('.slickCardioUOfertasMobile').slick('setPosition');
  });

  /* Banner Principal */
  /* Banner Principal */
  const $slickCardioUBannerPrincipal = $(".slickCardioUBannerPrincipal");
  const slickCardioUBannerPrincipalSettings = {
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    touchMove: true,
    dots: false,
    arrows: true,
    fade: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          arrows: false,
        }
      },
    ]
  };
  $slickCardioUBannerPrincipal.slick(slickCardioUBannerPrincipalSettings);

  $slickCardioUBannerPrincipal.on(
    "afterChange",
    function (event, slick, currentSlide) {
      $(".seccionCardioUBannerPrincipal__bullet span").removeClass("active"); // Remove active class from all bullets
      $(
        '.seccionCardioUBannerPrincipal__bullet span[data-slide-index="' +
          currentSlide +
          '"]'
      ).addClass("active"); // Add active class to current bullet
    }
  );

  /* Cursos */
  const $slickCardioUCursos = $(".slickCardioUCursos");
  const slickCardioUCursosSettings = {
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    touchMove: true,
    dots: true,
    arrows: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 680,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          arrows: false,
          centerMode: true,
          infinite: false,
          centerPadding: '15px',
        }
      },
    ]
  };
  $slickCardioUCursos.slick(slickCardioUCursosSettings);

  function setEqualHeightCardioUCursos() {
    var maxHeightTitulo = 0;
    var maxHeightModalidad = 0;
    $(".seccionCardioUCurso .titulo").each(function () {
      var itemHeightTitulo = $(this).outerHeight();
      if (itemHeightTitulo > maxHeightTitulo) {
        maxHeightTitulo = itemHeightTitulo;
      }
    });
    $(".seccionCardioUCurso .titulo").css("height", maxHeightTitulo);

    $(".seccionCardioUCurso .modalidad").each(function () {
      var itemHeightModalidad = $(this).outerHeight();
      if (itemHeightModalidad > maxHeightModalidad) {
        maxHeightModalidad = itemHeightModalidad;
      }
    });
    $(".seccionCardioUCurso .modalidad").css("height", maxHeightModalidad);
  }
  setEqualHeightCardioUCursos();

  /* Docentes */
  const $slickCardioUInternaDocente = $(".slickCardioUInternaDocente");
  const slickCardioUInternaDocenteSettings = {
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    touchMove: true,
    dots: true,
    arrows: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 3,
          arrows: false,
        }
      },
      {
        breakpoint: 680,
        settings: {
          slidesToShow: 2,
          arrows: false,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1,
          arrows: false,
          centerMode: true,
          infinite: false,
          centerPadding: '15px',
        }
      },
    ]
  };
  $slickCardioUInternaDocente.slick(slickCardioUInternaDocenteSettings);

  const $slickCardioUOfertasMobile = $(".slickCardioUOfertasMobile");
  const slickCardioUOfertasMobileSettings = {
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: false,
    touchMove: true,
    dots: true,
    arrows: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          arrows: false,
          centerMode: true,
          centerPadding: '15px',
          infinite: false,
        }
      },
    ]
  };
  $slickCardioUOfertasMobile.slick(slickCardioUOfertasMobileSettings);

  function setEqualHeightCardioUDocentes() {
    var maxHeightNombre = 0;
    var maxHeightProfesion = 0;
    var maxHeightSector = 0;
    $(".seccionCardioUInterna__item .nombre").each(function () {
      var itemHeightNombre = $(this).outerHeight();
      if (itemHeightNombre > maxHeightNombre) {
        maxHeightNombre = itemHeightNombre;
      }
    });
    $(".seccionCardioUInterna__item .nombre").css("height", maxHeightNombre);

    $(".seccionCardioUInterna__item .profesion").each(function () {
      var itemHeightProfesion = $(this).outerHeight();
      if (itemHeightProfesion > maxHeightProfesion) {
        maxHeightProfesion = itemHeightProfesion;
      }
    });
    $(".seccionCardioUInterna__item .profesion").css("height", maxHeightProfesion);

    $(".seccionCardioUInterna__item .sector").each(function () {
      var itemHeightSector = $(this).outerHeight();
      if (itemHeightSector > maxHeightSector) {
        maxHeightSector = itemHeightSector;
      }
    });
    $(".seccionCardioUInterna__item .sector").css("height", maxHeightSector);
  }
  setEqualHeightCardioUDocentes();

  /* Testimonios */
  const $slickCardioUTestimonio = $(".slickCardioUTestimonio");
  const slickCardioUTestimonioSettings = {
    slidesToShow: 3,
    slidesToScroll: 1,
    autoplay: false,
    touchMove: true,
    dots: true,
    arrows: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          arrows: false,
          centerMode: false,
        }
      },
      {
        breakpoint: 680,
        settings: {
          slidesToShow: 1,
          arrows: false,
          centerMode: true,
          centerPadding: '45px',
          infinite: false,
        }
      },
    ]
  };
  $slickCardioUTestimonio.slick(slickCardioUTestimonioSettings);

  var heightFlotante = document.getElementById("seccionCardioUInterna__flotante");
  var altoRealDiv = heightFlotante.scrollHeight;
  miDiv.style.height = altoRealDiv + 'px';

});
