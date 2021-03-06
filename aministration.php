<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta name="description" content="Huset KBHs side om administrationen indeholder information om kontaktoplysninger til administrationen i huset kbh">
    <link rel="stylesheet" href="admin.css" type="text/css">
    <title>Administration Huset KBH</title>
</head>
<body>

    <?php include "header.html";?>

   <main>
    <section class="container" data-container></section>
         <template data-template>
            <article class="postListview">
             <h1 data-title></h1>
                <div class="indhold">
             <p data-text></p></div>
             </article>
         </template>

        <section class="container1" data-container1></section>
         <template data-template1>
            <article class="postListview">
             <h1 data-title1></h1>
                <div class="indhold1">
             <p data-text1></p></div>
             </article>
         </template>

        <section class="container2" data-container2></section>
         <template data-template2>
            <article class="postListview">
             <h1 data-title2></h1>
                <div class="indhold1">
             <p data-text2></p></div>
             </article>
         </template>

        <section class="container3" data-container3></section>
         <template data-template3>
            <article class="postListview">
             <h1 data-title3></h1>
                <div class="indhold1">
             <p data-text3></p></div>
             </article>
         </template>

        <section class="container4" data-container4></section>
         <template data-template4>
            <article class="postListview">
             <h1 data-title4></h1>
                <div class="indhold1">
             <p data-text4></p></div>
             </article>
         </template>

        <section class="container5" data-container5></section>
         <template data-template5>
            <article class="postListview">
             <h1 data-title5></h1>
             <p data-text5></p>
             </article>
         </template>


   </main>

    <?php include "footer.html";?>

   <script>

        document.addEventListener("DOMContentLoaded", getJSON);
        let pr;
        let prTemplate = document.querySelector("[data-template]");
        let prContainer = document.querySelector("[data-container]");

        let booking;
        let bookingTemplate = document.querySelector("[data-template1]");
        let bookingContainer = document.querySelector("[data-container1]");

        let bar;
        let barTemplate = document.querySelector("[data-template2]");
        let barContainer = document.querySelector("[data-container2]");

        /*let drift;
        let driftTemplate = document.querySelector("[data-template3]");
        let driftContainer = document.querySelector("[data-container3]");*/

        let drift;
        let driftTemplate = document.querySelector("[data-template3]");
        let driftContainer = document.querySelector("[data-container3]");


        let admin;
        let adminTemplate = document.querySelector("[data-template4]");
        let adminContainer = document.querySelector("[data-container4]");

        let ledelse;
        let ledelseTemplate = document.querySelector("[data-template5]");
        let ledelseContainer = document.querySelector("[data-container5]");


        //-----------------------------------------------
        async function getJSON() {
            let jsonData = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/administration?slug=pr");
            pr = await jsonData.json();
            visPr();
            console.log(pr);

            let jsonData1 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/administration?slug=booking");
            booking = await jsonData1.json();
            visBooking();
            console.log(booking);

            let jsonData2 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/administration?slug=bar");
            bar = await jsonData2.json();
            visBar();
            console.log(bar);

            let jsonData3 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/administration?slug=drift");
            drift = await jsonData3.json();
            visDrift();
            console.log(drift);

            let jsonData4 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/administration?slug=administration");
            admin = await jsonData4.json();
            visAdmin();
            console.log(admin);

            let jsonData5 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/administration?slug=ledelse");
            ledelse = await jsonData5.json();
            visLedelse();
            console.log(ledelse);
        }

        //----------------------------------------------
        function visPr() {
            console.log(pr);
            pr.forEach(pr => {
                 let klon = prTemplate.cloneNode(true).content;
                klon.querySelector("[data-title]").textContent = pr.title.rendered;
                klon.querySelector("[data-text]").innerHTML = pr.content.rendered;
                prContainer.appendChild(klon);
            })
        }

        function visBooking() {
            console.log(booking);
            booking.forEach(booking => {
                let klon = bookingTemplate.cloneNode(true).content;
                klon.querySelector("[data-title1]").textContent = booking.title.rendered;
                klon.querySelector("[data-text1]").innerHTML = booking.content.rendered;
                bookingContainer.appendChild(klon);
            })
        }

        function visBar() {
            console.log(bar);
            bar.forEach(bar => {
                let klon = barTemplate.cloneNode(true).content;
                klon.querySelector("[data-title2]").textContent = bar.title.rendered;
                klon.querySelector("[data-text2]").innerHTML = bar.content.rendered;
                barContainer.appendChild(klon);
            })
        }

        function visDrift() {
            console.log(drift);
            drift.forEach(drift => {
                let klon = driftTemplate.cloneNode(true).content;
                klon.querySelector("[data-title3]").textContent = drift.title.rendered;
                klon.querySelector("[data-text3]").innerHTML = drift.content.rendered;
                driftContainer.appendChild(klon);

            })
        }

      function visAdmin() {
            console.log(admin);
            admin.forEach(admin => {
                let klon = adminTemplate.cloneNode(true).content;
                klon.querySelector("[data-title4]").textContent = admin.title.rendered;
                klon.querySelector("[data-text4]").innerHTML = admin.content.rendered;
                adminContainer.appendChild(klon);

            })
        }

       function visLedelse() {
            console.log(ledelse);
            ledelse.forEach(ledelse => {
                let klon = ledelseTemplate.cloneNode(true).content;
                klon.querySelector("[data-title5]").textContent = ledelse.title.rendered;
                klon.querySelector("[data-text5]").innerHTML = ledelse.content.rendered;
                ledelseContainer.appendChild(klon);

            })
        }



    </script>
</body>
</html>
