<h2 class="text-center"><?php echo $title; ?></h2>
 
<?php echo form_open('users/edit/'.$user['iduser'], array('name'=>'user')); ?>  
    <table style="margin: auto;">
        <tr>
            <td><label for="name">Name</label></td>
            <td><input class="form-control" type="input" name="name" size="50" value="<?php echo $user['name']; ?>" /></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input class="form-control" type="input" id="email" name="email" size="50" value="<?php echo $user['email']; ?>" /></td>
        </tr>
        <tr>
            <td><label for="phone">Phone</label></td>
            <td><input class="form-control" type="input" name="phone" size="50" value="<?php echo $user['phone']; ?>"  /></td>
        </tr>
        <tr>
            <td><label for="age">Age</label></td>
            <td><select class="form-control" name="age">
                <?php
                    for ($i=1; $i<=100; $i++)
                    {
                        ?>
                            <option value="<?php echo $i;?>" <?php if ($i == $user['age']) echo "selected='true'" ?> ><?php echo $i;?></option>
                        <?php
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="role">Role</label></td>
            <td><select class="form-control" name="role" value="<?php echo $user['role']; ?>" >
                <?php foreach ($roles as $role): ?>
                    <option value="<?php echo $role['name'];?>" <?php if (strcmp($role['name'], $user['role']) == 0) echo "selected='true'" ?> ><?php echo $role['name'];?></option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><br><input class="btn btn-success" type="submit" name="submit" value="Edit" /></td>
        </tr>
    </table>    
</form>