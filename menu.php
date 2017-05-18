<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
   <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" 
         data-target="#menu">
         <span class="sr-only">Toggle navigation</span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="padding-top: 5px;">
	  	  <img src="Images/ic_launcher.png" height="80" width="80">
		  </a>

		<div class="collapse navbar-collapse" id="menu">
		  <ul class="nav navbar-nav">
			 <li id="home" class="active"><a href="index.php">Home</a></li>
			 <li id="dashboard"><a href="dashboard.php">Dashboard</a></li>
			 <li id="about"><a href="about.php">About Us</a></li>
			 <li id="contact"><a href="contact.php">Contact Us</a></li>
		  </ul>
		  
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
				  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-right: 30px;">Not Logged In <span class="caret"></span></a>
				  <ul class="dropdown-menu">
					<li><a href="#" style="display:none;">Action</a></li>
					<li><a href="#" style="display:none;">Another action</a></li>
					<li><a href="#" style="display:none;">Something else here</a></li>
					<li style="display: none" id="logoutline" role="separator" class="divider"></li>
					<li style="display: none" id="logoutoption"><a href="#">Log Out</a></li>
				  </ul>
				</li>
			</ul>
		</div>
   </div>
</nav>

<script>
  // Initialize Firebase
  var config = {
    apiKey: "AIzaSyDDlrfKeuteF5W4YT12nBSyCV9tD8KLHhk",
    authDomain: "spark-94584.firebaseapp.com",
    databaseURL: "https://spark-94584.firebaseio.com",
    storageBucket: "spark-94584.appspot.com",
    messagingSenderId: "489756081922"
  };
  firebase.initializeApp(config);
</script>



<script>
	//Check Firebase State
	firebase.auth().onAuthStateChanged(firebaseUser => {
		if (firebaseUser){
			console.log(firebaseUser);
			//logoutline.style.display = "";
			logoutoption.style.display = "inline";
			
			var anchor=document.getElementsByClassName("dropdown-toggle");
			for(var i = 0; i < anchor.length; i++){
				var content = firebaseUser.email + " <span class='caret'></span>";
				anchor[i].innerHTML=content;
				anchor[i].appendChild()
			};
		}
		else {
			console.log('Not Logged In');
			logoutline.style.display = "none";
			logoutoption.style.display = "none";
			
			var anchor=document.getElementsByClassName("dropdown-toggle");
			for(var i = 0; i < anchor.length; i++){
				var content = "Not Logged In <span class='caret'></span>";
				anchor[i].innerHTML=content;
			};
		}
	});
</script>


<script>

  const btnLogout = document.getElementById('logoutoption');
  
  btnLogout.addEventListener('click', e=> {
	  const auth = firebase.auth();
	  
	  const promise = auth.signOut();
	  promise.catch(e => console.log(e.message));
	  document.location = "index.php";
  });
</script>
<img src="Images/Background.jpg" class="background">