<?php

	class CategoryManager {

		public static function view() {
			$db = Db::getInstance();
			$origin = "1";

			$categoryQuery = $db->prepare("SELECT description FROM categories");
			$categoryQuery->execute();

			$categoryList = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

			return $categoryList;
		}

		public static function create() {
			$db = Db::getInstance();			

		}



	}



?>
