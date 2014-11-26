<?php
// index2 Hafiz
error_reporting(E_ALL);
ini_set('display_errors', '1');
ini_set('max_execution_time', 0);
if (isset($_POST['submit'])) {
    include_once('simple_html_dom.php');

    $sector = $_POST['sector'];
    $type = $_POST['busines_type'];

    $html = file_get_html("http://lcci.com.pk/rptdirectory2.php?sector=$sector&busines_type=$type");

//    $data['email'] = $html->find('table[id="content"] tr td ');
    foreach ($html->find('table[id="content"] tr td') as $td) {
        $name = $td->find('font[color="#669900"]', 0)->plaintext;
        $email = $td->find('font[color="#0000FF"]', 0)->plaintext;

        if ($name != '') {
            $ret[] = array('name' => $name, 'email' => str_replace("Email:", "", $email));
        }
    }
    ob_start();
    ob_flush();
    foreach ($ret as $d) {
        echo "Name: " . $d['name'] . "<br>";
        echo "Email: " . $d['email'] . "<br><br>";
        ob_flush();
    }
    ob_end_flush();
}
?>

<form name="scrapper" method="post" target="__blank">
    <select class="textbox" name="busines_type" style="width:178px" id="busines_type">

        <option value="1">MANUFACTURER</option>

        <option value="2">EXPORTERS</option>

        <option value="3">IMPORTERS</option>

        <option value="4">TRADERS</option>

        <option value="5">INDENTING AGENT</option>

        <option value="6">SERVICES</option>

        <option value="0">N/A</option>

    </select>

    <select class="textbox" name="sector" style="width:178px" id="sector">

        <option value="01">TEXTILE</option>

        <option value="02">CHEMICALS</option>

        <option value="03">LEATHER  AND TANNERIES</option>

        <option value="04">AUTOMOBILE</option>

        <option value="05">AGRICULTURE &amp; HORTICULTURE</option>

        <option value="06">FOOD AND ALLIED</option>

        <option value="07">CABLES AND WIRES</option>

        <option value="08">GLASS CERAMICS AND SANITRY</option>

        <option value="09">PAPER AND BOARD</option>

        <option value="10">BUILDING MATERIAL</option>

        <option value="11">COSMETICS</option>

        <option value="12">ELECTRIC AND  APPLIANCES</option>

        <option value="13">FUEL AND ENERGY</option>

        <option value="14">ENGINEERING</option>

        <option value="15">FINANCIAL INSTITUTION</option>

        <option value="16">FURNITURE &amp; WOOD</option>

        <option value="17">MEDICINE AND DRUGS</option>

        <option value="18">METAL AND METALS PRODUCT</option>

        <option value="19">MINERAL</option>

        <option value="20">PACKAGING</option>

        <option value="21">PLASTIC AND PVC</option>

        <option value="22">PRINTING AND PUBLISHING</option>

        <option value="23">TELECOMMUNICATIONS</option>

        <option value="24">CARPET AND TAPESTRY</option>

        <option value="25">TRANSPORT</option>

        <option value="26">SPORTS GOODS</option>

        <option value="27">OFFICE AND STATIONERY PRODUCTS</option>

        <option value="28">MUSICAL INSTRUMENTS</option>

        <option value="29">HANDICRAFTS</option>

        <option value="30">BEVERAGES</option>

        <option value="31">IRON AND STEEL</option>

        <option value="32">POULTRY</option>

        <option value="33">CEMENT</option>

        <option value="34">BICYCLES</option>

        <option value="35">TOURISM AND RECREATION</option>

        <option value="36">MACHINERY</option>

        <option value="37">CONSTRUCTION</option>

        <option value="38">DAIRY PRODUCTS</option>

        <option value="39">EDIBLE AND COOKING OIL</option>

        <option value="40">FOAM PRODUCTS</option>

        <option value="41">SOAPS AND DETERGENTS</option>

        <option value="42">GAS &amp; GAS APPLIANCES</option>

        <option value="43">JUTE AND JUTE GOODS</option>

        <option value="44">JEWELLERY &amp; GEM STONES</option>

        <option value="45">RICE</option>

        <option value="46">RUBBER</option>

        <option value="47">COMPUTERS &amp; SOFTWARE</option>

        <option value="48">SUGAR AND ALLIED</option>

        <option value="49">MEASURING AND TESTING EQUIPMENT</option>

        <option value="50">MATCHES</option>

        <option value="51">EDUCATIONAL INSTITUTION</option>

        <option value="52">MEDICAL AND LABORATORY EQUIPMENT</option>

        <option value="53">OPTICAL AND GOODS</option>

        <option value="54">DEPARTMENTAL STORES</option>

        <option value="55">ADVERTISING &amp; MARKITING</option>

        <option value="56">WATCHES</option>

        <option value="57">CONSULTANTS</option>

        <option value="64">MISCELLANEOUS</option>

        <option value="58">LIVE STOCK,BIRDS &amp; FISHERIES</option>

        <option value="59">REAL ESTAT BROKERS &amp; DEVELOPERS</option>

        <option value="60">TOYS</option>

        <option value="61">TTTT</option>

        <option value="62">AVAITION</option>

        <option value="63">FIRE FIGHTING MISCELLANEOUS</option>

        <option value="65">CROCKERY</option>

        <option value="66">SHOES</option>

        <option value="67">CUSTOM CLEARING AND FARWARDING</option>

        <option value="68">WATER AND WATER PLANTS</option>

        <option value="69">THERMOPORE</option>

        <option value="70">BYCYCLE</option>

    </select>

    <input type="submit" name="submit" value="Submit" />
</form>
