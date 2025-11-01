
<?php
    $min  = 1;
    $max  = 10;
    $num1 = rand( $min, $max );
    $num2 = rand( $min, $max );
?>

<!DOCTYPE html>
<html>
 
<head>
  <title>Form Validation</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" />
</head>
 
<body class="container">
  <div class="row mt-3">
    <div class="col-md-6">
      <h4 class="mb-3">Form Validation in PHP - <a href="https://www.cluemediator.com" target="_blank" rel="noopener noreferrer">Clue Mediator</a>
      </h4>
      <form id="form" method="post" action="getData.php">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="text" class="form-control" name="email" id="email">
        </div>
        <div class="form-group">
          <label for="contact">Contact</label>
          <input type="text" class="form-control" name="contact" id="contact">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="password">
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input type="password" class="form-control" name="confirmPassword" id="confirmPassword">
        </div>


  <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <label for="quiz"
                                   class="col-sm-3 col-form-label">
                                <?php echo $num1 . '+' . $num2; ?>
                            </label>
                            <div class="col-sm-9">
                                <input type="hidden"
                                       name="no1"
                                       value="<?php echo $num1 ?>">
                                <input type="hidden"
                                       name="no2"
                                       value="<?php echo $num2 ?>">
                                <input type="text"
                                       name="test"
                                       class="form-control quiz-control"
                                       autocomplete="off"
                                       id="quiz" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        <input type="submit"
                   name="submit"
                   id="submit">
      </form>
   <?php
            if(isset($_REQUEST["submit"]))
            {
                $test=$_REQUEST["test"];
                $number1=$_REQUEST["no1"];
                $number2=$_REQUEST["no2"];
                $total=$number1+$number2;
                if ($total==$test)
                {
                    header("Location: welcome.php");
                    exit();
                }
                else {
                    echo "<p>
                                <font color=red 
                                    font face='arial'
                                    size='5pt'>
                                Invalid captcha entered !
                                </font>
                            </p>";
                     }
            }
        ?>
    </div>
      
    </div>
  </div>
</body>
<style>
  .error {
    color: red;
  }
</style>
<script>
  $(document).ready(function () {
    $('#form').validate({
      rules: {
        name: {
          required: true
        },
        email: {
          required: true,
          email: true
        },
        contact: {
          required: true,
          rangelength: [10, 12],
          number: true
        },
        password: {
          required: true,
          minlength: 8
        },
        confirmPassword: {
          required: true,
          equalTo: "#password"
        }
      },
      messages: {
        name: 'Please enter Name.',
        email: {
          required: 'Please enter Email Address.',
          email: 'Please enter a valid Email Address.',
        },
        contact: {
          required: 'Please enter Contact.',
          rangelength: 'Contact should be 10 digit number.'
        },
        password: {
          required: 'Please enter Password.',
          minlength: 'Password must be at least 8 characters long.',
        },
        confirmPassword: {
          required: 'Please enter Confirm Password.',
          equalTo: 'Confirm Password do not match with Password.',
        }
      },
      submitHandler: function (form) {
        form.submit();
      }
    });
  });
</script>
 
</html>