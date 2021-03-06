<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Huset KBHs forside der indeholder en kort introduktion til huset, henvender sit til dem der gerne vil være frivillige, præsentere huset med nogle billeder og kommer med et udkast til de nyeste evnts">
    <link rel="stylesheet" href="index.css" type="text/css">
   <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.4.2/css/all.css' integrity='sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Huset KBH</title>


</head>

<body>
    <?php include "header.html";?>


    <main>
        <!--       img-->
        <section class="container" data-container></section>
        <template data-template>
            <article class="postListview">
                <img src="" alt="">
                <h1 data-title></h1>
                <p data-text></p>
            </article>
        </template>
        <!--        section: introduktion til huset-->
        <section class="container1" data-container1></section>
        <template data-template1>
            <article class="introListview">
                <h2 data-title1></h2>
                <p data-text1></p>
            </article>
        </template>
        <!--        section: bliv frivillig-->
        <section class="container2" data-container2></section>
        <template data-template2>
            <article class="voluntaryListview">
                <h2 data-title2></h2>
                <p data-text2></p>
            </article>
        </template>

        <!-- Slideshow billeder af huset -->
<div class="slideshow-container">

  <div class="mySlides fade">
    <div class="numbertext">1 / 5</div>
    <img src="billede_garreri_1.jpg" alt="galleri1" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 5</div>
    <img src="billede_galleri_2.jpg" alt="galleri2" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <img src="billede_galleri_3.jpg" alt="galleri3" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 5</div>
    <img src="billed_galleri_4.jpg" alt="galleri4" style="width:100%">
  </div>

  <div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <img src="billede_galleri_5.jpg" alt="galleri5" style="width:100%">
  </div>

  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
  <div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
</div>
</div>
<br>



<!-- husets nyeste evnts-->
        <section class="nyeEvents">

        <h2>HUSETS NYESTE EVENTS<img src="Huset_logo_22.png" alt="pil" ></h2></section>

        <section class="container3" data-container3>
        </section>

        <template class="template" data_template3>
            <article class="eventsListview">
                <div class="title"></div>
                <div class="date"></div>
                <div class="time"></div>
                <div class="place"></div>
                <div class="pris"></div>
                <a class="kob_billet" href="events.html" target="_blank"><button class="kob_knap">LÆSE MERE</button></a>
                <div class="genre"></div>
                <div class="kob_billet_i_doren"></div>
                <img class="image" src="" alt="">
            </article>
        </template>

        <form action="action_page.php">


  <div class="container_nyhed">
   <div>
      <h2 class="nyhedsbrev">NYHEDSBREV</h2>
  </div>
    <input type="text" placeholder="Navn" name="name" required>
    <input type="text" placeholder="Email" name="mail" required>


  <div class="container">
    <input type="submit" value="Subscribe">
  </div>
      </div>
</form>

    </main>

<?php include "footer.html";?>

    <script>
        //Event der gør at HTML loades før json loades
        document.addEventListener("DOMContentLoaded", getJSON);
        //variabel til at styre hvad der skal vises i template
        let posts;
        //variabler til at hente template og container fra html
        let postTemplate = document.querySelector("[data-template]");
        let postContainer = document.querySelector("[data-container]");

        //variabel til at styre hvad der skal vises i template
        let intro;
        //variabler til at hente template og container fra html
        let introTemplate = document.querySelector("[data-template1]");
        let introContainer = document.querySelector("[data-container1]");

        //variabel til at styre hvad der skal vises i template
        let voluntary;
        //variabler til at hente template og container fra html
        let voluntaryTemplate = document.querySelector("[data-template2]");
        let voluntaryContainer = document.querySelector("[data-container2]");

        //variabel til at styre hvad der skal vises i template
        let events;
        //variabler til at hente template og container fra html
        let eventTemplate = document.querySelector("[data_template3]");
        let eventContainer = document.querySelector("[data-container3]");


        //------------------------Hente json til de forskellige sections og templates---------------------
        async function getJSON() {
            let jsonData = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/pages?slug=home-page");
            posts = await jsonData.json();
            visPosts();
            console.log(posts);

            let jsonData1 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/home?slug=home-huset-kbh");
            intro = await jsonData1.json();
            visIntro();
            console.log(intro);

            let jsonData2 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/home?slug=home-bliv-frivillig");
            voluntary = await jsonData2.json();
            visVoluntary();
            console.log(voluntary);

            let jsonData3 = await fetch("https://emmaviola.dk/kea/07-cms/huset/wordpress/wp-json/wp/v2/events/?per_page=3");
            events = await jsonData3.json();
            visEvents();
            console.log(events);
        }

        //----------------------------------------------
        //function til at vise billedet
        function visPosts() {
            console.log(posts);
            posts.forEach(post => {
                let klon = postTemplate.cloneNode(true).content;
                klon.querySelector("img").src = post.acf.img.url;
                postContainer.appendChild(klon);
            })
        }

        //function til at vise introduktion til huset
        function visIntro() {
            console.log(intro);
            intro.forEach(intro => {
                let klon = introTemplate.cloneNode(true).content;
                klon.querySelector("[data-title1]").textContent = intro.title.rendered;
                klon.querySelector("[data-text1]").innerHTML = intro.content.rendered;
                introContainer.appendChild(klon);
            })
        }

        //funtion til at vise bliv frivillig i huset
        function visVoluntary() {
            console.log(voluntary);
            voluntary.forEach(voluntary => {
                let klon = voluntaryTemplate.cloneNode(true).content;
                klon.querySelector("[data-title2]").textContent = voluntary.title.rendered;
                klon.querySelector("[data-text2]").innerHTML = voluntary.content.rendered;
                voluntaryContainer.appendChild(klon);
            })
        }

        //function til at vise de tre nyeste events fra event siden
        function visEvents() {
            console.log(events);
            events.forEach(events => {
                let klon = eventTemplate.cloneNode(true).content;
                klon.querySelector(".title").textContent = events.title.rendered;
                klon.querySelector(".date").innerHTML = events.acf.date;
                klon.querySelector(".time").innerHTML = events.acf.time;
                klon.querySelector(".place").innerHTML = events.acf.place;
                klon.querySelector(".pris").innerHTML = events.acf.pris +" kr.";
                klon.querySelector(".image").src = events.acf.image;
                eventContainer.appendChild(klon);
            })
        }

        //_----------------------------------------------------



        //--------------------------------------------------

        //javascript til slideshow af billeder. Inspiration fra w3schools
         var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}

    </script>
</body>

</html>
