<?php
$edit_data=new BusDataHandle();
$edit=$edit_data->edit_data();
add_action("admin_head","load_custom_wp_tiny_mce");
?>
<div class="from-wrap col-md-8">
<h2><?php echo isset($edit['id']) ? 'Edit Business Directory' : 'Add Business Directory'; ?></h2>

    <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?php echo isset($edit['id']) ? esc_attr($edit['id']) : ''; ?>">
         
        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="<?php echo isset($edit['title']) ? esc_attr($edit['title']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Description</label>
            <?php wp_editor( isset($edit['description']) ? ($edit['description']) : '', 1, array( 'textarea_name' => 'description' )  ); ?>
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="<?php echo isset($edit['email']) ? esc_attr($edit['email']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <input type="number" name="phone" class="form-control" value="<?php echo isset($edit['phone']) ? esc_attr($edit['phone']) : ''; ?>" required>
        </div>
        <div class="form-group">
            <label>Address</label>
            <?php wp_editor( isset($edit['address']) ? ($edit['address']) : '', 2, array( 'textarea_name' => 'address' )  ); ?>
        </div>
       

        <div class="form-wrap">
        <div>
            <label>City</label>
            <input type="text" name="city" value="<?php echo isset($edit['cityId']) ? esc_attr($edit['cityId']) : ''; ?>" required>
        </div>
        <div >
            <label>Country</label>
            <input type="text" name="country" value="<?php echo isset($edit['countryId']) ? esc_attr($edit['countryId']) : ''; ?>" required>
        </div>
        <div>
            <label>Zipcode</label>
            <input type="text" name="zip" value="<?php echo isset($edit['zipcode']) ? esc_attr($edit['zipcode']) : ''; ?>" required>
        </div>
        <div>
            <label>Mon hours</label>
            <input type="text" name="mon_hours" value="<?php echo isset($edit['mon_hours']) ? esc_attr($edit['mon_hours']) : ''; ?>">
        </div>
        <div>
            <label>Tue hours</label>
            <input type="text" name="tue_hours"  value="<?php echo isset($edit['tue_hours']) ? esc_attr($edit['tue_hours']) : ''; ?>">
        </div>
        <div>
            <label>Wed hours</label>
            <input type="text" name="wed_hours" value="<?php echo isset($edit['wed_hours']) ? esc_attr($edit['wed_hours']) : ''; ?>">
        </div>
        <div>
            <label>Thu hours</label>
            <input type="text" name="thu_hours" value="<?php echo isset($edit['thu_hours']) ? esc_attr($edit['thu_hours']) : ''; ?>">
        </div>
        <div>
            <label>Fri hours</label>
            <input type="text" name="fri_hours" value="<?php echo isset($edit['fri_hours']) ? esc_attr($edit['fri_hours']) : ''; ?>">
        </div>
        <div >
            <label>Sat hours</label>
            <input type="text" name="sat_hours" value="<?php echo isset($edit['sat_hours']) ? esc_attr($edit['sat_hours']) : ''; ?>">
        </div>
        <div>
            <label>Sun hours</label>
            <input type="text" name="sun_hours" value="<?php echo isset($edit['sun_hours']) ? esc_attr($edit['sun_hours']) : ''; ?>">
        </div>
        </div>
       
        
        <div class="form-group">
            <label>Category</label>
            <select name="category" class="form-control">
                <option>Select Your Category</option>
                <option value="automotive" <?php echo (isset($edit['category']) && $edit['category'] == 'automotive') ? 'selected' : ''; ?>>Automotive</option>
                <option value="education" <?php echo (isset($edit['category']) && $edit['category'] == 'education') ? 'selected' : ''; ?>>Education</option>
                <option value="entertainment" <?php echo (isset($edit['category']) && $edit['category'] == 'entertainment') ? 'selected' : ''; ?>>Entertainment</option>
            </select>
        </div>
        <div class="form-group">
            <label>Banner</label>
            <input type="file" name="logo" class="form-control" <?php echo isset($edit['logo']) ? '' : 'required'; ?>>
            <?php if (isset($edit['logo'])): ?>
                <img src="<?php echo esc_attr($edit['logo']); ?>" width="60px">
            <?php endif; ?>
        </div>

        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control">
                <option>Select Your Status</option>
                <option value="1" <?php echo (isset($edit['status']) && $edit['status'] == '1') ? 'selected' : ''; ?>>Active</option>
                <option value="0" <?php echo (isset($edit['status']) && $edit['status'] == '0') ? 'selected' : ''; ?>>Inactive</option>
            </select>
        </div>

        <div class="form-group">
            <label>Seo Url</label>
            <input type="text" name="seo_url" class="form-control" value="<?php echo isset($edit['seo_url']) ? esc_attr($edit['seo_url']) : ''; ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-sm btn-primary">Submit</button>
    </form>
</div>