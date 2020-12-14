<?php 
include("db_actions/db.php");

include("includes/header.php");

$modify = false;
if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$modify = true;
	$query = "SELECT * FROM users WHERE id = $id";
	$result = mysqli_query($conn, $query);

	if(mysqli_num_rows($result) == 1) {
		$row = mysqli_fetch_array($result);
		$username = $row['name'];
		$phoneNumber = $row['phone_number'];
		$email = $row['email'];
	}
}
?>
<div class="container p-4">
	<div class="row">

		<div class="col-md-4">
			<?php if(isset($_SESSION['state_message'])) {?>
			<div
			class="alert alert-<?= $_SESSION['state_type']?> alert-dismissible fade show"
			role="alert"
			>
					<?= $_SESSION['state_message'] ?>
					<button
					type="button"
					class="btn-close"
					data-bs-dismiss="alert"
					aria-label="Close"
					>
					</button>
				</div>
			<?php session_unset(); } ?>
			<div class="card card-body">

				<form 
				action="<?php if(!$modify) {echo "db_actions/save_user.php";}else {echo "db_actions/edit_user.php?id=$id";}?>"
				method="POST"
				>
					<legend>Register</legend>
					<div class="mb-3">
						<input 
						type="text"
						name="user_name"
						class="form-control"
						placeholder="User Name"
						value="<?php if($modify) echo $username; ?>"
						required
						autofocus
						>
					</div>
					<div class="mb-3">
						<input
						type="tel"
						name="phone_number"
						class="form-control"
						placeholder="Phone Number"
						value="<?php if($modify) echo $phoneNumber; ?>"
						pattern="[0-9]{10}"
						required
						> 
						<span id="phoneHelpInline" class="form-text">
							Must be 10 characters long.
    				</span>
					</div>
					<div class="mb-3">
						<input
						type="email"
						name="user_email"
						class="form-control"
						placeholder="Email"
						value="<?php if($modify) echo $email; ?>"
						required
						>
						<span id="phoneHelpInline" class="form-text">
							Format: ...@...
    				</span>
					</div>
					<div class="d-grid gap-2">
						<input
						type="submit"
						class="btn btn-primary"
						name="<?php if($modify){echo "edit_user";}else {echo "save_user";}?>"
						value="<?php if($modify){ echo "Edit"; }else { echo "Save"; }?>"
						>
					</div>
				</form>

			</div>
		</div>

		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Name</th>
						<th>Phone Number</thk>
						<th>Email</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM users";
					$result = mysqli_query($conn, $query);

					while($row = mysqli_fetch_array($result)) {?>
						<tr>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['phone_number'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td>
							<a href="index.php?id=<?php echo $row['id'] ?>" style="text-decoration:none;">
								<i class='fas fa-edit' style='font-size:16px'></i>
							</a>
							<a href="db_actions/delete_user.php?id=<?php echo $row['id']?>" style="text-decoration:none;">
 								<i class='fas fa-times-circle' style='font-size:16px'></i>
							</a>
						</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php include("includes/footer.php")?>
