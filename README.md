<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
</head>
<body>

<h1>🌌 BlackholeFrame</h1>

<p>BlackholeFrame is an ultracondensed PHP framework designed for fast development of dynamic websites using a loop-based templating system.</p>

<hr>

<h1 id="usage">USAGE</h1>

<h2 id="pre-setup">PRE SETUP</h2>

<p>
To start using the only pre setup you need is a server running on your computer
aka: Xampp or similar. (of course, php, mysql and that stuff is required,
but it is usually already on server defaults)
</p>

<h2 id="setup">SETUP</h2>

<h2>0</h2>

<p>
Browse to <a href="http://bit.ly/blackholefw">http://bit.ly/blackholefw</a>.
There you will find a screen with instructions for installation.
</p>

<h2>1</h2>

<p>
Enter the name of your project, just lowercase letters and numbers, without spaces.
This will be used for many things, including your project folder name.
</p>

<h2>2</h2>

<p>
Right click and save the file <strong>bigbang.php</strong> in the root folder of your project
(the folder must have the same name you provided above).
</p>

<h2>3</h2>

<p>
Click the indication to start. All files will be downloaded to your project folder
and you can start customizing your project.
</p>

<p>That’s it.</p>

<hr>

<h2>It focuses on:</h2>

<ul>
<li>Minimal structure</li>
<li>Automatic database rendering</li>
<li>&lt;loop&gt; driven templates</li>
<li>Inline SQL configuration</li>
<li>Function filters inside templates</li>
<li>Zero dependencies</li>
</ul>

<p><strong>The philosophy is simple: HTML first, PHP invisible.</strong></p>

<hr>

<h1>🚀 Features</h1>

<ul>
<li>Automatic routing by folder name</li>
<li>Database rendering via &lt;loop&gt;</li>
<li>Inline SQL using &lt;sql&gt;</li>
<li>Field placeholders {column}</li>
<li>Function filters {function-&gt;slug-&gt;title}</li>
<li>PDO MySQL backend</li>
<li>Extremely small core</li>
<li>Built-in Bootstrap</li>
<li>Built-in Fontawesome</li>
<li>Built-in jQuery library</li>
<li>Built-in CKEditor</li>
</ul>

<hr>

<h1>📁 Folder Structure</h1>

<pre>
/
│ index.php
| .htaccess
│ README.md
| void.php (only for install)
| singularity.php (only for install)
│ bigbang.php (only for install)
│
└── app/
    |
    ├── config/
    │     config.php
    │     database.php
    │     directories.php
    |
    ├── model/
    │     AppModel.php
    │     AdminModel.php
    |
    ├── vendors/
    │     composer/
    |     etc.
    │
    ─── view/
        |
        --- elements/
            |
            |── site/
            |     banners.php
            |     footer.php
            |     gallery.php
            |     head.php
            |     menu-mobile.php
            |     menu.php
            |     top.php
            |         
            |── helper/
            |     form.php
            |     list.php
            |
        |
        |── pages/
            |
            |── home/
            |     index.php
            |    
            |── items/
            |     index.php
            |     item.php
            |
    |        
    |─── webroot/
        |
        | index.php
        | admin.php
        | login.php
        | logout.php
        | 
        |── css/
        |     style.css
        |
        |── files/
        |     logo.svg
        |     etc.
        |
        |── img/
            |
            |── banners/
            |     banner-01.webp
            |     etc.
            |
            |── items/
            |     item-01.webp
            |     etc.
            |
        |── js/
        |     etc.
    
</pre>

<hr>

<h1>⚙️ Installation</h1>

<ol>
<li>Make sure you have PHP 7+, MySQL, Apache.</li>
<li>Access the void.php to start the cloning.</li>
<li>Follow the steps</li>
<li>Visit http://localhost{:port}/yourproject</li>
</ol>

<hr>

<h1>🌐 Routing</h1>

<p>http://localhost/yourproject/items → http://localhost/yourproject/app/view/pages/items/index.php</p>

<hr>

<h1>🔁 Basic Loop</h1>

<pre>
&lt;loop&gt;
  &lt;h1&gt;{title}&lt;/h1&gt;
  &lt;p&gt;{description}&lt;/p&gt;
&lt;/loop&gt;
</pre>

<hr>

<h1>🧠 SQL Customization</h1>

<pre>
&lt;loop&gt;
  &lt;sql&gt;
    table=items;
    where=category=2;
    orderby=id;
    order=DESC;
    limit=5;
  &lt;/sql&gt;

  &lt;h2&gt;
    {title}
  &lt;/h2&gt;
  
&lt;/loop&gt;
</pre>

<hr>

<h1>🧩 Placeholders</h1>

You fetch the data from the database by simply telling the column you want within braces. eg.:
<pre>
{title}
{description}
{id}
</pre>

<hr>

<h1>🔧 Function Filters Examples</h1>

<pre>
{function-&gt;slug-&gt;title}
{function-&gt;uppercase-&gt;title}
{function-&gt;limit_chars_200-&gt;description}
</pre>

<hr>

<h1>🛠 Internal Flow</h1>

<ol>
<li>Scan loops</li>
<li>Extract columns</li>
<li>Clean SQL</li>
<li>Query PDO</li>
<li>Apply PHP functions</li>
<li>Replace placeholders</li>
</ol>

<hr>

<p><strong>Author:</strong> Éctor Rodrigues</p>
<p><strong>License:</strong> MIT</p>

</body>
</html>