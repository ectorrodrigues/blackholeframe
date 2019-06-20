# blackholeframe
Black Hole Framework

These are my studies on a framework intended to help on the creation of websites and web applications.

It is called Black Hole because the core of it only have 1 file to get all working, so it is extremely condensed.


## USAGE

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
To customize your pages, edit the index and other files inside [yourproject]/app/view/pages/[pagename]
You can code as you wish on these files.

To create a loop, requesting from the database to show some information you need to put your content between de <loop> markers. Inside this loop markers you should put the <loop_sql> marker, which will pass the paramameters who will be send to construct the sql request to the database.
To tell what column from database you want to be show, you need to put it between keys.
See the following example:

## DB
### Table items

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

### /app/view/pages/items

```
<loop>
  <loop_sql><?= "table=items;where= ;extras= ;orderby=id;order=ASC;limit= ;"; ?></loop_sql>

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
