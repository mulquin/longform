<?php

class MetaDB
{
	private $db;

	private $db_file;

	public function __construct($meta_db = null)
	{
		$this->db = $meta_db;
		$this->db_file = ROOT_DIR . 'meta_db.php';
	}

	public function getDB()
	{
		return $this->db;
	}

	public function setDB($db)
	{
		$this->db = $db;
	}

	/* Look through the Meta DB file
	 * and set the $db object to the contents
	 * of the file
	 */
	public function readDBFile()
	{
		$db = file($this->db_file);
		array_shift($db);
		$db = array_map(array(&$this, '_readDBFile'), $db);

		$this->setDB($db);
	}

	private function _readDBFile($db_record)
	{
		$record_parts = explode("'", $db_record);
		return $record_parts[3];
	}

	/* Convert the $db object into a format
	 * for the Meta DB file
	 */
	public function writeDBFile()
	{
		$out_str = "<?php\n";
		
		foreach ($this->db as $db_record) {
			$out_str .= "\$db['meta'][] = '".$db_record."'\n";
		}

		var_dump($out_str);

		$this->_writeDBFile($out_str);
	}

	private function _writeDBFile($out_str)
	{
		if (file_put_contents($this->db_file, $out_str) !== false) {
			return true;
		} else {
			return false;
		}
	}
}