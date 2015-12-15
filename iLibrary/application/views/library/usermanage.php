<div class=".col-md-9 .col-md-offset-1">
	<table class="table">
		<tr>
			<th>SSN</th>
			<th>Sex</th>
			<th>Name</th>
			<th>Address</th>
			<th>Phone</th>
			<th>Email</th>
			<th>Password</th>
			<th>Priority</th>
			<th>Edit</th>
			<th>Remove</th>
			<?php foreach ($users as $key => $user): ?>
		<tr>
			<td><?php echo $user->ssn ?></td>
			<td><?php echo $user->sex ?></td>
			<td><?php echo $user->name ?></td>
			<td><?php echo $user->address?></td>
			<td><?php echo $user->phone ?></td>
			<td><?php echo $user->email ?></td>
			<td><?php echo $user->password ?></td>
			<td><?php echo $user->priority?></td>
			<td><a href="#" data-url="#" class="btn btn-info btn-xs edit-btn"  data-toggle="modal" data-target=".edit-modal">Edit</a></td>
			<td><a href="#" class="btn btn-danger btn-xs">Remove</a></td>			
		</tr>
		<?php endforeach ?>
	</table>
</div>