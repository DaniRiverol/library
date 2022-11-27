<div id="modalDelete<?php echo $value['id_publisher']; ?>" class="modal">
    <div class="modal-content">
        <h4>Eliminar Editorial</h4>
        <p>Seguro que deseas Eliminar a
            <?php echo $value['name']; ?>?
        </p>
        <p> Esta acción no se puede deshacer</p>
    </div>
    <div class="modal-footer">
        <form action="../../controllers/delete/delete_publisher.php?<?php echo $value['id_publisher']; ?>" method='POST'>
            <input type="hidden" value='<?php echo $value['id_publisher']; ?>' name='id_publisher' />
            <button type="submit" class="modal-close waves-effect  btn red">Si</button>
            <a href="" class="modal-close waves-effect  btn black">No</a>
        </form>
    </div>
</div>