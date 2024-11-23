<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Generate Restaurant Chain Data</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f4f4f9;
      color: #333;
    }

    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      text-align: center;
      color: #333;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 5px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
    }

    .form-group button {
      padding: 10px 20px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      display: block;
      margin: 20px auto;
    }

    .form-group button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Generate Restaurant Chain Data</h1>
    <form action="download.php" method="POST">
      <!-- フォームグループ: 各ロケーションの従業員数を入力 -->
      <div class="form-group">
        <label for="numEmployees">Number of Employees per Location:</label>
        <input type="number" id="numEmployees" name="numEmployees" required>
      </div>

      <!-- フォームグループ: 従業員の給与範囲を入力 -->
      <div class="form-group">
        <label for="salaryRange">Employee Salary Range:</label>
        <input type="text" id="salaryRange" name="salaryRange" placeholder="e.g., 30000-60000" required>
      </div>

      <!-- フォームグループ: ロケーションの数を入力 -->
      <div class="form-group">
        <label for="numLocations">Number of Locations:</label>
        <input type="number" id="numLocations" name="numLocations" required>
      </div>

      <!-- フォームグループ: 郵便番号の範囲を入力 -->
      <div class="form-group">
        <label for="zipRange">Zip Code Range:</label>
        <input type="text" id="zipRange" name="zipRange" placeholder="e.g., 10000-99999" required>
      </div>

      <!-- フォームグループ: 生成するファイルの形式を選択 -->
      <div class="form-group">
        <label for="fileType">Select File Type:</label>
        <select id="fileType" name="fileType" required>
          <option value="html">HTML</option>
          <option value="json">JSON</option>
          <option value="txt">TXT</option>
          <option value="markdown">MarkDown</option>
        </select>
      </div>

      <!-- フォームグループ: フォームの送信ボタン -->
      <div class="form-group">
        <button type="submit">Generate File</button>
      </div>
    </form>
  </div>
</body>

</html>