<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Website builder form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <style>
    .form-control {
      color: black;
      background: rgba(241, 239, 239, 0.5);
      backdrop-filter: blur(3px);
      border: 1px solid rgba(255, 255, 255, 0.325);
    }

    body {
      background-image: url("https://images.unsplash.com/photo-1437419764061-2473afe69fc2?q=80&w=1932&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D");
    }

    .btn {
      font-size: 18px;
      font-weight: 600;
      background-color: #6c757d;
      color: white;
      width: 30%;
      margin: 30px auto;
      display: block;
      border-radius: 10px;
      transition: background-color 0.5s;
    }

    .btn:hover {
      color: white;
      backdrop-filter: blur(2.5px);
      border-color: #6c757d;
    }
  </style>
</head>

<body>
  <h1 class="text-center text-white">
    You are one step away from your webpage
  </h1>
  <div class='row justify-content-center'>
    <?php
    $message = $_GET['method_error'] ?? '';
    if (!empty($message)) {
      echo " 
            <div class='alert alert-danger col-6' role='alert'>
               $message
            </div>";
    }
    ?>
  </div>
  <form action="./formScrip.php" method="POST">
    <div class="container d-flex align-items-start">
      <div class="container m-2 p-0">
        <div class="container form-control p-4">
          <div class="form-group">
            <label for="img_url">Cover image URL</label>
            <input required type="text" class="form-control p-2 my-2" id="img_url" name="cover_img_url" />
            <label for="main_title">Main Title of Page</label>
            <input required type="text" class="form-control p-2 my-2" id="main_title" name="main_title" />
            <label for="subtitle">Subtitle of Page</label>
            <input required type="text" class="form-control p-2 my-2" id="subtitle" name="subtitle" />
            <label for="text-area">Something about yourself</label>
            <textarea required class="form-control p-2 my-2" id="text-area" rows="3" name="user_info"></textarea>
            <label for="tel">Mobile number</label>
            <input required type="tel" class="form-control p-2 my-2" id="tel" name="tel" />
            <label for="location">Location</label>
            <input required type="text" class="form-control p-2 my-2" id="location" name="location_" />
          </div>
        </div>
        <div class="container form-control p-4 mt-3">
          <div class="form-group">
            <label for="service_products">Do you provide a service or a product?
            </label>
            <br />
            <select name="service_products" class="form-select" id="service_products">
              <option value="Service">Service</option>
              <option value="Product">Product</option>
            </select>
          </div>
        </div>
      </div>
      <div class="container form-control p-4 m-2">
        <div class="form-group">
          <p>Provide image url and description of your service/product</p>
          <label for="img_url1">Image URL</label>
          <input required type="text" class="form-control p-2 my-1" id="img_url1" name="img_url1" />

          <label for="description_1">Description of service/product</label>
          <textarea required class="form-control p-2 my-1" id="description_1" rows="2" name="description_1"></textarea>

          <label for="img_url2">Image URL</label>
          <input required type="text" class="form-control p-2 my-1" id="img_url2" name="img_url2" />

          <label for="description_2">Description of service/product</label>
          <textarea required class="form-control p-2 my-1" id="description_2" rows="2" name="description_2"></textarea>
          <label for="img_url3">Image URL</label>
          <input required type="text" class="form-control p-2 my-1" id="img_url3" name="img_url3" />

          <label for="description_3">Description of service/product</label>
          <textarea required class="form-control p-2 my-1" id="description_3" rows="2" name="description_3"></textarea>
        </div>
      </div>
      <div class="container form-control p-4 m-2">
        <div class="form-group">
          <label for="company">Provide a description for your company, something people should
            be aware of before they contact you:</label>
          <textarea required class="form-control p-2 my-2" id="company" rows="2" name="company_description"></textarea>
          <hr />
          <label for="linkedin">Linked in</label>
          <input required type="text" class="form-control p-2 my-2" id="linkedin" name="linkedin" />
          <label for="facebook">Facebook</label>
          <input required type="text" class="form-control p-2 my-2" id="facebook" name="facebook" />
          <label for="twitter">Twitter</label>
          <input required type="text" class="form-control p-2 my-2" id="twitter" name="twitter" />
          <label for="google_plus">Google+</label>
          <input required type="text" class="form-control p-2 my-2" id="google_plus" name="google_plus" />
        </div>
      </div>
    </div>
    <button type="submit" class="btn">Submit</button>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>