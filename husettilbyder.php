<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Huset KBH tilbyder er en side der indeholder tekst om husets tilbud, som faciliteter, bliv frivillig, skab events og book lokale">
    <link rel="stylesheet" href="husettilbyder.css" type="text/css">
    <title>Huset tilbyder</title>
</head>

<body>

    <?php include "header.html";?>

    <main>

        <!--       Section til overskift + info-->
        <section class="container" data-container></section>
        <template data-template>
            <article class="introListview">
                <h1 class="title" data-title></h1>
                <p class="paragraf" data-text></p>
            </article>
        </template>
<div class="billeder">
        <!--         Section til billede af bliv frivillig-->
        <section class="container1" data-container1></section>
        <template data-template1>
            <article class="voluntaryListview">
                <h2 class="title1" data-title1></h2>
                <img class="image1" src="" alt="">
            </article>
        </template>

        <!--       Section til  billede af faciliteter-->
        <section class="container2" data-container2></section>
        <template data-template2>
            <article class="faciliteterListview">
                <h2 class="title2" data-title2></h2>
                <img class="image2" src="" alt="">
            </article>
        </template>

        <!--        section til billede af book lokale-->
        <section class="container3" data-container3></section>
        <template data-template3>
            <article class="bookListview">
                <h2 class="title3" data-title3></h2>
                <img class="image3" src="" alt="">
            </article>
        </template>

        <!--        section til billede af skab events-->
        <section class="container4" data-container4></section>
        <template data-template4>
            <article class="skabListview">
                <h2 class="title4"  data-title4></h2>
                <img class="image4" src="" alt="">
            </article>
        </template>
</div>

    </main>

    <?php include "footer.html";?>

</body>
<script>
    //Event der gør at HTML loades før json loades
    document.addEventListener("DOMContentLoaded", getJSON);

    //variabel til at styre hvad der skal vises i template
    let intro;
    //variabler til at hente template og container fra html
    let introTemplate = document.querySelector("[data-template]");
    let introContainer = document.querySelector("[data-container]");

    //variabel til at styre hvad der skal vises i template
    let voluntary;
    //variabler til at hente template og container fra html
    let voluntaryTemplate = document.querySelector("[data-template1]");
    let voluntaryContainer = document.querySelector("[data-container1]");

    //variabel til at styre hvad der skal vises i template
    let faciliteter;
    //variabler til at hente template og container fra html
    let faciliteterTemplate = document.querySelector("[data-template2]");
    let faciliteterContainer = document.querySelector("[data-container2]");

    //variabel til at styre hvad der skal vises i template
    let book;
    //variabler til at hente template og container fra html
    let bookTemplate = document.querySelector("[data-template3]");
    let bookContainer = document.querySelector("[data-container3]");

    //variabel til at styre hvad der skal vises i template
    let skab;
    //variabler til at hente template og container fra html
    let skabTemplate = document.querySelector("[data-template4]");
    let skabContainer = document.querySelector("[data-container4]");

    //------------------------Hente json til de forskellige sections og templates---------------------
    async function getJSON() {
        let jsonData = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/huset_tilbyder?slug=text_tilbyder");
        intro = await jsonData.json();
        visIntro();
        console.log(intro);

        let jsonData1 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/huset_tilbyder?slug=tilbyder-bliv-frivillig");
        voluntary = await jsonData1.json();
        visVoluntary();
        console.log(voluntary);

        let jsonData2 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/huset_tilbyder?slug=tilbyder_faciliteter");
        faciliteter = await jsonData2.json();
        visFaciliteter();
        console.log(faciliteter);

        let jsonData3 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/huset_tilbyder?slug=tilbyder_book");
        book = await jsonData3.json();
        visBook();
        console.log(book);

        let jsonData4 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/huset_tilbyder?slug=tilbyder_skab_events");
        skab = await jsonData4.json();
        visSkab();
        console.log(skab);
    }

    //------------------------------------------------
    //function til at vise den føsrste text boks på siden
    function visIntro() {
        console.log(intro);
        intro.forEach(intro => {
            let klon = introTemplate.cloneNode(true).content;
            klon.querySelector("[data-title]").textContent = intro.title.rendered;
            klon.querySelector("[data-text]").innerHTML = intro.content.rendered;
            introContainer.appendChild(klon);
        })
    }

    //function til en af billedboksene på siden
    function visVoluntary() {
        console.log(voluntary);
        voluntary.forEach(voluntary => {
            let klon = voluntaryTemplate.cloneNode(true).content;
            klon.querySelector("[data-title1]").textContent = voluntary.title.rendered;
            klon.querySelector(".image1").src = voluntary.acf.image;
            voluntaryContainer.appendChild(klon);
        })
    }

    //function til en af billedboksene på siden
    function visFaciliteter() {
        console.log(faciliteter);
        faciliteter.forEach(faciliteter => {
            let klon = faciliteterTemplate.cloneNode(true).content;
            klon.querySelector("[data-title2]").textContent = faciliteter.title.rendered;
            klon.querySelector(".image2").src = faciliteter.acf.image;
            faciliteterContainer.appendChild(klon);
        })
    }

    //function til en af billedboksene på siden
    function visBook() {
        console.log(book);
        book.forEach(book => {
            let klon = bookTemplate.cloneNode(true).content;
            klon.querySelector("[data-title3]").textContent = book.title.rendered;
            klon.querySelector(".image3").src = book.acf.image;
            bookContainer.appendChild(klon);
        })
    }

    //function til en af billedboksene på siden
    function visSkab(){
        console.log(skab);
        skab.forEach(skab=>{
            let klon = skabTemplate.cloneNode(true).content;
            klon.querySelector("[data-title4]").textContent = skab.title.rendered;
            klon.querySelector(".image4").src = skab.acf.image;
            skabContainer.appendChild(klon);
        })
    }
</script>
</html>

