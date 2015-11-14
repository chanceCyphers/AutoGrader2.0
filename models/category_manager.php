<?php

	class CategoryManager {

		public static function view() {
			$db = Db::getInstance();

			$categoryQuery = $db->prepare('SELECT description FROM categories');
			$categoryQuery->execute();

			$categoryList = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);

			return $categoryList;
		}

		public static function create($new_category, $parent) {
			$db = Db::getInstance();

			# Find the parent first
			$findParent = $db->prepare('SELECT description, location FROM categories
										 WHERE description = :parent');
			$findParent->execute(array('parent' => $parent));
			$parentExists = $findParent->fetch(PDO::FETCH_ASSOC);

			# If the parent exists, get its location, and modify it to set the new categories
			# location in the hierarchy
			if ($parentExists) {
				$owner = $_SESSION['username'];
				$location = $parentExists['location'];
				$date_stamp = date('Y-m-d H:i:s');
				# Split up the location
				$locationArray = explode(".", $location);
				# Get the end value of the parent's location and increment it by 1
				$lastIndex = count($locationArray) - 1;
				$locationArray[$lastIndex] = $locationArray[$lastIndex] + 1;
				# Reassemble the new location for the new category
				$new_cat_location = "";
				for ($i = 0; $i < count($locationArray); $i++) {
					$new_cat_location .= $locationArray[$i] . ".";
				}
				# Since this new category can be a parent, add an opening at the end.
				$new_cat_location .= "0";

				$createCategory = $db->prepare('INSERT INTO categories (location, description, owner, datetime)
											   VALUES (:new_cat_location, :new_category, :owner, :date_stamp)');
				$createCategory->execute(array('new_cat_location' => $new_cat_location, 'new_category' => $new_category,
											   'owner' => $owner, 'date_stamp' => $date_stamp));
			} else {
				echo "Category already exists!" . "<br />";
			}



		}



	}



?>
