$.noConflict();

jQuery(document).ready(function($) {

	"use strict";

	[].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
		new SelectFx(el);
	} );

	jQuery('.selectpicker').selectpicker;


	$('#menuToggle').on('click', function(event) {
		$('body').toggleClass('open');
	});

	$('.search-trigger').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').addClass('open');
	});

	$('.search-close').on('click', function(event) {
		event.preventDefault();
		event.stopPropagation();
		$('.search-trigger').parent('.header-left').removeClass('open');
	});

	// $('.user-area> a').on('click', function(event) {
	// 	event.preventDefault();
	// 	event.stopPropagation();
	// 	$('.user-menu').parent().removeClass('open');
	// 	$('.user-menu').parent().toggleClass('open');
	// });
	$('#bootstrap-data-table-export').DataTable();
	
    /* My Jquery */
     
    $('.alert').delay(5000).fadeOut(5000, function () {
        $(this).alert('close');
    });

     $(document).on("click","#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
        bootbox.confirm("Are you want to delete!!", function(confirmed){
            if (confirmed){
                window.location.href = link;
            };
        });
    });


});
