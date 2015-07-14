<?php echo $session->flash("auth")?>
<?php if ($session->check("Message.auth")) $session->flash("auth");?>
<?php echo $this->Form->create("User" , array("action" => "login" , "inputDefaults" => array("div" => false , "label" => false)))?>
	<table id="login" class="table table-bordered">
		<tr>
			<th>User</th>
			<td><?php echo $form->input("username");?></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><?php echo $form->input("password");?></td>
		</tr>
		<tr>
			<th>Login</th>
			<td><?php echo $form->submit("login" , array("class" => "btn"))?></td>
		</tr>
	</table>
<?php echo $this->Form->end();?>