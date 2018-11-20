<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta name="description" content="Denne side af Huset KBH indeholder de generelle spørgsmål der bliver stillet til huset kbh">
    <link rel="stylesheet" href="generelle.css" type="text/css">
    <title>Generelle spørgsmål Huset KBH</title>
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
    let jsonData = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/pages?slug=generelle-sporgsmal");
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
