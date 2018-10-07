

<style>
   body {
    /*background-image: url("https://phinemo.com/wp-content/uploads/2016/06/2015-04-29-08.21.17-1.jpg");*/


    background-size: 1270px 700px;
    background-repeat: no-repeat;
    background-attachment: fixed;
   

    
}
p{
    font color=#000000;
    font-size: large;
    text-align: center;
    margin-top:5px;
   
    

}
.slide
    {display: block;

    margin-right: auto;}  
 

</style>
 

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<body>
<div class= "start" >
<h1> 7 wonders of the world <h1>
<h3> Tip: Hover the image with your mouse to zoom in on the image </h3>
<br>
<br>
</div>

<div class="img-magnifier-container">
<h2> Great Wall of China</h2>
  <img id="myimage1" src="<?= Yii::$app->request->baseUrl ?>/../images/china.jpg" width="700" height="400" >
  <p>The Great Wall, one of the greatest wonders of the world, was listed as a World Heritage by UNESCO in 1987.
   Just like a gigantic dragon, it winds up and down across deserts, grasslands, mountains and plateaus,
    stretching approximately 21,196 kilometers from east to west of China.
With a history of about 2,700 years, some of the Great Wall sections are now in ruins or have disappeared.
 However, the Great Wall of China is still one of the most appealing attractions all around the world owing
  to its architectural grandeur and historical significance.</p>
</div>
<br>

<div class="img-magnifier-container">
<h2>Machu Picchu — Peru</h2>
  <img id="myimage2" src="<?= Yii::$app->request->baseUrl ?>/../images/peru.jpg" width="700" height="400" >
<p>Machu Picchu is an Incan city surrounded by temples, terraces and water
 channels, built on a mountaintop. It was built with huge blocks of stone joined to
each other without any mortar.Today it has been designated cultural heritage of humanity in recognition of its political, 
religious and administrative importance during the age of the Incas.
</p>
</div>
<br>

<div class="img-magnifier-container">
<h2>Great Pyramid of Giza </h2>
  <img id="myimage3" src="<?= Yii::$app->request->baseUrl ?>/../images/egypt.jpg" width="700" height="400">
  <p>The Great Pyramid of Giza (also known as the Pyramid of Khufu or the Pyramid of Cheops) is the oldest and largest of the three pyramids in the Giza pyramid complex bordering what is now El Giza, Egypt. It is the oldest of the Seven Wonders of the Ancient World, and the only one to remain largely intact.</p>
</div>
<br>

<div class="img-magnifier-container">
<h2> Taj Mahal — India </h2>
  <img id="myimage4" src="<?= Yii::$app->request->baseUrl ?>/../images/india.jpg" width="700" height="400">
  <p>The Taj Mahal, located on the southern bank of the Yamuna River in Agra, is a monument to love.It was built in the 17th century by Mughal emperor Shah Jahan to house his beloved late wife Mumtaz Mahal.With its domed central tomb and surrounding minarets, this white marble mausoleum is one of the world's most recognizable — and beautiful — buildings, especially at sunrise and sunset. </p>
</div>
<br>

<div class="img-magnifier-container">
<h2> Chichén Itzá — Mexico</h2>
  <img id="myimage5" src="<?= Yii::$app->request->baseUrl ?>/../images/mexico.jpg" width="700" height="400">
  <p> Mexico's Yucatan Peninsula is known for its Mayan sites, including Tulum, above the Caribbean Sea and Coba, with its nine-tier pyramid, but the largest — and most renowned — ruin is Chichén Itzá, dating to 600 A.D. The complex is dominated by a 78-foot, pyramid-shaped temple known as El Castillo. While you can no longer climb the steps to the top, you'll still be awed by the ancient temple's size and splendor.</p>
</div>
<br>

<div class="img-magnifier-container">
<h2>Petra — Jordan  </h2>
  <img id="myimage6" src="<?= Yii::$app->request->baseUrl ?>/../images/jordan.jpg" width="700" height="400">
  <p>Petra (aka the Lost City of Stone), located in a remote canyon in Jordan's southwestern desert, is an ancient stone complex built by the Nabataeans. These temples and tombs are carved directly into the pink sandstone cliff faces, creating a one-of-a-kind setting. The site has numerous hiking trails that'll lead you to these magnificent structures, including the imposing Treasury that was memorably featured in Indiana Jones and the Last Crusade.</p>
</div>
<br>

<div class="img-magnifier-container">
<h2>Roman Colosseum — Rome  </h2>
  <img id="myimage7" src="<?= Yii::$app->request->baseUrl ?>/../images/rome.jpg" width="700" height="400">
  <p>The Eternal City is home to more ancient treasures than we can count, but one that's truly worthy of being called a wonder of the world is the Colosseum.This massive arena, where gladiators fought to the death, was built around 80 A.D., and it held 50,000 people in tiered seating. Wear comfy shoes to climb the many steps to the top tier, which not only gives terrific views of the limestone structure, but also over Rome itself. </p>
</div>
<br>
<br>
<br>


   <div class="video">
        <iframe width="850" height="420" src="https://www.youtube.com/embed/mJCEVIiuiPc" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
</div>



</body>


<style>

* {box-sizing: border-box;}
.video {
    margin-right: 50px;
    margin-left: 200px;
    
}

.img-magnifier-container {
  position:relative;
  padding:27px;
  margin-right: 150px;
  margin-left:250px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    
}

.img-magnifier-glass {
  position: absolute;
  border: 3px solid #000;
  border-radius: 50%;
  cursor: none;
  /*Set the size of the magnifier glass:*/
  width: 100px;
  height: 100px;
}
</style>

<script>
function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);
  /*create magnifier glass:*/
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");
  /*insert magnifier glass:*/
  img.parentElement.insertBefore(glass, img);
  /*set background properties for the magnifier glass:*/
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;
  /*execute a function when someone moves the magnifier glass over the image:*/
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);
  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /*prevent any other actions that may occur when moving over the image*/
    e.preventDefault();
    /*get the cursor's x and y positions:*/
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /*prevent the magnifier glass from being positioned outside the image:*/
    if (x > img.width - (w / zoom)) {x = img.width - (w / zoom);}
    if (x < w / zoom) {x = w / zoom;}
    if (y > img.height - (h / zoom)) {y = img.height - (h / zoom);}
    if (y < h / zoom) {y = h / zoom;}
    /*set the position of the magnifier glass:*/
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /*display what the magnifier glass "sees":*/
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }
  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /*get the x and y positions of the image:*/
    a = img.getBoundingClientRect();
    /*calculate the cursor's x and y coordinates, relative to the image:*/
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /*consider any page scrolling:*/
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return {x : x, y : y};
  }
}
</script>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage1", 2);
</script>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage2", 2);
</script>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage3", 2);
</script>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage4", 2);
</script>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage5", 2);
</script>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage6", 2);
</script>
<script>
/* Initiate Magnify Function
with the id of the image, and the strength of the magnifier glass:*/
magnify("myimage7", 2);
</script>