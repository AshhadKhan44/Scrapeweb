<html lang="en">
    <head>
        <meta charset="UTF-8">
        <!--IE-Compatibility-->
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <!--bootstrap cdn-->
        <!--Mobile meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Web Scraping</title>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"/>
           <!-- <link rel="stylesheet" href="style.css">
           <link rel="stylesheet" href="style2.css">
           <link rel="stylesheet" href="ng/ngToast.css">-->
		<!--if IE 9-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <!--end if IE 9-->
       
    </head>
	
<body>
	<h1 class="text-center">Task 1</h1>
		<section style="margin-top:40px;">
			<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<form class="well" method="post" action="scrape.php" name="scrape.php" id="scrape_form">
						<div class="form-group">
						<label>URL1:</label>	
						<input type="input" class="form-control" onkeyup="wordCount(), alphabetPosition(this.value)" name="website_url1" id="website_url1">
						<label>URL2:</label>	
						<input type="input" onkeyup="wordCount()" class="form-control" name="website_url2" id="website_url2"><br>
						<input type="submit" class="btn btn-primary" name="submit" value="submit">
						</div>	
					</form>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<label>Num of Characters typed</label>	
					<p id="count"></p>
					<label>Positions of the alphabets:</label>	
					<p id="pos"></p>	
				</div>	
			</div>	
			</div>
		</section>

		<script type="text/javascript">
			var text = document.getElementById('website_url1').value;
				function wordCount(){
				var text1 = document.getElementById('website_url1').value;
				var text2 = document.getElementById('website_url2').value;
				var ftxt = text1.length+text2.length;
				document.getElementById('count').innerHTML = ftxt;	
				console.log(ftxt);
				
			}
			function alphabetPosition(text) {
				  var result = "";
				  var sum = "";
				  for (var i = 0; i < text.length; i++) {
					var code = text.toUpperCase().charCodeAt(i)
					if (code > 64 && code < 91){
						result += (code - 64);
						sum+=result[i];
					} 
					  console.log(sum);
				  }
				  document.getElementById('pos').innerHTML = sum;

				}
		</script>
	</body>
</html>