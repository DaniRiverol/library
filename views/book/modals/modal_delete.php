<div id="modalDelete<?php echo $value['id_book']; ?>" class="modal">
    <div class="modal-content">
        <h4>Eliminar Libro</h4>
        <p>Seguro que deseas Eliminar a
            <?php echo $value['title']; ?>?
        </p>
        <p> Esta acción no se puede deshacer</p>
    </div>
    <div class="modal-footer">
        <form action="../../controllers/delete/delete_book.php?<?php echo $value['id_book']; ?>" method='POST'>
            <input type="hidden" value='<?php echo $value['id_book']; ?>' name='id_book' />
            <button type="submit" class="modal-close waves-effect  btn red">Si</button>
            <a href="" class="modal-close waves-effect  btn black">No</a>
        </form>
    </div>
</div>