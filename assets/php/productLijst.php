<?php




 $objecten =   seperateInfo();


foreach($objecten as $thumbnail){

    $id = $thumbnail[0];
    $foto = $thumbnail[1];
    
  
    echo '
	<article>
							<a class="thumbnail" href="'. $foto .'" data-position="left center"><img src="'. $foto .'" alt="" /></a>
							<h2>Diam tempus accumsan</h2>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
						</article>
';
    


}







?>