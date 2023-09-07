<?php
include(dirname(__DIR__).'/functions.php');
include(dirname(__DIR__).'/db.php');
$item_name = "Johnnie Walker Gold Label Reserve";
$item_desc = array(
    "A Perfect Blend, the personal creation of master blender Jim Beveridge celebrating the art of blending",
    "A Scotch whiskey that has been awarded on many occasions for its balance of flavors, which bring something special to each celebration",
    "Alcohol content: 40%"
);
$category = filter_input(INPUT_GET, 'category' ?? '');
$sql_item = "SELECT * 
        FROM `inventory 10/17/22` 
        WHERE `Class` = '$category'";
$statement = $pdo->query($sql_item);
$items = $statement->fetchAll();
$sql_class = "SELECT DISTINCT `Class` 
        FROM `inventory 10/17/22` 
        WHERE `Stock` > 0";
$statement1 = $pdo->query($sql_class);
$classes = $statement1->fetchAll();
$item_price = 6000;
$item_quantity = 0;
$stock = "";

$name =  htmlspecialchars(filter_input(INPUT_GET, 'name') ?? "");
$address =   htmlspecialchars(filter_input(INPUT_GET, 'address') ?? "");
$tel =  htmlspecialchars(filter_input(INPUT_GET, "tel") ?? "");
if ($item_quantity > 0) {
    $stock = "IN STOCK";
} else {
    $stock = "OUT OF STOCK";
}
$item1 = array("name" => $item_name, "desc" => $item_desc, "price" => $item_price, "stock" => $stock);
?>
<!-- multistep form -->
<form id="msform" action="." method="GET">
    <!-- progressbar -->
    <!--ul id="progressbar">
        <li class="active">Account Setup</li>
    </ul-->
    <!-- fieldsets -->
    <fieldset>
        <h2 class="fs-title">Enter your information</h2>
        <!--h3 class="fs-subtitle">This is step 1</h3-->
        <input type="text" name="name" placeholder="Name" />
        <div class=form_debug>Name entered: <?php echo $name; ?></div>
        <input type="text" name="address" placeholder="Address" />

        <div class=form_debug>Address entered: <?php echo $address; ?></div>

        <input type="tel" name="tel" placeholder="Telephone number" />
        <div class=form_debug>Phone: <?php echo $tel; ?></div>
        <!--input type="button" name="next" class="next action-button" value="Next" /-->
        <input type="submit" name="submit" class="btn btn-md btn-primary" value="Submit" />
    </fieldset>
    <fieldset>
    </fieldset>
    <!--fieldset>
        <h2 class="fs-title">Social Profiles</h2>
        <h3 class="fs-subtitle">Your presence on the social network</h3>
        <input type="text" name="twitter" placeholder="Twitter" />
        <input type="text" name="facebook" placeholder="Facebook" />
        <input type="text" name="gplus" placeholder="Google Plus" />
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="button" name="next" class="next action-button" value="Next" />
    </fieldset>
    <fieldset>
        <h2 class="fs-title">Personal Details</h2>
        <h3 class="fs-subtitle">We will never sell it</h3>
        <input type="text" name="fname" placeholder="First Name" />
        <input type="text" name="lname" placeholder="Last Name" />
        <input type="text" name="phone" placeholder="Phone" />
        <input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" class="btn btn-md btn-primary" value="Submit" />
    </fieldset-->
</form>