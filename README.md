# Learning Resource Website: How to 1 - Creating the backend database

## Why have a database behind a website?

Websites can be categorized as **Static** or **dynamic**. A static site uses html to set out the content (text, images etc.) on the page. To change this you need to go into the code and re-write the HTML. A dynamic website uses html to set out a container for content. The actual content is stored in a database and sent to the container:
The content in a dynamic website is stored and edited within the database. This becomes useful in a website where the content needs changing or adding to frequently 9e.g. an online shop, a news site etc.)


![Static and Dynamic Websites](https://drpssandbox.000webhostapp.com/images/DocumentationScreenshots/Static&DynamicWebsites.png)

The cntent in a dynamic website is stored and edited within thedatabase. This becomes useful in a website where the content needs changing or adding to freuqently 9e.g. an online shop, a news site etc.)


If I am going to create a dynamic database. I need to have a clear idea of the information I am going to store in the database before I start building the website. A good place to start is to think about the things that I am going to be storing data on. WE call these things “Entities” in database terminology.


## What is a database?
A database can be thought of a set of interlinked lists or tables  of data. They are interlinked because by getting one list to refer to another we can save on repeating data. Repeated data is unnecessary and slows down the operation of the computer. The table represents the real world entities” we are trying to hold information about, or links between them.

We use a table to list the items we want to store as information because a table can divide up the information into rows, columns and individual cells.


| | **Columns (“Fields”** | | |
| :-------- |:-------| :-------| :-------|
| **Field names**| **Unique identifier** | **Name** | **Data of birth** |
| Rows “Records” | 1 | Bob | 08/07/1999 |
| | 2 |Jane| 21/03/2001 |
| | 3 | Bill| 26/12/2002 |

In a database table the rows represent the items we are listing (we call these records in database terminology)) and the columns represent the attributes of each of those items (we call these fields). I could select all the attributes (fields)  for record 1 to find out all the information about Bob, I could select just the date of birth attribute (field) for all the people, or I could home in on an individual cell - using a query that says SELECT date of birth FROM table WHERE name=”Bob”.

In this website, in the code dictionary section is that we can have a list of things we want to do in different programming languages. For instance I might want to know how to create an if ... statement in Python, but then later want to know how to do an if statement JavaScript. I could create a database with a long list of things that I want to be able to do:


| **Task_ID** | **Task** | **Languages** |
| :-------- |:-------| :-------|
| 1 | Create an if statement | Python |
| 2 |Create an If statement |JavaScript |
| 3 |Create a For loop | Python  |
| 4 | Create a For loop | JavaScript |

Note this table of data as an ID column, because we need a unique identifier (known as the primary key) for each item of data within a table.

In this table I am repeating information. Two rows repeat the task “Create an if statement”, two rws repeat the language “Python” etc. This is unnecessary repetition which can clog up computer memory and slow things down.

To be more efficient, instead of one table of data which repeats the information, I actually need three smaller tables which are linked.

The information I has consists of two lists - a list of things I want to be able to do (“Tasks”, and a list of programming languages. Each of these can be in a separate table. I do not need to repeat the wordy thighs in each list i.e. I only need the task “Create an if statement” in the tasks list once.

To create my list of all the things I want to be able to do in all the different languages, I need a third table which links them together. This does repeat information, but the information it repeats is very small - it is the unique identifier for the other two tables.

E.g.

<table border=1 cellpadding=1 cellpsacing=0)
<tr>
<th> List of tasks (tasks table)</th>
<th>Table to link them</th>
<th>List of languages (languages table)</th>
</tr>
<tr>
<td>

<table border=1 cellpadding=1 cellpsacing=0)
<tr>
<th>Task_ID</th>
<th>Task</th>
</tr>
<tr>
<td>1</td><td>Create an If statement</td>
</tr>
<tr>
<td>2</td><td>Create a For loop</td>
</tr>
</table>

<td>

<table border=1 cellpadding=1 cellpsacing=0)
<tr>
<th>Link_ID</th>
<th>Task_ID</th>
<th>Lang_ID</th>
</tr>
<tr>
<td>1</td>
<td>1</td>
<td>1</td>
</tr>
<tr>
<td>2</td>
<td>1</td>
<td>2</td>
</tr>
<tr>
<td>3</td>
<td>2</td>
<td>1</td>
</tr>
<tr>
<td>4</td>
<td>2</td>
<td>2</td>
</tr>
</table>

<td>
<table border=1 cellpadding=1 cellpsacing=0)
<tr>
<th>Lang_Id</th>
<th>Language</th>
</tr>
<tr>
<td>1</td><td>Python</td>
</tr>
<tr>
<td>2</td><td>JavaScript</td>
</tr>
</table>

</tr>
</table>


The tasks and languages tables does not repeat data, but the links table does,b however the items of repeated data are much smaller.

## Designing the database

We can now design the database. 

It’s useful to use a design tool to create a diagram that shows how the tables of data will be related:



![Database Diagram1](https://drpssandbox.000webhostapp.com/images/DocumentationScreenshots/DatabaseDiagram1.PNG)

Before we create the tables of data in the database management software (for this website we are going to be using the MySQL database through an interface called PHPMYAdmin.) We need to add some more information to the tables. We need to have an idea of the types of data which are going to be stored in them. For this we use a design tool called a data dictionary:

E.g.

| Field | Datatype | Attributes | Notes |
|:------|:---------|:-----------|:------|
| Tasks_ID | Int | Autonumber | This is the field that hold a unique identifier. We want this to be a whole number (Integer - hence data type “int”). We also want it to be designated as the unique identifier as the primary key.  To ensure that it is unique we need to make sure that when we add a new record to the database the number goes up by one automatically - we need it to Auto Increment. |
|  |  | Primary Key |  |
| Tasks | Var Char | 255  characters | A text field which uses the data type Var Char (variable character), set to a maximum of 255 characters. There are other text-based data types, but this is the best one to use because although you can set a maximum size for the field (to ensure sace isn’t wasted by e.g. input errors (someone accidentally leaning on the keyboard and inputting 100 characters of gibberish). The ‘variable’ nature of this data type means that it can hold up to 255 bytes (in this case) rather than exactly 255 characters. So we don’t waste data if we have a shorter section of text in this field. |
| Notes | Var Char | 4000 characters | As above but this needs to have a greater capacity, because we might want to write more |
| Current | Var Char | 50 characters | As above but shorter. We only want to store the information Yes or no. I could use a boolean data type here, or use an integer to look up the Id from another table, but I have used var Char because although I have in mind only the categories yes or No, I might want to add other characters later (e.g. “Pending”), so i have use var char to be more flexible |


## Creating the database


Once I have a clear idea of my database structure and a data dictionary, i can start to create the database. To do this I use the PHPMyAdmin web-based GUI for the MySQL database.

I hae two choices, now, I could use the GUI tools in PHPMYAdmin or I could write and SQL script to create the database. The GUI tools are more user friendly, but using a script mans that, one you have written it, recreating the database later (e.g. on a different server, or if you e to delete the database tables because of a problem), then it is much quicker.

First your need to create a database:

{note if you are creating a live website on a host such as 000websots.com then this stage will have been done for you.)

1) Create a new database:



![Create new database](https://drpssandbox.000webhostapp.com/images/DocumentationScreenshots/CodingDict_image1.png)

2) Create new table in that database:
![Create new database](https://drpssandbox.000webhostapp.com/images/DocumentationScreenshots/CodingDict_image2.png)

![Create new database](https://drpssandbox.000webhostapp.com/images/DocumentationScreenshots/CodingDict_image3.png)
