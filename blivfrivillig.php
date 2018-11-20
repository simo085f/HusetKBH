<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Huset KBHs bliv frivillig side indeholder info om hvor man kan være frivillig i huset og man kan derudover sende en andsøgning om at blive frivillig">
    <link rel="stylesheet" href="blivfrivllig.css" type="text/css">
    <title>Bliv frivillig Huset KBH</title>
</head>

<body>

    <?php include "header.html";?>

    <template class="blivfrivillig_template">
            <article class="container">
               <div class="tekst"></div>
                <div class="skema"></div>

            </article>
        </template>


    <main>
        <section class="container" data-container></section>
        <template data-template>
            <article class="postListview">
             <h1 data-title></h1>
             <p data-text></p>
             </article>
         </template>
        </main>

        <form>
            <h2>Ansøgningsskema:</h2>
            <input id="navn" type="text" placeholder="Fornavn" required>
            <input id="navn" type="text" placeholder="Efternavn" required>
            <input id="email" type="Email" placeholder="E-mail" required>
            <input id="tlf" type="Tlf" placeholder="Tlf nr" required>
            <textarea id="besked" type="text" placeholder="Skriv din ansøgning her:" required></textarea>
            <input type="submit" value="Send"> <br>
        </form>




<?php include "footer.html";?>

</body>
<script>
    document.addEventListener("DOMContentLoaded", getJSON);
    let posts;
    let postTemplate = document.querySelector("[data-template]");
    let postContainer = document.querySelector("[data-container]");
    async function getJSON() {
        let jsonData = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/bliv_frivillig");
        posts = await jsonData.json();
        visPosts();
    }

    function visPosts() {
        console.log(posts);
        posts.forEach(post => {
            let klon = postTemplate.cloneNode(true).content;
            klon.querySelector("[data-title]").textContent = post.title.rendered;
            klon.querySelector("[data-text]").innerHTML = post.content.rendered;
            postContainer.appendChild(klon);
        })
    }
</script>

</html>
