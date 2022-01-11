<table>
  <thead>
    <tr>
      <th>#</th>
      <th>Serial</th>
      <th>Tamaño</th>
      <th>Marca - Slug</th>
      <th>Activo?</th>
    </tr>
  </thead>
  <tbody>
    @foreach($screens as $item)
    <tr>
      <td>{{ $item->id }}</td>
      <td>{{ $item->serial }}</td>
      <td>{{ $item->size }}</td>
      <td>{{ $item->brand->slug }}</td>
      <td>{{ $item->active ? "Sí" : "No" }}</td>
    </tr>
    @endforeach
  </tbody>
</table>