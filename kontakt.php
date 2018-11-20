<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta name="description" content="Huset KBHs kontakt side kan man se adressen og de vigtigeste kontaktoplysniner. Der er et kort over hvor huset kbh ligger">
    <link rel="stylesheet" href="kontakt.css" type="text/css">
    <title>Kontakt Huset KBH</title>
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
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2249.720951175517!2d12.572556515634362!3d55.67645250534588!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4652531164e9d6eb%3A0x2ed9917f3156a20e!2zUsOlZGh1c3N0csOmZGUgMTMsIDE0NjYgS8O4YmVuaGF2bg!5e0!3m2!1sda!2sdk!4v1542053210496" width="100%" height="500" frameborder="0" style="border:0" allowfullscreen></iframe>




   </main>

    <?php include "footer.html";?>

   <script>
   document.addEventListener("DOMContentLoaded", getJSON);
   let posts;
       let postTemplate = document.querySelector("[data-template]");
       let postContainer = document.querySelector("[data-container]");

async function getJSON(){
    let jsonData = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/pages?slug=kontakt");
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
