<div id="modalDelete<?php echo $value['id_user']; ?>" class="modal">
    <div class="modal-content">
        <h4>Eliminar usuario</h4>
        <p>Seguro que deseas Eliminar a
            <?php echo $value['full_name']; ?>?
        </p>
        <p> Esta acción no se puede deshacer</p>
    </div>
    <div class="modal-footer">
        <form action="../../controllers/delete/delete_user.php?<?php echo $value['id_user']; ?>" method='POST'>
            <input type="hidden" value='<?php echo $value['id_user']; ?>' name='id_user' />
            <button type="submit" class="modal-close waves-effect  btn red">Si</button>
            <a href="" class="modal-close waves-effect  btn black">No</a>
        </form>
    </div>
</div>