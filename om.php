<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="description" content="Huset KBHs om side indeholder en tekst der beskriver huset kbh">
    <link rel="stylesheet" href="om.css" type="text/css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css' integrity='sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Om Huset KBH</title>
</head>

<body>
    <?php include "header.html";?>
    <main>
        <!--Template til indholdet der skal bruges i javascript når man skal indsætte elementerne fra json filen-->
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
        //Hent json filen når DOM er loaded
        document.addEventListener("DOMContentLoaded", getJSON);

        //Find DOM elementer
        let posts;
        let postTemplate = document.querySelector("[data-template]");
        let postContainer = document.querySelector("[data-container]");

        async function getJSON() {
        //Hent Json filen
            let jsonData = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/om");
            posts = await jsonData.json();
            visPosts();
        }

        function visPosts() {
            console.log(posts);

            //Kør json filen igennem
            posts.forEach(post => {

            //Lav en klon af template
                let klon = postTemplate.cloneNode(true).content;
                klon.querySelector("[data-title]").textContent = post.title.rendered;
                klon.querySelector("[data-text]").innerHTML = post.content.rendered;
                //Placer klon i html
                postContainer.appendChild(klon);
            })
        }
    </script>
</body>
</html>
