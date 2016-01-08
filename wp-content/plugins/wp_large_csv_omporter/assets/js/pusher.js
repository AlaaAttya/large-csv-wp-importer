// Enable pusher logging - don't include this in production
Pusher.log = function(message) {
  if (window.console && window.console.log) {
    	window.console.log(message);
  	}
};

  var pusher = new Pusher('79b91c266ebd93c0cbad', {
    	encrypted: true
  });
  var channel = pusher.subscribe('progress-channel');
  channel.bind('progress_update', function(data) {
    	
    	$('.progress-bar').css('width', data +'%').attr('aria-valuenow', data);    
  });