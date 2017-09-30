<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>BeLinked4u</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="<?php echo base_url('static/css/product.css'); ?>" rel="stylesheet">
  </head>
  <body>
    <header>
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#MyNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html"><p>BeLinked</p></a>
        </div> <!--End of navbar-header-->
        <div class="collapse navbar-collapse" id="MyNavbar">
          <ul class="nav navbar-nav navbar-right">
            <li class="active"><a class="nav-link" href="index.html">Home</a></li>
            <li><a class="nav-link" href="about.html">About Us</a></li>
            <li><a class="nav-link" href="#">Product</a></li>
            <li><a class="nav-link" href="tutorial.html">Tutorial</a></li>
            <li><a class="nav-link" href="#">Contact Us</a></li>
          </ul>
        </div> <!--End of collapse-->
      </div><!--End of container-fluid-->
    </nav>
    <header>

    <section class="Flyer theme-rounded">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <br><br><br><br><br>
            <select id="size" onchange="ChangeSizeList(); ChangeCostList()">
              <option value="">-- Paper Size --</option>
              <option value="A3">A3</option>
              <option value="A4">A4</option>
              <option value="A5">A5</option>
            </select>

            <select id="paperMaterial" onchange="ChangePrintingList(); ChangeCostList()" disabled>
              <option value="">-- Paper Material --</option>
            </select>
            <select id="printing" onchange="ChangeQuantityList(); ChangeCostList()" disabled>
              <option value="">-- Printing --</option>
            </select>
            <select id="quantity" onchange="ChangeCostList()" disabled>
              <option value="">-- Quantity --</option>
            </select>

            <!---AJAX loading animation--->
            <span id="ajaxLoading" hidden>
              Calculating... <img style="position: absolute" src="<?php echo base_url('static/img/loading.svg'); ?>" onerror="this.onerror=null; this.src='<?php echo base_url('static/img/loading.svg'); ?>'">
            </span>

            <span id="ajaxResult">
              <label for="weight">Weight (kg): </label>
              <input type="text" id="weight" value="" size="10" disabled>

              <label for="price">Price (RM): </label>
              <input type="text" id="price" value="" size="10" disabled>
            </span>

            <div id="delivery">
              <label>Include delivery? </label>
              <input type="radio" name="delivery" value="0" checked>None
              <input type="radio" name="delivery" value="1">West Malaysia
              <input type="radio" name="delivery" value="2">East Malaysia
            </div>

          </div> <!--End of col-->
        </div> <!--End of row-->
        <br><br>
      </div> <!--End of container-->
    </section>

    <section class = "ShirtDetails">
    	<div class = "container">
        	<div class = "row">
            	<div class = "col-xs-12 col-md-4">
                	<label>(1) Select Type of Shirt</label> <br>
                	<select id="type" onchange="ChangeTypeList()"><i class="fa fa-caret-down" aria-hidden="true"></i>
                      <option value="">-- Type of Shirt --</option>
                      <option value="RC">Round Neck</option>
                      <option value="CL">Collar</option>
                    </select>

                    <br><br>
    				<label>(2) Select Material of Shirt</label> <br>
                    <select id="material" onchange="ChangeBrandList()" disabled>
                        <option>-- Material of Shirt --</option>
                    </select>

                    <br><br>
    				<label>(3) Select Brand of Shirt</label> <br>
                    <select id="brand" disabled>
                        <option>-- Brand of Shirt --</option>
                    </select>

                    <br><br>
                    <label>(4) Shirt Quantity</label>
                    <br>
                    <input id="quantity" vulue="number" type="number" onchange="ChangeQuantity()">

                    <br><br>
                    <label>(5) Delivery</label> <br>
                    <select id="delivery" onchange="deliveryCost()" disabled>
                    	<option value="">-- Select Delivery--</option>
                    	<option value="WM">West Malaysia</option>
                        <option value="EM">East Malaysia</option>
                    </select>
                </div> <!--End of col-->

                <div class="col-xs-12 col-md-4">
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	<label> (5) Select Printing Side</label>
                    <br><br>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	   <input id="front" type="checkbox" onchange="ChangeFrontCheck()">Front
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    <input id="back" type="checkbox"  onchange="ChangeBackCheck()">Back
                    <br><br>
                    <select id="frontSize" onchange="ChangeFrontSizeList()" disabled>
                      <option value="">-- Printing Size --</option>
                      <option value="A4">A4</option>
                      <option value="A3">A3</option>
                    </select>

                    <select id="backSize" onchange="ChangeBackSizeList()" disabled>
                      <option value="">-- Printing Size --</option>
                      <option value="A4">A4</option>
                      <option value="A3">A3</option>
                    </select>

                    <br><br>

                    <select id="frontColor" disabled>
                        <option>-- Color Printing --</option>
                    </select>

                    <select id="backColor" disabled>
                        <option>-- Color Printing --</option>
                    </select>

                    <br><br><br><br>

                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                	<input id="left" type="checkbox" onchange="ChangeLeftCheck()">Left Sleeve
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;


                    <input id="right" type="checkbox"  onchange="ChangeRightCheck()">Right Sleeve
                    <br><br>
                    <select id="leftSize" onchange="ChangeLeftSizeList()" disabled>
                      <option value="">-- Printing Size --</option>
                      <option value="A4">A4</option>
                      <option value="A3">A3</option>
                    </select>

                    <select id="rightSize" onchange="ChangeRightSizeList()" disabled>
                      <option value="">-- Printing Size --</option>
                      <option value="A4">A4</option>
                      <option value="A3">A3</option>
                    </select>

                    <br><br>

                    <select id="leftColor" disabled>
                        <option>-- Color Printing --</option>
                    </select>

                    <select id="rightColor" disabled>
                        <option>-- Color Printing --</option>
                    </select>

                    <br><br>

                </div> <!--End of col-->
            </div> <!--End of row-->
        </div> <!--End of container-->
    </section>

    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript">
    var paperAndMaterials = {};
    paperAndMaterials['A3'] = ['-- Paper Material --','80gsm','100gsm','128gsm','157gsm','260gsm','310gsm']
    paperAndMaterials['A4'] = ['-- Paper Material --','80gsm','100gsm','128gsm','157gsm','260gsm','310gsm'];
    paperAndMaterials['A5'] = ['-- Paper Material --','80gsm','100gsm','128gsm','157gsm','260gsm','310gsm'];

    var materialAndPrinting = {};
    materialAndPrinting['80gsm'] = ['-- Printing --','Single Side Printing', 'Double Side Printing'];
    materialAndPrinting['100gsm'] = ['-- Printing --','Single Side Printing', 'Double Side Printing'];
    materialAndPrinting['128gsm'] = ['-- Printing --','Single Side Printing', 'Double Side Printing'];
    materialAndPrinting['157gsm'] = ['-- Printing --','Single Side Printing', 'Double Side Printing'];
    materialAndPrinting['260gsm'] = ['-- Printing --','Single Side Printing', 'Double Side Printing'];
    materialAndPrinting['310gsm'] = ['-- Printing --','Single Side Printing', 'Double Side Printing'];

    var printingAndQuantities = {};
    printingAndQuantities['Single Side Printing'] = ['-- Quantity --','10','20','30','40','50','100','200','300','400','500','600','700','800','900','1000','2000','3000','4000','5000','6000','7000','8000','9000','10000','12000','16000','20000'];
    printingAndQuantities['Double Side Printing'] = ['-- Quantity --','10','20','30','40','50','100','200','300','400','500','600','700','800','900','1000','2000','3000','4000','5000','6000','7000','8000','9000','10000','12000','16000','20000'];

    var quantitiesAndCost = {};
    quantitiesAndCost['10'] = ['10'];
    quantitiesAndCost['20'] = ['20'];
    quantitiesAndCost['30'] = ['30'];
    quantitiesAndCost['40'] = ['40'];
    quantitiesAndCost['50'] = ['50'];
    quantitiesAndCost['100'] = ['100'];
    quantitiesAndCost['200'] = ['200'];
    quantitiesAndCost['300'] = ['300'];
    quantitiesAndCost['400'] = ['400'];
    quantitiesAndCost['500'] = ['500'];
    quantitiesAndCost['600'] = ['600'];
    quantitiesAndCost['700'] = ['700'];
    quantitiesAndCost['800'] = ['800'];
    quantitiesAndCost['900'] = ['900'];
    quantitiesAndCost['1000'] = ['1000'];
    quantitiesAndCost['2000'] = ['2000'];
    quantitiesAndCost['3000'] = ['3000'];
    quantitiesAndCost['4000'] = ['4000'];
    quantitiesAndCost['5000'] = ['5000'];
    quantitiesAndCost['6000'] = ['6000'];
    quantitiesAndCost['7000'] = ['7000'];
    quantitiesAndCost['8000'] = ['8000'];
    quantitiesAndCost['9000'] = ['9000'];
    quantitiesAndCost['10000'] = ['10000'];
    quantitiesAndCost['12000'] = ['12000'];
    quantitiesAndCost['16000'] = ['16000'];
    quantitiesAndCost['20000'] = ['20000'];

    function ChangeSizeList() {
      var sizeList = document.getElementById("size");
      var materialList = document.getElementById("paperMaterial");
      var selSize = sizeList.options[sizeList.selectedIndex].value;
      while (materialList.options.length) {
          materialList.remove(0);
      }

      sizeList.firstElementChild.setAttribute('disabled', '');
      materialList.removeAttribute('disabled');

      var sizes = paperAndMaterials[selSize];
      if (sizes) {
          var i;
          for (i = 0; i < sizes.length; i++) {
              var size = new Option(sizes[i], i);
              materialList.options.add(size);
          }
      }
    }

    function ChangePrintingList() {
      var materialList = document.getElementById("paperMaterial");
      var printingList = document.getElementById("printing");
      var selMaterial = materialList.options[materialList.selectedIndex].label;
      while (printingList.options.length) {
          printingList.remove(0);
      }

      materialList.firstElementChild.setAttribute('disabled', '');
      printingList.removeAttribute('disabled');

      var materials = materialAndPrinting[selMaterial];
      if (materials) {
          var i;
          for (i = 0; i < materials.length; i++) {
              var paperMaterial = new Option(materials[i], i);
              printingList.options.add(paperMaterial);
          }
      }
    }

    function ChangeQuantityList() {
      var printingList = document.getElementById("printing");
      var quantityList = document.getElementById("quantity");
      var selPrinting = printingList.options[printingList.selectedIndex].label;
      while (quantityList.options.length) {
          quantityList.remove(0);
      }

      printingList.firstElementChild.setAttribute('disabled', '');
      quantityList.removeAttribute('disabled');

      var printings = printingAndQuantities[selPrinting];
      if (printings) {
          var i;
          for (i = 0; i < printings.length; i++) {
              var printing = new Option(printings[i], i);
              quantityList.options.add(printing);
          }
      }
    }

    function ChangeCostList() {

      var size = document.getElementById("size");
      var sizeData = size.options[size.selectedIndex].label;

      var material = document.getElementById("paperMaterial");
      var materialData = material.options[material.selectedIndex].label;

      var printing = document.getElementById("printing");
      var printingData = printing.options[printing.selectedIndex].label;

      var quantity = document.getElementById("quantity");
      var quantityData = quantity.options[quantity.selectedIndex].label;

      var delivery= document.getElementById("delivery");
      var deliveryData = document.querySelector("input[name=delivery]:checked").value;

      var price = document.getElementById("price");
      var weight = document.getElementById("weight");

      delivery.setAttribute('onchange', 'ChangeCostList()');
      quantity.firstElementChild.setAttribute('disabled', '');

      document.getElementById('ajaxLoading').removeAttribute('hidden');
      document.getElementById('ajaxResult').setAttribute('hidden', '');

      $.ajax({
        url: "<?php echo site_url('product/flyer_get_priceAndWeight'); ?>",
        type: "POST",
        data: {'size': sizeData, 'material': materialData, 'printing': printingData, 'quantity': quantityData, 'delivery': deliveryData},
        dataType: 'json',
        cache: false,
        success: function(result) {
          price.value = "RM " + result['price'];
          weight.value = result['weight'] + " kg";
        },
        complete: function(){
          document.getElementById('ajaxLoading').setAttribute('hidden', '');
          document.getElementById('ajaxResult').removeAttribute('hidden');
        },
        error: function() {
          alert('An error occurred. Please contact the system administrator.');
        }
      });
    }

      //End of Flyer//
      var typeAndMaterials = {};
      typeAndMaterials['RC'] = ['-- Material of Shirt --','Cotton','Microfiber'];
      typeAndMaterials['CL'] = ['-- Material of Shirt --','Cotton','Polyster'];

      var materialAndBrands = {};
      materialAndBrands['Cotton'] = ['-- Brand of Shirt --','OrenSport','FourSquare','NICE'];
      materialAndBrands['Microfiber'] = ['-- Brand of Shirt --','OrenSport','MDTextile'];

      var brandAndCosts = {};
      brandAndCosts['OrenSport'] = ['8.48'];
      brandAndCosts['FourSquare'] = ['6.20'];
      brandAndCosts['NICE'] = ['5.83'];


      function ChangeTypeList() {
          var typeList = document.getElementById("type");
          var materialList = document.getElementById("material");
          var selType = typeList.options[typeList.selectedIndex].value;

          while (materialList.options.length) {
              materialList.remove(0);
          }

          materialList.removeAttribute('disabled');

          var types = typeAndMaterials[selType];
          if (types) {
              var i;
              for (i = 0; i < types.length; i++) {
                  var type = new Option(types[i], i);
                  materialList.options.add(type);
              }
          }

          typeList.firstElementChild.setAttribute('disabled', '');
      }

      function ChangeBrandList() {
          var materialList = document.getElementById("material");
          var brandList = document.getElementById("brand");
          var delivery = document.getElementById("delivery");

          var selMaterial = materialList.options[materialList.selectedIndex].label;

      	while (brandList.options.length) {
              brandList.remove(0);
          }

          materialList.firstElementChild.setAttribute('disabled', '');
          brandList.removeAttribute('disabled');

          delivery.removeAttribute('disabled');
          delivery.firstElementChild.setAttribute('disabled', '');


          var materials = materialAndBrands[selMaterial];
          if (materials) {
              var i;
              for (i = 0; i < materials.length; i++) {
                  var material = new Option(materials[i], i);
                  brandList.options.add(material);
              }
          }

          brandList.firstElementChild.setAttribute('disabled', '');
      }

      function ChangeQuantity() {
      	var brandList = document.getElementById("brand");
          var quantity = document.getElementById("quantity").value;
          var selBrand = brandList.options[brandList.selectedIndex].label;
      	var cost = (brandAndCosts[selBrand] * quantity).toFixed(2);
      }

      function deliveryCost(){

      	var quantity = document.getElementById("quantity").value;
          var delivery = document.getElementById("delivery").value;
          var weight = quantity * 0.25;

          if (weight % 1 > 0.01)
          {

          }

          if (weight % 1 == 0)
          {

          }




      }

      //End of Shirt Details//

      //Start of Printing Details//

      var frontSizeAndColor = {};
      frontSizeAndColor['A4'] = ['--Color Printing--','1 Color', '2 Color', '3 Color', 'CMYK'];
      frontSizeAndColor['A3'] = ['--Color Printing--','1 Color', '2 Color', '3 Color', 'CMYK'];

      function ChangeFrontSizeList() {
          var sizeList = document.getElementById("frontSize");
          var colorList = document.getElementById("frontColor");
          var selSize = sizeList.options[sizeList.selectedIndex].value;
          while (colorList.options.length) {
              colorList.remove(0);
          }


          sizeList.firstElementChild.setAttribute('disabled', '');
          colorList.removeAttribute('disabled');

          var frontSizes = frontSizeAndColor[selSize];
          if (frontSizes) {
              var i;
              for (i = 0; i < frontSizes.length; i++) {
                  var frontSize = new Option(frontSizes[i], i);
                  colorList.options.add(frontSize);
              }
          }
      }

      function ChangeFrontCheck(){
      	var frontCheck = document.getElementById("front");
          var checkStatus = document.getElementById("front").checked;
          var sizeList = document.getElementById("frontSize");
          var colorList = document.getElementById("frontColor");


          if(checkStatus == true){

          	sizeList.removeAttribute('disabled','');
          }

          if(checkStatus == false){

      		sizeList.setAttribute('disabled', '');
              colorList.setAttribute('disabled','');
          }


      }

      var backSizeAndColor = {};
      backSizeAndColor['A4'] = ['--Color Printing--','1 Color', '2 Color', '3 Color', 'CMYK'];
      backSizeAndColor['A3'] = ['--Color Printing--','1 Color', '2 Color', '3 Color', 'CMYK'];

      function ChangeBackSizeList() {
          var sizeList = document.getElementById("backSize");
          var colorList = document.getElementById("backColor");
          var selSize = sizeList.options[sizeList.selectedIndex].value;
          while (colorList.options.length) {
              colorList.remove(0);
          }


          sizeList.firstElementChild.setAttribute('disabled', '');
          colorList.removeAttribute('disabled');

          var backSizes = backSizeAndColor[selSize];
          if (backSizes) {
              var i;
              for (i = 0; i < backSizes.length; i++) {
                  var backSize = new Option(backSizes[i], i);
                  colorList.options.add(backSize);
              }
          }
      }

      function ChangeBackCheck(){
      	var backCheck = document.getElementById("back");
          var checkStatus = document.getElementById("back").checked;
          var sizeList = document.getElementById("backSize");
          var colorList = document.getElementById("backColor");


          if(checkStatus == true){

          	sizeList.removeAttribute('disabled','');
          }

          if(checkStatus == false){

      		sizeList.setAttribute('disabled', '');
              colorList.setAttribute('disabled','');
          }


      }

      //End of Front and Back//

      var leftSizeAndColor = {};
      leftSizeAndColor['A4'] = ['--Color Printing--','1 Color', '2 Color', '3 Color', 'CMYK'];
      leftSizeAndColor['A3'] = ['--Color Printing--','1 Color', '2 Color', '3 Color', 'CMYK'];

      function ChangeLeftSizeList() {
          var sizeList = document.getElementById("leftSize");
          var colorList = document.getElementById("leftColor");
          var selSize = sizeList.options[sizeList.selectedIndex].value;
          while (colorList.options.length) {
              colorList.remove(0);
          }


          sizeList.firstElementChild.setAttribute('disabled', '');
          colorList.removeAttribute('disabled');

          var leftSizes = leftSizeAndColor[selSize];
          if (leftSizes) {
              var i;
              for (i = 0; i < leftSizes.length; i++) {
                  var leftSize = new Option(leftSizes[i], i);
                  colorList.options.add(leftSize);
              }
          }
      }

      function ChangeLeftCheck(){
      	var leftCheck = document.getElementById("left");
          var checkStatus = document.getElementById("left").checked;
          var sizeList = document.getElementById("leftSize");
          var colorList = document.getElementById("leftColor");


          if(checkStatus == true){

          	sizeList.removeAttribute('disabled','');
          }

          if(checkStatus == false){

      		sizeList.setAttribute('disabled', '');
              colorList.setAttribute('disabled','');
          }


      }

      var rightSizeAndColor = {};
      rightSizeAndColor['A4'] = ['--Color Printing--','1 Color', '2 Color', '3 Color', 'CMYK'];
      rightSizeAndColor['A3'] = ['--Color Printing--','1 Color', '2 Color', '3 Color', 'CMYK'];

      function ChangeRightSizeList() {
          var sizeList = document.getElementById("rightSize");
          var colorList = document.getElementById("rightColor");
          var selSize = sizeList.options[sizeList.selectedIndex].value;
          while (colorList.options.length) {
              colorList.remove(0);
          }


          sizeList.firstElementChild.setAttribute('disabled', '');
          colorList.removeAttribute('disabled');

          var rightSizes = rightSizeAndColor[selSize];
          if (rightSizes) {
              var i;
              for (i = 0; i < rightSizes.length; i++) {
                  var rightSize = new Option(rightSizes[i], i);
                  colorList.options.add(rightSize);
              }
          }
      }

      function ChangeRightCheck(){
      	var rightCheck = document.getElementById("right");
          var checkStatus = document.getElementById("right").checked;
          var sizeList = document.getElementById("rightSize");
          var colorList = document.getElementById("rightColor");


          if(checkStatus == true){

          	sizeList.removeAttribute('disabled','');
          }

          if(checkStatus == false){

      		sizeList.setAttribute('disabled', '');
              colorList.setAttribute('disabled','');
          }


      }

    </script>
    </html>
