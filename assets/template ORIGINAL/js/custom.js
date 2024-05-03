$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	event.preventDefault();
	$(this).ekkoLightbox();
});

$(document).ready(function() {
  var owl = $('.home-imoveis-destaques');
  owl.owlCarousel({
	margin: 30,
	autoplay:true,
	responsiveClass: true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	nav: true,
	navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	dots: false,
	loop: true,
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 2
	  },
	  1000: {
		items: 3
	  }
	}
  })
});

$(document).ready(function() {
  var owl = $('.home-noticias');
  owl.owlCarousel({
	margin: 30,
	autoplay:true,
	responsiveClass: true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	nav: true,
	navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	dots: false,
	loop: true,
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 2
	  },
	  1000: {
		items: 3
	  }
	}
  })
});

$(document).ready(function() {
  var owl = $('.institucional-fotos');
  owl.owlCarousel({
	margin: 30,
	autoplay:true,
	responsiveClass: true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	nav: true,
	navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	dots: false,
	loop: true,
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 2
	  },
	  1000: {
		items: 4
	  }
	}
  })
});

$(document).ready(function() {
  var owl = $('.noticias-fotos');
  owl.owlCarousel({
	margin: 20,
	autoplay:true,
	responsiveClass: true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	nav: true,
	navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	dots: false,
	loop: true,
	responsive: {
	  0: {
		items: 2
	  },
	  600: {
		items: 3
	  },
	  1000: {
		items: 7
	  }
	}
  })
});

$(document).ready(function() {
  var owl = $('.imoveis-fotos');
  owl.owlCarousel({
	margin: 20,
	autoplay:true,
	responsiveClass: true,
	autoplayTimeout:5000,
	autoplayHoverPause:true,
	nav: true,
	navText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
	dots: false,
	loop: true,
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 1
	  },
	  1000: {
		items: 1
	  }
	}
  })
});
