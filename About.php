
<!DOCTYPE html>
<html>
<head>
<script>
	function queryParam(){
		var params = new URLSearchParams(location.search);
		if(params.has('page')){
			var page = params.get('page');
			var ele = document.getElementById(page);
			if(ele){
				let home = document.getElementById('home');
				let about = document.getElementById('about');
				home.style.display="none";
				about.style.display = "none";
				ele.style.display = "block";
			}
		}
		else{
			let home = document.getElementById('home');
			home.style.display = "block";
		}
	}
</script>
</head>
<body onload="queryParam();">
	<header>
		<nav> 
			<a href="Home.php">Home  </a> 
			
		</nav>
	</header>
	<div id="home">
		This is home
	</div>
	<div id="about">
		<article>
  			<header>
   				 <h1>A COLLEGE STUDENTS LIFE</h1>
  		  		 <p>Every lecture I generally try to give the professor a chance but sometimes</p>
  			</header>
 			 <p>BUT SOMETIMES</p>
		</article>
		<figure>
  			<img src="https://media.makeameme.org/created/when-youre-paying-d10c2753e1.jpg" alt="Mountain">
  			<figcaption>makes you question your major</figcaption>
		</figure>

		<aside>
 		<h4>EVERY ENGINEERING STUDENT EVER: </h4>
  		<p>"SHOULD'VE DONE I.T.!!!"</p>
		</aside>

	</div>
	<footer></footer>
</body>
<style>
a:link, a:visited {
  background-color: #A000FF;
  color: white;
  padding: 15px 25px;
  text-align: center;
  display: inline-block;
}

a:hover, a:active {
  background-color: black;
}
</style>
</html>
