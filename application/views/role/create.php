<h2 class="text-center"><?php echo $title; ?></h2>
 
<?php echo form_open('roles/create', array('name'=>'role')); ?>    
    <table style="margin: auto;">
        <tr>
            <td><label for="name">Name</label></td>
            <td><input class="form-control" type="input" name="name" size="50" /></td>
        </tr>
        <tr>
            <td></td>
            <td><br><input class="btn btn-success" type="submit" name="submit" value="Create" /></td>
        </tr>
    </table>    
</form>