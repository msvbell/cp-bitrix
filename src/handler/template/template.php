<?php

?>
<form action="<?=$params['URL']?>" id="compassplus" method="get" >
    <input type="hidden" name="SESSIONID" value="<?=$params['SESSIONID']?>">
    <input type="hidden" name="ORDERID" value="<?=$params['ORDERID']?>">
    <input type="submit" value="Оплатить" class="btn btn-primary">
</form>
