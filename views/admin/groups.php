<h2> Group Manager </h2>

<?php

	echo "Available Groups <br/>";
	foreach($groupList as $array => $keys) {
		foreach ($keys as $key => $value) {
			echo $value . "<br/>";
		}
	}

echo " <br/> ";

echo "  Create New Group  ";
echo "	<form action='?controller=admin&action=manageGroups' method='post'> ";
echo "  <input type='text' name='group_create'>  ";
echo "  <input type='submit' value='Create'>  ";
echo "  </form>  ";

echo " <br/> ";

echo "  Rename Group  ";
echo "	<form action='?controller=admin&action=manageGroups' method='post'> ";
echo "  <input type='text' name='group_name' placeholder='old name'>  ";
echo "  <input type='text' name='group_new_name' placeholder='new name'>  ";
echo "  <input type='submit' value='Create'>  ";
echo "  </form>  ";

echo " <br/> ";

echo "  Delete Group  ";
echo "	<form action='?controller=admin&action=manageGroups' method='post'> ";
echo "  <input type='text' name='group_delete'>  ";
echo "  <input type='submit' value='Create'>  ";
echo "  </form>  ";

?>

