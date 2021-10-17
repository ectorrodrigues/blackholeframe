<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackedit.io/style.css" />
</head>

<body class="stackedit">
  <h1>Blackhole Framework</h1>
  <h3>An ultra-compressed framework.</h3><br>
  <div class="stackedit__html"><p>These are my studies on a framework intended to help on the creation of websites and web applications.</p>
<p>It is called Black Hole because the core of it only have 1 file to get all working, so it is extremely condensed.</p>
<h1 id="usage"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#usage"></a>USAGE</h1>
<h2 id="pre-setup"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#pre-setup"></a>PRE SETUP</h2>
<p>To start using the only pre setup you need is an server running on your computer aka: Xampp or similar. (of course, php, mysql and that stuff is required, but it is usually already on server defaults)</p>
<h2 id="setup"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#setup"></a>SETUP</h2>
<h2 id="section"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#0"></a>0</h2>
<p>Browse to <a href="http://bit.ly/blackholefw">bit.ly/blackholefw</a> There you will find a screen with instructions for instalattion</p>
<h2 id="section-1"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#1"></a>1</h2>
<p>Enter the name of your project, just lowercase letters and numbers, without spaces. This will be use for a full range of things, including the name of the path of your project</p>
<h2 id="section-2"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#2"></a>2</h2>
<p>Right click, and save the file “bigbang.php” on the the root folder of your project. (The folder who have to be the same name you gave above)</p>
<h2 id="section-3"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#3"></a>3</h2>
<p>Click on the indication to start. On doing it all the files will be downloaded to your project folder, and you will be able to start customize your project.</p>
<p>That’s it.</p>
<h2 id="mechanics"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#mechanics"></a>MECHANICS</h2>
<p>To customize your pages, edit the index and other files inside [yourproject]/app/view/pages/[pagename].</p>
<p>You can code as you wish on these files.</p>
<p>To create a loop, requesting from the database to show some information, you need to put your content between de markers. This will get the name of the page you are in, so let’s say you are on Items page, it will query the following sql: “SELECT * FROM items”.</p>
<p>If you want to customize the sql you can put the parameters between markers, inside the markers. The parameters are: table, content, where, extras, orderby, order, limit You need to write the parameters like that: [parameter]=[value]; e.g:</p>
<p>table=item;orderby=id;order:ASC;</p>
<p>This will pass the paramameters who will be send to construct the sql request to the database.</p>
<p>To tell what column from database you want to be show, you need to put it between keys. See the following example:</p>
<h2 id="db"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#db"></a>DB</h2>
<h3 id="table-name--items"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#table-name--items"></a>Table Name &gt; items</h3>
<pre><code>id | title | content
----------------------
1  | John  | lorem
----------------------
2  | Maria | ipsum
----------------------
3  | Jack  | dolor

</code></pre>
<hr>
<h3 id="file--appviewpagesitemsindex.php"><a href="https://github.com/ectorrodrigues/blackholeframe/tree/6b008e79a68dce7e8af77fc2db503017205ee942#file--appviewpagesitemsindexphp"></a>File &gt; /app/view/pages/items/index.php</h3>
<pre><code>&lt;loop&gt;
  &lt;sql&gt;table=items;&lt;/sql&gt;

  &lt;h1&gt;
    {title}
  &lt;/h1&gt;
  &lt;div class="col-10"&gt;
    {content}
  &lt;/div&gt;

&lt;/loop&gt;

</code></pre>
<hr>
<p>The example above will produce the following html output:</p>
<pre><code>&lt;h1&gt;
  John
&lt;/h1&gt;
&lt;div class="col-10"&gt;
  lorem
&lt;/div&gt;

&lt;h1&gt;
  Maria
&lt;/h1&gt;
&lt;div class="col-10"&gt;
  ipsum
&lt;/div&gt;

&lt;h1&gt;
  Jack
&lt;/h1&gt;
&lt;div class="col-10"&gt;
  dolor
&lt;/div&gt;
</code></pre>
</div>
</body>

</html>
