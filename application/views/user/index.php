<h2 class="text-center"><?php echo $title1; ?></h2>
 
<table class="table table-hover table-bordered table-responsive" border='1' cellpadding='4'>
    <tr>
        <td><strong>Name</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Phone</strong></td>
        <td><strong>Age</strong></td>
        <td><strong>Role</strong></td>
        <td><strong>Action</strong></td>
    </tr>
<?php foreach ($users as $new_user): ?>
        <tr>
            <td><?php echo $new_user['name']; ?></td>
            <td><?php echo $new_user['email']; ?></td>
            <td><?php echo $new_user['phone']; ?></td>
            <td><?php echo $new_user['age']; ?></td>
            <td><?php echo $new_user['role']; ?></td>
            <td>
                <a class="btn btn-warning" href="<?php echo site_url('users/edit/'.$new_user['iduser']); ?>">Edit</a> 
                <a class="btn btn-danger" href="<?php echo site_url('users/delete/'.$new_user['iduser']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
        </tr>
<?php endforeach; ?>
</table>

<h2 class="text-center"><?php echo $title2; ?></h2>

<table class="table table-hover table-bordered table-responsive" border='1' cellpadding='4'>
    <tr>
        <td><strong>Name</strong></td>
        <td><strong>Action</strong></td>
    </tr>
<?php foreach ($roles as $role): ?>
        <tr>
            <td><?php echo $role['name']; ?></td>
            <td>
                <a class="btn btn-warning" href="<?php echo site_url('roles/edit/'.$role['id']); ?>">Edit</a>  
                <a class="btn btn-danger" href="<?php echo site_url('roles/delete/'.$role['id']); ?>" onClick="return confirm('Are you sure you want to delete?')">Delete</a>
            </td>
        </tr>
<?php endforeach; ?>
</table>