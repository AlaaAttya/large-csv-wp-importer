<?php

require_once 'config.php';
require_once 'Constants/Log.php';
require_once 'ImporterLog.php';
require_once 'PostProcessor.php';
require_once 'IProcess.php';

/**
 * @author	Alaa Attya <alaa.attya91@gmail.com>
 */
class CSVProcessor implements IProcess {

	/**
	 * @var 	string
	 * @access	private
	 */
	private $_csv_file_path;


	/**
	 * @var		string
	 * @access	private
	 */
	private $_csv_rows_per_file;

	/**
	 * @var		string
	 * @access 	private
	 */
	private $_files_count = 0;

	/**
	 */
	function __construct($csv_file_path, $rows_per_file) {
		$this->_csv_file_path = $csv_file_path;
		if(is_null($rows_per_file)) {
			$this->_csv_rows_per_file = 10;
		} else {
			$this->_csv_rows_per_file = $rows_per_file;
		}
	}

	/**
	 * Process the main CSV file
	 *
	 * @access	public
	 * @return 	void
	 */
	public function process() {
		// Split CSVs
		$this->split_csv();

		// Process files
		$this->process_files();
	}

	/**
	 * Split the main CSV file into smaller chunks
	 */
	public function split_csv() {
		$count = 0;

		// TODO: read csv file
		$rows = array();

		// Read each single row
		foreach ($rows as $row) {
		  	if($count <= $this->_csv_rows_per_file) {
		  		$count++;
		  		

		  	} else {
		  		$count = 0;
		  		// Create new file, file name = `$files_count`.csv

		  		// Update files count
		  		$this->_files_count++;

				// TODO log new file has been created
				$now_date = date('Y-m-d h:i:s');
				$msg = sprintf(Log::FILE_CREATED, $this->_files_count . '.csv', $now_date);
				LogImporter::insert_new_log($msg);
		  	}
		}  
	}


	public function process_files() {

		// Loop through the splitted files
		for($i=0; $i <= $this->_files_count; $i++) {
			// Open file

			// Insert file contents
			$rows = array();

			foreach($rows as $row) {
				// TODO check post existence
				$post = new PostProcessor($row);
				$post->process();
			}
		}
	}
}