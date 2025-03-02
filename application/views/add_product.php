<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <base href="<?php echo base_url(); ?>">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
       :root {
    --bg-color: #F7F7F7;
    --accent-color: #74d7c8;
    --dark-bg: #1C2024;
    --product-image-height: 160px;
    --card-height: 420px;
}

 :root {
            --bg-color: #F7F7F7;
            --dark-bg: #1C2024;
            --accent-color: #74d7c8;
            --light-accent: #a6e6dc;
            --text-color: #333;
        }

        body {
            background-color: var(--bg-color);
            font-family: 'Arial', sans-serif;
            color: var(--text-color);
        }

        .sidebar {
            height: 100vh;
            background-color: var(--dark-bg);
            color: white;
            position: fixed;
            width: 240px;
            top: 0;
            left: 0;
            padding-top: 30px;
            z-index: 1000;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sidebar .logo {
            text-align: center;
            margin-bottom: 30px;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--accent-color);
        }

        .sidebar a {
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            display: block;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .sidebar a:hover, .sidebar a.active {
            background-color: rgba(116, 215, 200, 0.2);
            border-left-color: var(--accent-color);
            color: var(--accent-color);
        }

        .main-content {
            margin-left: 260px;
            padding: 30px;
        }

        .dashboard-header {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }
.container {
    margin-top: 50px;
    max-width: 900px;
}

.form-label {
    font-weight: bold;
}

.form-control,
.form-select,
.btn {
    border-radius: 0.25rem;
}

.alert {
    margin-bottom: 20px;
}

.btn-custom {
    background-color: var(--accent-color);
    color: white;
}

.btn-custom:hover {
    background-color: #62b7ad;
}



.main-content {
    margin-left: 260px;
    padding: 20px;
}

.image-preview {
    position: relative;
    width: 100px;
    height: 100px;
    border: 2px dashed #ccc;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 5px;
    overflow: hidden;
}

.image-preview img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.image-preview .plus-sign {
    font-size: 24px;
    color: #ccc;
}

.image-preview input[type="file"] {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0;
}

.image-preview .remove-image {
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 10;
}

    </style>
</head>

<body>

  <!-- Sidebar -->
    <div class="sidebar">
        <div class="logo">EzPizza</div>
        <a href="https://ezpizza.store/admin/overview" >Analytics</a>
        <a href="<?php echo base_url('admin/users');?>" >Users</a>
        <a href="<?php echo base_url('admin/add_product'); ?>" class="active">Products</a>
    </div>


    <!-- Main Content -->
    <div class="main-content">
        <div class="container">
            <!-- Success and Error Messages -->
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
            <?php endif; ?>

            <!-- Dropdown to Select Action -->
            <div class="mb-3">
                <label for="action" class="form-label">Select Action:</label>
                <select id="action" class="form-select">
                    <option value="add">Add Product</option>
                    <option value="edit">Edit/Delete Product</option>
                  
                </select>
            </div>

            <!-- Form to Add/Edit/Delete Product -->
            <form id="product-form" action="productos/addProduct" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Product Name:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label">Description:</label>
                    <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label">Price:</label>
                    <input type="number" step="0.01" name="precio" id="precio" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label">Stock:</label>
                    <input type="number" name="stock" id="stock" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="id_categoria" class="form-label">Category:</label>
                    <?php
                    function generateCategoryDropdown($categories)
                    {
                        echo '<select name="id_categoria" id="id_categoria" class="form-select">';
                        echo '<option value="">Select a Category</option>';

                        foreach ($categories as $category) {
                            if (!empty($category['children'])) {
                                echo '<optgroup label="' . htmlspecialchars($category['name']) . '">';

                                foreach ($category['children'] as $child) {
                                    echo '<option value="' . htmlspecialchars($child['id']) . '">'
                                        . htmlspecialchars($child['name']) . '</option>';
                                }

                                echo '</optgroup>';
                            }
                        }

                        echo '</select>';
                    }

                    // Assuming $categories is passed from the controller
                    generateCategoryDropdown($categories);
                    ?>
                </div>

                <div class="mb-3" id="image-section">
                    <label for="product_images" class="form-label">Product Images (max 5):</label>
                    <div class="d-flex justify-content-between flex-wrap">
                        <!-- Image slots (5 images) -->
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <div class="image-preview" id="image-slot-<?= $i ?>">
                                <span class="plus-sign">+</span>
                                <input type="file" name="product_image_<?= $i ?>" id="product_image_<?= $i ?>"
                                    onchange="previewImage(event, <?= $i ?>)" accept="image/*">
                            </div>
                        <?php endfor; ?>
                    </div>
                </div>

                <div class="mb-3" id="image-description-section">
                    <label class="form-label">Image Descriptions:</label>
                    <?php for ($i = 1; $i <= 5; $i++): ?>
                        <div class="mb-2">
                            <input type="text" name="image_description[]"
                                placeholder="Description for Image <?= $i ?>"
                                class="form-control">
                        </div>
                    <?php endfor; ?>
                </div>

                <button type="submit" class="btn btn-custom" id="submit-button">Add Product</button>
            </form>
        </div>
        <table class="table table-striped" id="product-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Status</th>
                        <th>Category ID</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product): ?>
                        <tr data-id="<?= $product->id_producto ?>">
                            <td><?= $product->id_producto ?></td>
                            <td class="editable-cell"><?= $product->nombre ?></td>
                            <td class="editable-cell"><?= !empty($product->descripcion) ? $product->descripcion : 'No description' ?></td>
                            <td class="editable-cell">$<?= number_format($product->precio, 2) ?></td>
                            <td class="editable-cell"><?= $product->stock ?></td>
                            <td class="editable-cell"><?= $product->estado == 1 ? 'Active' : 'Inactive' ?></td>
                            <td class="editable-cell"><?= !empty($product->id_categoria) ? $product->id_categoria : 'No category' ?></td>
                            <td>
                                <button class="btn btn-warning btn-sm edit-btn">Edit</button>
                                <button class="btn btn-danger btn-sm delete-btn">Delete</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
     function previewImage(event, slotId) {
    const file = event.target.files[0];
    if (!file) return;

    const reader = new FileReader();
    const preview = document.getElementById(`image-slot-${slotId}`);

    reader.onload = function(e) {
        // Clear previous image preview if it exists, but keep the input
        const existingImage = preview.querySelector('img');
        if (existingImage) {
            existingImage.remove();
        }

        const existingButton = preview.querySelector('.remove-image');
        if (existingButton) {
            existingButton.remove();
        }

        // Create new preview elements
        const img = document.createElement('img');
        img.src = e.target.result;
        img.alt = "Image preview";
        img.style = "max-width: 100px; max-height: 100px; object-fit: cover;";

        const button = document.createElement('button');
        button.type = "button";
        button.classList.add('btn', 'btn-sm', 'btn-danger', 'remove-image');
        button.innerText = "X";
        button.addEventListener('click', () => removeImage(slotId));

        // Append the image and button to the preview div
        preview.appendChild(img);
        preview.appendChild(button);
    };

    reader.readAsDataURL(file);
}

function removeImage(slotId) {
    const preview = document.getElementById(`image-slot-${slotId}`);
    const input = preview.querySelector('input[type="file"]');
    const img = preview.querySelector('img');
    const button = preview.querySelector('.remove-image');

    // Remove preview image and button
    if (img) img.remove();
    if (button) button.remove();

    // Reset the file input
    input.value = "";
}
    </script>

    <style>
        .image-preview {
            position: relative;
            width: 100px;
            height: 100px;
            border: 2px dashed #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 5px;
            overflow: hidden;
        }

        .image-preview .remove-image {
            position: absolute;
            top: 5px;
            right: 5px;
            z-index: 10;
        }
    </style>
    <script>
        // Optional: Add JavaScript to enhance dropdown functionality
        document.addEventListener('DOMContentLoaded', function() {
            const categoryDropdown = document.getElementById('id_categoria');

            categoryDropdown.addEventListener('change', function() {
                this.classList.remove('is-invalid', 'is-valid');

                if (this.value) {
                    this.classList.add('is-valid');
                } else {
                    this.classList.add('is-invalid');
                }
            });
        });
    </script>
<script>
 document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-btn');
    const deleteButtons = document.querySelectorAll('.delete-btn');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            const cells = row.querySelectorAll('.editable-cell');
            const editButton = row.querySelector('.edit-btn');
            const deleteButton = row.querySelector('.delete-btn');
            const confirmButton = document.createElement('button');

            confirmButton.classList.add('btn', 'btn-success', 'confirm-btn');
            confirmButton.innerText = 'Confirm';

            // Hide edit/delete buttons and append confirm button
            editButton.style.display = 'none';
            deleteButton.style.display = 'none';
            row.appendChild(confirmButton);

            // Make cells editable
            cells.forEach((cell, index) => {
                const cellText = cell.innerText;

                if (index === 3) {
                    // Remove the $ sign from the price when editing
                    const input = document.createElement('input');
                    input.type = 'number';
                    input.value = parseFloat(cellText.replace('$', '').trim());
                    input.classList.add('form-control');
                    cell.innerHTML = '';
                    cell.appendChild(input);
                } else if (index === 4) {
                    // Create a dropdown for active/inactive
                    const select = document.createElement('select');
                    select.classList.add('form-select');

                    const activeOption = document.createElement('option');
                    activeOption.value = '1';
                    activeOption.textContent = 'Active';

                    const inactiveOption = document.createElement('option');
                    inactiveOption.value = '0';
                    inactiveOption.textContent = 'Inactive';

                    if (cellText === 'Active') {
                        activeOption.selected = true;
                    } else {
                        inactiveOption.selected = true;
                    }

                    select.appendChild(activeOption);
                    select.appendChild(inactiveOption);

                    cell.innerHTML = '';
                    cell.appendChild(select);
                } else {
                    const input = document.createElement('input');
                    input.value = cellText;
                    input.classList.add('form-control');
                    cell.innerHTML = '';
                    cell.appendChild(input);
                }
            });

            confirmButton.addEventListener('click', function () {
                const updatedData = Array.from(cells).map(cell => {
                    const input = cell.querySelector('input, select');
                    return input ? input.value : cell.innerText;
                });

                const productId = row.getAttribute('data-id');

                // Send updated data to the server via AJAX (fetch)
                fetch('productos/update_product', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: JSON.stringify({
                        id: productId,
                        name: updatedData[0],
                        description: updatedData[1],
                        price: parseFloat(updatedData[2]), // Ensure the price is numeric
                        stock: updatedData[3],
                        status: updatedData[4], // Pass 0 or 1 from the dropdown
                        category: updatedData[5]
                    })
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Update the table with the new values
                            cells.forEach((cell, index) => {
                                if (index === 3) { // For the price cell
                                    cell.innerHTML = '$' + parseFloat(updatedData[index]).toFixed(2);
                                } else if (index === 4) { // For the status cell
                                    cell.innerHTML = updatedData[index] === '1' ? 'Active' : 'Inactive';
                                } else {
                                    cell.innerHTML = updatedData[index];
                                }
                            });
                        } else {
                            alert('Error updating product');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('Something went wrong!');
                    });

                // Reset table row after confirmation
                confirmButton.remove();
                editButton.style.display = 'inline-block';
                deleteButton.style.display = 'inline-block';
            });
        });
    });

    deleteButtons.forEach(button => {
        button.addEventListener('click', function() {
            const row = this.closest('tr');
            const productId = row.getAttribute('data-id');; // Assume the row has a data-product-id attribute

            // Send delete request to the server (AJAX)
            fetch('productos/delete_product', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest' // Ensure the request is recognized as AJAX
                },
                body: JSON.stringify({
                    id: productId
                })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    row.remove(); // Remove the row from the table if deletion is successful
                } else {
                    alert('Error deleting product');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Something went wrong!');
            });
        });
    });
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const actionDropdown = document.getElementById('action');
        const productFormSection = document.getElementById('product-form');
        const productTableSection = document.getElementById('product-table');

        // Event listener for dropdown change
        actionDropdown.addEventListener('change', function () {
            const selectedValue = actionDropdown.value;

            if (selectedValue === 'add') {
                productFormSection.style.display = 'block';
                productTableSection.style.display = 'none';
            } else if (selectedValue === 'edit') {
                productFormSection.style.display = 'none';
                productTableSection.style.display = 'block';
            }
        });

        // Initialize visibility based on default selection
        actionDropdown.dispatchEvent(new Event('change'));
    });
</script>
</body>

</html>