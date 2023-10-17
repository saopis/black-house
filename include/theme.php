<style>
body {
    margin: 0; 
    font-family: 'Lato', sans-serif;
}

.overlay {
    height: 100%;
    width: 0 ;
    position: absolute ;
    position: fixed;
    z-index: 2000;
    top: 0;
    left: 0;
    background-color: rgba(0,0,0, 0.9);
    overflow-x: hidden;
    transition: 0.5s;
}

.overlay-content {
    position: relative;
    top: 25%;
    width: 100%;
    text-align: center;
    margin-top: 30px;
}

.overlay a {
    padding: 8px;
    text-decoration: none;
    font-size: 36px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.overlay a:hover, .overlay a:focus {
    color: #f1f1f1;
}

.overlay .closebtn {
    position: absolute;
    top: 10px;
    right: 45px;
    font-size: 60px;
}

@media screen and (max-height: 450px) {
  .overlay a {font-size: 20px}
  .overlay .closebtn {
    font-size: 40px;
    top: 10px;
    right: 35px;
  }
}
@media screen and (max-width: 766px) {
  .overlay .closebtn {
    font-size: 40px;
    top: 10px;
    right: 35px;
  }
} 
</style>
<div id="theme" class="overlay" onclick="closetheme()">
  <a href="javascript:void(0)" class="closebtn" onclick="closetheme()">&times;</a>
  <div class="overlay-content">
    <label style="font-size: 50px; color: white;"> Choose theme color.</label>
    <a href="#" ><div class="container" id="red" style="width: 200px; background-color: red;">red</div></a>
    <a href="#" ><div class="container" id="yellow" style="width: 200px; background-color: yellow;">yellow</div></a>
    <a href="#" ><div class="container" id="green" style="width: 200px; background-color: green;">green</div></a>
    <a href="#" ><div class="container" id="black" style="width: 200px; background-color: black;">dark</div></a>
    <a href="#" ><div class="container" id="purple" style="width: 200px; background-color: purple;">purple</div></a>
    <a href="#"><div class="container" id="blue" style="width: 200px; background-color: blue;">blue</div></a>

  </div>
</div>