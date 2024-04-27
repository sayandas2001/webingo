$(document).ready(function(){
	
	///////////
	stickyHeader = function() {
	    // if (window.innerWidth > mobile_layout) {
        if ($(window).scrollTop() >= 200) {
            $("header").addClass("sticky")
        } else {
            $("header").removeClass("sticky")
        }
	    // }
	}
	// stickyHeader()
	// window.onscroll=function(){
	// 	stickyHeader();
	// };
	if($('.match-height').length > 0){
      $('.match-height').matchHeight();
    }
    if($('.desktop_nav.before-login').length > 0){
      //mobile-nav-block
      $('.desktop_nav nav').meanmenu({
      	meanMenuContainer: '.mobile-nav-block',
      });
    }
	/////////
    
    $('.sub-menu ul').hide();
	$(".sub-menu a").click(function () {
		$(this).parent(".sub-menu").children("ul").slideToggle("100");
		$(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
	});

	////////////////
	function readFile(input) {
	    if (input.files && input.files[0]) {
	        var reader = new FileReader();
	        var myInput = input;
	        var myPreview = $(input).attr('data-preview');
	        console.log(myPreview);
	        reader.onload = function(e) {
	            var htmlPreview =
	                '<img width="200" src="' + e.target.result + '" />';
	            //alert(htmlPreview);
	            //return;
	            var wrapperZone = $(myInput).parent();
	            //var previewZone = $(myInput).parent().parent().find('.user-pic-holder');
	            var previewZone = $('.'+myPreview).find('.box');
	            wrapperZone.removeClass('dragover').addClass('hide');
	            previewZone.html(htmlPreview);
	            $('.'+myPreview).show();
	        };

	        reader.readAsDataURL(input.files[0]);
	    }
	}

	

	$(".dropzone-new").change(function() {
	    readFile(this);
	});

	$('.dropzone-wrapper-new').on('dragover', function(e) {
	    e.preventDefault();
	    e.stopPropagation();
	    $(this).addClass('dragover');
	});

	$('.dropzone-wrapper-new').on('dragleave', function(e) {
	    e.preventDefault();
	    e.stopPropagation();
	    $(this).removeClass('dragover');
	});

	//$('.remove_pic').on('click', function(event) {
	$(document).on("click",".remove_pic",function(event) {
		event.preventDefault();
		var getTarget = $(this).attr('data-target');
		//alert(getTarget);
		$(this).parent().hide();
		$('.'+getTarget).find('input.dropzone-new').val('');
		$('.'+getTarget).removeClass('hide');
		//return;
	    // var boxZone = $(this).parents('.preview-zone').find('.box-body');
	    // var previewZone = $(this).parents('.preview-zone');
	    // var dropzone = $(this).parents('.form-group').find('.dropzone-new');
	    // boxZone.empty();
	    // previewZone.addClass('hidden');
	    // reset(dropzone);
	});
	////////////////   
    
    
});


