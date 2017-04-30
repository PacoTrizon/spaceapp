<table class="table">
  <thead>
    <th>Categoria</th>
    <th>Titulo</th>
    <th>Contenido</th>
    <th>Fecha</th>
    <th>Multimedia</th>
  </thead>
  <tbody>
    <?php foreach ($articulos  as $value): ?>
      <tr>
        <td><?php echo $value->categoria ?></td>
        <td><?php echo $value->nombre ?></td>
        <td><?php echo substr($value->contenido,0,20) ?></td>
        <td><?php echo $value->fecha_creacion ?></td>
        <td></td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
