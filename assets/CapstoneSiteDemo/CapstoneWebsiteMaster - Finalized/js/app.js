

$(document).ready(function(){
  jQuery('.getvalue').on('click', function(e) {
	$('#message').show().text($("input:radio[name=tickets]:checked").val());
  });
});

