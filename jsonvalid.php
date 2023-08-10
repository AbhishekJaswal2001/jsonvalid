<!DOCTYPE html>
<html>
<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }
  .container {
    width: 80%;
    max-width: 800px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }
  .scrollable-textarea {
    width: 100%;
    height: 200px;
    resize: vertical;
    overflow-y: scroll;
    border: 2px solid #ddd;
    padding: 5px;
    
  }
  #button1 {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 10px 20px;
    font-weight: bold;
    cursor: pointer;
    border-radius: 5px;
  }
  #button1:hover {
    background-color: #45a049;
  }
  .scrollable-error {
    width: 100%;
    height: 100px;
    resize: vertical;
    overflow-y: scroll;
    border: 2px solid #ddd;
    padding: 5px;
    margin-top: 10px;
  }
</style>
</head>
<body>

<div class="container">
  <h1>JSON Validation Tool</h1>
  <textarea class="scrollable-textarea" id="data" placeholder="Enter JSON:"></textarea>
  <br>
  <button id="button1">Validate JSON</button>
  <p class="scrollable-error" id="error_msg"></p>
</div>

<script>
  $(document).ready(function(){
    $("#button1").click(function() {
      var json_string = $('#data').val();
      if (json_string === '') {
        alert("Please provide JSON");
        return false;
      }
      try {
        json_string = json_string.replace(/\s/g, ''); // Remove whitespace
        var parsed_json = JSON.parse(json_string);
        json_string = JSON.stringify(parsed_json, null, 3);
        $("#data").val(json_string);
        $("#error_msg").text('Valid JSON');
      } catch (err) {
        $("#error_msg").text(err.message);
      }
    });
  });
</script>

</body>
</html>
