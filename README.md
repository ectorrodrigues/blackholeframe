# 🌌 BlackholeFrame

BlackholeFrame is an ultra-lightweight PHP framework designed for fast development of dynamic websites using a loop-based templating system.

---


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


---

It focuses on:

✅ Minimal structure  
✅ Automatic database rendering  
✅ `<loop>` driven templates  
✅ Inline SQL configuration  
✅ Function filters inside templates  
✅ Zero dependencies  

The philosophy is simple: **HTML first, PHP invisible.**

---

# 🚀 Features

- Automatic routing by folder name
- Database rendering via `<loop>`
- Inline SQL using `<sql>`
- Field placeholders `{column}`
- Function filters `{function->slug->title}`
- PDO MySQL backend
- Extremely small core

---

# 📁 Folder Structure

/
│ index.php
│ bigbang.php
│ README.md
│
└── app/
    ├── model/
    │   AppModel.php
    │
    ├── view/
    │   pages/
    │     home/
    │       index.php
    │     items/
    │       index.php

---

# ⚙️ Installation

1. Clone or download this repository.
2. Make sure you have PHP 7+, MySQL, Apache/Nginx.
3. Configure DB in app/model/AppModel.php
4. Visit http://localhost/yourproject

---

# 🌐 Routing

/items → /app/view/pages/items/index.php

---

# 🔁 Basic Loop

<loop>
  <h1>{title}</h1>
  <p>{description}</p>
</loop>

---

# 🧠 SQL Customization

<loop>
<sql>
table=items;
where=category=2;
orderby=id;
order=DESC;
limit=5;
</sql>
<h2>{title}</h2>
</loop>

---

# 🧩 Placeholders

{title}
{description}
{id}

---

# 🔧 Function Filters Examples

{function->slug->title}
{function->uppercase->title}
{function->limit_chars_200->description}

---

# 🛠 Internal Flow

1. Scan loops
2. Extract columns
3. Clean SQL
4. Query PDO
5. Apply PHP functions
6. Replace placeholders


---

Author: Éctor Rodrigues
License: MIT
