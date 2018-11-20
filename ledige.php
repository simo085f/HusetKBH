<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta name="description" content="Huset KBHs side om ledige stillinger indeholder information om ledeige stillinger og praktikpladser i huset kbh">
    <link rel="stylesheet" href="ledige.css" type="text/css">
    <title>Ledige stillinger Huset KBH</title>
</head>
<body>

<?php include "header.html";?>

   <main>
    <section class="container" data-container></section>
         <template data-template>
            <article class="postListview">
             <h1 data-title></h1>
             <p data-text></p>
             </article>
         </template>


   </main>

    <?php include "footer.html";?>

   <script>
   document.addEventListener("DOMContentLoaded", getJSON);
   let posts;
       let postTemplate = document.querySelector("[data-template]");
       let postContainer = document.querySelector("[data-container]");

async function getJSON(){
    let jsonData = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/pages?slug=ledige-stillinger");
    posts = await jsonData.json();
    visPosts();
}

       function visPosts(){

           console.log(posts);

           posts.forEach(post =>{
               let klon = postTemplate.cloneNode(true).content;
               klon.querySelector("[data-title]").textContent = post.title.rendered;
               klon.querySelector("[data-text]").innerHTML = post.content.rendered;
               postContainer.appendChild(klon);



           })
       }


    </script>
</body>
</html>
