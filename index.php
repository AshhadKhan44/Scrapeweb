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
	<h1 class="text-center">Web Scraping</h1>
		<section style="margin-top:40px;">
			<div class="container">
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<form class="well" method="post" action="scrape.php" name="scrape.php" id="scrape_form">
						<div class="form-group">
						<label>URL1:</label>	
						<input type="input" class="form-control" onkeyup="wordCount(), count(this.value)" name="website_url1" id="website_url1">
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
					<label>Sum of the Positions of the alphabets:</label>	
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
			
			function str_split(string, split_length) {
			   if (split_length == null) {
				   split_length = 1;
			  }
			  if (string == null || split_length < 1) {
				return false;
			  }
			  string += '';
			  var chunks = [],
				pos = 0,
				len = string.length;
			  while (pos < len) {
				chunks.push(string.slice(pos, pos += split_length));
			  }

			  return chunks;
			}

			function count(string){
				var alphabet = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"];

				var splitted_string = str_split(string);

				var count = 0;
				for (i = 0; i < splitted_string.length; i++) { 
					var letterPosition = alphabet.indexOf(splitted_string[i])+1;
					count = count + letterPosition;
				}
				document.getElementById('pos').innerHTML = count;
				return count;
			}
		
		</script>
	</body>
</html>