<?php

	class CategoryManager {

		// Returns list of all of the categories by their description and location, ordered by location
		public static function getAllCategories() {
			$db = Db::getInstance();
			$categoryQuery = $db->prepare('SELECT location, description
											 FROM categories
										 ORDER BY location
										');
				$categoryQuery->execute();
			$allCategories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);
			return $allCategories;
		}

		// Returns list of the top level categories in the category hierarchy
		public static function getCategoryTopLevel() {
			$db = Db::getInstance();
			// Regex that grabs all top-level categories using location
			$regexForTopLevel = "^[0-9]+$";
			$categoryQuery = $db->prepare('SELECT location, description 
											 FROM categories 
											WHERE location REGEXP :regex
										 ORDER BY location'
										 );
				$categoryQuery->execute(array('regex' => $regexForTopLevel));
			$allTopCategories = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);
			return $allTopCategories;
		}

		// Return a list of the children of a single category in the hierarchy
		public static function getCategoryChildren($categoryLOC) {
			$db = Db::getInstance();
			// Regex that grabs all of the children of one category using location
			$regexForChildren = "^" . $categoryLOC . ".[0-9]+$";
			$categoryQuery = $db->prepare('SELECT location, description 
											 FROM categories 
											WHERE location REGEXP :regex
										 ORDER BY location'
										 );
				$categoryQuery->execute(array('regex' => $regexForChildren));
			$childrenList = $categoryQuery->fetchAll(PDO::FETCH_ASSOC);
			return $childrenList;
		}

		public static function getCategoryIDByLocation($categoryLOC) {
			$db = Db::getInstance();
			$categoryIDQuery = $db->prepare('SELECT cat_id
											   FROM categories
											  WHERE location = :categoryLOC
										   ');
				$categoryIDQuery->execute(array('categoryLOC' => $categoryLOC));
			$categoryID = $categoryIDQuery->fetch(PDO::FETCH_ASSOC);
			return $categoryID;

		}

		// Creates the location id for a new category to be inserted under an existing category
		public static function getNewLocation($locationParent) {
			$rowsOfChildren = CategoryManager::getCategoryChildren($locationParent);
			$numberOfChildren = count($rowsOfChildren);			
			$numberOfChildren++;
			$newLocation = $locationParent . "." . $numberOfChildren;
			return $newLocation;
		}

		// Allows for the creation of a category under another category in the hierarcy
		public static function create($name, $locationParent) {
			$db = Db::getInstance();

			$location = CategoryManager::getNewLocation($locationParent);
			$description = $name;
			$owner = $_SESSION['username'];
			$date = date('Y-m-d H:i:s');

			$createQuery = $db->prepare('INSERT INTO categories (location, description, owner, datetime)
											  VALUES (:location, :description, :owner, :date)
										');
				$createQuery->execute(array('location' => $location, 'description' => $description,
											'owner' => $owner, 'date' => $date));
		}

		// Deletes a category from the hierarchy/tree of categories
		public static function delete() {


		}

		// When a category is deleted, this function reassigns the questions and tests
		// associated with it to its parent category
		public static function reassign() {

		}














		/* Retiring all of these options in favor of restoring to previous function

		# Returns a list of categories that are sorted by their location identifiers
		public static function view() {
			$db = Db::getInstance();

			$categoryQuery = $db->prepare('SELECT location, description FROM categories ORDER BY location');
			$categoryQuery->execute();
;
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

			#### THIS CAN BE EXTRACTED TO HELPER FUNCTION (DRY)
			# Find out if the one to be created under the parent already exists
			$parentLocation = $parentExists['location'];
			$parentLocation .= "%";
			$findDuplicate = $db->prepare('SELECT description FROM categories WHERE location LIKE :parentLocation');
			$findDuplicate->execute(array('parentLocation' => $parentLocation));
	
			# Search for a duplicate of the category
			while ($row = $findDuplicate->fetch(PDO::FETCH_ASSOC)) {
				if ($row['description'] == $new_category) {
					echo "That category already exists under this parent!";
					$duplicateFound = true;
					return;
				}
			}

			# Reaching this point means that the category can be created as new under this parent.
			if ($parentExists) {
				# Create data for table insertion
				$owner = $_SESSION['username'];
				$location = $parentExists['location'];
				$date_stamp = date('Y-m-d H:i:s');

				# SPECIAL CASE #1 - Creating another top level category *NOT IMPLEMENTED*

				# SPECIAL CASE #2 - Creating category after top level (i.e. Computer Science)
				if($parentExists['description'] == "Computer Science") {
					# Find the number of categories that already exist
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
				echo "Parent does not exist!" . "<br />";
			}



		}

		public static function delete($category, $parent) {

		}

		public static function edit() {
			
		}


*/

	}


?>
