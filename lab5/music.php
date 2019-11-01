<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>
		
		<!-- Ex 1: Number of Songs (Variables) -->
		<?php
		    $a=-2;
		    foreach(scandir("songs") as $filename)
		        $a=$a+1;
		    $b=(int)($a/10);
		    print("<p>I love music. I have $a total songs,
		    which is over $b hours of music!</p>");
        ?>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<ol>
			<?php
				$newspages = isset($_GET["newspages"])?(int)$_GET["newspages"]:5;
				for($news_pages=11;$news_pages>11-$newspages;$news_pages--){
					if($news_pages>=10)
						print("<li><a href=\"https://www.billboard.com/archive/article/2019$news_pages\">2019-$news_pages</a></li>");
					else
						print("<li><a href=\"https://www.billboard.com/archive/article/20190$news_pages\">2019-0$news_pages</a></li>");
				}
			?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>
			<ol>
			<?php
				//$name = array("Guns N' Roses","Green Day","Blink182","Queen");
				$name = file("favorite.txt");
				foreach($name as $item)
					print("<li><a href=\"http://en.wikipedia.org/wiki/$item\">$item</a></li>");
			?>
			</ol>
		</div>
		
		<!-- Ex 6: Music (Multiple Files) -->
		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>
			
			<ul id="musiclist">
				<?php
					$data = array();
					foreach(glob("songs/*.mp3") as $filename)
						$data[$filename] = (int)(filesize($filename)/1024);
					arsort($data);
					foreach($data as $name => $size){
						$temp = basename($name);
						print("<li class=\"mp3item\">
						<a href=\"$name\">$temp</a>
						($size KB)
						</li>");
					}
				?>
				<!--
				<li class="mp3item">
					<a href="lab5/musicPHP/songs/paradise-city.mp3">paradise-city.mp3</a>
				</li>
				
				<li class="mp3item">
					<a href="lab5/musicPHP/songs/basket-case.mp3">basket-case.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li>
				-->
				<!-- Exercise 8: Playlists (Files) -->
				<?php
				$playlists=glob("songs/*.m3u");
				rsort($playlists);
				foreach($playlists as $filename){
					$text = basename($filename);
					print("<li class=\"playlistitem\">$text:");
					print("<ul>");
					$items = array();
					foreach(file($filename) as $item){
						if(strpos($item,"#")!==0)
							$items[] = $item;
					}
					shuffle($items);
					foreach($items as $item)
						print("<li>$item</li>");
					print("</ul>");
				}
				?>
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
