AutoGrader Database Schema/README
Database Name: autograderdb

# Question Table #
##################
This table will hold all of the unique questions that are created by the professor users in the application.

Table Name: questions

q_id 		The unique ID of the question. PRIMARY KEY
type 		The various identifiers for the types of questions.
title		The title given to the question.
text 		The prompt/text of the question.
answer 		The correct answer of the question.
choice_1 	Multiple choice only - one of the incorrect choices.
choice_2 	Multiple choice only - one of the incorrect choices.
choice_3	Multiple choice only - one of the incorrect choices.
owner 		The username of the creator of the question.
cat_id 		The ID of the category where the question exists.
visible 	The setting to make the question shared or not.
permitted 	The list of individual user names that are allowed to use the question.

# Category Table #
##################
This table will hold all of the types of categories where questions "live" for an easy way to sort and organize. Currently categories can be created inside of other categories, so a location must be unique for each category. This is done by assigning the topmost category the ID of 1, and then any categories created inside that take the format 1.1, 1.2, 1.3 and so on. Any categories created inside those take the format of 1.1.1, 1.1.2, 1.1.3, 1.2.1, 1.2.2, 1.2.3 and so on.

Table Name: categories

cat_id 		The unique ID of the category. PRIMARY KEY
location	In the format x.x.x... where x is a number to determine location.
description The name of the category.
owner 		The username of the creator of the category.
timestamp 	When the category was created.

# Question Types #
#################
Each question should be assigned a specific type, and this table holds the associations to those types. 1 = TRUE/FALSE, 2 = SHORT ANSWER, 3 = MULTIPLE CHOICE, 4 = ESSAY, 5 = DYNAMIC, 6 = CODING.

Table Name: question_types

type_id		The unique ID of the question. PRIMARY KEY
name 		The name of the question type (TRUE/FALSE, ESSAY, etc)

# User Table #
##############
Contains all information about the users that register for use of the website.

Table Name: users

username 	The name of the user that registered. PRIMARY KEY
pwd 		The password of the user. When these are entered, should use SHA.
email 		The email that the user registered with.
group_id 	The unique identifier to associate with a user.
perm_id 	The type of permissions the user has to access the site.

# Group Table #
###############
Table to identify unique groups that students and professors can belong to. My thoughts are that they will use this to categorize students by the class they are in (there could be a group for COSC481 for instance).

Table Name: groups

group_id	The unique ID of the group. PRIMARY KEY
description The name of the group to assign users to.

# Permissions Table #
#####################
Different users will be able to do different things. ADMINS can change the site and have the highest permissions. PROFESSORS can create questions, groups, categories and tests. STUDENTS can take tests and view results. GUESTS are the default that are only able to login to the site.

Table Name: permissions

perm_id 	The unique ID of the permissions category. PRIMARY KEY
description The name of the permissions category.

# Test Table #
##############
This table holds all of the tests that have been created by users. They will store the unique id's of the questions that are used in the test, as well as the owner, the test takers, and the category that the question is stored in.

Table Name: tests

test_id 	The unique ID of the test that was created. PRIMARY KEY
cat_id 		The id of the category where the test is found.
q_ids		The list of the ids of the questions used in the test.
owner		The user that created the test and that will get the results.
groups		The id's of the groups that can take the test in a list format.

