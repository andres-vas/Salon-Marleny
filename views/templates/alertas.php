<?php
    if(isset($alertas) && is_array($alertas)):
        foreach($alertas as $key => $mensajes):
            foreach($mensajes as $mensaje):

?>

<div class="alerta <?php echo $key; ?>">
    <?php echo $mensaje; ?>
</div>

<?php
        endforeach;
    endforeach;
else:
    echo '<div class="alerta info">No hay alertas para mostrar</div>';
endif;
?>