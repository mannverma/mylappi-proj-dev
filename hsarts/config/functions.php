<?php

function gen_pagination($base_url, $num_items, $per_page, $page_no)

{

	global $offset, $numPages;

	$page_string = '';

	

	$numPages = ceil($num_items / $per_page);

	

	if ($numPages <= 1)

		return '';



	if ($page_no == 1) // this is the first page - there is no previous page 

	{

		$page_string .= 'Previous ';

	}

    else// not the first page, link to the previous page

	{

        $page_string .=  "<a href=\"" . $base_url . "page=" . ($page_no-1) . "\">Previous</a> ";

	}





	if ( $page_no < 6 )

	{

		for ($i = 1; $i <= $numPages; $i++)

		{

			if ($i == $page_no)

				$page_string .=  " <strong>$i</strong> ";

			else

				$page_string .=  "<span style=\"padding:3px;\"><a href=\"$base_url" . 'page=' . $i . "\">$i</a></span>";

	

			if ( $i == 9 )

				break;

		}

		if ( $numPages > 9)

			$page_string .= ' '; 

	}

	elseif ( $page_no > $numPages - 5 )

	{

		$page_string .= ' ';

		$tmp = $numPages - 8;

		for ($i = $tmp; $i <= $numPages; $i++)

		{

			if ($i == $page_no)

				$page_string .=  " <strong>$i</strong> ";

			else

				$page_string .=  "<span style=\"padding:3px;\"><a href=\"$base_url" . 'page=' . $i . "\">$i</a></span>";

		}

	}

	else

	{

		$page_string .= ' '; 

		$tmp = $page_no - 4;	

		for ($i = $tmp; $i <= $numPages; $i++)

		{

			if ($i == $page_no)

				$page_string .=  " <strong>$i</strong> ";

			else

				$page_string .=  "<span style=\"padding:3px;\"><a  href=\"$base_url" . 'page=' . $i . "\">$i</a></span>";

			

			if ( $i > $page_no + 3 )

				break;

		}

		$page_string .= ' '; 

	}

	



    if ($page_no == $numPages) // this is the last page - there is no next page

	{

        $page_string .=  'Next ';

	}

	else // not the last page, link to the next page

	{

     	$page_string .=  " <a href=\"" . $base_url . "page=" . ($page_no + 1) . "\" >Next</a>";

	}



	return $page_string;

}



function createThumbs($pathToImages, $pathToThumbs, $thumbWidth, $thumbHeight,$fname,$newimg )

{

  // open the directory

  $dir = opendir( $pathToImages );

//ini_set("memory_limit","12M");

  // loop through it, looking for any/all JPG files:

  //while (false !== ($fname = readdir( $dir ))) {

    // parse path for the extension

    $info = pathinfo($pathToImages . $fname);

    // continue only if this is a JPEG image

    if ( strtolower($info['extension']) == 'jpg'|| strtolower($info['extension']) == 'jpeg')

    {

      //echo "Creating thumbnail for {$fname} <br />";



      // load image and get image size

      $img = imagecreatefromjpeg("{$pathToImages}{$fname}" );

      $width = imagesx( $img );

      $height = imagesy( $img );

	//	echo $img;

//		echo $height;

      // calculate thumbnail size

      $new_width = $thumbWidth;

	  if(trim($thumbHeight)=="")

	  {

/*	   for($i=1;$i<=$thumbWidth;$i++)

	  {

	       $new_height = floor( $height * ( $i / $width ) );

		   if($new_height > $thumbWidth)

		   {

		   	$new_height=$thumbWidth;

		   	 break;

		   }

		 //  $new_width=$i;

	  }

*/	  

	$new_height = floor( $height * ( $thumbWidth / $width ));

}

	  else

	  {

		 $new_height=$thumbHeight;

		}

      //$new_height = floor( $height * ( $thumbWidth / $width ));

		//echo "new w".$new_width;

		///echo "new h".$new_height;

      // create a new temporary image

      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

		//echo $tmp_img;

      // copy and resize old image into new image

      imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );



      // save thumbnail into a file

      imagejpeg($tmp_img, "{$pathToThumbs}{$newimg}" );

    }

	if (strtolower($info['extension']) == 'gif' )

    {

      //echo "Creating thumbnail for {$fname} <br />";



      // load image and get image size

      $img = imagecreatefromgif( "{$pathToImages}{$fname}" );

      $width = imagesx( $img );

      $height = imagesy( $img );



      // calculate thumbnail size

      $new_width = $thumbWidth;

	   if(trim($thumbHeight)=="")

	  {

/*	   for($i=1;$i<=$thumbWidth;$i++)

	  {

	       $new_height = floor( $height * ( $i / $width ) );

		   if($new_height > $thumbWidth)

		   {

		   	$new_height=$thumbWidth;

		   	 break;

		   }

		 //  $new_width=$i;

	  }

*/	  

	$new_height = floor( $height * ( $thumbWidth / $width ));

}

	  else

	  {

		 $new_height=$thumbHeight;

		}

     // $new_height = floor( $height * ( $thumbWidth / $width ) );

	  //floor($height * ( $thumbWidth / $width ) );

      // create a new temporary image

      $tmp_img = imagecreatetruecolor( $new_width, $new_height );



      // copy and resize old image into new image

      imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );



      // save thumbnail into a file

      imagegif( $tmp_img, "{$pathToThumbs}{$newimg}" );

    }

	if (strtolower($info['extension']) == 'bmp' )

    {

      //echo "Creating thumbnail for {$fname} <br />";



      // load image and get image size

      $img = imagecreatefromgif( "{$pathToImages}{$fname}" );

      $width = imagesx( $img );

      $height = imagesy( $img );



      // calculate thumbnail size

      $new_width = $thumbWidth;

    //  $new_height = floor( $height * ( $thumbWidth / $width ) );

	

	  for($i=1;$i<=$thumbWidth;$i++)

	  {

	       $new_height = floor( $height * ( $i / $width ) );

		   if($new_height > $thumbWidth)

		   {

		   	$new_height=$thumbWidth;

		   	 break;

		   }

		 //  $new_width=$i;

	  }

	  //$new_height=$thumbWidth;

	  //floor($height * ( $thumbWidth / $width ) );

      // create a new temporary image

      $tmp_img = imagecreatetruecolor( $new_width, $new_height );



      // copy and resize old image into new image

      imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );



      // save thumbnail into a file

      imagejpeg( $tmp_img, "{$pathToThumbs}{$newimg}" );

    }

	

	

	

  //}

  // close the directory

  //closedir( $dir );

}

function createThumbs2($pathToImages, $pathToThumbs, $thumbWidth, $thumbHeight,$fname,$newimg )

{

  // open the directory

  $dir = opendir( $pathToImages );

//ini_set("memory_limit","12M");

  // loop through it, looking for any/all JPG files:

  //while (false !== ($fname = readdir( $dir ))) {

    // parse path for the extension

    $info = pathinfo($pathToImages . $fname);

    // continue only if this is a JPEG image

    if ( strtolower($info['extension']) == 'jpg')

    {

      //echo "Creating thumbnail for {$fname} <br />";



      // load image and get image size

      $img = imagecreatefromjpeg("{$pathToImages}{$fname}" );

      $width = imagesx( $img );

      $height = imagesy( $img );

	//	echo $img;

//		echo $height;

      // calculate thumbnail size

      $new_width = $thumbWidth;

	  $new_height=$thumbHeight;

      //$new_height = floor( $height * ( $thumbWidth / $width ) );

		//echo "new w".$new_width;

		///echo "new h".$new_height;

      // create a new temporary image

      $tmp_img = imagecreatetruecolor( $new_width, $new_height );

		//echo $tmp_img;

      // copy and resize old image into new image

      imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );



      // save thumbnail into a file

      imagejpeg($tmp_img, "{$pathToThumbs}{$newimg}" );

    }

	if (strtolower($info['extension']) == 'gif' )

    {

      //echo "Creating thumbnail for {$fname} <br />";



      // load image and get image size

      $img = imagecreatefromgif( "{$pathToImages}{$fname}" );

      $width = imagesx( $img );

      $height = imagesy( $img );



      // calculate thumbnail size

      $new_width = $thumbWidth;

	  $new_height=$thumbHeight;

     // $new_height = floor( $height * ( $thumbWidth / $width ) );

	  //floor($height * ( $thumbWidth / $width ) );

      // create a new temporary image

      $tmp_img = imagecreatetruecolor( $new_width, $new_height );



      // copy and resize old image into new image

      imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );



      // save thumbnail into a file

      imagejpeg( $tmp_img, "{$pathToThumbs}{$newimg}" );

    }

	if (strtolower($info['extension']) == 'bmp' )

    {

      //echo "Creating thumbnail for {$fname} <br />";



      // load image and get image size

      $img = imagecreatefromgif( "{$pathToImages}{$fname}" );

      $width = imagesx( $img );

      $height = imagesy( $img );



      // calculate thumbnail size

      $new_width = $thumbWidth;

    //  $new_height = floor( $height * ( $thumbWidth / $width ) );

	  $new_height=$thumbHeight;

	  //floor($height * ( $thumbWidth / $width ) );

      // create a new temporary image

      $tmp_img = imagecreatetruecolor( $new_width, $new_height );



      // copy and resize old image into new image

      imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );



      // save thumbnail into a file

      imagejpeg( $tmp_img, "{$pathToThumbs}{$newimg}" );

    }

	

	

	

  //}

  // close the directory

  //closedir( $dir );

}

?>

