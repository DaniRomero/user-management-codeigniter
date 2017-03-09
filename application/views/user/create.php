<h2 class="text-center"><?php echo $title; ?></h2>
 
<?php echo form_open('users/create', array('name'=>'user')); ?>    
    <table style="margin: auto;">
        <tr>
            <td><label for="name">Name</label></td>
            <td><input class="form-control" type="input" name="name" size="50" /></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input class="form-control" type="input" id="email" name="email" size="50" /></td>
            <span id="msgEmail"></span>
        </tr>
        <tr>
            <td><label for="phone">Phone</label></td>
            <td><input class="form-control" type="input" name="phone" size="50" /></td>
        </tr>
        <tr>
            <td><label for="age">Age</label></td>
            <td><select class="form-control" name="age">
                <?php
                    for ($i=1; $i<=100; $i++)
                    {
                        ?>
                            <option value="<?php echo $i;?>"><?php echo $i;?></option>
                        <?php
                    }
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label for="role">Role</label></td>
            <td><select class="form-control" name="role">
                <?php foreach ($roles as $role): ?>
                    <option value="<?php echo $role['name'];?>"><?php echo $role['name'];?></option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <td></td>
            <td><br><input class="btn btn-success" type="submit" name="submit" value="Create" /></td>
        </tr>
    </table>    
</form>