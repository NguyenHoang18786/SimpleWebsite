<!doctype html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styleAs.css">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
      // Prevent dropdown menu from closing when click inside the form
      $(document).on("click", ".navbar-right .dropdown-menu", function(e){
        e.stopPropagation();
      });
    </script>
    <nav class="navbar navbar-default navbar-expand-lg navbar-light">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Shopping<b>Online</b></a>  		
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
        <span class="navbar-toggler-icon"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
      </div>
      <!-- Collection of nav links, forms, and other content for toggling -->
      <div id="navbarCollapse" class="collapse navbar-collapse">
        <form class="navbar-form form-inline">
          <div class="input-group search-box">
            <center><input type="text" id="search" class="form-control" placeholder="Search here..."></center>
            <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
          </div>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="index.php" class="btn btn-primary get-started-btn mt-1 mb-1">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-2">
          <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-product-tab" data-toggle="pill" href="#v-pills-product" role="tab" aria-controls="v-pills-product" aria-selected="false">Product</a>
            <a class="nav-link" id="v-pills-customers-tab" data-toggle="pill" href="#v-pills-customers" role="tab" aria-controls="v-pills-customers" aria-selected="false">Customers</a>
            <a class="nav-link" id="v-pills-orders-tab" data-toggle="pill" href="#v-pills-orders" role="tab" aria-controls="v-pills-orders" aria-selected="false">Orders</a>
            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
          </div>
        </div>
        <div class="col-10">
          <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-product" role="tabpanel" aria-labelledby="v-pills-product-tab">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>iPhone 11 Pro Max 64Gb</td>
                    <td>Mobile Phone</td>
                    <td>35</td>
                    <td>27.990.000 đ</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>SamSung Galaxy A31</td>
                    <td>Mobile Phone</td>
                    <td>0</td>
                    <td>6.990.000 đ</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>V-Smart Active 3</td>
                    <td>Mobile Phone</td>
                    <td>346</td>
                    <td>4.990.000 đ</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>SamSung Galaxy Note 20</td>
                    <td>Mobile Phone</td>
                    <td>92</td>
                    <td>20.990.000 đ</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>SamSung Galaxy S21</td>
                    <td>Mobile Phone</td>
                    <td>50</td>
                    <td>7.990.000</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Macbook Pro 2019</td>
                    <td>Laptop</td>
                    <td>26</td>
                    <td>50.990.000 đ</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Acer Nitro 5 2019</td>
                    <td>Laptop</td>
                    <td>12</td>
                    <td>23.990.000 đ</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Asus Zenbook UX</td>
                    <td>Laptop</td>
                    <td>19</td>
                    <td>25.490.000 đ</td>
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>Lenovo Legion Y540</td>
                    <td>Laptop</td>
                    <td>0</td>
                    <td>30.990.000 đ</td>
                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>MSI GS66</td>
                    <td>Laptop</td>
                    <td>9</td>
                    <td>46.990.000 đ</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="tab-pane fade" id="v-pills-customers" role="tabpanel" aria-labelledby="v-pills-customers-tab">..........</div>
            <div class="tab-pane fade" id="v-pills-orders" role="tabpanel" aria-labelledby="v-pills-orders-tab">..........</div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">..........</div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
