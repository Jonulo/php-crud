	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>	

<script>
	$('.button_edit').click(function(){
		let currenTr = $(this).closest('tr');
		let formulario = $("form"); 
		let formButton = $("#formBtn");

		$('.selectedtr').removeClass('selectedtr');
		currenTr.addClass('selectedtr');

		formulario.attr("action", "db_actions/edit_user.php");

		formButton.addClass("btn-warning");
		formButton.val("Edit");
		formButton.attr("name", "edit_user");

		let idRow = currenTr.children('td:eq(0)').text();
		let nameRow = currenTr.children('td:eq(1)').text();
		let phoneRow = currenTr.children('td:eq(2)').text();
		let emailRow = currenTr.children('td:eq(3)').text();

		$('#inputId').val(idRow);	
		$("#inputName").val(nameRow);
		$("#inputPhone").val(phoneRow);
		$("#inputEmail").val(emailRow);

	});
</script>
</body>
</html>
