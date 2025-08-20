<?php
  for($num=1; $num<=$totalPages; $num++) {
    echo '<a class="page-item" href="?per_page='.$quantity_item.'&page='.$num.'">'.$num.'</a>';
  }
?>
