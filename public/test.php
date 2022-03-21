<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Contacts</title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" src="./css/font-awesome.min.css">
</head>

<body>
    <?php
    include './bootstrap.php';
    include '../src/Contact.php';



    use CT275\Labs\Contact;

    $contact = new Contact($PDO);
    $contacts = $contact->all();
    ?>
	<?php include('../partials/navbar.php') ?>

    	<tbody>
        <?php foreach($contacts as $contact): ?>
				<tr>
					<td><?=htmlspecialchars($contact->name)?></td>
					<td><?=htmlspecialchars($contact->phone)?></td>
					<td><?=date("d-m-y", strtotime($contact->created_at))?></td>
					<td><?=htmlspecialchars($contact->notes)?></td>
					<td>
						<a href="edit.php" class="btn btn-xs btn-warning">
							<i alt="Edit" class="fa fa-pencil"> Edit</i></a>
						<a href="#" class="btn btn-xs btn-danger">
						
						<i alt="Delete" class="fa fa-trash"> Delete</i></a>
					</td>

					<td>
						<a href="<?url('edit.php?id=') . $contact->id?>"
							class="btn btn-xs btn-warning">
							<i alt="Edit" class="fa fa-pencil"> Edit</i></a>
						<!-- <a href="#" class="btn btn-xs btn-danger">
							<i alt="Delete" class="fa fa-trash"> Delete</i></a>
						-->
						<form class="delete" action="delete.php"
							method="POST" style="display: inline,">
							<input type="hidden" name="id"
								value="<?=$contact->getId()?>">
							<button type="submit" class="btn btn-xs btn-danger"
								name="delete-contact">
								<i alt="Delete" class="fa fa-trash"> Delete</i></button>
						</form>
					</td>
				</tr>
			<?php endforeach?> 
	</tbody>

    <?php include('../partials/footer.php') ?>
	<script>
		$(document).ready(function() {
			new WOW().init();
			$('#contacts').DataTable();

			$('button[name="delete-contact"]').on('click', function(e) {
				const $form = $(this).closest('form');
				e.preventDefault();
				$('#delete-confirm').modal({
					backdrop: 'static', keyboard: false
				})
				.one('click','#delete', function() {
					$form.trigger('submit');
				})
			})
		});
	</script>

	<?php include('../partials/footer.php') ?>

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
	<script src="//cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
	<script src="./js/wow.min.js"></script>
	<script>
		$(document).ready(function() {
			new WOW().init();
			$('#contacts').DataTable();
		});
	</script>
</body>
</html>


<a href="<?php>url('edit.php?id=') . $contact->id?>"
												class="btn btn-xs btn-warning">
												<i alt="Edit" class="fa fa-pencil"> Edit</i></a> 
											<form class="delete" action="delete.php"
												method="POST" style="display: inline,">
												<input type="hidden" name="id"
													value="<?=$contact->getId()?>">
												<button type="submit" class="btn btn-xs btn-danger"
													name="delete-contact">
													<i alt="Delete" class="fa fa-trash"> Delete</i></button>
											</form>