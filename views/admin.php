<!DOCTYPE html>
<html>
    <head>     
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta charset="UTF-8" />
        <meta name="robots" content="noindex, nofollow"/>
        <meta name=“description” content="Speldalen - Köp senaste konsolspelen till playstation Wii U/Wii U i Borlänge till de senaste konsolerna"/>
        <title>Speldalen - Playstation</title>
        <link rel="stylesheet" type="text/css"  href="./hemstyle.css" />

        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>




        <style type="text/css">
            body {
                background-color:#FFFFFF;
                color:#000000;
            }
            .clearfix {
                clear:both;
            }
        </style>

        <script>
            //Håller JSON produkterna
            var globalData;

            //Lyssnare för updateformen
            $(document).on('submit', '#updateForm', function (e) {
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function () {
                        //Uppdaterar produkttabellen
                        getProducts();
                        //Stänger dialogen
                        $("#dialog").dialog("close");
                    }
                });
                e.preventDefault();
            });

            //Lyssnare för ta bort
            $(document).on('submit', '#deleteForm', function (e) {
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function () {
                        //Uppdaterar produkttabellen
                        getProducts();
                    }
                });
                e.preventDefault();
            });

            //Lyssnare för addformen
            $(document).on('submit', '#addForm', function (e) {
                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: $(this).serialize(),
                    success: function () {
                        //Uppdaterar produkttabellen
                        getProducts();
                        //Stänger dialogen
                        $("#adddialog").dialog("close");
                    }
                });
                e.preventDefault();
            });

            //För redigering av produkt
            function displayEdit(id) {

                //Gör dialogen synlig
                $("#dialog").dialog("open");

                //Loopa igenom JSON produkterna till rätt produkt hittas
                $.each(globalData, function (key, value) {
                    //Kolla om produkten som skall redigeras är funnen
                    if (value.id == id) {
                        //Fyll i textfälten i dialogen med produktdatan
                        $('[name="id"]').val(value.id);
                        $('[name="name"]').val(value.name);
                        $('[name="desc"]').val(value.description);
                        $('[name="price"]').val(value.price);
                        $('[name="category"]').val(value.category);
                        $('[name="stock"]').val(value.stock);
                        $('[name="imgurl"]').val(value.imgurl);
                        return false;
                    }
                });
            }

            //För lägga till produkt
            function showAddProduct() {
                //Gör dialogen synlig
                $("#adddialog").dialog("open");

                //Töm fälten
                $('[name="name"]').val("");
                $('[name="desc"]').val("");
                $('[name="price"]').val("");
                //$('[name="category"]').val(value.category);
                $('[name="stock"]').val("");
                $('[name="imgurl"]').val("");

            }

            //När sidan laddats klart
            $(document).ready(function () {
                //Ladda dialogerna och sätt de till dolda default.
                $("#dialog").dialog({
                    autoOpen: false
                });
                $("#adddialog").dialog({
                    autoOpen: false
                });
                //Hämta produkterna
                getProducts();
            });

            //Metod för att skapa upp och rita ut produkttabellen
            function createTable(parsed) {
                //Töm befintlig html
                $("#maincontent").html("");

                //Nytt tabellelement
                var tbl = document.createElement('table');
                //Sätt id på tabellen
                tbl.setAttribute('id', 'productTable');
                tbl.setAttribute('border', '1');


                //Tabel headers
                //Id
                var tblHeader = document.createElement('th');
                var thText = document.createTextNode('ID');
                tblHeader.appendChild(thText);
                tbl.appendChild(tblHeader);

                //Name
                tblHeader = document.createElement('th');
                thText = document.createTextNode('Name');
                tblHeader.appendChild(thText);
                tbl.appendChild(tblHeader);

                //Description
                tblHeader = document.createElement('th');
                thText = document.createTextNode('Description');
                tblHeader.appendChild(thText);
                tbl.appendChild(tblHeader);

                //Price
                tblHeader = document.createElement('th');
                thText = document.createTextNode('Price');
                tblHeader.appendChild(thText);
                tbl.appendChild(tblHeader);

                //Operationer
                tblHeader = document.createElement('th');
                thText = document.createTextNode('Verktyg');
                tblHeader.appendChild(thText);
                tbl.appendChild(tblHeader);

                //parsed innehåller den parsade JSON datan med produkterna
                $.each(parsed, function (key, value) {
                    //id
                    var row = tbl.insertRow(-1);
                    var cell = row.insertCell(-1);
                    cell.innerHTML += value.id;

                    //Name
                    cell = row.insertCell(-1);
                    cell.innerHTML += value.name;

                    //Description
                    cell = row.insertCell(-1);
                    cell.innerHTML += value.description;

                    //Price
                    cell = row.insertCell(-1);
                    cell.innerHTML += value.price;

                    //Knappar
                    cell = row.insertCell(-1);

                    //Redigera
                    var btn = document.createElement('button');
                    var Txt = document.createTextNode('Redigera');
                    btn.setAttribute('onclick', 'displayEdit(' + value.id + ');');
                    btn.appendChild(Txt);
                    cell.appendChild(btn);

                    //Ta bort
                    var f = document.createElement("form");
                    f.setAttribute('method', "POST");
                    f.setAttribute('action', "index.php?admin/deleteProduct");
                    f.setAttribute('id', 'deleteForm');

                    var i = document.createElement("input"); //input element, text
                    i.setAttribute('type', "hidden");
                    i.setAttribute('name', "id");
                    i.setAttribute('value', value.id);

                    var s = document.createElement("input"); //input element, Submit button
                    s.setAttribute('type', "submit");
                    s.setAttribute('value', "Ta bort");

                    f.appendChild(i);
                    f.appendChild(s);

                    cell.appendChild(f);
                });

                //Lägg ut tabellen i maincontent diven.
                $("#maincontent").append(tbl);
            }

            //Hämta produkterna (JSON)
            function getProducts() {
                //Hämta JSON
                $.getJSON("index.php?admin/getProducts").done(function (data) {
                    //Skapa upp produkttabellen
                    createTable(data);
                    //Sätt JSONproduktdatan i den globala variabeln
                    globalData = data;
                });

            }

        </script>
    </head>

    <body>
        <div id="container">

            <header class="logoheader">
                <?php
                include('headerlogo.html');
                ?>
            </header>
            <header class="header">
                <?php
                include('header.html');
                ?>
            </header>

            <nav class="nav">
                <?php
                include('nav.html');
                ?>
            </nav>

            <nav class="mainnav">
                <ul class="breadcrumbs">
                    <li><a href="index.php?home">Hem /</a></li>
                    <li><a href="index.php?admin/all">Admin /</a></li>
                </ul>
            </nav>

            <main>
                <div id = "dialog" title = "Redigera">
                    <form id="updateForm" action="index.php?admin/updateProduct" name="update" method="POST">
                        <input type = "hidden" name = "id" required> <br/>
                        <input type = "text" name = "name" required> <br/>
                        <textarea rows = "4" cols = "50" name = "desc" style="width:100%" required></textarea><br/>
                        <input type = "text" name = "price"  required><br/>
                        <select name = "category" >
                            <option value = "1">Nintendo</option>
                            <option value = "2">Xbox</option>
                            <option value = "3">Playstation</option>
                        </select> <br/>
                        <input type = "text" name = "stock"  required><br/>
                        <input type = "text" name = "imgurl"  required><br/>
                        <input type = "submit" value = "Uppdatera">
                    </form>
                </div>

                <!--                Lägg till dialog-->
                <div id = "adddialog" title = "Lägg till">
                    <form id="addForm" action="index.php?admin/addProduct" name="add" method="POST">
                        <input type = "text" name = "name" placeholder="Produktnamn" required> <br/>
                        <textarea rows = "4" cols = "50" name = "desc"placeholder="Produktbeskrivning.." style="width:100%" required></textarea><br/>
                        <input type = "text" name = "price" placeholder="Pris.. ex 199.90" required><br/>
                        <select name = "category" >
                            <option value = "1">Nintendo</option>
                            <option value = "2">Xbox</option>
                            <option value = "3">Playstation</option>
                        </select> <br/>
                        <input type = "text" name = "stock"  placeholder="Lagerantal (heltal)"required><br/>
                        <input type = "text" name = "imgurl"  placeholder="bildnamn inkl. filändelse"required><br/>
                        <input type = "submit" value = "Lägg till">
                    </form>
                </div>              
                <div id="buttons">
                    <button type='button' onclick='showAddProduct();'>Lägg till produkt</button>
                    <a href='index.php?admin/logout'><button type='button'>Logga ut</button></a>
                    <input type="button" value="Hämta" onclick="getProducts();" />
                </div>

                <div id="maincontent">
                </div>

            </main>

            <footer class="footer">
                <?php
                include('footer.html');
                ?>
            </footer>
        </div>


        <!-- W3C logos for valid HTML5 and CSS3 -->
        <div class="clearfix"></div>
        <div>
            <p>
                <a href="http://validator.w3.org/check?uri=referer">
                    <img src="http://www.w3.org/html/logo/downloads/HTML5_Logo_64.png" alt="Valid HTML5" height="50" width="50"
                         style="border:0;" />
                </a>
            </p>
            <p>
                <a href="http://jigsaw.w3.org/css-validator/check/referer">
                    <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss-blue"
                         alt="Valid CSS!" />
                </a>
            </p>
        </div>
    </body>
</html>