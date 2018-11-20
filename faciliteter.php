<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Huset KBHs side om faciliteter, uddyber de faciliteter der er at finde i huset kbh">
    <title>Faciliteter Huset KBH</title>
    <link rel="stylesheet" href="faciliteter.css" type="text/css">
</head>

<body>

    <?php include "header.html";?>

    <main>



        <section class="faciliteter"></section>

        <template class="faciliteter_template">
            <article class="faciliteter_container">
               <h1 class="title"></h1>
                <div class="tekst"></div>
                <img class="image" src="" alt="">
            </article>
        </template>

    </main>

    <?php include "footer.html";?>

    <script>
        document.addEventListener("DOMContentLoaded", getJson);

        let allEvents;
        let eventTarget = document.querySelector(".faciliteter_template");
        let eventOutPut = document.querySelector(".faciliteter");

        eventFilter = "alle";

        async function getJson() {
            let jsonObject = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/faciliteter/?per_page=100");
            allEvents = await jsonObject.json();
            console.log(allEvents);
            visEvents();
        }

        document.querySelectorAll(".menu_item").forEach(knap => {
            knap.addEventListener("click", filtrering);
        })

        function filtrering() {


            eventOutPut.textContent = "";
            eventFilter = this.getAttribute("data_kategori");
            visEvents();

        }

        function visEvents() {
            console.log("visEvents", allEvents);


            allEvents.forEach(event => {

                if (eventFilter == event.acf.genre) {
                    udskriv();
                } else if (eventFilter == "alle") {
                    udskriv();
                }

                function udskriv() {

                    let klon = eventTarget.cloneNode(true).content;



                    klon.querySelector(".title").textContent = event.title.rendered;
                    klon.querySelector(".image").src = event.acf.image;
                    klon.querySelector(".tekst").innerHTML = event.content.rendered;


                    eventOutPut.appendChild(klon);
                }
            })
        }
    </script>
</body>
</html>

