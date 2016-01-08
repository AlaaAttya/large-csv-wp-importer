<?php 
    /*
    Plugin Name: Large CSV file importer
    Plugin URI: http://alaa.ninja
    Description: Plugin for importing large csv file of posts
    Author: Alaa Attya
    Version: 1.0
    Author URI: http://alaa.ninja
    */


    add_action('admin_menu','super_plugin_menu');

	/**
	 * Add the admin page plugin menu
	 *
	 * @return	void
	 */
    function super_plugin_menu() {
    	add_menu_page( 'CSV importer', 'Upload CSV', 'manage_options', 'csv-importer-plugin', 'upload_page' );
    }

	/**
	 * Handle the upload page
	 *
	 * @return	void
	 */
    function upload_page() {
    	// Adding assets
    	wp_enqueue_style( 'bootstrap_lib', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css' );
    	wp_enqueue_script( 'jquery_lib', 'https://code.jquery.com/jquery-2.1.4.min.js');
    	wp_enqueue_script( 'bootstrap_js_lib', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js');
    	wp_enqueue_script( 'pusher_js_lib', 'https://js.pusher.com/3.0/pusher.min.js' );
    	wp_enqueue_script( 'pusher', plugin_dir_url( __FILE__ ) . '/assets/js/pusher.js' );
    	
    	// Handle file upload
    	handle_file_upload();

    	echo "<h3>Upload CSV</h3>";
    	

    	$progress_bar = "
    	<div class='progress progress-striped active'>
		   <div class='progress-bar' role='progressbar' aria-valuenow='0' aria-valuemin='0' aria-valuemax='100'>
		    </div>
		</div>";
    	
    	echo $progress_bar;

    	$html_page = '
    		<div class="page_wrapper">
    			<form method="post" enctype="multipart/form-data">
    				Upload an image: <input type="file" name="csv_file" id="csv_file" />
    				<input type="submit" />
    			</form>
    		</div>
    	';
    	echo $html_page;
    }

	/**
	 * Handle file upload
	 *
	 * @return	void
	 */
    function handle_file_upload() {

    	if(isset($_FILES['csv_file'])) {
    		$arr_file_type = wp_check_filetype(basename($_FILES['csv_file']['name']));
    		$uploaded_file_type = $arr_file_type['type'];

    		// Set an array containing a list of acceptable mimes
            $mimes = array('application/vnd.ms-excel','text/plain','text/csv','text/tsv');

            if(\in_array($uploaded_file_type, $mimes)) {
            	$upload_overrides = array( 'test_form' => false );
            	$uploaded_file = wp_handle_upload($_FILES['csv_file'], $upload_overrides);
            	// Execute the importing script in the background without blocking the plugin execution
            	$out = shell_exec('php ' . plugin_dir_path( __FILE__ ) .'large-csv-wp-importer/main.php ' . $uploaded_file['file'] . '  >> /dev/null &');
            } else {
            	echo "<b><h4>invalid file format</h4></b>";
            }
    	}
    }
?>