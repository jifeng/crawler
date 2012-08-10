<?php

include "../lib/crawUtil.php";


//getModel();
/**getArticles();
getFriendslist(3);***/
/*print_r(getAllModelId());



echo getModelName(2);*/



$doid=getModelCategory();

include $doid.".php";






?>