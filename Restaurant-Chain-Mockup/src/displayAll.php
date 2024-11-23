<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Restaurant Chain Management System</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f9;
      color: #333;
    }

    .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .section {
      margin-bottom: 40px;
    }

    .section h2 {
      margin-bottom: 20px;
      color: #666;
    }

    .card {
      padding: 20px;
      background: #f9f9f9;
      border-radius: 8px;
      margin-bottom: 20px;
      border: 1px solid #ddd;
    }

    .card ul {
      list-style: none;
      padding: 0;
    }

    .card ul li {
      margin-bottom: 10px;
    }

    .card p {
      margin: 0;
      padding: 0;
    }

    .card h3 {
      margin-top: 0;
    }

    .card button {
      display: block;
      margin: 10px 0;
      padding: 10px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .card button:hover {
      background-color: #0056b3;
    }

    .modal {
      display: none;
      position: fixed;
      z-index: 1;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: rgb(0, 0, 0);
      background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      border-radius: 8px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Restaurant Chain Management System</h1>

    <div class="section">
      <h2>Restaurant Chains</h2>
      <?php

      // コードベースのファイルのオートロード
      spl_autoload_extensions(".php");
      spl_autoload_register();

      // Composerのオートローダーを読み込み
      require_once 'vendor/autoload.php';

      use Helpers\RandomGenerator;

      // 複数のRestaurantChainの生成と表示
      for ($i = 0; $i < 5; $i++) {
        $restaurantChain = RandomGenerator::restaurantChain();
        $id = "chain" . $i;

        echo "<div class='card'>";
        echo "<h3>{$restaurantChain->getName()}</h3>";
        echo "<p>Company Name: {$restaurantChain->getParentCompany()}</p>";
        echo "<button id='{$id}Btn'>View Details</button>";
        echo "</div>";

        echo "<div id='{$id}Modal' class='modal'>";
        echo "<div class='modal-content'>";
        echo "<span class='close'>&times;</span>";
        echo "<h2>{$restaurantChain->getName()} Details</h2>";

        echo "<h3>String Representation</h3>";
        echo "<p>{$restaurantChain->toString()}</p>";

        echo "<h3>HTML Representation</h3>";
        echo $restaurantChain->toHTML();

        echo "<h3>Markdown Representation</h3>";
        echo "<div class='markdown'>{$restaurantChain->toMarkdown()}</div>";

        echo "<h3>Array Representation (Simplified)</h3>";
        echo "<pre>" . print_r($restaurantChain->toArray(), true) . "</pre>";

        echo "</div>";
        echo "</div>";
      }
      ?>
    </div>
  </div>

  <script>
    // Get all modal elements
    let modals = document.getElementsByClassName("modal");

    // Get all button elements
    let buttons = document.querySelectorAll("button[id$='Btn']");

    // Get all <span> elements that close the modal
    let spans = document.getElementsByClassName("close");

    // When the user clicks the button, open the modal
    for (let i = 0; i < buttons.length; i++) {
      buttons[i].onclick = function() {
        let modal = document.getElementById(buttons[i].id.replace('Btn', 'Modal'));
        modal.style.display = "block";
      }
    }

    // When the user clicks on <span> (x), close the modal
    for (let i = 0; i < spans.length; i++) {
      spans[i].onclick = function() {
        this.parentElement.parentElement.style.display = "none";
      }
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
      if (event.target.classList.contains('modal')) {
        event.target.style.display = "none";
      }
    }
  </script>
</body>

</html>