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
        data = JSON.parse(data);

    	$('.progress-bar').css('width', (parseFloat(data.percent)) +'%').attr('aria-valuenow', (parseFloat(data.percent)));
        $("#success-count").text(data.count);
  });

// New updated row
channel.bind('row_update', function(data) {
  data = JSON.parse(data);
  $('#output-wrapper').append('<div><span class="label label-info">updated</span> vendor id: '+ data.vendor_id +', title: ' + data.title +'</div>');
});

// New inserted row
channel.bind('row_insert', function(data) {
  data = JSON.parse(data);
  $('#output-wrapper').append('<div><span class="label label-primary">inserted</span> vendor id: '+ data.vendor_id +', title: ' + data.title +'</div>');
});

// Insert error
channel.bind('insert_error', function(data) {
  data = JSON.parse(data);
  $('#output-wrapper').append('<div><span class="label label-danger">error</span> vendor id: '+ data.vendor_id +', title: ' + data.title +'</div>');
});