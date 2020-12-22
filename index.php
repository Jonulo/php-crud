<?php 
include("db_actions/db.php");

include("includes/header.php");

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
				action="db_actions/save_user.php"
				method="POST"
				>
					<legend>Register</legend>
					<input
					type="hidden"
					id="inputId"
					name="user_id"
					>
					<div class="mb-3">
						<input 
						id="inputName"
						type="text"
						name="user_name"
						class="form-control"
						placeholder="User Name"
						required
						autofocus
						>
					</div>
					<div class="mb-3">
						<input
						id="inputPhone"
						type="tel"
						name="phone_number"
						class="form-control"
						placeholder="Phone Number"
						pattern="[0-9]{10}"
						required
						> 
						<span id="phoneHelpInline" class="form-text">
							Must be 10 characters long.
    				</span>
					</div>
					<div class="mb-3">
						<input
						id="inputEmail"
						type="email"
						name="user_email"
						class="form-control"
						placeholder="Email"
						required
						>
						<span id="phoneHelpInline" class="form-text">
							Format: ...@...
    				</span>
					</div>
					<div class="mb-3">
						<input
						id="inputBirthday"
						type="date"
						name="birthday"
						class="form-control"
						required
						>
					</div>
					<div class="mb-3">
						<input
						id="age"
						name="age"
						style="display:none;"
						class="form-control"
						disabled
						>
					</div>
					<div class="d-grid gap-2">
						<input
						id="formBtn"
						type="submit"
						class="btn btn-primary"
						name="save_user"
						value="Save"
						>
					</div>

					
				</form>

			</div>
		</div>

		<div class="col-md-8">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th style="display:none;">Id</th>
						<th>Name</th>
						<th>Phone Number</thk>
						<th>Email</th>
						<th>Birthday</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$query = "SELECT * FROM users";
					$result = mysqli_query($conn, $query);

					while($row = mysqli_fetch_array($result)) {?>
						<tr>
						<td style="display: none;"><?php echo $row['id'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['phone_number'] ?></td>
						<td><?php echo $row['email'] ?></td>
						<td><?php echo $row['birthday']?></td>
						<td>
							<button id="btnEdit" class="button_edit btn">
								<i class='fas fa-edit' style='font-size:16px'></i>
							</button>
							<a
							href="db_actions/delete_user.php?id=<?php echo $row['id']?>"
							class="btn"
							>
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
