# blackholeframe
Black Hole Framework

These are my studies on a framework intended to help on the creation of websites and web applications.

It is called Black Hole because the core of it only have 1 file to get all working, so it is extremely condensed.




# USAGE


## PRE SETUP
To start using the only pre setup you need is an server running on your computer aka: Xampp or similar.
(of course, php, mysql and that stuff is required, but it is usually already on server defaults)


## SETUP

## 0
Browse to bit.ly/blackholefw
There you will find a screen with instructions for instalattion

## 1
Enter the name of your project, just lowercase letters and numbers, without spaces.
This will be use for a full range of things, including the name of the path of your project

## 2
Right click, and save the file "bigbang.php" on the the root folder of your project. (The folder who have to be the same name you gave above)

## 3
Click on the indication to start. On doing it all the files will be downloaded to your project folder, and you will be able to start customize your project.

That's it.


## MECHANICS
To customize your pages, edit the index and other files inside [yourproject]/app/view/pages/[pagename].

You can code as you wish on these files.

To create a loop, requesting from the database to show some information, you need to put your content between de <loop></loop> markers. This will get the name of the page you are in, so let's say you are on Items page, it will query the following sql: "SELECT * FROM items".

If you want to customize the sql you can put the parameters between <sql></sql> markers, inside the <loop></loop> markers.
The parameters are: table, content, where, extras, orderby, order, limit
You need to write the parameters like that: [parameter]=[value];
e.g:

<loop>
 <sql>table=item;orderby=id;order:ASC;</sql>
</loop>

This will pass the paramameters who will be send to construct the sql request to the database.

To tell what column from database you want to be show, you need to put it between keys.
See the following example:

## DB
### Table Name > items

```
id | title | content
----------------------
1  | John  | lorem
----------------------
2  | Maria | ipsum
----------------------
3  | Jack  | dolor
```

----------------------------------------------------

### File > /app/view/pages/items/index.php

```
<loop>
  <sql>table=items;</sql>

  <h1>
    {title}
  </h1>
  <div class="col-10">
    {content}
  </div>

</loop>
```
----------------------------------------------------

The example above will produce the following html output:
```
<h1>
  John
</h1>
<div class="col-10">
  lorem
</div>

<h1>
  Maria
</h1>
<div class="col-10">
  ipsum
</div>

<h1>
  Jack
</h1>
<div class="col-10">
  dolor
</div>
```
