<?php
require_once 'models/model.php';
class header extends model {

	public function getAll() {
		$con = $this->connection();
		$querySelect = "SELECT * FROM category";
		$result = mysqli_query($con, $querySelect);
		$brands = [];
		if (mysqli_num_rows($result) > 0) {
			$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
		}
		return $categories;
	}
}

?>