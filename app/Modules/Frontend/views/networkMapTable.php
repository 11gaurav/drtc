<style>
	.table td {
		border: 1px solid red;
		border-collapse: collapse;
	}
</style>
<link rel="stylesheet" href="assets/dist/css/adminlte.min.css">

<body>
	<div class="col-md-12 table-responsive">
		<table class="table table-bordered" style="width:50%;">
			<tbody>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">Station</th>
					<td class="p-2"> <?php echo $station; ?> </td>
				</tr>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">Service Code </th>
					<td class="p-2"> <?php echo $service_code; ?> </td>
				</tr>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">Address</th>
					<td class="p-2"> <?php echo $address; ?> </td>
				</tr>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">City </th>
					<td class="p-2"> <?php echo $city; ?> </td>
				</tr>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">State </th>
					<td class="p-2"> <?php echo $state; ?> </td>
				</tr>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">Contact Person</th>
					<td class="p-2"> <?php echo $contact_person; ?> </td>
				</tr>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">Mobile </th>
					<td class="p-2"> <?php echo $mobile; ?> </td>
				</tr>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">Other Phone </th>
					<td class="p-2"> <?php echo $other_phone; ?> </td>
				</tr>
				<tr class="border border-dark">
					<th class="bg-secondary p-2">E-mail </th>
					<td class="p-2"> <?php echo $email; ?> </td>
				</tr>
			</tbody>
		</table>
	</div>