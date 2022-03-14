<?php include 'menu.php'; include 'core/queries.php'; include 'model/full-listing.php'; ?>

<html>
    <!-- Post a listing via the form. This information is sent to the database and inserted via the 
         addListing() query.
    --->
    <div class="container">
        <div class="inner">
            <p>Create a listing</p>
            <form>
                <input type="text" placeholder="Ad Title" required>
                <select>
                    <option value="select-category">Select Category</option>
                    <option value="antiques">Antiques</option>
                    <option value="collectables">Collectables</option>
                    <option value="furniture">Furniture</option>
                    <option value="garden">Garden</option>
                    <option value="hobbies">Hobbies</option>
                    <option value="appliances">Home Appliances</option>
                    <option value="decor">Home Decor</option>
                </select>
                <input type="text" placeholder="Location">
                <input type="textarea" placeholder="Description">

                <p>ADD PICTURES</p>
                <div>
                    SAME MESSAGE BLOCK AS CAYOOTS ADD TEAM MEMBER
                </div>

                <input type="submit">
            </form>
        </div>
    </div>
</html>