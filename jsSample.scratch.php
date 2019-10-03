<html>
<head>
<!--css and js here -->
<script>
function pageLoaded(){




//alert("Hello world");
var myVariable;
let myOtherVariable;
//myVariable = prompt("What's your name?");
//alert("Whats up , " + myVariable);
let myNum=0;
for(let i =0; i <10; i++){
	myNum += 0.1;
}
//alert("my num is 1: " + (myNum==1) + "\nMy Num: " + myNum);
console.log("my num is 1: " + (myNum ==1) + "\nmMy Num: " + myNum);
let myParagraph = document.getElementById("myParagraph");
console.log(myParagraph);
}
//document.body.onload = addElement;

function addDiv () { 
   var divElement = document.createElement("div"); 

  var content = document.createTextNode("NEW ELEMENT ADDED!!!!!!!!!"); 

  divElement.appendChild(content);  
  
  var updatedDiv = document.getElementById("div"); 
  document.body.insertBefore(divElement, updatedDiv); 
  var changeContentSize = divElement.style.fontSize= "xx-large";
  var changeColor =divElement.style.color = "blue";


  updatedDiv = document.getElementById("div");
 document.body.insertBefore(divElement, updatedDiv);

}

</script>
</head>

<body onload ="addDiv();">
<!-- html content -->
<p id="myParagraph">It loaded, yay!</p>
</body>
</html>

