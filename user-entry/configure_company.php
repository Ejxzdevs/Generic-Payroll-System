<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Company Registration</title>
  <!-- Add Bootstrap CSS -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <style>
	*{
		scrollbar-width: thin;
    	scrollbar-color: #181047 white ;
	}
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="box-container p-4 border rounded shadow">
      <form method="POST" action="Company_Register.php" enctype="multipart/form-data">
        <div class="header-configure mb-4">
          <h3>Company Information</h3>
        </div>
        <!-- Logo Upload Section -->
        <div class="upload-logo-container text-center mb-4">
          <label class="logo-label">SYSTEM LOGO</label>
          <img src="../icons/default.jpg" class="default-img mb-2" style="max-width: 150px; height: auto;">
          <br>
          <label id="btn-upload" for="img_logo" class="btn btn-primary">
            <img id="icon-upload" src="../icons/icon-upload.png" width="20" height="20">
            CHOOSE IMAGE
            <input type="file" name="file" id="img_logo" hidden>
          </label>
        </div>

        <!-- Form Fields -->
        <div class="register-body">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="system_name">System Name</label>
              <input type="text" class="form-control" name="system_name" id="system_name" placeholder="Enter System Name: ">
            </div>
            <div class="form-group col-md-6">
              <label for="company_name">Company Name</label>
              <input type="text" class="form-control" name="company_name" id="company_name" placeholder="Enter Company Name: ">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="state">Province</label>
              <input type="text" class="form-control" name="state" id="state" placeholder="Enter State: ">
            </div>
            <div class="form-group col-md-6">
              <label for="city">City</label>
              <input type="text" class="form-control" name="city" id="city" placeholder="Enter City: ">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="zipcode">Zipcode</label>
              <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Enter Zipcode: ">
            </div>
            <div class="form-group col-md-6">
              <label for="street">Street</label>
              <input type="text" class="form-control" name="street" id="street" placeholder="Enter Street: ">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="building_number">Building Number</label>
              <input type="text" class="form-control" name="building_number" id="building_number" placeholder="Enter Building number: ">
            </div>
          </div>

          <!-- Payroll Settings -->
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="regular_payroll">Set Payroll for Regular</label>
              <select class="form-control" name="regular_payroll" id="regular_payroll">
                <option value="1days">Daily</option>
                <option value="5days">Weekly</option>
                <option value="12days">Bi-Weekly</option>
                <option value="13days">Semi-Monthly</option>
                <option value="28days">Monthly</option>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="casual_payroll">Set Payroll for Casual</label>
              <select class="form-control" name="casual_payroll" id="casual_payroll">
                <option value="1days">Daily</option>
                <option value="5days">Weekly</option>
                <option value="12days">Bi-Weekly</option>
                <option value="13days">Semi-Monthly</option>
                <option value="28days">Monthly</option>
              </select>
            </div>
          </div>

          <!-- Submit Button -->
          <div class="btn-company-register text-center mt-4">
            <button type="submit" class="btn btn-success" name="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!-- Add Bootstrap JS and dependencies -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- JavaScript for Image Preview -->
  <script type="text/javascript">
    const img_file = document.getElementById("img_logo");
    const imageEmp = document.querySelector(".default-img");

    img_file.addEventListener("change", function() {
      const file = this.files[0];

      if (file) {
        const reader = new FileReader();

        reader.addEventListener("load", function() {
          imageEmp.setAttribute("src", this.result);
        });

        reader.readAsDataURL(file);
      }
    });
  </script>
</body>
</html>
