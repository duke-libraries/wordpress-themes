<?php
//require_once('/php/simplepie.inc');

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$feed_url = 'https://radiant-savannah-1223.herokuapp.com/users/1/web_requests/43/dukedukeduke.xml';


include_once('simplepie/autoloader.php');
include_once('simplepie/idn/idna_convert.class.php');

	// Set your own configuration options as you see fit.
	$feed = new SimplePie();

	$feed->set_stupidly_fast(true);

	$feed->set_feed_url($feed_url);

	$feed->set_cache_location($_SERVER['DOCUMENT_ROOT'] . '/php/cache');

	$feed->set_timeout(60);

	$feed->set_cache_duration(900);


	$success = $feed->init();

	// Make sure the page is being served with the right headers.
	$feed->handle_content_type();

	// Set our paging values
	$start = (isset($_GET['start']) && !empty($_GET['start'])) ? $_GET['start'] : 0; // Where do we start?
	$length = (isset($_GET['length']) && !empty($_GET['length'])) ? $_GET['length'] : 10; // How many per page?
	$max = $feed->get_item_quantity(); // Where do we end?

	// When we end our PHP block, we want to make sure our DOCTYPE is on the top line to make
	// sure that the browser snaps into Standards Mode.

	echo '<div id="all-library-news">';


			// Check to see if there are more than zero errors (i.e. if there are any errors at all)
			if ($feed->error())
			{
			  // If so, start a <div> element with a classname so we can style it.
			  echo '<div class="sp_errors">' . "\r\n";

			    // ... and display it.
			    echo '<p>' . htmlspecialchars($feed->error()) . "</p>\r\n";

			  // Close the <div> element we opened.
			  echo '</div>' . "\r\n";
			}




		// Let's do our paging controls
		$next = (int) $start + (int) $length;
		$prev = (int) $start - (int) $length;

		// Create the NEXT link
		$nextlink = '<a href="?start=' . $next . '&length=' . $length . '">Next &raquo;</a>';
		if ($next > $max)
		{
			$nextlink = 'Next &raquo;';
		}

		// Create the PREVIOUS link
		$prevlink = '<a href="?start=' . $prev . '&length=' . $length . '">&laquo; Previous</a>';
		if ($prev < 0 && (int) $start > 0)
		{
			$prevlink = '<a href="?start=0&length=' . $length . '">&laquo; Previous</a>';
		}
		else if ($prev < 0)
		{
			$prevlink = '&laquo; Previous';
		}

		// Normalize the numbering for humans
		$begin = (int) $start + 1;
		$end = ($next > $max) ? $max : $next;

		echo '<p class="pagination"><em>Showing ' . $begin . '&ndash;' . $end . ' out of ' . $max .' &nbsp; ' . $prevlink . ' | ' . $nextlink . '</em></p>';

		echo '<br />';

		if ($success): ?>
			<?php
			// get_items() will accept values from above.
			foreach($feed->get_items($start, $length) as $item):
				$feed = $item->get_feed();
			?>


				<?php

					$temp_url = $item->get_permalink();

						// news blog
						if (strpos($temp_url, 'blogs.library.duke.edu') !== false) {
	    				$theSource = "News, Events, and Exhibits";
							$theSourceURL = "https://blogs.library.duke.edu/";
							$theThumb = "blog18.jpg";
						}

						// 1
						if (strpos($temp_url, 'cit.duke.edu') !== false) {
	    				$theSource = "Center for Instructional Technology";
							$theSourceURL = "https://cit.duke.edu/blog/";
							$theThumb = "blog1.jpg";
						}

						// 2
						if (strpos($temp_url, 'blogs.library.duke.edu/data') !== false) {
	    				$theSource = "Data & GIS";
							$theSourceURL = "https://blogs.library.duke.edu/data/";
							$theThumb = "blog2.jpg";
						}

						// 3
						if (strpos($temp_url, 'blogs.library.duke.edu/rubenstein') !== false) {
	    				$theSource = "The Devil's Tale";
							$theSourceURL = "https://blogs.library.duke.edu/rubenstein/";
							$theThumb = "blog3.jpg";
						}

						// 4
						if (strpos($temp_url, 'blogs.library.duke.edu/digital-collections') !== false) {
	    				$theSource = "Digital Collections";
							$theSourceURL = "https://blogs.library.duke.edu/digital-collections/";
							$theThumb = "blog4.jpg";
						}

						// 5
						if (strpos($temp_url, 'sites.fuqua.duke.edu') !== false) {
	    				$theSource = "Fuqua School of Business";
							$theSourceURL = "https://blogs.fuqua.duke.edu/";
							$theThumb = "blog5.jpg";
						}

						// 6
						if (strpos($temp_url, 'dukelawref.blogspot.com') !== false) {
	    				$theSource = "The Goodson Blogson";
							$theSourceURL = "https://dukelawref.blogspot.com";
							$theThumb = "blog6.jpg";
						}

						// 7
						if (strpos($temp_url, 'blogs.library.duke.edu/humanities') !== false) {
	    					$theSource = "Humanities@Duke University";
							$theSourceURL = "https://blogs.library.duke.edu/humanities/";
							$theThumb = "blog7.jpg";
						}

						// 8
						if (strpos($temp_url, 'blogs.library.duke.edu/ilab') !== false) {
	    				$theSource = "Innovation Lab";
							$theSourceURL = "https://blogs.library.duke.edu/ilab/";
							$theThumb = "blog8.jpg";
						}

						// 9
						if (strpos($temp_url, 'blogs.library.duke.edu/dukelibrariesinstruction') !== false) {
	    				$theSource = "Instruction & Outreach";
							$theSourceURL = "https://blogs.library.duke.edu/dukelibrariesinstruction/";
							$theThumb = "blog9.jpg";
						}

						// 10
						if (strpos($temp_url, 'blogs.library.duke.edu/answerperson') !== false) {
	    					$theSource = "Library Answer Person";
							$theSourceURL = "https://blogs.library.duke.edu/answerperson/";
							$theThumb = "blog10.jpg";
						}

						// 11
						if (strpos($temp_url, 'blogs.library.duke.edu/libraryhacks') !== false) {
	    				$theSource = "Library Hacks";
							$theSourceURL = "https://blogs.library.duke.edu/libraryhacks/";
							$theThumb = "blog11.jpg";
						}

						// 12
						if (strpos($temp_url, 'blogs.library.duke.edu/techmentor') !== false) {
	    				$theSource = "Technology Mentor Program";
							$theSourceURL = "https://blogs.library.duke.edu/techmentor/";
							$theThumb = "blog12.jpg";
						}

						// 13
						if (strpos($temp_url, 'blogs.library.duke.edu/preservation') !== false) {
	    				$theSource = "Preservation Underground";
							$theSourceURL = "https://blogs.library.duke.edu/preservation/";
							$theThumb = "blog13.jpg";
						}

						// 14
						if (strpos($temp_url, 'blogs.library.duke.edu/scholcomm') !== false) {
	    				$theSource = "Scholarly Communication";
							$theSourceURL = "https://blogs.library.duke.edu/scholcomm/";
							$theThumb = "blog14.jpg";
						}

						// 15
						if (strpos($temp_url, 'blogs.library.duke.edu/divinity') !== false) {
	    				$theSource = "Divinity School Library Spotlight";
							$theSourceURL = "https://blogs.library.duke.edu/divinity/";
							$theThumb = "blog15.jpg";
						}

						// 16
						if (strpos($temp_url, 'mclibrary.duke.edu') !== false) {
	    				$theSource = "Medical Center Library";
							$theSourceURL = "https://mclibrary.duke.edu/about/blog";
							$theThumb = "blog16.jpg";
						}

						// 19
						if (strpos($temp_url, 'dukeluab.blogspot.com') !== false) {
	    				$theSource = "Undergraduate Advisory Board";
							$theSourceURL = "https://dukeluab.blogspot.com/";
							$theThumb = "blog17.jpg";
						}

						// 18
						if (strpos($temp_url, 'blogs.library.duke.edu/divinity') !== false) {
	    					$theSource = "Rubenstein Library Renovation";
							$theSourceURL = "https://blogs.library.duke.edu/renovation/";
							$theThumb = "blog19.jpg";
						}

						// 20
						if (strpos($temp_url, 'blogs.library.duke.edu/dcthree') !== false) {
	    				$theSource = "Duke Collaboratory for Classics Computing";
							$theSourceURL = "https://blogs.library.duke.edu/dcthree/";
							$theThumb = "blog20.jpg";
						}

						// 21
						if (strpos($temp_url, 'archives.mc.duke.edu/blog') !== false) {
	    				$theSource = "Duke Medical Center Archives Blog";
							$theSourceURL = "https://archives.mc.duke.edu/blog/";
							$theThumb = "blog21.jpg";
						}

						// 22
						if (strpos($temp_url, 'blogs.library.duke.edu/bitstreams') !== false) {
	    				$theSource = "Bitstreams: Notes from the Digital Projects Team";
							$theSourceURL = "https://blogs.library.duke.edu/bitstreams/";
							$theThumb = "blog22.jpg";
						}

						// 23
						if (strpos($temp_url, 'learninginnovation.duke.edu') !== false) {
							$theSource = "Duke Learning Innovation";
							$theSourceURL = "https://learninginnovation.duke.edu/blog/";
							$theThumb = "blog24.jpg";
						}

						// else {
						// 	$theSource = " ";
						// 	$theSourceURL = " ";
						// 	$theThumb = "blog18.jpg";
						// }


				echo '<div class="news-item">';

					echo '<div class="image">';
						echo '<a href="' . $theSourceURL . 'title="' . $theSource .'"><img src="/wp-content/themes/dul-news-2015/images/' . $theThumb . '" width="35" alt="' . $theSource .'" border="0" /></a>';
					echo '</div>';

					echo '<div class="content">';
						echo '<p>';

						if ($item->get_permalink()) {
							echo '<a href="' . $item->get_permalink() . '">';
						}

						// sanitize title
						$theTitle = $item->get_title(true);
						$theTitle = ltrim($theTitle);
						$theTitle = rtrim($theTitle);
						$theTitle = str_replace('&amp;amp;','&amp;',$theTitle);



						echo $theTitle;

						if ($item->get_permalink()) {
							echo '</a>';
						}

						echo '</p>';
						echo '<p class="footnote"><a href="' . $theSourceURL . '">' . $theSource . '</a> &mdash; ' . $item->get_date('F j, Y') . '</p>';

					echo '</div>';

				echo '</div>';

				unset($theSource);
				unset($theSourceURL);
				unset($theThumb);

			endforeach;

		endif;




		echo '<p class="pagination"><em>Showing ' . $begin . '&ndash;' . $end . ' out of ' . $max . ' &nbsp; ' . $prevlink . ' | ' . $nextlink . '</em></p>';

		?>

	</div>
