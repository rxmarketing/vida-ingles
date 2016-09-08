
		<div id="search">
		<input type="search" name="text" id="text" autocomplete="off" placeholder="Buscar lecciones" autofocus onkeyup="showHint(this.value);" />
		<div id="inner"></div>
	</div>
			<script>
	
		function showHint(str) {
			if (str.length == 0) {
				document.getElementById('inner').innerHTML = "";
				return;
			} // Checks if user typed something
			
			if(window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest(); // checks if not IE 5 or 6
			} else {
				xmlhttp = new ActiveXObject ('Microsoft.XMLHTTP');
			}
			
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					document.getElementById('inner').innerHTML = xmlhttp.responseText;
				}
			}
			xmlhttp.open("REQUEST", "vi_template_search_inc.php?text="+str, true);
			xmlhttp.send();
		}
		
	</script>
