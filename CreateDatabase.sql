-- 1) Create the database:

CREATE DATABASE MyGlossary;

-- 2) Now within that glossary database create the tables you need:
-- You will need to think about the datatypes and field sizes of 
-- the fields you are creating

-- The Code Dictionary Table:

CREATE TABLE `myglossary`.`code_dictionary_tbl` 
( `CDict_ID` INT NOT NULL AUTO_INCREMENT , 
`Task` VARCHAR(255) NOT NULL , 
`Language` INT NOT NULL , 
`Interface_Type` VARCHAR(255) NOT NULL ,  
`Sample_Code` VARCHAR(4000) NOT NULL , 
`Link` VARCHAR(1000) NOT NULL , 
PRIMARY KEY (`CDict_ID`)) ENGINE = InnoDB;

-- The Languages lookup table:
CREATE TABLE `myglossary`.`languages_tbl` 
( `Language_ID` INT NOT NULL AUTO_INCREMENT , 
`Language_Name` VARCHAR(255) NOT NULL , 
`Language_Notes` VARCHAR(255) NOT NULL ,  
PRIMARY KEY (`Language_ID`)) ENGINE = InnoDB;

-- 3) Add some data to your database. It is usually better to create a web form 
-- to make entering the data more user friedly ( a CRUD app), but you might 
-- want to get a few records into your dataabase quickly for dtesting purposes 
-- (so the webpage has some data to look at).

-- Firstly the code_dictionary_tbl (note the langue field is an integer, 
-- which will lookup it's value in the languages_tbl:

INSERT INTO code_dictionary_tbl (Task, Language, Interface_Type, Sample_Code, Link)
VALUES ("Display to screen", 1, "Command Line", "print('hello world')","https://en.wikibooks.org/wiki/Python_Programming/Input_and_Output"),
("Display to screen", 2, "GUI", "document.write('hello world')", "https://www.w3schools.com/jsref/met_doc_write.asp"),
("Display to screen", 3, "GUI", "echo 'hello world'", "https://www.w3schools.com/php/php_echo_print.asp");

-- second create the languages_tbl:
INSERT INTO languages_tbl (Language_Name, Language_Notes)
VALUES ("Python","Some notes about python"),
("JavaScript","Some stuff about javaScript"),
("PHP","PHP notes"),
("C#", "& C# stuff"),
("Java","some Java stuff");

-- Relational Query using inner join syntax

SELECT code_dictionary_tbl.Task, code_dictionary_tbl.Sample_Code, languages_tbl.Language_Name
FROM code_dictionary_tbl
INNER JOIN languages_tbl
ON code_dictionary_tbl.Language = languages_tbl.Language_ID
WHERE code_dictionary_tbl.Task="Display to screen";



