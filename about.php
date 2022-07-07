<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Tewodros Lounge</title>
  <style>
    #index h3 {
      font-family: 'Times New Roman';
      font-weight: bold;
      font-size: 140%;
      background-color: rgb(56, 52, 52);
    }

    p {
      font-family: 'Times New Roman', Times, serif;
      font-size: 125%;
      color: black;
      margin-left: 3%;
    }

    p {
      margin-left: 4%;
    }

    h4 {
      margin-left: 3%;
      margin-top: 2%;
    }
  </style>
</head>

<body style="background: rgb(153, 149, 149);" id="body">
  <?php
     include('partials-front/menu.php');

  ?>

  <div class="container-fluid">
    <hr>
    <div class="row" style="margin-left: 0.5%; margin-right: 0.5%;" id="index">

      <div class="col-lg-12 rounded  bg-light body1">

        <div id="about" class="rounded" style="margin-top: 2%; background: rgb(218, 215, 210);">
          <h3 class="text-center rounded">About The System</h3>
          <h4 style="
          color: black; 
          font-size: 140%; 
          font-weight: bold; 
          font-family: 'Times New roman';">

            The System has the following future's </h4>
            1. Customers - customers are the system users which can get service from the lounge.
        They view the type of food from the menu and order
        Make payment in cash to the cashier. 
        If a student is non-cafe he/she may buy tick 
        <br>
        2. Cashier:-cashier is a person which is responsible for:-
        Give tickets for the students/customers
        <br>
        Report the sold food daily in the paper
        3. Managers:-Register employees 
        4. Waiters:- is persons who deliver the foods and have the following duties:
        Call customers/students.
        Deliver the food to the students/ customers.
        <br>
        5. Kitchen: are persons which are preparing food.
        View order histories and prepare food based on the type of ordered food.
        <br>
        6. Baristas: are persons who prepare hot drinks like tea, Almond.

        </div>
        <br>
      </div>
    </div>
  </div>


</body>

</html>