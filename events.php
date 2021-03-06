<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Huset KBHs events side viser hvilke events man kan deltage i, i huset">
    <title>Events Huset KBH</title>
    <link rel="stylesheet" href="events.css" type="text/css">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css' integrity='sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include "header.html";?>

    <main>
<!--       Section til indhold af modale vinduet, når man trykker på et event-->
        <section id="modal">
            <div id="modal_content">
                <button class="modal_close">X</button>
                <h2 class="modal_navn"></h2>
                <div class="modal_date"></div>
                <div class="modal_place"></div>
                <div class="modal_time"></div>
                <div class="modal_pris"></div>
                <div class="modal_langbeskrivelse"></div>
                <img class="modal_image" src="" alt="">
            </div>
        </section>

<!--       Events logo der minder om husets eget logo-->
        <img class="event_logo" src="events_logo_white.png" alt="events_logo">

<!--       section til sorteringsklapperne-->
        <section id="sorteringsknapper">
            <h1></h1>
            <div class="knapper">
                <button class="menu_item" data_kategori="alle">Alle</button>
                <button class="menu_item" data_kategori="Musik">Musik</button>
                <button class="menu_item" data_kategori="Film">Film</button>
                <button class="menu_item" data_kategori="Ord">Ord</button>
                <button class="menu_item" data_kategori="Scenekunst">Scenekunst</button>
                <button class="menu_item" data_kategori="Andet">Andet</button>
            </div>
        </section>

<!--        Template til event container. Det er hver af eventsene der er pakket ind i en event container-->
        <section class="events"></section>

        <template class="event_template">
            <article class="event_container">
                <div class="title"></div>
                <div class="date"></div>
                <div class="time"></div>
                <div class="place"></div>
                <div class="pris"></div>
                <a class="kob_billet" href="" target="_blank"><button class="kob_knap">Køb Billet</button></a>
                <div class="genre"></div>
                <img class="image" src="" alt="">
            </article>
        </template>

    </main>

    <?php include "footer.html";?>

    <script>
        //Event der gør at HTML loades før json loades
        document.addEventListener("DOMContentLoaded", getJson);

        //variabel til at vise alle events
        let allEvents;
        //variabler der henter template ned fra html
        let eventTarget = document.querySelector(".event_template");
        let eventOutPut = document.querySelector(".events");

        eventFilter = "alle";
        //variabel til modal vindue section
        let modal = document.querySelector("#modal");

        //henter json fra wordpress
        async function getJson() {
            let jsonObject = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/events/?per_page=100");
            allEvents = await jsonObject.json();
            console.log(allEvents);
            visEvents();
        }

        //forEach loop til sortering af genre / sorteringsknapperne
        document.querySelectorAll(".menu_item").forEach(knap => {
            knap.addEventListener("click", filtrering);
        })
        //funtion til filtrering
        function filtrering() {

            eventOutPut.textContent = "";
            eventFilter = this.getAttribute("data_kategori");
            visEvents();

        }
        //function til at vise events
        function visEvents() {
            console.log("visEvents" + eventFilter);

            //upsitedown fra wordpress
            allEvents.reverse();
            allEvents.forEach(event => {
                //if statement til filtreringen
                if (eventFilter == event.acf.genre) {
                    udskriv();
                } else if (eventFilter == "alle") {
                    udskriv();
                }
                //udskrivningen når man trykker på en af filtreringsknapperne
                function udskriv() {



                    // indkaldelse af indholdet af hver event
                    let klon = eventTarget.cloneNode(true).content;


                    klon.querySelector(".date").textContent = event.acf.date;
                    klon.querySelector(".place").textContent = event.acf.place;
                    klon.querySelector(".pris").textContent = event.acf.pris + " kr";
                    klon.querySelector(".kob_billet").href = event.acf.kob_billet;
                    klon.querySelector(".time").textContent = "Kl. " + event.acf.time;
                    klon.querySelector(".title").textContent = event.title.rendered;
                    klon.querySelector(".image").src = event.acf.image;

// når man klikker på følgende elementer går man videre til modal
                    klon.querySelector(".title").addEventListener("click", () => {

                        visModal(event);
                    })
                    klon.querySelector(".image").addEventListener("click", () => {
                        visModal(event);
                    })
                    klon.querySelector(".date").addEventListener("click", () => {
                        visModal(event);
                    })
                    klon.querySelector(".place").addEventListener("click", () => {
                        visModal(event);
                    })
                    klon.querySelector(".pris").addEventListener("click", () => {
                        visModal(event);
                    })
                    klon.querySelector(".time").addEventListener("click", () => {
                        visModal(event);
                    })

                    eventOutPut.appendChild(klon);
                }
            })
        }
        //modal vindue function
        function visModal(eventene) {
            console.log("visModal");
            modal.classList.add("vis");
            modal.querySelector(".modal_navn").textContent = eventene.title.rendered;
            modal.querySelector(".modal_image").src = eventene.acf.image
            modal.querySelector(".modal_date").textContent = eventene.acf.date;
            modal.querySelector(".modal_time").textContent = "Kl." + eventene.acf.time;
            modal.querySelector(".modal_place").textContent = eventene.acf.place;
            modal.querySelector(".modal_pris").textContent = eventene.acf.pris + " Kr.";
            modal.querySelector(".modal_langbeskrivelse").innerHTML = eventene.content.rendered;

            modal.querySelector(".modal_close").addEventListener("click", skjulModal);
        }
        //function til at skjule modal igen når man trykker på .modal_close
        function skjulModal() {
            console.log("skjulModal");
            modal.classList.remove("vis");
        }
    </script>
</body>
</html>
