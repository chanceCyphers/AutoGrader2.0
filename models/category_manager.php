<?php

	class CategoryManager {

		public static function view() {
			$db = Db::getInstance();
			$origin = "1";

			$categoryQuery = $db->prepare("SELECT * FROM categories");
			$categoryQuery->execute();

			$categoryList = $categoryQuery->fetch(PDO::FETCH_ASSOC);

			return $categoryList;
		}

		public static function create($description, $parent) {
			$db = Db::getInstance();			

		}



	}



?>
