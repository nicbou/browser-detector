<!DOCTYPE html>
<html>
	<head>
		<!-- Vous devriez essayer Firefox ou Chrome -->
		<title>Quel navigateur utilisez-vous?</title>
		<meta name="language" content="fr"/> 
		<meta charset="UTF-8"/> 
		<meta name="author" content="Nicolas Bouliane"/> 
		<meta name="description" content="Cet outil détecte le navigateur que vous utilisez ainsi que la résolution de votre écran."/>
		<link rel="stylesheet" href="style.css" type="text/css"/>
		<link href='http://fonts.googleapis.com/css?family=Calligraffitti' rel='stylesheet' type='text/css'/>
		<link rel='canonical' href='http://nicolasbouliane.com/navigateur'/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
		<script type="text/javascript"><!--
			$(document).ready(function(){
				$('#howto').hide();
				$('#wrapper').hide().fadeIn(500,function(){
					$('#howto').fadeIn(750);
				});
			});
			var BrowserDetect = {
				init: function () {
					this.browser = this.searchString(this.dataBrowser) || "An unknown browser";
					this.version = this.searchVersion(navigator.userAgent)
						|| this.searchVersion(navigator.appVersion)
						|| "an unknown version";
					this.OS = this.searchString(this.dataOS) || "an unknown OS";
				},
				searchString: function (data) {
					for (var i=0;i<data.length;i++)	{
						var dataString = data[i].string;
						var dataProp = data[i].prop;
						this.versionSearchString = data[i].versionSearch || data[i].identity;
						if (dataString) {
							if (dataString.indexOf(data[i].subString) != -1)
								return data[i].identity;
						}
						else if (dataProp)
							return data[i].identity;
					}
				},
				searchVersion: function (dataString) {
					var index = dataString.indexOf(this.versionSearchString);
					if (index == -1) return;
					return parseFloat(dataString.substring(index+this.versionSearchString.length+1));
				},
				dataBrowser: [
					{
						string: navigator.userAgent,
						subString: "Chrome",
						identity: "Chrome"
					},
					{ 	string: navigator.userAgent,
						subString: "OmniWeb",
						versionSearch: "OmniWeb/",
						identity: "OmniWeb"
					},
					{
						string: navigator.vendor,
						subString: "Apple",
						identity: "Safari",
						versionSearch: "Version"
					},
					{
						prop: window.opera,
						identity: "Opera"
					},
					{
						string: navigator.vendor,
						subString: "iCab",
						identity: "iCab"
					},
					{
						string: navigator.vendor,
						subString: "KDE",
						identity: "Konqueror"
					},
					{
						string: navigator.userAgent,
						subString: "Firefox",
						identity: "Firefox"
					},
					{
						string: navigator.vendor,
						subString: "Camino",
						identity: "Camino"
					},
					{		// for newer Netscapes (6+)
						string: navigator.userAgent,
						subString: "Netscape",
						identity: "Netscape"
					},
					{
						string: navigator.userAgent,
						subString: "MSIE",
						identity: "Internet Explorer",
						versionSearch: "MSIE"
					},
					{
						string: navigator.userAgent,
						subString: "Gecko",
						identity: "Mozilla",
						versionSearch: "rv"
					},
					{ 		// for older Netscapes (4-)
						string: navigator.userAgent,
						subString: "Mozilla",
						identity: "Netscape",
						versionSearch: "Mozilla"
					}
				],
				dataOS : [
					{
						string: navigator.platform,
						subString: "Win",
						identity: "Windows"
					},
					{
						string: navigator.platform,
						subString: "Mac",
						identity: "Mac"
					},
					{
						   string: navigator.userAgent,
						   subString: "iPhone",
						   identity: "iPhone/iPod"
					},
					{
						string: navigator.platform,
						subString: "Linux",
						identity: "Linux"
					}
				]

			};
			BrowserDetect.init();
		// --></script>
	</head>
	<body><div id="wrapper">
		<script type="text/javascript">
		if (BrowserDetect.browser == "Safari" || BrowserDetect.browser == "Chrome" || BrowserDetect.browser == "Firefox"){
			document.write('<img id="browsericon" src="' + BrowserDetect.browser.toLowerCase() + '.jpg" alt="Vous utilisez ' + BrowserDetect.browser + '"/>');
		}
		else if(BrowserDetect.browser == "Internet Explorer"){
			document.write('<img id="browsericon" src="ie.jpg" alt="Vous utilisez ' + BrowserDetect.browser + '"/>');
		}
		</script>
		<h2 id="currentbrowser">
			<script type="text/javascript">document.write('Vous utilisez <span class="browser">' + BrowserDetect.browser + ' ' + BrowserDetect.version + '</span> sur ' + BrowserDetect.OS);</script>
		</h2>
		<script type="text/javascript">
			var width = window.screen.width;
			var height = window.screen.height;
			var currWidth = window.screen.currWidth;
			var currHeight = window.screen.currHeight;
			
			document.write('<span id="resolution">Votre résolution d\'écran: ' + width + 'x' + height + '</span>');
		</script>
	</div></body>
</html>