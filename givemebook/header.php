<table align="center"><tr><td width="505">
<div  align="right">
    <P>
        <?php
        if(!isset($_GET['signup'])){ ?>
        <form action="index.php?signup=0" method="post">
        <button class="btn btn-large btn btn-success" type="submit">Sign up</button>
        </form>
        <?php }else{?>
        <form action="index.php" method="post">
        <button class="btn btn-large btn btn-info" type="submit">Login</button>
        </form>
        <?php }?>
    </p>
</div>
</td></tr>
</table>
