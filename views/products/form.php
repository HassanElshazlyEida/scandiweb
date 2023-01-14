<div class="w-50">
    <div class="form-group">
        <label for="skuInput">SKU <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="sku" placeholder="Enter SKU" required>
    </div>
    <div class="form-group">
        <label for="nameInput">Name <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="name" placeholder="Enter Name" required>
    </div>
    <div class="form-group">
        <label for="priceInput">Price <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="price" placeholder="Enter Price" required>
    </div>
    <div class="form-group">
        <label for="type-switcher">Type Switcher <span class="text-danger">*</span></label>
        <select class="form-control" id="product-Type" required>
            <option value="">Select .. </option>
            <option value="book">Book</option>
            <option value="furniture">Furniture</option>
            <option value="dvd">DVD</option>
        </select>
    </div>

    <div class="form-group dvd-input  d-none">
        <label for="size-input">Size <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="size-input" required>
    </div>

    <div class="form-group book-input d-none">
        <label for="weight-input">Weight<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="weight-input" required>
    </div>
    <div class="form-group furniture-input d-none">
        <label for="height-input">Height <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="furniture-height" required>
        <label for="width-input">Width <span class="text-danger">*</span> </label>
        <input type="text" class="form-control" id="furniture-width" required>
        <label for="length-input">Length<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="furniture-length" required>
    </div>

</div>