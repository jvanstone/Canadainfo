jQuery.fn.extend({
	printElem: function() {
		var cloned = this.clone();
		var printSection = $('#printSection');
		if (printSection.length == 0) {
			printSection = $('<div id="printSection"></div>')
			$('body').append(printSection);
		}
		printSection.append(cloned);
		var toggleBody = $('body *:visible');
		toggleBody.hide();
		$('#printSection, #printSection *').show();
		window.print();
		printSection.remove();
		toggleBody.show();
	}
});

$(document).ready(function(){
	$(document).on('click', '#btnPrint', function(){
  	$('.printMe').printElem();
  });
});


