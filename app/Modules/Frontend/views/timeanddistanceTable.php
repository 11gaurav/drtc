<style>
.table  td {
  border: 1px solid red;
  border-collapse: collapse;
}
</style>
<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
<div class="col-md-12 table-responsive">
  <table style="width:100%;">
    <thead>
      <tr class="bg-secondary">
        <th class="p-2 border border-dark">From</th>
        <th class="p-2 border border-dark">To</th>
        <th class="p-2 border border-dark">Distance</th>
				<th class="p-2 border border-dark">Day(s) </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td class="p-2 border border-dark"> <?php echo $from; ?>  </td>
        <td class="p-2 border border-dark"> <?php echo $to; ?>  </td>
        <td class="p-2 border border-dark"> <?php echo $distance; ?> KM.</td>
				<td class="p-2 border border-dark"> <?php echo $days; ?>  </td>	
      </tr>
    </tbody>
  </table>
</div>