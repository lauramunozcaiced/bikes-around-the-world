var result = document.getElementById('modalshow');
 
 function buyProduct(cod){
    var xmlhttp;
    if(window.XMLHttpRequest){
      xmlhttp = new XMLHttpRequest();
      console.log("here");
    }
    else{
      xmlhttp = ActiveXObject("Microsoft.XMLHTPP");
      console.log("no here");
    }
    xmlhttp.onreadystatechange = function(){
      console.log("ready");
      if(xmlhttp.readyState == 4 /*&& xmlhttp == 200 */){
        result.innerHTML= xmlhttp.responseText;
      }
    }
    xmlhttp.open("GET", "./components/detailProduct.php?cod="+cod, true);
    xmlhttp.send();
 }

 
