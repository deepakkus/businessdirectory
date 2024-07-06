<div class="container">
    <h1>Business Directory List</h1>
    <a href="<?php echo admin_url(); ?>admin.php?page=business-admin-menu" class="page-title-action float-right">Add New Directory</a>
    <table class="wp-list-table table table-dark">
        <thead>
            <tr>
                <th>Title</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>City</th>
                <th>Country</th>
                <th>Zipcode</th>
                <th>Description</th>
                <th>Category</th>
                <th>Banner</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <?php
        $bd_list = new BusinessList();
        $form = $bd_list->get_list_data();
        foreach ($form as $data) : ?>
            <tbody>
                <tr>
                    <td><?php echo $data->title; ?></td>
                    <td><?php echo $data->email; ?></td>
                    <td><?php echo $data->phone; ?></td>
                    <td><?php echo $data->address; ?></td>
                    <td><?php echo $data->cityId; ?></td>
                    <td><?php echo $data->countryId; ?></td>
                    <td><?php echo $data->zipcode; ?></td>
                    <td><?php echo $data->description; ?></td>
                    <td><?php echo $data->category; ?></td>
                    <td><img src="<?php echo $data->banner; ?>" width="60px"></td>
                    <td><a class="btn btn-warning" href="<?php echo admin_url('admin.php?page=business-admin-menu&id=' . intval($data->id)); ?>">Edit</a></td>
                    <td><a class="btn btn-danger" href="<?php echo admin_url('admin.php?page=directory_list&action=delete&id=' . intval($data->id)); ?>" onclick="return confirm('Are You Sure??')">Delete</a></td>
                </tr>
            </tbody>
        <?php endforeach; ?>
    </table>
</div>