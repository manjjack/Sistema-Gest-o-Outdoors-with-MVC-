<?php include_once 'header.php'; ?>

<div class="clearfix"></div>

<div class="container">
    <a href="index.php?op=new" class="btn btn-large btn-info"><i class="glyphicon glyphicon-plus"></i> &nbsp; Add new contact</a>
</div>

<div class="clearfix"></div><br />

<div class="container">
    <table class='table table-bordered table-responsive'>
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>username</th>
            <th>password</th>
            
            <th colspan="2" align="center">Actions</th>
        </tr>
        <?php foreach ($admin as $adm): ?>
            <tr>
                <td><?php echo $adm->getId(); ?></td>
                <td><?php echo $adm->getNome(); ?></td>
                <td><?php echo $adm->getUsername(); ?></td>
                <td><?php echo $contact->getPassword(); ?></td>
                
                <td align="center">
                    <a href="index.php?op=details&id=<?php echo $contact->getId(); ?>"><i class="glyphicon glyphicon-edit"></i></a>
                </td>
                <td align="center">
                    <a href="index.php?op=delete&id=<?php echo $contact->getId(); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="7" align="center">
                <div class="pagination-wrap">
                </div>
            </td>
        </tr>
    </table>
</div>

<?php
include_once 'footer.php';