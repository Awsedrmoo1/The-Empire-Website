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

$name =  htmlspecialchars(filter_input(INPUT_POST, 'name') ?? "");
$address =  htmlspecialchars(filter_input(INPUT_POST, "address") ?? "");
$tel =  htmlspecialchars(filter_input(INPUT_POST, "tel") ?? "");
if ($item_quantity > 0) {
    $stock = "IN STOCK";
} else {
    $stock = "OUT OF STOCK";
}
$item1 = array("name" => $item_name, "desc" => $item_desc, "price" => $item_price, "stock" => $stock);
?>

<section >

    <div class="section banner-main">
        <div class="container">
            <div class="row marginii">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">

                    <form action="order-form.php" method="POST">
                        <div>
                            <div><label for="name">Name:</label></div>
                            <div><input type="text" name="name" /></div>
                            <div class=form_debug>Name entered: <?php echo $name; ?></div>
                        </div>
                        <div>
                            <div><label for="address">Address:</label></div>
                            <div><input type="text" name="address" /></div>
                            <div class=form_debug>Address entered: <?php echo $address; ?></div>
                        </div>
                        <div>
                            <div><label for="tel">Telephone:</label></div>
                            <div><input type="tel" name="tel" placeholder="(###) ###-####" /></div>
                            <div class=form_debug>Telephone entered: <?php echo $tel; ?></div>
                        </div>
                        <div>

                            <div><input type="submit" name="submit" class="btn btn-md btn-primary" /></div>
                        </div>
                    </form>
                </div>
            </div>
            <form action="."class="form-group " method="GET" style="margin-bottom: 40px;">
                <select class="form-control-lg" style="margin-bottom: 30px;" name="category">
                    <option>All</option>
                    <?php foreach ($classes as $class) : ?>
                        <option>
                            <?php echo $class['Class'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <div><input type="submit" name="submit" class="btn btn-md btn-primary" /></div>
            </form>
            <div class="container">
                <div class="row">
                    <table>
                        <?php foreach ($items as $item) : ?>
                            <tr>
                                <td>
                                    <p class="item"><?php echo html_escape($item['Class']) ?></p>
                                </td>
                                <td>
                                    <p class="item_name"><?php echo html_escape($item['ItemName']) ?></p>
                                    <p class="item">Price: RD$<?php echo  html_escape(round($item['SalePrice'])) ?></p>
                                    <p class="item">Stock: <?php echo html_escape($item['Stock']) ?></p>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
</section>
