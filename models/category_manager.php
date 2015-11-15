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

			if ($parentExists) {
				# Create data for table insertion
				$owner = $_SESSION['username'];
				$location = $parentExists['location'];
				$date_stamp = date('Y-m-d H:i:s');

				# SPECIAL CASE #1 - Creating another top level category *NOT IMPLEMENTED*

				# SPECIAL CASE #2 - Creating category after top level (i.e. Computer Science)
				if($parentExists['description'] == "Computer Science") {
					# Get all of the children under the parent
					$reg = "^1.[0-9]+$"; 
					$findChildren = $db->prepare('SELECT location FROM categories 
												  WHERE location REGEXP :reg');
					$findChildren->execute(array('reg' => $reg));
					$children = $findChildren->fetchAll(PDO::FETCH_ASSOC);

					# Count the number of childen found
					$childrenCount = count($children);
					# Affix the location for the new category
					$childrenCount++;
					$location = $parentExists['location'] . "." . $childrenCount;
					# Insert the category into the table
					$createCategory = $db->prepare('INSERT INTO categories (location, description, owner, datetime)
												   VALUES (:location, :new_category, :owner, :date_stamp)');
					$createCategory->execute(array('location' => $location, 'new_category' => $new_category,
												   'owner' => $owner, 'date_stamp' => $date_stamp));
				} else {
					$parentLocation = $parentExists['location'];
					$parentLocation .= "%";

					# Get all of the children under the parent 
					$findChildren = $db->prepare('SELECT location FROM categories WHERE location LIKE :parentLocation');
					$findChildren->execute(array('parentLocation' => $parentLocation));
					$children = $findChildren->fetchAll(PDO::FETCH_ASSOC);

					# Count the number of childen found
					$childrenCount = count($children);

					$location = $parentExists['location'] . "." . $childrenCount;

					$createCategory = $db->prepare('INSERT INTO categories (location, description, owner, datetime)
												   VALUES (:location, :new_category, :owner, :date_stamp)');
					$createCategory->execute(array('location' => $location, 'new_category' => $new_category,
												   'owner' => $owner, 'date_stamp' => $date_stamp));
				}
			} else {
				echo "Category already exists!" . "<br />";
			}



		}

		public static function delete($category, $parent) {
			
		}



	}



?>
